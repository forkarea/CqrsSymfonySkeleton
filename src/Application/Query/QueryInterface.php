<?php

namespace App\Application\Query;

use Doctrine\DBAL\Driver\Connection;
use Doctrine\DBAL\Driver\Statement;

/**
 * Interface QueryInterface
 * @package App\Application\Query
 */
interface QueryInterface
{
    /**
     * @param Connection $connection
     * @param int|null $id
     * @return Statement
     */
    public function execute(Connection $connection, ?int $id = null): Statement;
}