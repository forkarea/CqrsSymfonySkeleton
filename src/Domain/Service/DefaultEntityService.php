<?php

namespace App\Domain\Service;

use App\Domain\Repository\DefaultRepository;
use App\Domain\ValueObject\DefaultEntity;
use Doctrine\ORM\EntityManagerInterface;

class DefaultEntityService implements DefaultEntityServiceInterface
{
    private $repository;

    public function __construct(DefaultRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(DefaultEntity $entity)
    {
        $this->repository->save($entity);
    }
}