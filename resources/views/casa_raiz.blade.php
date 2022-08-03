@extends('layouts.plantilla')

@section('title', 'CasaRaiz')
@section('meta-description', 'metadescripción de la pagina CasaRaíz')

@section('content')

<div>
    <h1>pagina /casa_raiz</h1>

    @if (Auth::check())
        {{--<p>Hello {{ $name }}</p>--}}
        <div>{{ Auth::user()->name }}</div>
    @else
        <p>no estas logueado.</p>
    @endif
</div>


@endsection