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
## Controller Usage
```php
<?php

namespace Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class FooController extends CoreController {

    public function barAction(Request $request, Application $app)
    {
        $cutator = $app['cutator'];
        $cutator->setTotalItem(850)->setItemsPerPage(10)->setCurrentPage(8)->setShowFirstLast(false)->setMaxLinks(10);
        $cutator->setUrlInfo('test_page');

        echo $cutator->getTemplateView();
    }
}
?>
```