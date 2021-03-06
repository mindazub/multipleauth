<?php
declare(strict_types = 1);

namespace App\Repositories;


namespace App\Repositories;


use App\Category;
use App\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class CategoryRepository extends Repository
{

    /**
     * @return string
     */
    public function model(): string
    {
        return Category::class;
    }

    /**
     * @param string $slug
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     * @throws \Exception
     */
    public function getBySlug(string $slug)
    {
        return $this->makeQuery()
            ->where('slug', $slug)
            ->first();
    }

    /**
     * @param string $slug
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     * @throws \Exception
     */
    public function getBySlugAndNotId(string $slug, int $id)
    {
        return $this->getBySlugBuilder($slug)
            ->where('id', '!=', $id)
            ->first();
    }

    /**
     * @param string $slug
     * @return mixed
     * @throws \Exception
     */
    private function getBySlugBuilder(string $slug): Builder
    {
        return $this->makeQuery()
            ->where('slug', $slug);
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function getCategoryCount()
    {
        return $this->makeQuery()->count();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(int $id): JsonResponse
    {
        try {
            $category = Category::query()->findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return response(['message' => "Category by ID: $id not found."], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return response($category);
    }

}
