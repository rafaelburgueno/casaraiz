@extends('layouts.plantilla')

@section('title', 'Home')
@section('meta-description', 'metadescripción de la pagina Home')

@section('content')

<div>
    <h1>pagina home</h1>

    @if (Auth::check())
        {{--<p>Hello {{ $name }}</p>--}}
        <div>{{ Auth::user()->name }}</div>

        <div>
            @dump(Auth::user()->email)
        </div>

    @else
        <p>no estas logueado.</p>
    @endif
</div>


@endsection