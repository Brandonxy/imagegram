@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="col-md-12  col-xs-12">
                        <div class="row">

                            <div class="col-md-3">

                                @if (Auth::user()->hasProfilePicture())
                                    <img src="{{ Auth::user()->profile_picture }}" class="img-thumbnail" />
                                @else
                                    <img src="https://via.placeholder.com/150x150" alt="No profile picture" />
                                @endif

                                <form action="{{ route('profile.update.picture') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div style="overflow-x: hidden;border: 1px solid #f1f1f1; margin: 5px 0px 3px 0px;">
                                        <input type="file" name="profile-picture" class="btn btn-xs">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-xs">Actualizar</button>
                                    
                                    @if ($errors->has('profile-picture'))
                                        <div class="alert alert-danger">
                                            {{$errors->first('profile-picture') }}
                                        </div>
                                    @endif
                                </form>
                            </div>                            
                            
                            <div class="col-md-7">
                                <p>
                                    <h1>{{ Auth::user()->name }} <small>{{ Auth::user()->username }}</small></h1>
                                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Editar perfil</a>
                                </p>
                                
                                <strong>
                                    Seguidores {{ Auth::user()->followers->count() }}
                                    Siguiendo {{ Auth::user()->following->count() }}
                                </strong>
                                <br>

                                <span>
                                    {{ Auth::user()->bio }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">Tus fotos</div>

                <div class="panel-body">
                    <div class="container">
                        <div class="row text-lg-left">
                            @foreach (Auth::user()->posts as $post)
                                <div class="col-md-2">
                                    <div class="card mb-2 box-shadow">
                                        
                                        <img src="{{ $post->photo }}" 
                                            
                                            v-on:click="openModal"
                                            photo="{{ $post->photo }}"
                                            description="{{ $post->description }}"

                                            alt="{{ $post->description }}" 
                                            height="150">

                                    </div>
                                </div>
                            @endforeach
                        
                        </div>

                        <div class="modal fade" id="post_modal" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">{{ Auth::user()->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img v-bind:src="photo" width="400">
                                                </div>
                                                <div class="col-md-3">
                                                    <strong class="label label-default">{{ Auth::user()->name }}</strong> 
                                                    @{{ description }}
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                              </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts') 
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                photo: null,
                description: null,
            },
            methods: {
                openModal: function(e) {
                    this.photo = e.target.getAttribute('photo')
                    this.description = e.target.getAttribute('description')
                    $('#post_modal').modal()
                }
            }
        });
    </script>
@endsection