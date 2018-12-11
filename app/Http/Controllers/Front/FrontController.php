<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * FrontController constructor.
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->paginate(10);
        $products = $this->productRepository->paginate(10);

        return view('front.index', compact('categories', 'products'));
    }


    public function categoryWithProducts(Category $category)
    {
//        $category = $this->categoryRepository->find($category);

//        $productsForCategory = $category->products->get();

        $productsForCategory = $category->products->toArray();
        
        return view('front.index', compact('category', 'productsForCategory'));
    }


    public function productWithCategories()
    {
        
    }
    public function show(){
        return view('front.show');
    }
}
