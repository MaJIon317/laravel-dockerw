<?php

namespace App\Exchanges\OneC;

use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use App\Exchanges\OneC\Services\Catalog\CatalogService;
use App\Exchanges\OneC\Services\Document\OrderService;
use Illuminate\Support\Facades\Log;
use App\Exchanges\ExchangeException;
use LogicException;
use App\Exchanges\ExchangeController;

class Controller extends ExchangeController
{
    /**
     * @param Request $request
     * @param CatalogService $catalogService
     *
     * @return ResponseFactory|Response
     * @throws ExchangeException
     */
    public function request(Request $request, CatalogService $catalogService, OrderService $orderService)
    { 
        $mode = $request->get('mode');
        $type = $request->get('type'); 
        
        if ($type == 'catalog1c_import_complete.php') {
            $type = 'catalog';
            $mode = 'complete';
        }

        try {
            if ($type === 'catalog') {
                if (!method_exists($catalogService, $mode)) {
                    throw new ExchangeException('Not correct request, class not found');
                }

                return $this->response(response: $catalogService->{$mode}());
            } elseif ($type === 'sale') {
                if (!method_exists($orderService, $mode)) {
                    throw new ExchangeException('Not correct request, class not found');
                }
     
                return $this->response(response: $orderService->{$mode}(), content_type: $mode != 'query' ? 'text/plain' : 'text/xml');
            }

            throw new LogicException(sprintf('Logic for method %s is not released to mode %s', $type, $mode));

        } catch (ExchangeException $e) {
            Log::error("exchange: failure \n".$e->getMessage()."\n".$e->getFile()."\n".$e->getLine()."\n");

            $response = "failure\n";
            $response .= iconv('utf-8', 'windows-1251', $e->getMessage());

            return $this->response(response: $response, code: 500);
        }
    }

    private function response($response = null, $content_type = 'text/plain', $code = 200)
    {
        if ($content_type == 'text/plain') {
            return response($response, $code, ['Content-Type', $content_type]);
        }

        return response($response, $code)->header('Content-Type', $content_type);
    }
}