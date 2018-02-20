<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $location;

    /**
     * @ORM\Column(type="text", name="text", nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="string", columnDefinition="enum('PRIVACIDAD_PUBLICO','PRIVACIDAD_SOLO_YO','PRIVACIDAD_SOLO_AMIGOS')", options={"default": "PRIVACIDAD_SOLO_AMIGOS"})
     */
    private $privacy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tag;

    /**
     * Post constructor.
     */
    public function __construct()
    {
        $this->profilesThatShare = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->postReactions = new ArrayCollection();
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
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
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
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Profile", inversedBy="")
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
     * @ORM\OneToOne(targetEntity="App\Entity\Multimedia", inversedBy="post")
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
     * @ORM\OneToMany(targetEntity="App\Entity\Share", mappedBy="post")
     */
    private $profilesThatShare;

    /**
     * @return Collection|Share[]
     */
    public function getProfilesThatShare()
    {
        return $this->profilesThatShare;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="post")
     */
    private $comments;

    /**
     * @return Collection|Comment[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PostReaction", mappedBy="post")
     */
    private $postReactions;

    /**
     * @return Collection|PostReaction[]
     */
    public function getPostReactions()
    {
        return $this->postReactions;
    }
}
