<?php

/*
 * Author: Dwi Sasongko S <ruckuus@gmail.com>
 */

namespace Swm\Silex;

use Silex\Application;
use Silex\ServiceProviderInterface;

class CutatorServiceProvider implements ServiceProviderInterface
{
    function register(Application $app){
        $this->app = $app;

        $app['cutator.init'] = $app->share(function (Application $app) {
            $view = $app['cutator.view'];
            $view->setUrlGenerator($app['cutator.url_generator']);

            $cutator = new Cutator\Cutator();
            $cutator->setView($view);

            return $cutator;
        });
    }

    function boot(Application $app){
        $this->app['cutator.init'];
    }
}