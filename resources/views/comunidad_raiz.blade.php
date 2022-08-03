@extends('layouts.plantilla')

@section('title', 'Comunidad Raiz')
@section('meta-description', 'metadescripción de la pagina Comunidad Raíz')

@section('content')

<div>
    <h1>pagina /comunidad_raiz</h1>

    @if (Auth::check())
        {{--<p>Hello {{ $name }}</p>--}}
        <div>{{ Auth::user()->name }}</div>
    @else
        <p>no estas logueado.</p>
    @endif
</div>

@endsection