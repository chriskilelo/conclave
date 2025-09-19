<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHonorificRequest extends FormRequest
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
            'name' => 'required|string|max:150|unique:honorifics,name',
            'description' => 'nullable|string',
            'is_active' => 'sometimes|boolean',
            'created_by' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The honorific name is required.',
            'name.string' => 'The honorific name must be a string.',
            'name.max' => 'The honorific name should be 150 characters or less.',
            'name.unique' => 'This honorific already exists.',
            'description.string' => 'The description must be a string.',
            'is_active.boolean' => 'The is_active field must be true or false.',
            'created_by.required' => 'This created_by field is required.',
            'created_by.string' => 'This should be a string.',
            'created_by.max' => 'This created_by may not be greater than 255 characters.',
        ];
    }
}
