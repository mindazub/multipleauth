<?php

namespace App\Http\Controllers\Front;

use App\Cart;
use App\Category;
use App\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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

        #todo calculate UserPriceByRole and transmit it to the view.
        #todo taking Auth::user(), getting Role and Discount, then sending it to HelperFunction UserPriceByRole
        #todo and then transmitt it to frontend.

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

        return view('front.index', compact('categoryFromView', 'products', 'categories'));
    }


    public function productWithCategories()
    {
        
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProduct(Product $product){

        $categories = $this->categoryRepository->all();

        $product = $this->productRepository->getBySlug($product->slug);

        return view('front.show', compact('categories', 'product'));
    }

    public function addToCart(Product $product, Request $request){

//      dd($product->toArray());

        $product = $this->productRepository->getBySlug($product->slug);

//      dd($product->sku);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);

        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        
//        dd($request->session()->get('cart'));

        return redirect()->back();

    }

    public function showCart()
    {
        if(!Session::has('cart'))
        {
            return view('cart.index', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('cart.index', [
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice
            ]);
        
    }

    public function checkout()
    {
        if(!Session::has('cart'))
        {
            return view('cart.index', ['products' => null]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $total = $cart->totalPrice;

        return view('cart.checkout', ['total' => $total]);

    }

}
