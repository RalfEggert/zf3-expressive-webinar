<?php
/**
 * zf3-expressive-webinar
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 Admin
 * @license    All rights reserved
 */

namespace Customer\Table;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

/**
 * Class CustomerTable
 *
 * @package Customer\Table
 */
class CustomerTable
{
    /** @var TableGateway */
    private $tableGateway;

    /**
     * CustomerTable constructor.
     *
     * @param TableGateway $tableGateway
     */
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    /**
     * @return array
     */
    public function fetchList()
    {
        $select = $this->tableGateway->getSql()->select();
        $select->order(['lastname' => 'ASC']);

        /** @var ResultSet $resultSet */
        $resultSet = $this->tableGateway->selectWith($select);

        return $resultSet->toArray();
    }
}