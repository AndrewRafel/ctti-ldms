<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MianController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('pages/home.html.twig');
    }

    #[Route('/about', name: 'about')]
    public function about (): Response
    {
        return $this->render('pages/about.html.twig');
    }

    #[Route('/', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('pages/contact.html.twig');
    }

    #[Route('/', name: 'courses')]
    public function courses(): Response
    {
        return $this->render('pages/courses.html.twig');
    }

    #[Route('/', name: 'events')]
    public function events(): Response
    {
        return $this->render('pages/events.html.twig');
    }

    #[Route('/', name: 'gallery')]
    public function gallery(): Response
    {
        return $this->render('pages/gallery.html.twig');
    }

}
