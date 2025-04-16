<?php

namespace App\Controller;

use App\Entity\Note;
use App\Form\NoteType;
use App\Service\NoteFormatter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NoteController extends AbstractController
{
    #[Route('/note', name: 'note_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $notes = $em->getRepository(Note::class)->findAll();
        return $this->render('note/index.html.twig', ['notes' => $notes]);
    }

    #[Route('/note/{id<\d+>}', name: 'note_show')]
    public function show(?Note $note, NoteFormatter $formatter): Response
    {   
        if (!$note) {
            throw $this->createNotFoundException('Note not found');
        }

        $formatted = $formatter->format($note);
        return $this->render('note/show.html.twig', ['formattedNote' => $formatted]);
    }

    #[Route('/note/new', name: 'note_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $note = new Note();
        $form = $this->createForm(NoteType::class,$note);
        $form = $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            $note->setCreatedAt(new \DateTimeImmutable());
            $em->persist($note);
            $em->flush();
            return $this->redirectToRoute('note_index');
        }
        return $this->render('note/new.html.twig', [
            'form' => $form->createView(),
            'title' => 'Create Note',
            'button_label' => 'Save',
        ]);
    }

    #[Route('/note/{id<\d+>}/edit', name: 'note_edit')]
    public function edit(Request $request, ?Note $note, EntityManagerInterface $em): Response
    {
        if (!$note) {
            throw $this->createNotFoundException('Note not found');
        }

        $form = $this->createForm(NoteType::class, $note);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->flush();
            return $this->redirectToRoute('note_index');
        }

        return $this->render('note/edit.html.twig', [
            'form' => $form->createView(),
            'title' => 'Edit Note',
            'button_label' => 'Update',
        ]);    
    }

    #[Route('/note/{id<\d+>}/delete', name: 'note_delete', methods : ['POST'])]
    public function delete(?Note $note, EntityManagerInterface $em): Response
    {
        if (!$note) {
            throw $this->createNotFoundException('Note not found');
        }
        
        $em->remove($note);
        $em->flush();
        return $this->redirectToRoute('note_index');
    }
}
