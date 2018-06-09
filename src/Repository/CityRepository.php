<?php

namespace App\Repository;

use App\Entity\City;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, City::class);
    }

    public function getCitiesByState($id){
        $cities = $this->createQueryBuilder('c')
            ->select('c.id, c.name')
            ->where('c.state = :state_id')->setParameter('state_id', $id)
            ->getQuery()
            ->getResult();

        return $cities;
    }
}
