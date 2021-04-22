<?php

/**
 * Si le package n'a pas été téléchargé avec Composer, il faut "require" manuellement ce fichier
 */

require_once __DIR__.'/../Contracts/FormInterface.php';

require_once __DIR__.'/../Exception/FormException.php';

require_once __DIR__.'/../Support/Facades/Facade.php';

require_once __DIR__.'/../Support/Facades/Form.php';

require_once __DIR__.'/../Support/Request/Bags/ParameterBag.php';

require_once __DIR__.'/../Support/Request/Request.php';

require_once __DIR__.'/../Support/Security/Security.php';

require_once __DIR__.'/../Generators/ButtonGenerator.php';

require_once __DIR__.'/../Generators/GeneratorTrait.php';

require_once __DIR__.'/../Generators/InputFileGenerator.php';

require_once __DIR__.'/../Generators/InputGenerator.php';

require_once __DIR__.'/../Generators/LabelGenerator.php';

require_once __DIR__.'/../Generators/OpenCloseGenerator.php';

require_once __DIR__.'/../Generators/SelectGenerator.php';

require_once __DIR__.'/../Generators/TextareaGenerator.php';

require_once __DIR__.'/../Form.php';
