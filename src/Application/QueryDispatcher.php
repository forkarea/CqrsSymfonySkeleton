<?php

namespace App\Application;

use App\Application\Query\QueryInterface;
use Doctrine\DBAL\Driver\Connection;
use Doctrine\DBAL\Driver\Statement;

/**
 * Class QueryDispatcher
 * @package App\Application
 */
class QueryDispatcher
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * QueryDispatcher constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function execute(QueryInterface $query, ?int $id = null): Statement
    {
        return $query->execute($this->connection, $id);
    }
}