<?php

namespace App\Http\Controllers;

use App\Photo;

// request
use Illuminate\Http\Request;
use App\Http\Requests\UploadPhoto;

// models
use App\User;
use App\Post;

// facades
use Auth;


class PostsController extends Controller
{

    private $userPhotosFolder = "photos";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Subir una nueva foto
     *
     * @param  App\Requests\UploadPhoto $request
     * @return \Illuminate\Http\Response
     */
    public function uploadPhoto(UploadPhoto $request) 
    {
        $file = $request->file('photo');
        $description = $request->get('description');
        $filename = str_random(10) . '.' .$file->getClientOriginalExtension();
        
        $user = Auth::user();
        $post = new Post;
        $file->move($this->userPhotosFolder, $filename);// subimos al servidor
        
        $post->user_id = $user->id; // Asociamos el post al usuario actual
        $post->photo = $filename;
        $post->description = $description;
        $post->save();
        
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
