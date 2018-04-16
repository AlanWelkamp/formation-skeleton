<?php

namespace App\Controller;

use App\Repository\SupportRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SupportController extends Controller
{
    /**
     * @var SupportRepository
     */
    private $supportRepository;
    /**
     *
     * @var LoggerInterface
     */
    private $logger;
    

    public function __construct(SupportRepository $supportRepository, LoggerInterface $logger)
    {
        $this->supportRepository = $supportRepository;
        $this->logger = $logger;
    }

    /**
     * @Route(path = "/support", name = "support_list")
     * @return Response
     */
    public function index(): Response
    {
        
        $supports = $this->supportRepository->getXLatestSupport(5);
        $this->logger->info('il y a '.count($supports).' supports en cours .');
        return $this->render('support/index.html.twig', [
            'supports' => $supports
        ]);
    }
    
     /**
     * @Route(
      *     path = "/support/{id}",
      *     name = "support_show",
      *     methods={"GET"}
      * )
     * @return Response
     */
    public function show($id)
    {
        
        $support = $this->supportRepository->find($id);
        
        if(!$support)
        {
            throw $this->createNotFoundException(
            sprintf('le support %s est introuvable',$id)
            );
        }
        return $this->render('support/show.html.twig',['support' => $support]);
    }
}
