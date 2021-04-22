<?php

namespace DawPhpForm\Contracts;

/**
 * @link     https://github.com/dev-and-web/daw-php-form
 * @author   Stephen Damian <contact@devandweb.fr>
 * @license  MIT License
 */
Interface FormInterface
{
    /**
     * Ouvrir un formulaire
     *
     * @param array $options,
     *     $options['action'] - Pour éventuellement préciser l'URL de l'action
     *     $options['method'] - Pour éventuellement préciser un method (POST par defaut)
     *     $options['files'] - Pour éventuellement si il y a un système d'upload dans le form
     *     $options['on_submit'] - Pour éventuellement ex. : "Etes vous sur de vouloir effectuer cette action... ?"
     *
     *     $options['id'] - Pour éventuellement ajouter un id au formulaire
     *     $options['css'] - Pour éventuellement ajouter une class CSS au formulaire
     *     $options['style'] - Pour éventuellement mettre du style CSS
     *
     * @return string
     */
    public function open(array $options = []);

    /**
     * Générer un label
     *
     * @param string $for - Pour faire référence à l'id de l'input auquel il fait référence
     * @param string $text - Texte du label à aficher
     * @param array $options - Pour éventuellement ajouter au label id, class css
     * @return string
     */
    public function label(string $for, string $text, array $options = []): string;

    /**
     * Générer un input de type "text"
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     */
    public function text(string $name, ?string $value, array $options = []): string;

    /**
     * Générer un input de type "email"
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     */
    public function email(string $name, ?string $value, array $options = []): string;

    /**
     * Générer un input de type "search"
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     */
    public function search(string $name, ?string $value, array $options = []): string;

    /**
     * Générer un input de type "url"
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     */
    public function url(string $name, ?string $value, array $options = []): string;

    /**
     * Générer un input de type "tel"
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     */
    public function tel(string $name, ?string $value, array $options = []): string;

    /**
     * Générer un input de type "password"
     *
     * @param string $name
     * @param array $options
     * @return string
     */
    public function password(string $name, array $options = []): string;

    /**
     * Générer un input de type "hidden"
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     */
    public function hidden(string $name, ?string $value, array $options = []): string;

    /**
     * Générer un input de type "checkbox"
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     */
    public function checkbox(string $name, ?string $value, array $options = []): string;

    /**
     * Générer un input de type "radio"
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     */
    public function radio(string $name, ?string $value, array $options = []): string;

    /**
     * Générer un input de type "number"
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     */
    public function number(string $name, ?string $value, array $options = []): string;

    /**
     * Générer un input de type "range"
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     */
    public function range(string $name, ?string $value, array $options = []): string;

    /**
     * Générer un input de type "submit"
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     */
    public function submit(string $name = 'submit', string $value = 'Send', array $options = []): string;

    /**
     * Générer un input de type "file"
     *
     * @param string $name - Name de l'input
     * @param array $options - Pour éventuellement ajouter au label id, class css
     * @return string
     */
    public function file(string $name, array $options = []): string;

    /**
     * Générer un button
     *
     * @param $value string - Texte à affiche dans le button
     * @param array $options - Pour éventuellement ajouter au label id, class css
     * @return string
     */
    public function button(string $value = 'Send', array $options = []): string;

    /**
     * @param string $name - name du textarea
     * @param string $value - Valeur du textarea
     * @param array $options - Pour éventuellement ajouter au label id, class css, placeholder...
     * @return string
     */
    public function textarea(string $name, string $value, array $options = []): string;

    /**
     * Générer un <select> avec des <option>
     * Et aussi éventuellement avec des <optgroup>
     *
     * @param string $name - name du <select>
     * @param array $balisesOption - les <option>
     * @param string|int $selectedPerDefault - éventuellement ajouter un selected active par default
     * @param array $options - pour éventuellement ajouter au select : id, class, style, autosubmit
     * @return string
     */
    public function select(string$name, array $balisesOption, $selectedPerDefault = null, array $options = []): string;

    /**
     * Fermer un formulaire
     *
     * @return string
     */
    public function close(): string;
}
