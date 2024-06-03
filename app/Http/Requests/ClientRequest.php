<?php

namespace App\Http\Requests;


use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ClientRequest extends FormRequest
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
        $clientId = $this->input('id');
        $client = Client::find($clientId);

        if ($client) {
            if ($client->email === $this->get('email')) {
                return [
                    'name' => 'required',
                    'surname' => 'required',
                    'patronymic' => 'sometimes|nullable',
                    'phone' => 'required|int',
                    'comment' => 'nullable',
                    'birth_date' => 'nullable|date',
                ];
            }
        }
        return [
                'name' => 'required',
                'surname' => 'required',
                'patronymic' => 'sometimes|nullable',
                'email' => 'required|email|unique:clients,email',
                'phone' => 'required|int',
                'comment' => 'nullable',
                'birth_date' => 'nullable|date',
        ];
    }
}
