<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class LanguageRequest extends FormRequest
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
        $return = [];

        $return[] = [
            'country_phone_code' => 'required|string|max:7',
            'country' => 'required|max:40|string|unique:languages,country',
            'language' => 'required|string|max:40',
            'lang_code' => 'required|string|max:5',
            "flag_class" => 'required|string|max:20',
            'status' => 'required|in:"0", "1"',
        ];

        // For Update
        if ($this->filled('_method') && $this->get('_method') == 'PUT') {
            $id = $this->route('language')['id'];

            $return[] = [
                'country' => ['required', 'string','max:40', Rule::unique('languages', 'country')->ignore($id)],
                'country_phone_code' => ['required', 'string','max:30'],
                'language' => ['required', 'string','max:40'],
                'lang_code' => ['required', 'string','max:5'],
                "flag_class" => 'required|string|max:20',
                'view' => 'filled',
            ];
        }

        return Arr::collapse($return);
    }
}
