<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
     /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $nom;
               
    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $status=true;
    
    /**
     *
     * @var Support[]|ArrayCollection
     * @ORM\OneToMany(
     *     targetEntity = "App\Entity\Support",
     *     mappedBy = "project" 
     * )
     */
    private $supports;
            
    
    function getSupports() 
    {
        return $this->supports;
    }
    /**
     * 
     * @param Support[] | ArrayCollection $supports
     */
    function setSupports($supports) 
    {
        $this->supports->clear();
        
        foreach($supports as $support){
            $this->addSupport($support);
        }
    }
    /**
     * 
     * @param \App\Entity\Support| $support
     */
    function addSupport(Support $support = null)
    {
        $support->setProject($this);

        if(!$this->supports->contains($support))
        {
            $this->supports->add($support);
        }   
    }    
    /**
     * 
     * @param Support[]|ArrayCollection \App\Entity\Support $support
     * 
     */
    function removeSupport(Support $support = null)
    {
        $this->supports->removeElement($support);
    }

    function getId() {
        return $this->id;
    }

     function getNom() {
    return $this->nom;
    }

     function getStatus() {
    return $this->status;
    }

     function setNom($nom) {
    $this->nom = $nom;
    }

     function setStatus($status) {
    $this->status = $status;
    }

    function isEnable():bool 
    {
        return $this->status === true;
    }

    // add your own fields
}
