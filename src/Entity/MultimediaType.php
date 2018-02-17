<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MultimediaTypeRepository")
 */
class MultimediaType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, name="name")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=3, name="code")
     */
    private $code;

    /**
     * MultimediaType constructor.
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Multimedia", mappedBy="multimediaType")
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
