## Simple Usage
```php
<?php

use Silex\Application;
use Swm\Silex\CutatorServiceProvider;

$app = new Application();

$app->register(new CutatorServiceProvider(), array(
    'cutator.url_generator'  => new \Cutator\Adapter\SfUrlGeneratorAdapter($app['url_generator']),
    'cutator.view' => new \Cutator\View\TwBootstrapView(),
));
```