<?php

namespace App\Controller;

use App\Entity\News;
use App\Form\NewsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewsController extends AbstractController
{
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

        return $this->render('admin/show_news.html.twig', ['news' => $news,]);
    }


    #[Route('/admin/remove_news/{id}', name: 'delete_news')]
    public function removeNews($id,EntityManagerInterface $entityManager):Response
    {
        $news=new News();
        $entityManager->remove($news);
        $entityManager->flush();
        return $this->redirect($this->generateUrl(route:'news_show'));
    }

}
