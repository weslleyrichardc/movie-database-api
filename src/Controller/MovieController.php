<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\CategoryRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    #[Route('/filmes', name: 'movies_list', methods: ['GET'])]
    public function index(MovieRepository $movieRepository): JsonResponse
    {
        return $this->json([
            'data' => $movieRepository->findAll(),
            'message' => 'Filmes encontrados com sucesso'
        ], Response::HTTP_OK);
    }

    #[Route('/filmes/{id}', name: 'movie_show', methods: ['GET'])]
    public function show(int $id, MovieRepository $movieRepository): JsonResponse
    {
        return $this->json([
            'data' => $movieRepository->find($id),
            'message' => 'Filme encontrado com sucesso'
        ], Response::HTTP_OK);
    }

    #[Route('/filmes', name: 'movie_create', methods: ['POST'])]
    public function create(Request $request, MovieRepository $movieRepository, CategoryRepository $categoryRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        $movie = new Movie();
        $movie->setTitle($data['title']);
        $movie->setYear($data['year']);
        $movie->setDirector($data['director']);
        $movie->setSynopsis($data['synopsis']);

        $category = $categoryRepository->find($data['category']);
        if ($category) {
            $movie->addCategory($category);
        }

        $now = new \DateTimeImmutable('now', new \DateTimeZone('America/Sao_Paulo'));
        $movie->setCreatedAt($now);
        $movie->setUpdatedAt($now);

        $movieRepository->save($movie, true);

        return $this->json([
            'data' => $movie,
            'message' => 'Filme criado com sucesso'
        ], Response::HTTP_CREATED);
    }

    #[Route('/filmes/{id}', name: 'movie_update', methods: ['PUT', 'PATCH'])]
    public function update(Request $request, int $id, MovieRepository $movieRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $movie = $movieRepository->find($id);        
        $movie->setTitle($data['title']);
        $movie->setYear($data['year']);
        $movie->setDirector($data['director']);
        $movie->setSynopsis($data['synopsis']);
        $movie->setUpdatedAt(new \DateTimeImmutable('now', new \DateTimeZone('America/Sao_Paulo')));

        $movieRepository->save($movie, true);

        return $this->json([
            'data' => $movie,
            'message' => 'Filme atualizado com sucesso'
        ], Response::HTTP_OK);
    }

    #[Route('/filmes/{id}', name: 'movie_delete', methods: ['DELETE'])]
    public function delete(int $id, MovieRepository $movieRepository): JsonResponse
    {
        $movieRepository->remove($movieRepository->find($id), true);
        
        return $this->json([
            'message' => 'Filme removido com sucesso'
        ], Response::HTTP_OK);
    }
}
