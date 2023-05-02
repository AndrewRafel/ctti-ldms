<?php

namespace App\Controller;

use App\Form\SectionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Stopwatch\Section;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SectionController extends AbstractController
{
    #[Route('/admin/add_section', name: 'create_section')]
    public function CreateSection(EntityManagerInterface $entityManager, Request $request)
    {
      
        $section=new Section();
        $form= $this->createForm(type:SectionType::class,data:$section);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $entityManager->persist($section);
            $entityManager->flush();
        }
        return $this->render('admin/create_section.html.twig', ['sectionForm'=>$form->createView()]);
    }

    #[Route('/admin/sections', name: 'section_show')]
    public function showSections(EntityManagerInterface $entityManager): Response
    {
        $sections = $entityManager->getRepository(Section::class)->findAll();

        if (!$sections) 
        {
            throw $this->createNotFoundException( 'No sections found' );
        }

        return $this->render('admin/show_sections.html.twig', ['sections' => $sections,]);
    }
}
