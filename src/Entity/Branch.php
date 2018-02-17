<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BranchRepository")
 */
class Branch
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $about;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $timeTable;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $releaseDate;

    /**
     * Branch constructor.
     */
    public function __construct()
    {
        $this->albums = new ArrayCollection();
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
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * @param mixed $about
     */
    public function setAbout($about)
    {
        $this->about = $about;
    }

    /**
     * @return mixed
     */
    public function getTimeTable()
    {
        return $this->timeTable;
    }

    /**
     * @param mixed $timeTable
     */
    public function setTimeTable($timeTable)
    {
        $this->timeTable = $timeTable;
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
     * @ORM\OneToOne(targetEntity="App\Entity\Address", inversedBy="branch")
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
     * @ORM\OneToOne(targetEntity="App\Entity\Profile", inversedBy="branch")
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Business", inversedBy="branchOffices")
     */
    private $business;

    /**
     * @return mixed
     */
    public function getBusiness(): Business
    {
        return $this->business;
    }

    /**
     * @param mixed $business
     */
    public function setBusiness(Business $business)
    {
        $this->business = $business;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="branchOffices")
     */
    private $category;

    /**
     * @return mixed
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Album", mappedBy="branch")
     */
    private $albums;

    /**
     * @return Collection|Album[]
     */
    public function getAlbums()
    {
        return $this->albums;
    }
}
