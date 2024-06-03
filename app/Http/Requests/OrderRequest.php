<?php

namespace App\Http\Requests;

use App\Models\Client;
use App\Models\OrderStatus;
use App\Models\Service;
use App\Models\Worker;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderRequest extends FormRequest
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
        return [
            'service_id' => 'required|integer|exists:user_services,id',
            'worker_id' => 'required|integer|exists:user_workers,id',
            'client_id' => 'required|integer|exists:user_clients,id',
            'order_status_id' => 'sometimes|integer|exists:order_status,id',
            'payment_status' => 'required|boolean',
            'notification_start' => 'sometimes|accepted',
            'notification_reminder' => 'sometimes|accepted',
            'notification_end' => 'sometimes|accepted',
            'discount' => 'nullable|numeric',
            'total' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
        ];

    }
}
