<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/admin/user/{id}', name: 'user_show_id')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $user = $entityManager->getRepository(User::class)->find($id);

        if (!$user) 
        {
            throw $this->createNotFoundException( 'No product found for id '.$id );
        }

        return new Response('Check out this user: '.$user->getEmail());
    } 
    
    #[Route('/admin/users', name: 'user_show')]
    public function showUsers(EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(User::class)->findAll();

        if (!$users) 
        {
            throw $this->createNotFoundException( 'No news found ' );
        }

        return $this->render('admin/users.html.twig', ['users' => $users]);
    }
    
    #[Route('/admin/remove_user/{id}', name: 'user_remove')]
    public function removeUser(EntityManagerInterface $entityManager, User $user)
    {
        $user=new User();
        $entityManager->remove($user);
        $entityManager->flush();
        return $this->redirect($this->generateUrl(route:'dashboard'));
    }
}
