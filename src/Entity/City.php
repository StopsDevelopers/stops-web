<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
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
     * City constructor.
     */
    public function __construct()
    {
        $this->addresses = new ArrayCollection();
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
     * @ORM\ManyToOne(targetEntity="App\Entity\State", inversedBy="cities")
     */
    private $state;

    /**
     * @return mixed
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState(State $state)
    {
        $this->state = $state;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Address", mappedBy="city")
     */
    private $addresses;

    /**
     * @return Collection|Address[]
     */
    public function getAddresses()
    {
        return $this->addresses;
    }
}
