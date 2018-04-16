<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyCommand
 *
 * @author bcanape
 */
class Hello extends Command{
    //put your code here
    
    protected function configure()
    {
         $this
        ->setName('app:say-salut')
        ->setDescription('Creates a new user.')
        ->setHelp('This command allows you to create a user...')
        ->addArgument('username', InputArgument::REQUIRED, 'The name to say hello')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');
        // outputs a message followed by a "\n"
        $output->writeln('Salut '.$username.' !');

    }
}
