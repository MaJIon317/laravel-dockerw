<?php

namespace App\Exchanges\OneC\Services\Catalog;

use App\Exchanges\OneC\Config;
use App\Exchanges\OneC\Interfaces\GroupInterface;
use App\Exchanges\OneC\Interfaces\WarehouseInterface;
use App\Exchanges\OneC\Interfaces\ModelBuilderInterface;
use App\Exchanges\OneC\Interfaces\ProductInterface;
use App\Exchanges\OneC\Interfaces\PriceTypeInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Exchanges\OneC\Commerce\Commerce;
use App\Exchanges\OneC\Commerce\Model\Product;
use App\Exchanges\ExchangeException;

/**
 * Class SectionsService.
 */
class CategoryService
{
    /**
     * @var array Массив идентификаторов товаров которые были добавлены и обновлены
     */
    protected $_ids;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Config
     */
    private $config;

    /**
     * @var ModelBuilderInterface
     */
    private $modelBuilder;

    /**
     * CategoryService constructor.
     *
     * @param Request $request
     * @param Config $config
     * @param ModelBuilderInterface $modelBuilder
     */
    public function __construct(Request $request, Config $config, ModelBuilderInterface $modelBuilder)
    {
        $this->request = $request;
        $this->config = $config;
        $this->modelBuilder = $modelBuilder;
    }

    /**
     * Базовый метод запуска импорта.
     *
     * @throws ExchangeException
     */
    public function import(): void
    {
        $filename = basename($this->request->get('filename'));

        $commerce = new Commerce();
        $commerce->loadImportXml($this->config->getFullPath($filename));

        if ($commerce->classifier->xml) {
            if ($commerce->classifier->xml->Свойства) {

                if ($productClass = $this->getProductClass()) {
                    $productClass::createProperties1c($commerce->classifier->getProperties(), $this->config->getSource());
                }
            } else if ($commerce->classifier->xml) {
                if ($warehouseClass = $this->getWarehouseClass()) {
                    $warehouseClass::createWarehouse1c($commerce->classifier->getWarehouses(), $this->config->getSource());
                }

                if ($groupClass = $this->getGroupClass()) {
                    $groupClass::createTree1c($commerce->classifier->getGroups(), $this->config->getSource());
                }

                if ($PriceTypeClass = $this->getPriceTypeClass()) {
                    $PriceTypeClass::createPriceTypes1c($commerce->classifier->getPriceTypes(), $this->config->getSource());
                }
            }
        } else {
            $productClass = $this->getProductClass();

            foreach ($commerce->catalog->getProducts() as $product) {

                $model = $productClass::createModel1c($product, $this->config->getSource());

                if ($model === null) {
                    throw new ExchangeException("Модель продукта не найдена, проверьте реализацию $productClass::createModel1c");
                }

                if ($model) {
                    $this->parseProduct($model, $product);
                    $this->_ids[] = $model->id;
                }

                $model = null;

                unset($model, $product);

                gc_collect_cycles();
            }
        }
    }

    public function price(): void
    {
        $filename = basename($this->request->get('filename'));

        $commerce = new Commerce();
        $commerce->loadOffersXml($this->config->getFullPath($filename));

        $productClass = $this->getProductClass();

        foreach ($commerce->offerPackage->getOffers() as $offer) {

            $productId = $offer->id;

            $product = $productClass::findProductBy1c($productId, $this->config->getSource());

            if ($product) {
                $price = $offer->getPrices();
                $product->updatePrice1c($price);
            }

            unset($product);
            gc_collect_cycles();
        }
    }

    public function rest(): void
    {
        $filename = basename($this->request->get('filename'));

        $commerce = new Commerce();
        $commerce->loadOffersXml($this->config->getFullPath($filename));

        $productClass = $this->getProductClass();

        foreach ($commerce->offerPackage->getOffers() as $offer) {

            $productId = $offer->id;
            $product = $productClass::findProductBy1c($productId, $this->config->getSource());

            if ($product) {
                $rest = $offer->getRest();
                $product->updateRest1c($rest);
            }

            unset($product);

            gc_collect_cycles();
        }
    }

    /**
     * @return GroupInterface|null
     */
    protected function getGroupClass(): ?GroupInterface
    {
        return $this->modelBuilder->getInterfaceClass($this->config, GroupInterface::class);
    }

    /**
     * @return ProductInterface|null
     */
    protected function getProductClass(): ?ProductInterface
    {
        return $this->modelBuilder->getInterfaceClass($this->config, ProductInterface::class);
    }

    /**
     * @return WarehouseInterface|null
     */
    protected function getWarehouseClass(): ?WarehouseInterface
    {
        return $this->modelBuilder->getInterfaceClass($this->config, WarehouseInterface::class);
    }

    /**
     * @return PriceTypeInterface|null
     */
    protected function getPriceTypeClass(): ?PriceTypeInterface
    {
        return $this->modelBuilder->getInterfaceClass($this->config, PriceTypeInterface::class);
    }

    /**
     * @param ProductInterface $model
     * @param Product $product
     */
    protected function parseProduct(ProductInterface $model, Product $product): void
    {
        $model->setRaw1cData($product->owner, $product);
        $this->parseGroups($model, $product);
        $this->parseProperties($model, $product);
        $this->parseRequisites($model, $product);
        $this->parseImage($model, $product);

        unset($group);
    }

    /**
     * @param ProductInterface $model
     * @param Product          $product
     */
    protected function parseGroups(ProductInterface $model, Product $product): void
    {
        $group = $product->getGroup();
        $model->setGroup1c($group);
    }

    /**
     * @param ProductInterface $model
     * @param Product          $product
     */
    protected function parseProperties(ProductInterface $model, Product $product): void
    {
        foreach ($product->getProperties() as $property) {
            $model->setProperty1c($property->id, $property->value);
        }
    }

    /**
     * @param ProductInterface $model
     * @param Product          $product
     */
    protected function parseRequisites(ProductInterface $model, Product $product): void
    {
        foreach ($product->getRequisites() as $requisite) {
            $model->setRequisite1c($requisite->name, $requisite->value);
        }
    }

    /**
     * @param ProductInterface $model
     * @param Product $product
     */
    protected function parseImage(ProductInterface $model, Product $product)
    {
        foreach ($product->getImages() as $image) {
            $path = $this->config->getFullPath(basename($image->path));
       
            if (file_exists($path)) {
                $model->addImage1c($this->config->getSource().'/'.basename($image->path), $image->caption);

                break;
            }
        }
    }

}