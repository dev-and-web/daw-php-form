# DAW PHP Form - Documentation Française

[![Latest Stable Version](https://poser.pugx.org/dev-and-web/daw-php-form/v/stable)](https://packagist.org/packages/dev-and-web/daw-php-form)
[![License](https://poser.pugx.org/dev-and-web/daw-php-form/license)](https://packagist.org/packages/dev-and-web/daw-php-form)

DAW PHP Form is a PHP library for generating your form fields.




### Requirements

* PHP >= 7.4






## Installation

Installation via Composer :
```
php composer.phar require dev-and-web/daw-php-form 2.0.*
```


Si vous n'utilisez pas Composer pour installer ce package,
vous deverez faire les "require" manuellement avant d'utiliser ce package.
Exemple :
```php
<?php

// Charger librairie
require_once 'your-path/daw-php-form/src/DawPhpForm/bootstrap/load.php';
```






## Examples

```php
use DawPhpForm\Support\Facades\Form;


// Open a Form
echo Form::open(['action' => '#', 'method' => 'post', 'class' => 'form-edit', 'files' => true]);


// Label
echo Form::label('for', 'Text :', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;']);


// Inputs
echo Form::text('name', 'Valeur', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'placeholder'=>'Placeholder', 'required'=>true]);

echo Form::email('name', 'Valeur', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'placeholder'=>'Placeholder', 'required'=>true]);

echo Form::search('namesearch', 'Valeur', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'placeholder'=>'Placeholder', 'required'=>true]);

echo Form::url('name', 'Valeur', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'placeholder'=>'Placeholder', 'required'=>true]);

echo Form::tel('name', 'Valeur', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'placeholder'=>'Placeholder', 'required'=>true]);

echo Form::password('name', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'placeholder'=>'Placeholder', 'required'=>true]);

echo Form::hidden('name', 'Valeur', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;']);

echo Form::checkbox('name', 'Valeur', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'checked'=>true]);

echo Form::radio('name', 'Valeur', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'checked'=>true]);

echo Form::number('name', 'Valeur', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'step'=>"2", 'min'=>10, 'max'=>260]);

echo Form::range('name', 'Valeur',  ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'step'=>"2", 'min'=>10, 'max'=>260]);


echo Form::submit('name', 'Envoyer', ['id'=>'idsubmit', 'style'=>'margin-bottom: 20px;']);


echo Form::file('namefile', ['id'=>'idfile', 'class'=>'classfile', 'style'=>'margin-bottom: 20px;',]);
echo Form::file('namefiles[]', ['id'=>'idfile', 'class'=>'classfile', 'style'=>'margin-bottom: 20px;', 'multiple'=>true]);


echo Form::button('Text Button', ['name'=>'Envoyer', 'style'=>'margin-bottom: 20px;']);


echo Form::textarea('name', 'Valeur', ['id'=>'id-css', 'class'=>'class-css', 'style'=>'margin-bottom: 20px;', 'placeholder'=>'Ecrivez...', 'required'=>true]);


// génère un <select> avec ses <option>
// (en 3ème paramètres, le selectedPerDefault OPTIONAL)
echo Form::select('name', [
    1=>'Publié',
    2=>'Brouillon',
    3=>'Corbeille',
], 2, [
    'class'=>'classselect',
    'id'=>'idselect',
    'autosubmit'=>'idform',
    'style'=>'margin-bottom: 20px;',
]);

// génère un <select> avec des group <optgroup> et ses <option>
echo Form::select('nameselect', [
    'articles'=>[
        1=>'Publié',
        2=>'Brouillon',
        3=>'Corbeille',
    ],
    'pages'=>[
        4=>'Publié',
        5=>'Brouillon',
        6=>'Corbeille',
    ],
], 2, [
    'class'=>'classselect',
    'id'=>'idselect',
]);


// Close a Form
echo Form::close();
```
