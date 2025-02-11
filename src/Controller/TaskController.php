<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    // Route pour lister toutes les tâches
    #[Route('/api/tasks', name: 'task_index', methods: ['GET'])]
    public function index(TaskRepository $taskRepository): Response
    {
        $tasks = $taskRepository->findAll();
        return $this->json($tasks);
    }

    // Route pour afficher une tâche spécifique
    #[Route('/api/tasks/{id}', name: 'task_show', methods: ['GET'])]
    public function show(Task $task): Response
    {
        return $this->json($task);
    }

    // Route pour créer une nouvelle tâche
    #[Route('/api/tasks', name: 'task_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);

        // Création de la tâche
        $task = new Task();
        $task->setTitle($data['title']);
        $task->setStatus($data['status']);
        $task->setDescription($data['description']);

        // Sauvegarde dans la base de données
        $entityManager->persist($task);
        $entityManager->flush();

        return $this->json($task, Response::HTTP_CREATED);
    }

    // Route pour mettre à jour une tâche
    #[Route('/api/tasks/{id}', name: 'task_update', methods: ['PUT'])]
    public function update(Request $request, Task $task, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);

        // Mise à jour des informations de la tâche
        $task->setTitle($data['title']);
        $task->setStatus($data['status']);
        $task->setDescription($data['description']);

        // Enregistrement des modifications dans la base de données
        $entityManager->flush();

        return $this->json($task);
    }

    // Route pour supprimer une tâche
    #[Route('/api/tasks/{id}', name: 'task_delete', methods: ['DELETE'])]
    public function delete(Task $task, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($task);
        $entityManager->flush();

        return $this->json(['message' => 'Task deleted successfully']);
    }
}
