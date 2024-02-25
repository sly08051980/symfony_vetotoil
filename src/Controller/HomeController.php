<?php

namespace App\Controller;
use App\Entity\Patient;
use App\Form\PatientType;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
//    #[Route('/home/connexion_particulier',name:'app_connexion_particulier')]
//    public function connexion_particulier():Response{
//     return $this->render('home/connexion.html.twig',['controller_name'=>'HomeController',]);
//    }
   #[Route('/home/inscription_particulier',name:'app_inscription_particulier')]
   public function inscription_particulier(Request $request, EntityManagerInterface $entityManager): Response
   {
 
       $patient = new Patient(); 
       $form = $this->createForm(PatientType::class, $patient); 

       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {

           $entityManager->persist($patient);
           $entityManager->flush();

           return $this->redirectToRoute('app_home');
       }

    
       return $this->render('home/inscription.html.twig', [
           'form' => $form->createView(),
       ]);
   }
}
