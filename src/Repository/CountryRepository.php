<?php

namespace App\Repository;

use App\Entity\Country;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CountryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Country::class);
    }

    public function getCountries(){
        $results = $this->createQueryBuilder('c')
            ->select('c.id, c.name')
            ->getQuery()
            ->getResult();

        return $results;
    }
}
