<?php

namespace DawPhpForm\Support\Request;

use DawPhpForm\Support\Request\Bags\ParameterBag;

/**
 * @link     https://github.com/dev-and-web/daw-php-form
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
final class Request
{
    /**
     * @var ParameterBag - $_POST
     */
    private ParameterBag $post;

    /**
     * @var ParameterBag - $_SERVER
     */
    private ParameterBag $server;

    /**
     * Request Constructor.
     */
    public function __construct()
    {
        $this->post = new ParameterBag($_POST);
        $this->server = new ParameterBag($_SERVER);
    }

    /**
     * @return ParameterBag
     */
    public function getPost(): ParameterBag
    {
        return $this->post;
    }

    /**
     * @return ParameterBag
     */
    public function getServer(): ParameterBag
    {
        return $this->server;
    }

    /**
     * @return string - Méthode utilisée pour accéder à la page. 'GET' ou 'POST'
     */
    public function getMethod(): string
    {
        return $this->server->get('REQUEST_METHOD');
    }

    /**
     * @param string $method - Méthode passé en paramètre
     * @return bool - True si request method est égal à method passé en paramètre
     */
    public function isMethod(string $method): bool
    {
        return $this->getMethod() === mb_strtoupper($method);
    }
}
