<?php 
// phpunit --help
// composer require --dev phpunit/phpunit
// alias phpunit='vendor/bin/phpunit'
// composer dump-autoload : to generate the autoload scripts after adding the autoload section in composer.json

require  dirname(__DIR__ ). '/lib/functions.php';

// require  dirname(__DIR__ ). '/src/Person.php';


spl_autoload_register(function ($class) {

    $file = dirname(__DIR__ ) . '/src/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
    
});