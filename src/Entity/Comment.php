<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 * @ORM\Table(name="comment")
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", name="text")
     */
    private $text;

    /**
     * @ORM\Column(type="datetime", name="date")
     */
    private $date;

    /**
     * Comment constructor.
     */
    public function __construct()
    {
        $this->commentReactions =  new ArrayCollection();
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Profile", inversedBy="comments")
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Post", inversedBy="comments")
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommentReaction", mappedBy="comment")
     */
    private $commentReactions;

    /**
     * @return Collection|CommentReaction[]
     */
    public function getCommentReactions()
    {
        return $this->commentReactions;
    }
}
