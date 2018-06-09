<?php

namespace App\Repository;

use App\Entity\State;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class StateRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, State::class);
    }

    public function getStatesByCountry($id){
        $states = $this->createQueryBuilder('s')
            ->select('s.id, s.name')
            ->where('s.country = :country_id')->setParameter('country_id', $id)
            ->getQuery()
            ->getResult();

        return $states;
    }
}
