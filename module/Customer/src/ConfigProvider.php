<?php
/**
 * zf3-expressive-webinar
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 Admin
 * @license    All rights reserved
 */

namespace Customer;

use Customer\Action\CustomerListAction;
use Customer\Action\CustomerListFactory;
use Customer\Router\RouterDelegatorFactory;
use Customer\Table\CustomerTable;
use Customer\Table\CustomerTableFactory;
use Zend\Expressive\Application;

class ConfigProvider
{
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    private function getDependencies()
    {
        return [
            'delegators' => [
                Application::class => [
                    RouterDelegatorFactory::class,
                ],
            ],
            'factories'  => [
                CustomerListAction::class => CustomerListFactory::class,

                CustomerTable::class => CustomerTableFactory::class,
            ],
        ];
    }

    private function getTemplates()
    {
        return [
            'paths' => [
                __DIR__ . '/../templates/customer',
            ],
        ];
    }
}
