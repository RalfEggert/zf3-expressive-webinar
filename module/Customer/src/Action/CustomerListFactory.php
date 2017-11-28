<?php
/**
 * zf3-expressive-webinar
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 Admin
 * @license    All rights reserved
 */

namespace Customer\Action;

use Customer\Table\CustomerTable;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CustomerListFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $template      = $container->get(TemplateRendererInterface::class);
        $customerTable = $container->get(CustomerTable::class);

        return new CustomerListAction($template, $customerTable);
    }
}
