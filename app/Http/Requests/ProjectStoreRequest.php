<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => 'nullable|string',
            'email' => 'required|email',
            'phone_number' => 'nullable|string',
            'project_name' => 'required|string',
            'project_type_id' => 'required|exists:project_types,id',
            'experience_id' => 'required|exists:experiences,id',
            'description' => 'nullable|string',
            'attachments.*' => 'nullable|file', // Validate file attachments
            'attachments.*.type' => 'nullable|string', // Validate file attachments
        ];
    }
}
