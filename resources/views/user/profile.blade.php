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
                            </div>                            
                            
                            <div class="col-md-7">
                                <h1>
                                {{ Auth::user()->name }}
                                </h1>

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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
