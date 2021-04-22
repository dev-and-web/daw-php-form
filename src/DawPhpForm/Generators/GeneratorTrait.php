<?php

namespace DawPhpForm\Generators;

use DawPhpForm\Support\Request\Request;
use DawPhpForm\Support\Security\Security;

/**
 * @link     https://github.com/dev-and-web/daw-php-form
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
Trait GeneratorTrait
{    
    /**
     * @param string $type - type de l'input
     * @param string $name - name de l'input
     * @param string $value - value de l'input
     * @return string - value de l'input ou valeur envoyé en POST
     */
    private function getValueString(string $type, string $name, string $value)
    {
        $request = new Request();

        if ($request->isMethod('POST') && $request->getPost()->has($name) && $type != 'password') {
            return Security::e($request->getPost()->get($name));
        } else {
            return $value;
        }
    }

    /**
     * @param array $options
     * @return string
     */
    private function getRequired(array $options): string
    {
        return (isset($options['required']) && $options['required'] == true) ? ' required ' : '';
    }
}
