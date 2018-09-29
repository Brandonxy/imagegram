@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-body">
                    
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

                    <div class="row">
                        <div class="col-md-4">
                            <h2>Usuario: {{ Auth::user()->name }}</h2>
                        </div>
                        <div class="col-md-3">
                            <h2>Seguidores de {{ Auth::user()->name }}:</h2>
                            <ul>
                                @foreach (Auth::user()->followers as $follower)
                                    <li>{{ $follower->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h2>Siguiendo a: </h2>
                            <ul>
                                @foreach (Auth::user()->following as $user)
                                    <li>{{ $user->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
