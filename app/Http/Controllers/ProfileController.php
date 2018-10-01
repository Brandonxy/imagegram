<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// requests
use App\Http\Requests\UpdateProfilePicture;

// models
use App\User;

// traits
use Auth;

class ProfileController extends Controller
{

    
    /**
     * La carpeta donde se almacenan las fotos de perfil
     */
    private $profilePicturesFolder = "profile_pictures";

    public function index()
    {
        return view('user.profile');
    }

    public function updateProfilePicture(UpdateProfilePicture $request) 
    {
        $file = $request->file('profile-picture');
        $filename = str_random(10) . '.' .$file->getClientOriginalExtension();
        
        $user = Auth::user();
        $file->move($this->profilePicturesFolder,$filename);// subimos al servidor
        $user->profile_picture = $filename; // guardamos el nombre en la bd
        $user->save(); // guardamos los cambios.

        return redirect()->route('profile');
    }
}
