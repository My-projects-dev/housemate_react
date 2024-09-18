<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class AnnouncementRequest extends FormRequest
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
            'status' => 'nullable|in:"0", "1"',
            'user_id' => 'required|integer|exists:users,id',
            'language' => 'required|string|exists:languages,lang_code',
            'country' => 'required|string|exists:languages,language',
            'type' => 'required|in:"roommate", "rent"',
            'home' => 'required|in:"yes_home", "no_home"',
            'title' => 'required|string|max:255',
            'slug' => 'required|max:300',
            'address' => 'required|string|max:555',
            'home_type' => 'required|in:"repair_old","repair_new","courtyard_house"',
            'floor' => 'nullable|integer|max:255',
            'area' => 'nullable|integer|max:999999',
            'repair' => 'nullable|in:"repaired", "unrepaired"',
            'room_count' => 'nullable|integer|max:50',
            'price' => 'nullable|integer',
            'currency' => 'required|string|exists:languages,currency',
            'duration' => 'nullable|in:"Diary", "Weekly","Monthly","Yearly"',
            'age_min' => 'nullable|min:1|max:3',
            'age_max' => 'nullable|min:1|max:3',
            'number_people' => 'nullable|min:1|max:50',
            'number_inhabitants' => 'nullable|min:0',
            'country_phone_code' => 'nullable|string|exists:languages,country_phone_code',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'comment' => 'nullable|string|max:65535',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp,jfif|max:2048',
        ];

        if ($this->home === 'no_home') {
            $return[] = [
                'address' => 'nullable|string|max:555',
                'home_type' => 'nullable|in:"repair_old","repair_new","courtyard_house"',
                'currency' => 'nullable|string|exists:languages,currency',
            ];
        }
        return Arr::collapse($return);
    }
}
