@extends('layouts.plantilla')

@section('title', 'Agenda')
@section('meta-description', 'metadescripción de la pagina Agenda')

@section('content')

<div>
    <h1>pagina /agenda</h1>

    @if (Auth::check())
        {{--<p>Hello {{ $name }}</p>--}}
        <div>{{ Auth::user()->name }}</div>
    @else
        <p>no estas logueado.</p>
    @endif
</div>

@endsection