<?php

namespace App\Exchanges\OneC\Services\Document;

use App\Exchanges\OneC\Interfaces\OrderInterface;
use App\Exchanges\OneC\Commerce\Commerce;
use App\Exchanges\OneC\Commerce\Model\Order;
use App\Exchanges\ExchangeException;
use Spatie\ArrayToXml\ArrayToXml;

/**
 * Class Catalog
 * Class for implementing CommerceML protocol
 * http://v8.1c.ru/edi/edi_stnd/90/92.htm
 * http://v8.1c.ru/edi/edi_stnd/131/.
 */
class OrderService extends AbstractService
{
    /**
     * Начало сеанса
     * Выгрузка данных начинается с того, что система "1С:Предприятие" отправляет http-запрос следующего вида:
     * http://<сайт>/<путь> /1c-exchange?type=sale&mode=checkauth.
     * В ответ система управления сайтом передает системе «1С:Предприятие» три строки (используется разделитель строк "\n"):
     * - слово "success";
     * - имя Cookie;
     * - значение Cookie.
     * Примечание. Все последующие запросы к системе управления сайтом со стороны "1С:Предприятия" содержат в заголовке запроса имя и значение Cookie.
     *
     * @return string
     * @throws ExchangeException
     */
    public function checkauth(): string
    {
        return $this->authService->checkAuth();
    }

    /**
     * Далее следует запрос следующего вида:
     * http://<сайт>/<путь> /1c_exchange.php?type=sale&mode=init
     * В ответ система управления сайтом передает две строки:
     * 1. zip=yes, если сервер поддерживает обмен в zip-формате - в этом случае на следующем шаге файлы должны быть упакованы в zip-формате
     * или
     * zip=no - в этом случае на следующем шаге файлы не упаковываются и передаются каждый по отдельности.
     * 2. file_limit=<число>, где <число> - максимально допустимый размер файла в байтах для передачи за один запрос. Если системе "1С:Предприятие" понадобится передать файл большего размера, его следует разделить на фрагменты.
     *
     * @return string
     * @throws ExchangeException
     */
    public function init(): string
    {
        $this->authService->auth();

        $zipEnable = function_exists('zip_open') && $this->config->isUseZip();
        $response = 'zip='.($zipEnable ? 'yes' : 'no')."\n";
        $response .= 'file_limit='.$this->config->getFilePart()."\n";
        $response .= 'sessid='.$this->request->getSession()->getId()."\n";
        $response .= 'version=3.1';

        return $response;
    }

    /**
     * Далее получение файла обмена с сайта
     * Затем на сайт отправляется запрос вида
     * http://<сайт>/<путь> /1c_exchange.php?type=sale&mode=query.
     * 
     * Сайт передает сведения о заказах в формате CommerceML 2
     * 
     * @return string
     * @throws ExchangeException
     **/
    public function query()
    {
        $this->authService->auth();

        $documentClass = $this->getOrderClass();

        $orders = $documentClass->findOrders1c($this->config->getSource());
     
        $orders = $orders ? [
            'Контейнер' => [
                'Документ' => $orders
            ]
        ] : [];
   
        $result = ArrayToXml::convert($orders, [
            'rootElementName' => 'КоммерческаяИнформация',
            '_attributes' => [
                'ВерсияСхемы' => '3.1',
                'ДатаФормирования' => date('c'),
                'ФорматДаты' => 'ДФ=yyyy-MM-dd; ДЛФ=DT',
                'ФорматВремени' => 'ДФ=ЧЧ:мм:сс; ДЛФ=T',
                'РазделительДатаВремя' => 'T',
                'ФорматСуммы' => 'ЧЦ=18; ЧДЦ=2; ЧРД=.',
                'ФорматКоличества' => 'ЧЦ=18; ЧДЦ=2; ЧРД=.',
            ],
        ], true, 'UTF-8', '1.0', [], null, true, [
            'convertNullToXsiNil' => false,
            'convertBoolToString' => false
        ]);
     
        return $result;
    }

    /**
     * В случае успешного получения и записи заказов "1С:Предприятие" передает на сайт запрос вида
     * http://<сайт>/<путь> /1c_exchange.php?type=sale&mode=success
     * 
     * @return string
     * @throws ExchangeException
     **/
    public function success(): string
    {
        $this->authService->auth();
 
        $response = "success\n";
        $response .= $this->config->getSessionName()."\n";
        $response .= $this->request->getSession()->getId()."\n";
        $response .= 'timestamp='.time();

        return $response;
    }

    /**
     * Затем система "1С:Предприятие" отправляет на сайт запрос вида
     * http://<сайт>/<путь> /1c_exchange.php?type=sale&mode=file&filename=<имя файла>,
     * который загружает на сервер файл обмена, посылая содержимое файла в виде POST.
     * 
     * В случае успешной записи файла система управления сайтом передает строку со словом "success". Дополнительно на следующих строчках могут содержаться замечания по загрузке.
     * 
     * Примечание. Если в ходе какого-либо запроса произошла ошибка, то в первой строке ответа системы управления сайтом будет содержаться слово "failure", а в следующих строках - описание ошибки, произошедшей в процессе обработки запроса.
     * Если произошла необрабатываемая ошибка уровня ядра продукта или sql-запроса, то будет возвращен html-код.
     * 
     * @return string
     * @throws ExchangeException
     **/
    public function file(): string
    {
        $this->authService->auth();

        return $this->loaderService->load();
    }

    /**
     * @return OrderInterface|null
     */
    protected function getOrderClass(): ?OrderInterface
    {
        return $this->modelBuilder->getInterfaceClass($this->config, OrderInterface::class);
    }

    /**
     * @param string $id
     *
     * @return OrderInterface|null
     */
    protected function findOrderModelById(string $id): ?OrderInterface
    {
        /**
         * @var OrderInterface
         */
        $class = $this->modelBuilder->getInterfaceClass($this->config, OrderInterface::class);
 
        return $class::findOrderBy1c($id, $this->config->getSource());
    }

    /**
     * Базовый метод запуска импорта.
     *
     * @return string
     * @throws ExchangeException
     */
    public function import(): string 
    {
        $this->authService->auth();
        $this->loaderService->clearImportDirectory();
 
        $filename = basename($this->request->get('filename'));

        $commerce = new Commerce();
        $commerce->loadOrdersXml($this->config->getFullPath($filename));

        if ($commerce->order->documents) {
            $documentClass = $this->getOrderClass();

            foreach ($commerce->order->documents as $document) {
                $orderId = $document->getClearId();
      
                if ($order = $this->findOrderModelById($orderId)) { 
                    $model = $order->createModel1c($document, $this->config->getSource());
                } else {
                    throw new ExchangeException("Order $orderId not faund");
                }

                unset($model);
 
                gc_collect_cycles();
            }
        }
        
        $response = "success\n";
        $response .= $this->config->getSessionName()."\n";
        $response .= $this->request->getSession()->getId()."\n";
        $response .= 'timestamp='.time();
 
        return $response;
    }
}