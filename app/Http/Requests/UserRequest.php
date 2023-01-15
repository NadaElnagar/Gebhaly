<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|string|alpha_num|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => ['required', 'string', 'min:8', 'confirmed'],

            ];
        }
        if ($this->isMethod('put')) {
            return [
                'name' => 'string|alpha_num|max:255',
                'email' => 'email|unique:users,email',
                'password' => [ 'string', 'min:8', 'confirmed'],
            ];
        }
    }
}
