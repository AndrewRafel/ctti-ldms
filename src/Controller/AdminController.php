<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\User;
use App\Entity\About;
use App\Form\NewsType;
use App\Form\UserType;
use App\Entity\Faculty;
use App\Entity\Program;
use App\Entity\Student;
use App\Form\AboutType;
use App\Form\FacultyType;
use App\Form\ProgramType;
use App\Form\StudentType;
use function PHPSTORM_META\type;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'dashboard')]
    public function dashboard(EntityManagerInterface $entityManager): Response
    {
     $user = $entityManager->getRepository(User::class);

    return $this->render('admin/dashboard.html.twig',['currentUser'=>$user]);
}
    #[Route('/admin/add_news', name: 'add_news')]
    public function createNews(EntityManagerInterface $entityManager, Request $request): Response
    {
        $news=new News();
        $form= $this->createForm(type:NewsType::class,data:$news);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $entityManager->persist($news);
            $entityManager->flush();
        }
        return $this->render('admin/create_news.html.twig', ['form'=>$form->createView()]);
    }

    #[Route('/admin/update_news', name: 'update_news')]
    public function UpdateNews(EntityManagerInterface $entityManager, Request $request, int $id): Response
    {
        $news=new News();
        $form= $this->createForm(type:NewsType::class,data:$news);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $entityManager->persist($news);
            $entityManager->flush();
        }
        return $this->render('admin/create_news.html.twig', ['form'=>$form->createView()]);
    }

    #[Route('/admin/news', name: 'news_show')]
    public function showNews(EntityManagerInterface $entityManager): Response
    {
        $news = $entityManager->getRepository(News::class)->findAll();

        if (!$news) 
        {
            throw $this->createNotFoundException( 'No news found ' );
        }

        return $this->render('admin/news.html.twig', ['news' => $news,]);
    }


    #[Route('/admin/remove_news', name: 'delete_event')]
    public function removeNews(EntityManagerInterface $entityManager)
    {
        $news=new News();
        $entityManager->remove($news);
        $entityManager->flush();
        return $this->redirect($this->generateUrl(route:'dashboard'));
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


    #[Route('/admin/add_program', name: 'create_program')]
    public function CreateProgram(EntityManagerInterface $entityManager, Request $request)
    {
      
        $program=new program();
        $form= $this->createForm(type:ProgramType::class,data:$program);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $entityManager->persist($program);
            $entityManager->flush();
        }
        return $this->render('admin/create_program.html.twig', ['programForm'=>$form->createView()]);
    }

    #[Route('/admin/user/{id}', name: 'user_show')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $user = $entityManager->getRepository(User::class)->find($id);

        if (!$user) 
        {
            throw $this->createNotFoundException( 'No product found for id '.$id );
        }

        return new Response('Check out this user: '.$user->getEmail());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
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
