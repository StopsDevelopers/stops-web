<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClaimPromotionRepository")
 */
class ClaimPromotion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $releaseDate;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="claimedPromotions")
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Promotion", inversedBy="claimedPromotions")
     */
    private $promotion;

    /**
     * @return mixed
     */
    public function getPromotion(): Promotion
    {
        return $this->promotion;
    }

    /**
     * @param mixed $promotion
     */
    public function setPromotion(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }
}
