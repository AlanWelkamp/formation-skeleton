<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SupportRepository")
 */
class Support
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type = "integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type = "string")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type = "text", nullable = true)
     */
    private $description;
    
    /**
     * @var \DateTime
     * 
     * @ORM\Column(type = "datetime", nullable = false)
     */
    private $createdAt;
    
    /**
     * @var Project
     * @ORM\ManyToOne(
     *  targetEntity = "App\Entity\Project",
     *  inversedBy ="supports"
     * )
     */
    private $project;
    
    
    public function __construct() {
        $this->createdAt = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }
    
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }
    /**
     * 
     * @return \App\Entity\Project
     */
    public function getProject(): Project
    {
        return $this->project;
    }

    public function setProject(Project $project)
    {
        $this->project = $project;
    }
}
