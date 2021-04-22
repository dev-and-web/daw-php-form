<?php

namespace DawPhpForm\Support\Facades;

/**
 * Classe parent des Façades
 *
 * @link     https://github.com/dev-and-web/daw-php-form
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
abstract class Facade
{
    /**
     * @return string
     */
    abstract protected static function getFacadeAccessor();

    /**
     * @param string $method - Nom de la méthode à appeler
     * @param array $arguments - Paramètres dans méthode
     * @return mixed
     */
    final public static function __callStatic(string $method, array $arguments)
    {
        if (static::$instance === null) {            
            static::$instance = self::getFacadeInstace();
        }

        return static::$instance->$method(...$arguments);
    }

    /**
     * @return mixed
     */
    private static function getFacadeInstace()
    {
        $class = static::getFacadeAccessor();
        
        return new $class();
    }
}
