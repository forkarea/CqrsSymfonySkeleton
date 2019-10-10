<?php

namespace App\Domain\Repository;

use App\Domain\Entity\DefaultEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class DefaultRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DefaultEntity::class);
    }

    public function save(DefaultEntity $entity){
        $this->_em->persist($entity);
        $this->_em->flush();
    }
}