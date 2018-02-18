<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40, name="name")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthday;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $releaseDate;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->stops = new ArrayCollection();
        $this->claimedAwards = new ArrayCollection();
        $this->claimedPromotions = new ArrayCollection();
        $this->claimedCoupons = new ArrayCollection();
        $this->visits = new ArrayCollection();
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
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
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
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
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
     * @ORM\OneToOne(targetEntity="App\Entity\Address", inversedBy="user")
     */
    private $address;

    /**
     * @return mixed
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Profile", inversedBy="user")
     */
    private $profile;

    /**
     * @return mixed
     */
    public function getProfile(): Profile
    {
        return $this->profile;
    }

    /**
     * @param mixed $profile
     */
    public function setProfile(Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stop", mappedBy="user")
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
     * @ORM\OneToMany(targetEntity="App\Entity\ClaimAward", mappedBy="user")
     */
    private $claimedAwards;

    /**
     * @return Collection|ClaimAward[]
     */
    public function getClaimedAwards()
    {
        return $this->claimedAwards;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ClaimPromotion", mappedBy="user")
     */
    private $claimedPromotions;

    /**
     * @return Collection|ClaimPromotion[]
     */
    public function getClaimedPromotions()
    {
        return $this->claimedPromotions;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ClaimCoupon", mappedBy="user")
     */
    private $claimedCoupons;

    /**
     * @return Collection|ClaimCoupon[]
     */
    public function getClaimedCoupons()
    {
        return $this->claimedCoupons;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Visit", mappedBy="user")
     */
    private $visits;

    /**
     * @return Collection|Visit[]
     */
    public function getVisits()
    {
        return $this->visits;
    }
}
