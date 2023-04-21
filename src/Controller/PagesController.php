<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\Program;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PagesController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(EntityManagerInterface $entityManager): Response
    {
       // $id=1;
        $news = $entityManager->getRepository(News::class);
        $program=$entityManager->getRepository(Program::class);
        return $this->render('pages/home.html.twig',['news'=>$news, 'program'=>$program]);
    }

    #[Route('/about', name: 'about')]
    public function about (): Response
    {
        return $this->render('pages/about.html.twig');
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('pages/contact.html.twig');
    }

    #[Route('/course', name: 'courses')]
    public function courses(): Response
    {
        return $this->render('pages/courses.html.twig');
    }

    #[Route('/events', name: 'events')]
    public function events(): Response
    {
        return $this->render('pages/events.html.twig');
    }

    #[Route('/gallery', name: 'gallery')]
    public function gallery(): Response
    {
        return $this->render('pages/gallery.html.twig');
    }

    #[Route('/admin', name: 'login')]
    public function dashboard(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

}
