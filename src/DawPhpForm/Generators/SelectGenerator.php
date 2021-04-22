<?php

namespace DawPhpForm\Generators;

use DawPhpForm\Support\Request\Request;
use Core\Facades\Input;
use DawPhpForm\Exception\FormException;

/**
 * Pour générer des select
 *
 * @link     https://github.com/dev-and-web/daw-php-form
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
final class SelectGenerator
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
    private array $balisesOption = [];

    /**
     * @var string|int|null
     */
    private $selectedPerDefault;

    /**
     * @var array
     */
    private array $options = [];

    /**
     * @const array
     */
    const OPTIONS_KEYS_ALLOWED = ['id', 'class', 'style'];

    /**
     *  Generator constructor.
     *
     * @param string $name - name du <select>
     * @param array $balisesOption - les <option>
     * @param string|int|null $selectedPerDefault - éventuellement ajouter un selected active par default
     * @param array $options - pour éventuellement ajouter au select : id, class, style, autosubmit
     */
    public function __construct(string $name, array $balisesOption, $selectedPerDefault = null, array $options = [])
    {
        $this->name = $name;
        $this->balisesOption = $balisesOption;
        $this->selectedPerDefault = $selectedPerDefault;
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function get(): string
    {
        $autoSubmit = (isset($this->options['autosubmit']))
            ? 'onchange="document.getElementById(\''.$this->options['autosubmit'].'\').submit();"'
            : '';

        $this->html = '<select '.$autoSubmit.' name="'.$this->name.'"';

        $this->addOptions();

        $this->html .= (!isset($this->options['id'])) ? ' id="'.$this->name.'"' : '';

        $this->html .= '>';

        $this->generateBalisesOption();

        $this->html .= '</select>';

        return $this->html;
    }

    /**
     * Eventuellement ajouter des options à la balise input
     */
    private function addOptions()
    {
        if (count($this->options) > 0) {
            foreach ($this->options as $key => $value) {
                if ($key != 'autosubmit') {
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
     * Générer les balises <option>
     */
    private function generateBalisesOption()
    {
        foreach ($this->balisesOption as $keyVal => $textVal) {
            // si il y a des <optgroup>
            if (is_array($textVal)) {
                $this->html .= '<optgroup label="'.$keyVal.'">';
                foreach ($textVal as $kVal => $vVal) {
                    $selected = ($this->selectedPerDefault !== null && $this->selectedPerDefault == $kVal) ? 'selected' : '';
                    $this->html .= '<option '.$selected.' value="'.$kVal.'">'.$vVal.'</option>';
                }
                $this->html .= '</optgroup>';
            }
            // si il n'y a pas de <optgroup>
            else {
                $request = new Request();

                if ($request->isMethod('POST')) {
                    $selected = (Input::post($this->name) == $keyVal) ? 'selected' : '';
                } else {
                    $selected = ($this->selectedPerDefault !== null && $this->selectedPerDefault == $keyVal) ? 'selected' : ''; 
                }
                
                $this->html .= '<option '.$selected.' value="'.$keyVal.'">'.$textVal.'</option>';
            }
        }
    }
}
