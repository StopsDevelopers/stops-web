<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PromotionRepository")
 */
class Promotion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $description;

    /**
     * @ORM\Column(type="smallint")
     */
    private $price;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deadline;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $restriction;

    /**
     * Promotion constructor.
     */
    public function __construct()
    {
        $this->claimedPromotions = new ArrayCollection();
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
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
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param mixed $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }

    /**
     * @return mixed
     */
    public function getRestriction()
    {
        return $this->restriction;
    }

    /**
     * @param mixed $restriction
     */
    public function setRestriction($restriction)
    {
        $this->restriction = $restriction;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Business", inversedBy="promotions")
     */
    private $business;

    /**
     * @return mixed
     */
    public function getBusiness(): Promotion
    {
        return $this->business;
    }

    /**
     * @param mixed $business
     */
    public function setBusiness(Promotion $business)
    {
        $this->business = $business;
    }

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Multimedia", inversedBy="promotion")
     */
    private $multimedia;

    /**
     * @return mixed
     */
    public function getMultimedia(): Multimedia
    {
        return $this->multimedia;
    }

    /**
     * @param mixed $multimedia
     */
    public function setMultimedia(Multimedia $multimedia)
    {
        $this->multimedia = $multimedia;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ClaimPromotion", mappedBy="promotion")
     */
    private $claimedPromotions;

    /**
     * @return Collection|ClaimPromotion[]
     */
    public function getClaimedPromotions()
    {
        return $this->claimedPromotions;
    }
}