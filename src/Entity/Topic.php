<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TopicRepository")
 */
class Topic
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Branch", inversedBy="topics")
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Word", inversedBy="topics")
     */
    private $word;

    /**
     * @return mixed
     */
    public function getWord(): Word
    {
        return $this->word;
    }

    /**
     * @param mixed $word
     */
    public function setWord(Word $word)
    {
        $this->word = $word;
    }
}
