# DAW PHP Form - Library - PHP Form Library - Helpers for generate your Forms

[![Latest Stable Version](https://poser.pugx.org/dev-and-web/daw-php-form/v/stable)](https://packagist.org/packages/dev-and-web/daw-php-form)
[![License](https://poser.pugx.org/dev-and-web/daw-php-form/license)](https://packagist.org/packages/dev-and-web/daw-php-form)

DAW PHP Form is a PHP library for generating your form fields.

*Retrieve a value from a configuration file with nice syntax!*




### Author

Package developed by:
[Développeur Freelance](https://www.devandweb.fr)
[![Developpeur PHP Freelance](https://www.devandweb.fr/medias/app/website/developpeur-web.png)](https://www.devandweb.fr/freelance/developpeur-php)




### Simple example

```php
<?php

echo Form::open(['action' => '#', 'method' => 'post']);

echo Form::text('name', 'Value']);

echo Form::submit('submit', 'Send']);

echo Form::close();
```




### Requirements

* PHP >= 7.4




### Documentation

* The documentation is in folder "docs" of this package:

[English](https://github.com/dev-and-web/daw-php-form/tree/2.0/docs/en/doc.md)
|
[French](https://github.com/dev-and-web/daw-php-form/tree/2.0/docs/fr/doc.md)




## Installation

Installation via Composer:
```
composer require dev-and-web/daw-php-form
```






## Contributing

### Bugs and security Vulnerabilities

If you discover a bug or a security vulnerability within DAW PHP Form, please send an message to Steph. Thank you.
All beg and all security vulnerabilities will be promptly addressed.




### License

The DAW PHP Form is Open Source software licensed under the MIT license.
