<?php

namespace DawPhpForm\Generators;

use DawPhpForm\Exception\FormException;

/**
 * Pour générer des input de type file
 *
 * @link     https://github.com/dev-and-web/daw-php-form
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
final class InputFileGenerator
{
    /**
     * @var string
     */
    private string $html;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var array
     */
    private array $options = [];

    /**
     * @const array
     */
    const OPTIONS_KEYS_ALLOWED = ['id', 'class', 'style'];

    /**
     *  InputFileGenerator constructor.
     *
     * @param string $name - Name de l'input
     * @param array $options - Pour éventuellement ajouter au label id, class css
     */
    public function __construct(string $name, array $options = [])
    {       
        $this->name = $name;
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function get(): string
    {
        $multiple = (isset($this->options['multiple']) && $this->options['multiple'] === true) ? 'multiple="multiple"' : '';

        $this->html = '<input '.$multiple.' type="file" name="'.$this->name.'"';

        $this->addOptions();

        $this->html .= (!isset($this->options['id'])) ? ' id="'.$this->name.'"' : '';

        $this->html .= '>';

        return $this->html;
    }

    /**
     * Eventuellement ajouter des options à la balise input
     */
    private function addOptions()
    {
        if (count($this->options) > 0) {
            foreach ($this->options as $key => $value) {
                if ($key != 'multiple') {
                    if (!in_array($key, self::OPTIONS_KEYS_ALLOWED)) {
                        throw new FormException('Key "'.$key.'" not authorized.');
                    } else {
                        $this->html .= ' '.$key.'="'.$value.'"';
                    }
                }
            }
        }
    }
}
