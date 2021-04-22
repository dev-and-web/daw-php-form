<?php

namespace DawPhpForm\Support\Facades;

/**
 * Facade pour la classe DawPhpForm\Form
 *
 * @link     https://github.com/dev-and-web/daw-php-form
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
final class Form extends Facade
{
    /**
     * @var DawPhpForm\Form
     */
    protected static $instance;

    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'DawPhpForm\Form';
    }
}
