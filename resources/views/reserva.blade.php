@extends('layouts.template')
@section('page-title', 'Les meves reserves')
@section('body')
<h1 class="page-title">Les meves reserves</h1>
<searchbarres-component></searchbarres-component>
<div class="flex-accommodation-main-container">
    @foreach ($reserva as $res)
    <a class="flex-accommodation-container white-text" href="/vistaAllotjament?id={{ $res->habitatge_id }}">
        <div class="foto-allotjament">
            <img src="https://st3.idealista.com/news/archivos/styles/imagen_big_lightbox/public/2018-11/casa_prefabricada.jpg?sv=fmQ3Et0_&itok=pA16oefo" alt="" class="accommodation-page-image">
        </div>
        <div class="contingut-allotjament">
            <h1>{{ $res->nom_habitatge }}</h1>
            <p>{{ $res->des_habitatge }}</p>
        </div>
    </a>
    @endforeach
</div>
@endsection