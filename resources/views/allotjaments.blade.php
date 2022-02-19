@extends('layouts.template')
@section('page-title', 'Els meus allotjaments')
@section('body')
<h1 class="page-title">Allotjaments</h1>
<searchbar-component></searchbar-component>
<div class="flex-accommodation-main-container">
    @foreach ($allotjaments as $allotjament)
    <a class="flex-accommodation-container white-text" href="/vistaAllotjament?id={{ $allotjament->id }}">
        <div class="foto-allotjament">
            <img src="https://st3.idealista.com/news/archivos/styles/imagen_big_lightbox/public/2018-11/casa_prefabricada.jpg?sv=fmQ3Et0_&itok=pA16oefo" alt="" class="accommodation-page-image">
        </div>
        <div class="contingut-allotjament">
            <h1>{{ $allotjament->nom }}</h1>
            <p>{{ $allotjament->descripcio }}</p>
        </div>
    </a>
    @endforeach
</div>
@endsection