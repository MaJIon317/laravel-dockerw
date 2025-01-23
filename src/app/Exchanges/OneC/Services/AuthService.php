<?php

namespace App\Exchanges\OneC\Services;

use App\Exchanges\OneC\Config;
use App\Exchanges\ExchangeException;
use Illuminate\Contracts\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class AuthService.
 */
class AuthService
{
    public const SESSION_KEY = 'exchange_1c';

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Config
     */
    private $config;

    /**
     * @var null|SessionInterface|Session
     */
    private $session;

    /**
     * @var null
     */
    private $source_id;
    

    /**
     * AuthService constructor.
     *
     * @param Request $request
     * @param Config  $config
     */
    public function __construct(Request $request, Config $config)
    {
        $this->request = $request;
        $this->setSession();
        $this->config = $config;
    }

    /**
     * @throws ExchangeException
     *
     * @return string
     */
    public function checkAuth()
    {
        $login = $this->request->server->get('PHP_AUTH_USER') ?? $this->request->input('login') ?? (env('APP_ENV') == 'local' ? $this->config->getLogin() : '');
        $password = $this->request->server->get('PHP_AUTH_PW') ?? $this->request->input('password') ?? (env('APP_ENV') == 'local' ? $this->config->getPassword() : '');

        $auth_valid = $login === $this->config->getLogin() && $password === $this->config->getPassword();

        $this->source_id = (env('APP_ENV') == 'local' ? 'local-' : '') . date('d-m-Y');

        if ($auth_valid) {
            $this->session->save();
            $response = "success\n";
            $response .= $this->config->getSessionName()."\n";
            $response .= $this->session->getId()."\n";
            $response .= 'timestamp='.time();
            if ($this->session instanceof SessionInterface) {
                $this->session->set(self::SESSION_KEY.'_auth', $this->config->getLogin());
                $this->session->set(self::SESSION_KEY.'_source', $this->source_id);
            } elseif ($this->session instanceof Session) {
                $this->session->put(self::SESSION_KEY.'_auth', $this->config->getLogin());
                $this->session->put(self::SESSION_KEY.'_source', $this->source_id);
            } else {
                throw new ExchangeException(sprintf('Session is not insatiable interface %s or %s', SessionInterface::class, Session::class));
            }
        } else {
            $response = "failure\n";
        }

        return $response;
    }

    /**
     * @throws ExchangeException
     */
    public function auth(): void
    {
        $login = $this->config->getLogin();
        $user = $this->session->get(self::SESSION_KEY.'_auth');

        if (!$user || $user !== $login) {
            throw new ExchangeException('auth error');
        }
    }

    private function setSession(): void
    {
        if (!$this->request->getSession()) {
            $session = new \Symfony\Component\HttpFoundation\Session\Session();
            $session->start();
            $this->request->setSession($session);
        }
  
        $this->session = $this->request->getSession();
    }
}