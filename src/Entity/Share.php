<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShareRepository")
 * @ORM\Table(name="share")
 */
class Share
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", name="date")
     */
    private $date;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Profile", inversedBy="sharedPosts")
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Post", inversedBy="profilesThatShare")
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
