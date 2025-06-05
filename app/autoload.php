<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

require __DIR__.'/../vendor/simplehtmldom/simple_html_dom.php';
//require __DIR__.'/../vendor/facebook/autoload.php';
//require __DIR__.'/../vendor/facebook/Facebook.php';



//$loader->add('Facebook', realpath(__DIR__.'/../vendor/facebook'));



AnnotationRegistry::registerLoader(array($loader, 'loadClass'));


//$loader->registerPrefixes(array( 'Simple' => __DIR__.'/../vendor/',));

return $loader;
