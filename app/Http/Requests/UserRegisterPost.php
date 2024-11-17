<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Task as TaskModel;
use Illuminate\Support\Facades\Hash;

class UserRegisterPost extends FormRequest
{


    public function index()
    {
        return view('/user/register');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:128'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', 'max:72','confirmed'],
        ];
    }
}
