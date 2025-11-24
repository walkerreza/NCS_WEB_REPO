<?php

namespace App\Http\Requests;

use App\Models\Archive;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreArchiveRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'type' => ['required', 'string', Rule::in(Archive::$validTypes)],
            'pdf_path' => ['required', 'string', 'max:255'],
            'file_size' => ['required', 'integer', 'min:1'],
            'author' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer', 'min:1900', 'max:'.(date('Y') + 10)],
            'is_published' => ['sometimes', 'boolean'],
            'created_by' => ['required', 'exists:users,id'],
        ];
    }

    /**
     * Get custom error messages for validation.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'type.in' => 'Tipe dokumen harus penelitian atau pengabdian.',
            'year.min' => 'Tahun harus minimal 1900.',
            'year.max' => 'Tahun tidak valid.',
        ];
    }
}
