@extends('layouts.plantilla')

@section('title', 'Perfil')
@section('meta-description', 'metadescripción de la pagina Perfil')

@section('content')

<div>
    <h1>pagina /perfil</h1>

    @if (Auth::check())
        {{--<p>Hello {{ $name }}</p>--}}
        <div>{{ Auth::user()->name }}</div>
    @else
        <p>no estas logueado.</p>
    @endif
</div>

@endsection