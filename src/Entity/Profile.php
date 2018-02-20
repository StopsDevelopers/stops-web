<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfileRepository")
 * @ORM\Table(name="profile")
 */
class Profile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $avatar;

    /**
     * @ORM\Column(type="boolean", options={"default": 1})
     */
    private $isVisible;

    /**
     * Profile constructor.
     */
    public function __construct()
    {
        $this->followers = new ArrayCollection();
        $this->posts = new ArrayCollection();
        $this->sharedPosts = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->postReactions = new ArrayCollection();
        $this->commentReactions = new ArrayCollection();
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return mixed
     */
    public function getisVisible()
    {
        return $this->isVisible;
    }

    /**
     * @param mixed $isVisible
     */
    public function setIsVisible($isVisible)
    {
        $this->isVisible = $isVisible;
    }

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="profile")
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
     * @ORM\OneToOne(targetEntity="App\Entity\Branch", inversedBy="profile")
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Follow", mappedBy="profile")
     */
    private $followers;


    /**
     * @return Collection|Follow[]
     */
    public function getFollowers()
    {
        return $this->followers;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Post", mappedBy="profile")
     */
    private $posts;

    /**
     * @return Collection|Post[]
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Share", mappedBy="profile")
     */
    private $sharedPosts;

    /**
     * @return Collection|Share[]
     */
    public function getSharedPosts()
    {
        return $this->sharedPosts;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="profile")
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
     * @ORM\OneToMany(targetEntity="App\Entity\PostReaction", mappedBy="profile")
     */
    private $postReactions;

    /**
     * @return Collection|PostReaction[]
     */
    public function getPostReactions()
    {
        return $this->postReactions;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommentReaction", mappedBy="profile")
     */
    private $commentReactions;

    /**
     * @return Collection|CommentReaction[]
     */
    public function getCommentReactions()
    {
        return $this->commentReactions;
    }

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Notification", inversedBy="profileAutor")
     */
    private $notificationAutor;

    /**
     * @return mixed
     */
    public function getNotificationAutor(): Notification
    {
        return $this->notificationAutor;
    }

    /**
     * @param mixed $notificationAutor
     */
    public function setNotificationAutor(Notification $notificationAutor)
    {
        $this->notificationAutor = $notificationAutor;
    }

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Notification", inversedBy="profileDestination")
     */
    private $notificationDestination;

    /**
     * @return mixed
     */
    public function getNotificationDestination(): Notification
    {
        return $this->notificationDestination;
    }

    /**
     * @param mixed $notificationDestination
     */
    public function setNotificationDestination(Notification $notificationDestination)
    {
        $this->notificationDestination = $notificationDestination;
    }
}
