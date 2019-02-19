<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Psy\Util\Json;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return JsonResponse
     */
    protected function index(): JsonResponse
    {
        try{
            $categories = $this->categoryRepository->paginate(5);

            return response()->json([
                'success' => true,
                'data' => $categories,
            ]);
        } catch (\Throwable $exception) {
            logger($exception->getMessage(), [
                'code' => $exception->getCode(),
            ]);
        }
    }

    /**
     * @param int $categoryId
     * @return JsonResponse
     */
    public function show(int $categoryId): JsonResponse
    {
        try {
            /** @var CategoryRepository $categorySingle */
            $categorySingle = $this->categoryRepository->show($categoryId);

            return response()->json([
                'success' => true,
                'data' => $categorySingle,
            ]);
        } catch (\Throwable $exception) {
            logger($exception->getMessage(), [
                'code' => $exception->getCode(),
            ]);
        }
    }
}
