<?php

namespace App\Domain\Service;

use App\Domain\ValueObject\DefaultEntity;

interface DefaultEntityServiceInterface {
    public function create(DefaultEntity $entity);
}