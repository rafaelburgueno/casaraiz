@extends('layouts.plantilla')

@section('title', 'Tienda')
@section('meta-description', 'metadescripción de la pagina Tienda')

@section('content')

<div>
    <h1>pagina /tienda</h1>

    @if (Auth::check())
        {{--<p>Hello {{ $name }}</p>--}}
        <div>{{ Auth::user()->name }}</div>
    @else
        <p>no estas logueado.</p>
    @endif
</div>

@endsection