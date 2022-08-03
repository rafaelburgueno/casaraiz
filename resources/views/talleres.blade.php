@extends('layouts.plantilla')

@section('title', 'Talleres')
@section('meta-description', 'metadescripción de la pagina Talleres')

@section('content')

<div>
    <h1>pagina /talleres</h1>

    @if (Auth::check())
        {{--<p>Hello {{ $name }}</p>--}}
        <div>{{ Auth::user()->name }}</div>
    @else
        <p>no estas logueado.</p>
    @endif
</div>

@endsection