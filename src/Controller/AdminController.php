<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{

    #[Route('/admin/login', name: 'sign-in')]
    public function dashboard(): Response
    {
        return $this->render('admin/login.html.twig');
    }

    #[Route('/admin/add_user', name: 'user')]
    public function createProgram(EntityManagerInterface $entityManager): Response
    {
        $admin1 = new User();
        $admin1->setUserId('12345');
        $admin1->setEmail('andrewbanda7@gmail.com');
        $admin1->setNrc('620621/52/1');
        $admin1->setPassword('Andreas@3000');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($admin1);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$admin1->getId());
    }

    #[Route('/product', name: 'create_product')]
    public function createProduct(ValidatorInterface $validator): Response
    {
        $product = new User();
        // This will trigger an error: the column isn't nullable in the database
        $product->setUserId('');
        // This will trigger a type mismatch error: an integer is expected
        $product->setEmail('1999');

        // ...

        $errors = $validator->validate($product);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        // ...
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
    
    #[Route('/admin/remove_user', name: 'user_remove')]
    public function removeUser(EntityManagerInterface $entityManager)
    {
        $user=new User();
        $entityManager->remove($user);
        $entityManager->flush();
    }
}
