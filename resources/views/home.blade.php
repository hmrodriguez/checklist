@extends('layouts.app')

@section('content')
    @if (Auth::check() && Auth::user()->name == "Admin")    
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de usuarios registrados</div>

                    <div class="panel-body">
                        <div class="list-group">
                            @foreach ($usuarios as $usuario)
                                <a href="/usuario/{{ $usuario->id }}" class="list-group-item">{{ $usuario->name }} <span class="badge">{{ $usuario->checklist->count() }}</span></a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection