<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{

    public function attributes()
    {
        return [
            'title' => 'Sarlovha',
            'author' => "Mualliflar",
            'pages' => "Sahifalar",
            'date' => "Sana",
            'issue_id' => "Jurnal soni",
            'keywords' => "Kalit so'zlar",
            'annotations' => "Anotatsiya",
            'file' => 'Fayl',
        ];
    }

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
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'pages' => 'required|max:255',
            'date' => 'required|max:255',
            'issue_id' => 'required',
            'keywords' => 'required',
            'annotations' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx',
        ];
    }
}
