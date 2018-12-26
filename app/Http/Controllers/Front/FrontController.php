<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Product;
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
        $categories = $this->categoryRepository->all();
        $products = $this->productRepository->paginate(6);

        return view('front.index', compact('categories', 'products'));
    }


    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryWithProducts(string $slug)
    {
        $categories = $this->categoryRepository->all();

        $categoryFromView = $this->categoryRepository->getBySlug($slug);

        $products = $categoryFromView->products()->paginate();

        return view('front.index', compact('category', 'products', 'categories'));
    }


    public function productWithCategories()
    {
        
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProduct(Product $product){

        $categories = $this->categoryRepository->paginate();

        $product = $this->productRepository->getBySlug($product->slug);

        return view('front.show', compact('categories', 'product'));
    }
}
