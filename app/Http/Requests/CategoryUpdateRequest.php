<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use App\Repositories\CategoryRepository;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CategoryUpdateRequest
 * @package App\Http\Requests
 */
class CategoryUpdateRequest extends CategoryStoreRequest
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
        $validator->after(
            /**
         * @param Validator $validator
         */
            function (Validator $validator) {
            if ($this->isMethod('put') && $this->slugExists()) {
                $validator->errors()
                    ->add('slug', 'This slug allreadey exists');
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
        /** @var CategoryRepository $categoryRepository */
        $categoryRepository = app(CategoryRepository::class);

        $categoryRepository->getBySlugAndNotId(
            $this->getSlug(),
            (int)$this->route()->parameter('category')
        );

        if (!empty($category)) {
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
