<?php
/**
 * zf3-expressive-webinar
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 Admin
 * @license    All rights reserved
 */

namespace App\Pipeline;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\Expressive\Helper\ServerUrlMiddleware;
use Zend\Expressive\Helper\UrlHelperMiddleware;
use Zend\Expressive\Middleware\ImplicitHeadMiddleware;
use Zend\Expressive\Middleware\ImplicitOptionsMiddleware;
use Zend\Expressive\Middleware\NotFoundHandler;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;
use Zend\Stratigility\Middleware\ErrorHandler;

class PipelineDelegatorFactory implements DelegatorFactoryInterface
{
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        /** @var Application $app */
        $app = $callback();

        $app->pipe(ErrorHandler::class);
        $app->pipe(ServerUrlMiddleware::class);

        $app->pipeRoutingMiddleware();
        
        $app->pipe(ImplicitHeadMiddleware::class);
        $app->pipe(ImplicitOptionsMiddleware::class);
        $app->pipe(UrlHelperMiddleware::class);

        $app->pipeDispatchMiddleware();

        $app->pipe(NotFoundHandler::class);

        return $app;
    }
}