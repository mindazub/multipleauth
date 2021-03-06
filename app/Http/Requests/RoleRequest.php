<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
//        return Auth::check();
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'title' => [
                'required',
                'string',
                'min:6',
                'unique:roles'
            ],
            'discount' => [
                'required',
                'min:0',
                'max:50',
                'numeric'
            ]
        ];

        if ($this->isMethod('PUT')) {
            $rules['title'] = 'required|min:2';
        }


        return $rules;
    }


}
