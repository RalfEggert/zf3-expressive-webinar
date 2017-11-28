<?php
/**
 * zf3-expressive-webinar
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 Admin
 * @license    All rights reserved
 */

namespace App\Router;

use App\Action\HomePageAction;
use App\Action\PingAction;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

class RouterDelegatorFactory implements DelegatorFactoryInterface
{
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        /** @var Application $app */
        $app = $callback();

        $app->get('/', HomePageAction::class, 'home');
        $app->get('/api/ping', PingAction::class, 'api.ping');

        return $app;
    }
}
