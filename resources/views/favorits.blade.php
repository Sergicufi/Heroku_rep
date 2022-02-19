@extends('layouts.template')
@section('page-title', 'Favorits')
@section('body')
    <h1 class="page-title">Favorits</h1>
    <div class="favorite-main-container">
        @foreach ($favorits as $favorit)
        <a class="most-wanted-card" href="/vistaAllotjament?id={{$favorit->habitatge_id}}">
            <div class="card-image">
            <img src="https://st3.idealista.com/news/archivos/styles/imagen_big_lightbox/public/2018-11/casa_prefabricada.jpg?sv=fmQ3Et0_&amp;itok=pA16oefo" alt="">
            </div>
            <div class="card-text">
                <p>{{ $favorit->nom }}</p>
            </div>
        </a>
        @endforeach
    </div>
@endsection
