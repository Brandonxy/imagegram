<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// requests
use App\Http\Requests\UpdateProfile;
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

    public function editProfile()
    {
        return view('user.edit_profile');
    }

    public function updateProfile(UpdateProfile $request) 
    {
        $user = Auth::user();

        if ($request->hasFile('profile-picture')) {
            // la foto de perfil no es obligatoria porque aqui se
            // actualiza mas de un dato no solo la foto entonces
            // no necesariamente actualizaremos la misma
            $file = $request->file('profile-picture');
            $filename = str_random(10) . '.' .$file->getClientOriginalExtension();
            $file->move($this->profilePicturesFolder, $filename);
            $user->profile_picture = $filename;
        }

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->bio = $request->input('bio');
        $user->save();

        $request->session()->flash('profile_updated', 'El perfil se actualizo exitosamente.');
        return redirect()->route('profile.edit');
    }
}
