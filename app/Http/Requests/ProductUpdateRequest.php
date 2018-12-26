<?php

/**
 * mindazub
 */

declare(strict_types = 1);

namespace App\Http\Requests;

use App\Repositories\ProductRepository;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class CategoryUpdateRequest
 * @package App\Http\Requests
 */
class ProductUpdateRequest extends ProductStoreRequest
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
     * @return array
     */
    public function rules(): array
    {
        return parent::rules();
    }

    /**
     * @return Validator
     */
    protected function getValidatorInstance(): Validator
    {
        $validator = parent::getValidatorInstance();
        $validator->after(function (Validator $validator) {
            if ($this->isMethod('put') && $this->slugExists()) {
                $validator->errors()
                    ->add('slug', 'This slug allready exists');
            }

            return;
        });

        return $validator;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    private function slugExists(): bool
    {
        /** @var ProductRepository $productRepository */
        $productRepository = app(ProductRepository::class);

        $productRepository->getBySlugAndNotId(
            $this->getSlug(),
            (int)$this->route()->parameter('product')
        );

        if (!empty($product)) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return ($this->input('slug')) ?? parent::getSlug();
    }


}
