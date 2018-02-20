<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotificationRepository")
 */
class Notification
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="type", columnDefinition="enum('USUARIO_COMENTO_POST','USUARIO_COMENTO_COMENTARIO','USUARIO_REACCIONO_POST','USUARIO_REACCIONO_COMENTARIO')")
     */
    private $type;

    /**
     * @ORM\Column(type="boolean", options={"default": 0})
     */
    private $seen;

    /**
     * @ORM\Column(type="datetime", nullable=true, name="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $objective;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return mixed
     */
    public function getSeen()
    {
        return $this->seen;
    }

    /**
     * @param mixed $seen
     */
    public function setSeen($seen)
    {
        $this->seen = $seen;
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
    public function getObjective()
    {
        return $this->objective;
    }

    /**
     * @param mixed $objective
     */
    public function setObjective($objective)
    {
        $this->objective = $objective;
    }

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Profile", inversedBy="notificationAutor")
     */
    private $profileAutor;

    /**
     * @return mixed
     */
    public function getProfileAutor(): Profile
    {
        return $this->profileAutor;
    }

    /**
     * @param mixed $profileAutor
     */
    public function setProfileAutor(Profile $profileAutor)
    {
        $this->profileAutor = $profileAutor;
    }

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Profile", inversedBy="notificationDestination")
     */
    private $profileDestination;

    /**
     * @return mixed
     */
    public function getProfileDestination(): Profile
    {
        return $this->profileDestination;
    }

    /**
     * @param mixed $profileDestination
     */
    public function setProfileDestination(Profile $profileDestination)
    {
        $this->profileDestination = $profileDestination;
    }
}
