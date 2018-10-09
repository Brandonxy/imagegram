@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Editando bio</div>
                <div class="panel-body">

                    <div class="col-md-12  col-xs-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="list-group">
                                    <a href="" class="list-group-item list-group-item-action active">
                                        Editar perfil
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="text-center">
                                        <label for="profile-picture">Foto de perfil</label>
                                        <br>
                                        @if (Auth::user()->hasProfilePicture())
                                            <img src="{{ Auth::user()->profile_picture }}" class="img-thumbnail"/>
                                        @else
                                            <img src="https://via.placeholder.com/150x150" alt="No profile picture" />
                                        @endif
                                                                                
                                        <input type="file" name="profile-picture" class="btn btn-xs">

                                        @if ($errors->has('profile-picture'))
                                            <div class="alert alert-danger">
                                                {{$errors->first('profile-picture') }}
                                            </div>
                                        @endif
                                    </div>
                                    <br>

                                    <label for="name"><strong>Nombre</strong></label>
                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                    <br>

                                    <label for="username"><strong>Nombre de usuario</strong></label>
                                    <input type="text" name="username" class="form-control" value="{{ Auth::user()->username }}">
                                    @if ($errors->has('username'))
                                        <div class="text-danger">
                                            {{ $errors->first('username') }}
                                        </div>
                                    @endif
                                    <br>

                                    <label for="bio"><strong>Bio</strong></label>
                                    <textarea name="bio" cols="70" rows="5" class="form-control">{{ Auth::user()->bio }}</textarea>
                                    @if ($errors->has('bio'))
                                        <div class="text-danger">
                                            {{ $errors->first('bio') }}
                                        </div>
                                    @endif
                                    <br>

                                    @if (Session::has('profile_updated'))
                                        <div class="alert alert-success">
                                            {{ Session::get('profile_updated') }}
                                        </div>
                                    @endif
                                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
