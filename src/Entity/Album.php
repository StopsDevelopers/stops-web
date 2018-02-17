<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlbumRepository")
 */
class Album
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
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $description;

    /**
     * Album constructor.
     */
    public function __construct()
    {
        $this->multimedia = new ArrayCollection();
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Branch", inversedBy="albums")
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
     * @ORM\OneToMany(targetEntity="App\Entity\Multimedia", mappedBy="album")
     */
    private $multimedia;

    /**
     * @return Collection|Multimedia[]
     */
    public function getMultimedia()
    {
        return $this->multimedia;
    }
}
