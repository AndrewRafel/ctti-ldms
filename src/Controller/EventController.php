<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{ 
     #[Route('/events', name: 'events')]
    public function events(): Response
    {
        return $this->render('pages/events.html.twig');
    }
}
