<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfilePicture extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'profile-picture' => 'required|image'
        ];
    }

    public function messages() 
    {
        return [
            'profile-picture.required' => 'No has seleccionado ningun archivo.',
            'profile-picture.image' => 'Debes subir una imagen.',
        ];
    }
}
