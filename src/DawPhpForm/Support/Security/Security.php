<?php

namespace DawPhpForm\Support\Security;

/**
 * Sécuritée
 *
 * @link     https://github.com/dev-and-web/daw-php-form
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
final class Security
{
    /**
     * Contre faille XSS - Pour sécuriser les echo
     *
     * @param string $value
     * @return string
     */
    public static function e($value)
    {
        return htmlspecialchars($value);
    }

}
