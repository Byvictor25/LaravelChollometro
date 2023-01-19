<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GangaPost extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:8',
            'description' => 'required|min:20',
            'url' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'price_sale' => 'required|numeric',
            'image' => 'required',
        ];
    }
}
