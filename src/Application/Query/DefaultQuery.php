<?php

namespace App\Application\Query;

use Doctrine\DBAL\Driver\Connection;
use Doctrine\DBAL\Driver\Statement;

/**
 * Class DefaultQuery
 * @package App\Application\Query
 *
 * Just an example
 */
class DefaultQuery implements QueryInterface
{
    public function execute(Connection $connection, ?int $id = null): Statement
    {
        $sql = 'SELECT * FROM test';
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        return $stmt;
    }
}