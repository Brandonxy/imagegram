<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
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
            'profile-picture' => 'image',
            'name' => 'required',
            'username' => 'required',
            'bio' => 'required',
        ];
    }

    public function messages() 
    {
        return [
            'profile-picture.image' => 'Solo se permiten fotos',
            'name.required' => 'El nombre esta vacio..',
            'username.required' => 'El nombre de usuario esta vacío.',
            'bio.required' => 'La bio esta vacía.',
        ];
    }
}
