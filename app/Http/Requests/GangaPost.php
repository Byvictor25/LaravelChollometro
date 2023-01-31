<?php

namespace App\Http\Requests;

use Faker\Core\File;
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
            'image' => ['required', \Illuminate\Validation\Rules\File::image()],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El título es obligatorio',
            'title.min' => 'El titulo tiene que tener mínimo 8 caracteres',
            'description.required' => 'La descripción es obligatoria',
            'description.min' => 'La descripción tiene que tener mínimo 20 caracteres',
            'url.required' => 'El enlace al chollo es obligatorio',
            'category.required' => 'Selecciona una categoria',
            'price.required' => 'El precio es obligatorio',
            'price_sale.required' => 'El precio de salida es obligatorio',
            'image.required'  => 'Selecciona una imagen para el chollo'
        ];
    }
}
