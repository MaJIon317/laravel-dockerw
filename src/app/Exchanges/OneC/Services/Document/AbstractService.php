<?php

namespace App\Exchanges\OneC\Services\Document;

use App\Exchanges\OneC\Config;
use App\Exchanges\OneC\Services\AuthService;
use App\Exchanges\OneC\Services\FileLoaderService;
use App\Exchanges\OneC\Interfaces\ModelBuilderInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AbstractService.
 */
abstract class AbstractService
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var AuthService
     */
    protected $authService;

    /**
     * @var FileLoaderService
     */
    protected $loaderService;

     /**
     * @var ModelBuilderInterface
     */
    protected $modelBuilder;

    /**
     * AbstractService constructor.
     *
     * @param Request           $request
     * @param Config            $config
     * @param AuthService       $authService
     * @param FileLoaderService $loaderService 
     * @param OrderService $orderService 
     * @param ModelBuilderInterface $modelBuilder
     */
    public function __construct(
        Request $request,
        Config $config,
        AuthService $authService,
        FileLoaderService $loaderService, 
        ModelBuilderInterface $modelBuilder
    ) {
        $this->request = $request;
        $this->config = $config;
        $this->authService = $authService;
        $this->loaderService = $loaderService; 
        $this->modelBuilder = $modelBuilder;
    }
}