<?php

namespace DawPhpForm\Generators;

use DawPhpForm\Exception\FormException;

/**
 * Pour générer des input
 *
 * Pour générer un input de type :
 * text, email, search, url, tel,
 * password, hidden, checkbox, radio, file, submit,
 * number, range
 *
 * @link     https://github.com/dev-and-web/daw-php-form
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
final class InputGenerator
{
    use GeneratorTrait;

    /**
     * @var string
     */
    private string $html;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string|null
     */
    private ?string $value;

    /**
     * @var array
     */
    private array $options = [];

    /**
     *  InputGenerator constructor.
     *
     * @param string $type - type de l'input
     * @param string $name - name de l'input
     * @param string $value - value de l'input
     * @param array $options - pour éventuellement ajouter au label id, class css, placeholder...
     */
    public function __construct(string $type, string $name, string $value, array $options = [])
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function get(): string
    {
        $checked = ($this->type == 'checkbox' && isset($this->options['checked']) && $this->options['checked'] === true)
            ? ' checked '
            : '';

        $valueInput = 'value="'.$this->getValueString($this->type, $this->name, $this->value).'"';
        $this->html = '<input type="'.$this->type.'" name="'.$this->name.'" '.$valueInput.' '.$this->getRequired($this->options).$checked;

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
            switch ($this->type) {
                case 'text': case 'email': case 'search': case 'url': case 'tel': case 'password':
                    $keysAllowed = ['id', 'class', 'style', 'placeholder'];
                    break;
                case 'hidden': case 'checkbox': case 'radio': case 'file': case 'submit':
                    $keysAllowed = ['id', 'class', 'style'];
                    break;
                case 'number': case 'range':
                    $keysAllowed = ['id', 'class', 'style', 'step', 'min', 'max'];
                    break;
                default:
                    $keysAllowed = [];
                    throw new FormException('Type "'.$this->type.'" not exists.');
                    break;
            }

            foreach ($this->options as $k => $v) {
                if ($k != 'required' && $k != 'checked') {
                    if (!in_array($k, $keysAllowed)) {
                        throw new FormException('Key "'.$k.'" not authorized.');
                    } else {
                        $this->html .= ' '.$k.'="'.$v.'"';
                    }
                }
            }
        }
    }
}
