<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user = Auth::user();

        if ($user->email === $this->get('email')) {
            return [
                'name' => 'required',
                'surname' => 'required',
                'patronymic' => 'sometimes|nullable',
                'phone' => 'required|int',
                'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];
        } else {
            return [
                'name' => 'required',
                'surname' => 'required',
                'patronymic' => 'sometimes|nullable',
                'email' => 'required|email|unique:users',
                'phone' => 'required|int',
                'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];
        }
    }
}
