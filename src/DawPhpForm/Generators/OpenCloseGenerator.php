<?php

namespace DawPhpForm\Generators;

use DawPhpForm\Support\Request\Request;
use DawPhpForm\Exception\FormException;

/**
 * Pour générer l'ouverture et la fermeture du form
 *
 * @link     https://github.com/dev-and-web/daw-php-form
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
final class OpenCloseGenerator
{
    /**
     * @var string
     */
    private string $html;

    /**
     * @const array
     */
    const OPTIONS_KEYS_ALLOWED = ['id', 'class', 'style'];

    /**
     * Ouvrir un formulaire
     *
     * @param array $options
     *     $options['action'] string - Pour éventuellement préciser l'URL de l'action
     *     $options['method'] string - Pour éventuellement préciser un method (POST par defaut)
     *     $options['files'] string - Pour éventuellement si il y a un système d'upload dans le form
     *     $options['on_submit'] string - Pour éventuellement ex. : "Etes vous sur de vouloir effectuer cette action... ?"
     *     $options['id'] string - Pour éventuellement ajouter un id au formulaire
     *     $options['css'] string - Pour éventuellement ajouter une class CSS au formulaire
     *     $options['style'] string - Pour éventuellement mettre du style CSS
     *
     * @return string
     */
    public function open(array $options = [])
    {
        $request = new Request();

        $action = (isset($options['action'])) ? $options['action'] : $request->getServer()->get('REQUEST_URI');;

        $method = (isset($options['method']) && (mb_strtoupper($options['method']) === 'POST' || mb_strtoupper($options['method']) === 'GET'))
            ? mb_strtoupper($options['method'])
            : 'POST';

        $enctypeUpload = (isset($options['files']) && $options['files'] === true)
            ? 'enctype="multipart/form-data"'
            : '';

        $onSubmit = (isset($options['on_submit']) && $options['on_submit'] !== null)
            ? 'onSubmit="return(confirm('.$options['on_submit'].'))"'
            : '';

        $this->html = '<form action="'.$action.'" method="'.$method.'" '.$enctypeUpload.' '.$onSubmit.'';

        $this->addOptions($options);

        $this->html .= '>';

        return $this->html;
    }

    /**
     * Eventuellement ajouter des options à la balise input
     */
    private function addOptions($options)
    {
        if ($options) {
            foreach ($options as $key => $value) {
                if ($key != 'action' && $key != 'method' && $key != 'files' && $key != 'on_submit') {
                    if (!in_array($key, self::OPTIONS_KEYS_ALLOWED)) {
                        throw new FormException('Key "'.$key.'" not authorized.');
                    } else {
                        $this->html .= ' '.$key.'="'.$value.'"';
                    }
                }
            }
        }
    }

    /**
     * Fermer un formulaire
     *
     * @return string
     */
    public function close(): string
    {
        return '</form>';
    }
}
