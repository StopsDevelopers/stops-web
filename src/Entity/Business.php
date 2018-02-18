<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BusinessRepository")
 */
class Business
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, name="name")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="boolean", options={"default": 1})
     */
    private $isActive;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $password;

    /**
     * Business constructor.
     */
    public function __construct()
    {
        $this->stops =  new ArrayCollection();
        $this->awards = new ArrayCollection();
        $this->promotions = new ArrayCollection();
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
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @param mixed $releaseDate
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return mixed
     */
    public function getisActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stop", mappedBy="business")
     */
    private $stops;

    /**
     * @return Collection|Stop[]
     */
    public function getStops()
    {
        return $this->stops;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Branch", mappedBy="business")
     */
    private $branchOffices;

    /**
     * @return Collection|Branch[]
     */
    public function getBranchOffices()
    {
        return $this->branchOffices;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Award", mappedBy="business")
     */
    private $awards;

    /**
     * @return Collection|Award[]
     */
    public function getAwards()
    {
        return $this->awards;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Promotion", mappedBy="business")
     */
    private $promotions;

    /**
     * @return Collection|Promotion[]
     */
    public function getPromotions()
    {
        return $this->promotions;
    }
}
