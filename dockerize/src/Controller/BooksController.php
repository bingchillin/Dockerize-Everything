<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

class BooksController extends AbstractController
{
    #[Route('/books', name: 'app_books')]
    public function index(BookRepository $books): Response
    {
        $books = $books->findAll();
        //dd($books);
        return $this->render('books/index.html.twig', [
            'controller_name' => 'BooksController',
            'books' => $books
        ]);
    }

#[Route('/books/DeleteBook/{id}', name: 'delete_book', methods: ['GET'])]
    /**
     * This function can delete a specific car
     * @param Book $book
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function delete(EntityManagerInterface $manager, Book $book): Response
    {
        $manager->remove($book);
        $manager->flush();

        $this->addFlash('success', 'La voiture a bien été supprimée');
        return $this->redirectToRoute('app_books');
    }
}
