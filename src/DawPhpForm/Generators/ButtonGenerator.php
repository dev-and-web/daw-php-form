<?php

namespace DawPhpForm\Generators;

use DawPhpForm\Exception\FormException;

/**
 * Pour générer des button
 *
 * @link     https://github.com/dev-and-web/daw-php-form
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
final class ButtonGenerator
{
    /**
     * @var string
     */
    private string $html;

    /**
     * @var string|null
     */
    private ?string $value;

    /**
     * @var array
     */
    private array $options = [];

    /**
     * @const array
     */
    const OPTIONS_KEYS_ALLOWED = ['name', 'class', 'id', 'style'];

    /**
     *  InputGenerator constructor.
     *
     * @param $value string|null - Texte à affiche dans le button
     * @param array $options - Pour éventuellement ajouter au label id, class css
     */
    public function __construct(string $value = null, array $options = [])
    {
        $this->value = $value;
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function get(): string
    {
        $this->html = '<button type="button"';

        $this->addOptions();

        $this->html .= '>'.$this->value.'</button>';

        return $this->html;
    }

    /**
     * Eventuellement ajouter des options à la balise input
     */
    private function addOptions()
    {
        if (count($this->options) > 0) {
            foreach ($this->options as $k => $v) {
                if (!in_array($k, self::OPTIONS_KEYS_ALLOWED)) {
                    throw new FormException('Key "'.$k.'" not authorized.'); 
                } else {
                    $this->html .= ' '.$k.'="'.$v.'"';
                }
            }
        }
    }
}
