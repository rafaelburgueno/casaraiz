@extends('layouts.plantilla')

@section('title', 'Blog')
@section('meta-description', 'metadescripción de la pagina Blog')

@section('content')

<div>
    <h1>pagina /blog</h1>

    @if (Auth::check())
        {{--<p>Hello {{ $name }}</p>--}}
        <div>{{ Auth::user()->name }}</div>
    @else
        <p>no estas logueado.</p>
    @endif
</div>


@endsection