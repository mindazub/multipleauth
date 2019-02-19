<?php

declare(strict_types=1);

namespace App\Services;


use App\Product;
use App\Repositories\ProductRepository;
use App\Role;
use App\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PriceListService {

    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     *
     */
    public function calculatePricesByRoles()
    {

        $roles = Role::all();

        $products = $this->productRepository->all();

        DB::table('price_lists')->truncate();

        foreach ($roles as $role)
        {
            $productsChanged = [];

//            TODO: duomenis imti su chunk product data
            foreach ($products as $product)
            {
                $item = [
                    'role_id' => $role->id,
                    'product_id'=> $product->id,
                    'price' => $product->retailPrice - (($product->retailPrice * $role->discount) / 100),
                ];
                $productsChanged[] = $item;
            }

            DB::table('price_lists')->insert($productsChanged);
        }
    }

    public function getProductsByUser(int $userId): LengthAwarePaginator
    {
        $priceProductIds = User::find($userId)->roles->priceList->pluck('id');

        //#TODO galima padaryti ir su daug joinu - virsutine eilute. Uzduotis

        $products = Product::query()
            ->select(['products.*', 'price_lists.price'])
            ->join('price_lists', function (JoinClause $join) use ($priceProductIds) {
                $join->on('products.id', '=', 'price_lists.product_id')
                    ->whereIn('price_lists.id', $priceProductIds);
                    })
            ->paginate();

//        dd($products->toArray());

        return $products;

    }
}
