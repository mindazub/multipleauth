<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use DB;

/**
 * Class ExcelController
 * @package App\Http\Controllers
 */


class ExcelController extends Controller
{

    /**
     * PRODUCTS
     */

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function importExport(): View
    {
        return view('excel.index');
    }

    /**
     * @param $type
     * @return mixed
     */
    public function downloadExcel($type)
    {
        $data = Product::get()->toArray();
        return Excel::create('products_file', function($excel) use ($data) {
            $excel->sheet('firstsheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function importExcel()
    {
        DB::table('products')->truncate();

        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();

            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    dump($value);
                    $insert[] = [
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        'sku' => $value->sku,
                        'title' => $value->title,
                        'slug' => $value->slug,
                        'shortDescription' => $value->shortdescription,
                        'description' => $value->description,
                        'retailPrice' => $value->retailprice,
                        'wholeSalePrice' => $value->wholesaleprice,
                        'picture_one' => $value->picture_one,
                        'picture_two' => $value->picture_two,
                        'picture_three' => $value->picture_three,
                        'qty' => $value->qty

                    ];

                }
                if(!empty($insert)){
                    DB::table('products')->insert($insert);
                    session('success', 'Insert Record successfully.');
                    return redirect(route('product.index'));
                } else {
                    dd('empty insert');
                }
            }
        }
        return back();
    }

    /**
     * CATEGORIES
     */

    public function importExportCategories(): View
    {
        return view('excel.indexCategories');
    }

    /**
     * @param $type
     * @return mixed
     */
    public function downloadExcelCategories($type)
    {
        $data = Category::get()->toArray();
        return Excel::create('categories_file', function($excel) use ($data) {
            $excel->sheet('firstsheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function importExcelCategories()
    {
        DB::table('categories')->truncate();

        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();

            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = [
                        'title' => $value->title,
                        'slug' => $value->slug,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                }
                if(!empty($insert)){
                    DB::table('categories')->insert($insert);
                    session('success', 'Insert Category Record successfully.');
                    return redirect(route('category.index'));
                } else {
                    dd('empty insert');
                }
            }
        }
        return back();
    }


}

