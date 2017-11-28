<?php
/**
 * zf3-expressive-webinar
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 Admin
 * @license    All rights reserved
 */

namespace Customer\Table;

use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

class CustomerTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $dbAdapter = $container->get(AdapterInterface::class);

        $resultSetPrototype = new ResultSet(ResultSet::TYPE_ARRAY);

        $tableGateway = new TableGateway('customers', $dbAdapter, null, $resultSetPrototype);

        return new CustomerTable($tableGateway);
    }
}
