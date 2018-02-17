<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AddressRepository")
 */
class Address
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $street;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $neighborhood;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $zipCode;

    /**
     * @ORM\Column(type="smallint")
     */
    private $exteriorNumber;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $interiorNumber;

    /**
     * Address constructor.
     */
    public function __construct()
    {
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
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * @param mixed $neighborhood
     */
    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param mixed $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return mixed
     */
    public function getExteriorNumber()
    {
        return $this->exteriorNumber;
    }

    /**
     * @param mixed $exteriorNumber
     */
    public function setExteriorNumber($exteriorNumber)
    {
        $this->exteriorNumber = $exteriorNumber;
    }

    /**
     * @return mixed
     */
    public function getInteriorNumber()
    {
        return $this->interiorNumber;
    }

    /**
     * @param mixed $interiorNumber
     */
    public function setInteriorNumber($interiorNumber)
    {
        $this->interiorNumber = $interiorNumber;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="addresses")
     */
    private $city;

    /**
     * @return mixed
     */
    public function getCity(): City
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity(City $city)
    {
        $this->city = $city;
    }

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="address")
     */
    private $user;

    /**
     * @return mixed
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Branch", inversedBy="address")
     */
    private $branch;

    /**
     * @return mixed
     */
    public function getBranch(): Branch
    {
        return $this->branch;
    }

    /**
     * @param mixed $branch
     */
    public function setBranch(Branch $branch)
    {
        $this->branch = $branch;
    }


}
