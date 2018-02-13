<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StateRepository")
 */
class State
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, name="name")
     */
    private $name;

    /**
     * State constructor.
     */
    public function __construct()
    {
        $this->cities = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", inversedBy="states")
     * @ORM\JoinColumn()
     */
    private $country;

    /**
     * @return mixed
     */
    public function getCountry(): Country
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry(Country $country)
    {
        $this->country = $country;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\City", mappedBy="state")
     */
    private $cities;

    /**
     * @return Collection|City[]
     */
    public function getCities()
    {
        return $this->cities;
    }
}
