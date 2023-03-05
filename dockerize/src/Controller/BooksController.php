<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\BookType;

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

    #[Route('/books/add', name: 'add_book', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $manager): Response
    {

        $book = new Book();
        $form = $this->createForm(BookType::class, $book);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $book = $form->getData();
            $manager->persist($book);
            $manager->flush();

            $this->addFlash('success', 'Le livre a bien été ajouté');
            return $this->redirectToRoute('app_books');
        }
        return $this->render('books/add.html.twig', [
            'controller_name' => 'BooksController',
            'form' => $form->createView()
        ]);
    }

    #[Route('/books/edit/{id}', name: 'edit_book', methods: ['GET', 'POST'])]
    public function edit(Book $book, Request $request, EntityManagerInterface $manager): Response
    {
        //dd($book->getId());
        
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

      
        if($form->isSubmitted() && $form->isValid()){
            $booko = $form->getData();
            $manager->persist($booko);
            $manager->flush();

            $this->addFlash('success', 'Le livre a bien été modifié');
            return $this->redirectToRoute('app_books');
        }
       
        return $this->render('books/edit.html.twig', [
            'controller_name' => 'BooksController',
            'book' => $form->createView()
        ]);
    }
}
