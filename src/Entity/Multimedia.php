<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MultimediaRepository")
 */
class Multimedia
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $path;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $privacy;

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
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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
    public function getPrivacy()
    {
        return $this->privacy;
    }

    /**
     * @param mixed $privacy
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Album", inversedBy="multimedia")
     */
    private $album;

    /**
     * @return mixed
     */
    public function getAlbum(): Album
    {
        return $this->album;
    }

    /**
     * @param mixed $album
     */
    public function setAlbum(Album $album)
    {
        $this->album = $album;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MultimediaType", inversedBy="multimedia")
     */
    private $multimediaType;

    /**
     * @return mixed
     */
    public function getMultimediaType(): MultimediaType
    {
        return $this->multimediaType;
    }

    /**
     * @param mixed $multimediaType
     */
    public function setMultimediaType(MultimediaType $multimediaType)
    {
        $this->multimediaType = $multimediaType;
    }

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Promotion", inversedBy="multimedia")
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

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Coupon", inversedBy="multimedia")
     */
    private $coupon;

    /**
     * @return mixed
     */
    public function getCoupon(): Coupon
    {
        return $this->coupon;
    }

    /**
     * @param mixed $coupon
     */
    public function setCoupon(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Post", inversedBy="multimedia")
     */
    private $post;

    /**
     * @return mixed
     */
    public function getPost(): Post
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setPost(Post $post)
    {
        $this->post = $post;
    }
}
