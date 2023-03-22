<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/categorias', name: 'category_list', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository): JsonResponse
    {
        return $this->json([
            'data' => $categoryRepository->findAll(),
            'message' => 'Categorias encontradas com sucesso'
        ], Response::HTTP_OK);
    }

    #[Route('/categorias/{id}', name: 'category_show', methods: ['GET'])]
    public function show(int $id, CategoryRepository $categoryRepository): JsonResponse
    {
        return $this->json([
            'data' => $categoryRepository->find($id),
            'message' => 'Categoria encontrada com sucesso'
        ], Response::HTTP_OK);
    }

    #[Route('/categorias', name: 'category_create', methods: ['POST'])]
    public function create(Request $request, CategoryRepository $categoryRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $category = new Category();
        $category->setName($data['name']);
        
        $now = new \DateTimeImmutable('now', new \DateTimeZone('America/Sao_Paulo'));
        $category->setCreatedAt($now);
        $category->setUpdatedAt($now);

        $categoryRepository->save($category, true);

        return $this->json([
            'data' => $category,
            'message' => 'Categoria criada com sucesso'
        ], Response::HTTP_CREATED);
    }

    #[Route('/categorias/{id}', name: 'category_update', methods: ['PUT', 'PATCH'])]
    public function update(Request $request, int $id, CategoryRepository $categoryRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $category = $categoryRepository->find($id);
        $category->setName($data['name']);
        $category->setUpdatedAt(new \DateTimeImmutable('now', new \DateTimeZone('America/Sao_Paulo')));

        $categoryRepository->save($category, true);

        return $this->json([
            'data' => $category,
            'message' => 'Categoria atualizada com sucesso'
        ], Response::HTTP_OK);
    }

    #[Route('/categorias/{id}', name: 'category_delete', methods: ['DELETE'])]
    public function delete(int $id, CategoryRepository $categoryRepository): JsonResponse
    {
        $categoryRepository->remove($categoryRepository->find($id), true);

        return $this->json([
            'message' => 'Categoria removida com sucesso'
        ], Response::HTTP_OK);
    }
}
