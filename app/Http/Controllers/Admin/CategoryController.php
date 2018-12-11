<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CategoryController extends Controller
{

    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->middleware('auth:admin');
        $this->categoryRepository = $categoryRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     * @throws \Exception
     */
    public function index(): View
    {
        $categories = $this->categoryRepository->paginate(5);

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryStoreRequest $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        $this->categoryRepository->create([
            'title' => $request->getTitle(),
            'slug' => $request->getSlug(),
        ]);

        return redirect()
            ->route('category.index')
            ->with('status', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function show(Category $category): View
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryUpdateRequest $request
     * @param int $categoryId
     * @return RedirectResponse
     * @throws \Exception
     */
    public function update(CategoryUpdateRequest $request, int $categoryId): RedirectResponse
    {
        $this->categoryRepository->update([
            'title' => $request->getTitle(),
            'slug' => $request->getSlug()

        ], $categoryId);

        return redirect()
            ->route('category.index')
            ->with('status', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $categoryId
     * @return RedirectResponse
     */
    public function destroy(int $categoryId): RedirectResponse
    {
        try {
            $this->categoryRepository->delete(['id' => $categoryId]);
            return redirect()
                ->route('article.index')
                ->with('status', 'Article delete successfully!');
        } catch (\Throwable $exception) {
            return redirect()
                ->route('category.index')
                ->with('status', $exception->getMessage());
        }
    }
}
