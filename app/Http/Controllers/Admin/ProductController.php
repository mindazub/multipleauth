<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{

    /**
     *
     */
    const COVER_DIRECTORY = 'public/products';

    /**
     * @var ProductRepository
     */
    private $productRepository;


    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * ProductController constructor.
     * @param ProductRepository $productRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {

//        $this->middleware('auth:admin');
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::paginate(5);

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     * @throws \Exception
     */
    public function create(): View
    {
        /** @var Collection $categories */
        $categories = $this->categoryRepository->all();

        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductStoreRequest $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $data = [
            'title' => $request->getTitle(),
            'slug' => $request->getSlug(),
            'sku'=> $request->getSku(),
            'qty' => $request->getQty(),

            'shortDescription'=> $request->getShortDescription(),
            'description' => $request->getDescription(),
            'retailPrice' => $request->getRetailPrice(),
            'wholeSalePrice' => $request->getWholeSalePrice(),
            'picture_one' => $request->getPictureOne() ? $request->getPictureOne()->store(self::COVER_DIRECTORY) : null,
            'picture_two' => $request->getPictureTwo() ? $request->getPictureTwo()->store(self::COVER_DIRECTORY) : null,
            'picture_three' => $request->getPictureThree() ? $request->getPictureThree()->store(self::COVER_DIRECTORY) : null,
        ];


        $product = $this->productRepository->create($data);


        $product->categories()->sync($request->getCategoriesIds());


        return redirect()
            ->route('product.index')
            ->with('status', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return View
     * @throws \Exception
     */
    public function show(Product $product): View
    {
        $categories = $this->categoryRepository->all();

        return view('product.show', compact('product','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return View
     * @throws \Exception
     */
    public function edit(Product $product): View
    {
        $categories = $this->categoryRepository->all();

        $categoriesIds = $product->categories->pluck('id')->toArray();

        return view('product.edit', compact('product', 'categories', 'categoriesIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductUpdateRequest|Request $request
     * @param $productId
     * @return void
     * @throws \Exception
     * @internal param int $id
     */
    public function update(ProductUpdateRequest $request, $productId)
    {

        $data = [
            'title' => $request->getTitle(),
            'slug' => $request->getSlug(),
            'sku'=> $request->getSku(),
            'qty' => $request->getQty(),
            'shortDescription'=> $request->getShortDescription(),
            'description' => $request->getDescription(),
            'retailPrice' => $request->getRetailPrice(),
            'wholeSalePrice' => $request->getWholeSalePrice(),
        ];

        if ($request->getPictureOne()) {

            $data['picture_one'] = $request->getPictureOne()->store(self::COVER_DIRECTORY);
        }

        if ($request->getPictureTwo()) {

            $data['picture_two'] = $request->getPictureTwo()->store(self::COVER_DIRECTORY);
        }

        if ($request->getPictureThree()) {

            $data['picture_three'] = $request->getPictureThree()->store(self::COVER_DIRECTORY);
        }

        $this->productRepository->update($data, $productId);

        $product = $this->productRepository->find($productId);

        $product->categories()->sync($request->getCategoriesIds());

//        dd($product->categories());

//        Ateiciai, kai bus produktas su kuo nors suristas, pvz Resource->pictureOne() ar kazkas panasaus.
//
//        /** @var Article $article */
//        $article = $this->articleRepository->find($articleId);
//
//        $article->categories()->sync($request->getCategoriesIds());


        return redirect()
            ->route('product.index')
            ->with('status', 'Product Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $articleId
     * @return RedirectResponse|void
     * @internal param int $id
     */
    public function destroy(int $articleId): RedirectResponse
    {
        try {
            $this->productRepository->delete(['id' => $articleId]);

            return redirect()
                ->back()
                ->with('status', 'Product deleted successfully!');
        } catch (\Throwable $exception) {
            return redirect()
                ->back()
                ->with('error', $exception->getMessage());
        }
    }
}
