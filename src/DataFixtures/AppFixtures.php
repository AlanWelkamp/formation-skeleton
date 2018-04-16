<?php

namespace App\DataFixtures;

use App\Entity\Support;
use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->loadProjects($manager);
        $this->loadSupports($manager);
    }
    
    /**
     * 
     * @param ObjectManager $manager
     */
    public function loadProjects(ObjectManager $manager)
    {
        for($i =0 ; $i<3;$i++){
            
            $project = new Project();
            $project->setNom('Projet N°'.$i);
            $this->setReference('project_'.$i,$project);
            
            $manager->persist($project);
        }
        $manager->flush();
    }
    /**
     * 
     * @param ObjectManager $manager
     */
    public function loadSupports(ObjectManager $manager)
    {
        for($i =0 ; $i<30;$i++){
            
            $support = new Support();
            $support->setTitle('Support N°'.$i);
            $support->setDescription('la description du support n°'.$i);
            
            
            $support->setProject($this->getReference('project_'.$i%3));
            
            $manager->persist($support);
        }
        $manager->flush();
    }
}
