<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isbn', TextType::class, [
                'label' => 'ISBN',
                'attr' => [
                    'placeholder' => 'ISBN',
                    'class' => 'form-control'
                ]
            ])
            ->add('title', TextType::class,[
                'label' => 'Titre',
                'attr' => [
                    'placeholder' => 'Titre',
                    'class' => 'form-control'
                ]
            ])
            ->add('author', TextType::class,[
                'label' => 'Titre',
                'attr' => [
                    'placeholder' => 'Auteur',
                    'class' => 'form-control'
                ]
                ])
            ->add('overview', TextType::class,[
                'label' => 'Titre',
                'attr' => [
                    'placeholder' => 'Résumé',
                    'class' => 'form-control'
                ]
                ])
            ->add('picture', FileType::class, [
                'label' => 'Image',
                'required' => false,
                'attr' => [
                    'accept' => 'image/*',
                ],
            ])
            ->add('browse', TextType::class,[
                'label' => 'Titre',
                'attr' => [
                    'placeholder' => 'Browse',
                    'class' => 'form-control'
                ]
                ])
                ->add('submit', SubmitType::class, [
                    'label' => 'Soumettre',
                    'attr' => [
                        'class' => 'btn btn-primary'
                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
