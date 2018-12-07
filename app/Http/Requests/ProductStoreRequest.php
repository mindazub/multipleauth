<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * Class ProductStoreRequest
 * @package App\Http\Requests
 */
class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * TAISYTI STORE REquEST O PASKUI UPDATE
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'sku'=>'required|min:5|max:25|string',
            'title' => 'required|min:3|max:191|string',
            'qty' => 'required|min:0|numeric',
            'shortDescription'=> 'required',
            'description' => 'required',
            'retailPrice' => 'required|min:0|numeric',
            'wholeSalePrice' => 'required|min:0|numeric',
            'picture_one' => 'nullable|image|min:1|max:2048|dimensions:min_width:10,max_width:3000',
            'picture_two' => 'nullable|image|min:1|max:2048|dimensions:min_width:10,max_width:3000',
            'picture_three' => 'nullable|image|min:1|max:2048|dimensions:min_width:10,max_width:3000',
        ];
    }


    /**
     * @return float
     */
    public function getRetailPrice(): float
    {
        return (float)$this->input('retailPrice');
    }

    /**
     * @return float
     */
    public function getWholeSalePrice(): float
    {
        return (float)$this->input('wholeSalePrice');
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->input('sku');
    }

    /**
     * @return int
     */
    public function getQty(): int
    {
        return (int)$this->input('qty');
    }

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->input('shortDescription');
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->input('description');
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return Str::slug($this->getTitle());
    }

    /**
     * @return null|string
     */
    public function getTitle(): ? string
    {
        return $this->input('title');
    }

    /**
     * @return UploadedFile|null
     */
    public function getPictureOne(): ? UploadedFile
    {
        return $this->file('picture_one');
    }

    /**
     * @return UploadedFile|null
     */
    public function getPictureTwo(): ? UploadedFile
    {
        return $this->file('picture_two');
    }

    /**
     * @return UploadedFile|null
     */
    public function getPictureThree(): ? UploadedFile
    {
        return $this->file('picture_three');
    }

    /**
     * @return array
     */
    public function getCategoriesIds(): array
    {
        return $this->input('categories', []);
    }

}
