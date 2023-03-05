<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;

class BooksController extends AbstractController
{
    #[Route('/books', name: 'app_books')]
    public function index(BookRepository $books): Response
    {
        $books = $books->findAll();
        return $this->render('books/index.html.twig', [
            'controller_name' => 'BooksController',
        ]);
    }
}
