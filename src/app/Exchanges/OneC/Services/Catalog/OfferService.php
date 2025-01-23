<?php

namespace App\Exchanges\OneC\Services\Catalog;

use App\Exchanges\OneC\Commerce\Commerce;
use App\Exchanges\OneC\Config;
use App\Exchanges\OneC\Exceptions\ExchangeException;
use App\Exchanges\OneC\Interfaces\ModelBuilderInterface;
use App\Exchanges\OneC\Interfaces\OfferInterface;
use App\Exchanges\OneC\Interfaces\ProductInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Exchanges\OneC\Commerce\Model\Offer;

/**
 * Class OfferService.
 */
class OfferService
{
    /**
     * @var array Массив идентификаторов торговых предложений которые были добавлены и обновлены
     */
    private $_ids;
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
     * @param Request                  $request
     * @param Config                   $config
     * @param ModelBuilderInterface    $modelBuilder
     */
    public function __construct(Request $request, Config $config, ModelBuilderInterface $modelBuilder)
    {
        $this->request = $request;
        $this->config = $config;
        $this->modelBuilder = $modelBuilder;
    }

    /**
     * @throws ExchangeException
     */
    public function import()
    {
        $filename = basename($this->request->get('filename'));
        $this->_ids = [];
        $commerce = new Commerce();
        $commerce->loadOffersXml($this->config->getFullPath($filename));
        if ($offerClass = $this->getOfferClass()) {
            $offerClass::createPriceTypes1c($commerce->offerPackage->getPriceTypes());
        }
     
        foreach ($commerce->offerPackage->getOffers() as $offer) {
            $productId = $offer->getClearId();
            if ($product = $this->findProductModelById($productId)) {
                $model = $product->getOffer1c($offer);
                $this->parseProductOffer($model, $offer);
                $this->_ids[] = $model->id;
            } else {
                throw new ExchangeException("Продукт $productId не найден в базе");
            }
            unset($model);
        }
  
    }

    /**
     * @return OfferInterface|null
     */
    private function getOfferClass(): ?OfferInterface
    {
        return $this->modelBuilder->getInterfaceClass($this->config, OfferInterface::class);
    }

    /**
     * @param string $id
     *
     * @return ProductInterface|null
     */
    protected function findProductModelById(string $id): ?ProductInterface
    {
        /**
         * @var ProductInterface
         */
        $class = $this->modelBuilder->getInterfaceClass($this->config, ProductInterface::class);

        return $class::findProductBy1c($id, $this->config->getSource());
    }


    /**
     * @param OfferInterface $model
     * @param Offer          $offer
     */
    protected function parseProductOffer(OfferInterface $model, Offer $offer): void
    {
        $this->parseSpecifications($model, $offer);
        $this->parsePrice($model, $offer);
    }

    /**
     * @param OfferInterface $model
     * @param Offer          $offer
     */
    protected function parseSpecifications(OfferInterface $model, Offer $offer)
    {
        foreach ($offer->getSpecifications() as $specification) {
            $model->setSpecification1c($specification);
        }
    }

    /**
     * @param OfferInterface $model
     * @param Offer          $offer
     */
    protected function parsePrice(OfferInterface $model, Offer $offer)
    {
        foreach ($offer->getPrices() as $price) {
            $model->setPrice1c($price);
        }
    }
}