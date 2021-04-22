<?php

namespace DawPhpForm\Generators;

use DawPhpForm\Exception\FormException;

/**
 * Pour générer des textarea
 *
 * @link     https://github.com/dev-and-web/daw-php-form
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
final class TextareaGenerator
{
    use GeneratorTrait;

    /**
     * @var string
     */
    private string $html;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $value;

    /**
     * @var array
     */
    private array $options = [];

    /**
     * @const array
     */
    const OPTIONS_KEYS_ALLOWED = ['id', 'class', 'placeholder', 'style'];

    /**
     *  Generator constructor.
     *
     * @param string $name - name du textarea
     * @param string $value - Valeur du textarea
     * @param array $options - Pour éventuellement ajouter au label id, class css, placeholder...
     */
    public function __construct(string $name, string $value, array $options = [])
    {
        $this->name = $name;
        $this->value = $value;
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function get(): string
    {
        $this->html = '<textarea name="'.$this->name.'"'.$this->getRequired($this->options);

        $this->addOptions();

        $this->html .= (!isset($this->options['id'])) ? ' id="'.$this->name.'"' : '';

        $this->html .= '>';

        $this->html .= $this->getValueString('textarea', $this->name, $this->value);

        $this->html .= '</textarea>';

        return $this->html;
    }

    /**
     * Eventuellement ajouter des options à la balise input
     */
    private function addOptions()
    {
        if (count($this->options) > 0) {
            foreach ($this->options as $k => $v) {
                if ($k != 'required') {
                    if (!in_array($k, self::OPTIONS_KEYS_ALLOWED)) {
                        throw new FormException('Key "'.$k.'" not authorized.');
                    } else {
                        $this->html .= ' '.$k.'="'.$v.'"';
                    }
                }
            }
        }
    }
}
