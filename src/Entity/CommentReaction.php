<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentReactionRepository")
 */
class CommentReaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="type", columnDefinition="enum('REACCION_ME_GUSTA')", options={"default": "REACCION_ME_GUSTA"})
     */
    private $type;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Profile", inversedBy="commentReactions")
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Comment", inversedBy="commentReactions")
     */
    private $comment;

    /**
     * @return mixed
     */
    public function getComment(): Comment
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment(Comment $comment)
    {
        $this->comment = $comment;
    }
}
