<?php

namespace DawPhpForm\Generators;

use DawPhpForm\Exception\FormException;

/**
 * Pour générer des label
 *
 * @link     https://github.com/dev-and-web/daw-php-form
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
final class LabelGenerator
{
    /**
     * @var string
     */
    private string $html;

    /**
     * @var string
     */
    private string $for;

    /**
     * @var string
     */
    private string $text;

    /**
     * @var array
     */
    private array $options = [];

    /**
     * @const array
     */
    const OPTIONS_KEYS_ALLOWED = ['id', 'class', 'style'];

    /**
     *  LabelGenerator constructor.
     *
     * @param string $for - Pour faire référence à l'id de l'input auquel il fait référence
     * @param string $text - Texte du label à aficher
     * @param array $options - Pour éventuellement ajouter au label id, class css
     * @return string
     *
     * @param 
     */
    public function __construct(string $for, string $text, array $options = [])
    {
        $this->for = $for;
        $this->text = $text;
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function get(): string
    {
        $this->html = '<label for="'.$this->for.'"';

        $this->addOptions();

        $this->html .= '>'.$this->text.'</label>';

        return $this->html;
    }

    /**
     * Eventuellement ajouter des options à la balise input
     */
    private function addOptions()
    {
        if (count($this->options) > 0) {
            foreach ($this->options as $key => $value) {
                if (!in_array($key, self::OPTIONS_KEYS_ALLOWED)) {
                    throw new FormException('Key "'.$key.'" not authorized.');
                } else {
                    $this->html .= ' '.$key.'="'.$value.'"';
                }
            }
        }
    }
}
