<?php

declare(strict_types = 1);

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

/**
 * Class UserRequest
 * @package App\Http\Requests
 */
class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {

        return [
            'name' => 'required|string',
            'role_id' => 'nullable',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->route()->parameter('user')),

            ],
        ];
        dd('ok');
    }

    /**
     * @return array|null
     */

    public function getRoleIds(): string
    {
        return $this->input('role_id');
    }
}
