<?php

namespace App\Controller;

use App\Entity\About;
use App\Form\AboutType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'about')]
    public function about (EntityManagerInterface $entityManager): Response
    {
        $info = $entityManager->getRepository(About::class)->findAll();
        return $this->render('pages/about.html.twig', ['about'=>$info]);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('pages/contact.html.twig');
    }
    
    #[Route('/admin/about', name: 'create_about')]
    public function CreateAbout(EntityManagerInterface $entityManager, Request $request)
    {
      
        $about=new About();
        $form= $this->createForm(type:AboutType::class,data:$about);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $entityManager->persist($about);
            $entityManager->flush();
        }
        return $this->render('admin/create_about.html.twig', ['aboutForm'=>$form->createView()]);
    }

    #[Route('/admin/update_about', name: 'update_about')]
    public function UpdateAbout(EntityManagerInterface $entityManager, Request $request, int $id=1): Response
    {
        $about=new About();
        $form= $this->createForm(type:AboutType::class,data:$about);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $entityManager->persist($about);
            $entityManager->flush();
        }
        return $this->render('admin/create_about.html.twig', ['form'=>$form->createView()]);
    }
}
