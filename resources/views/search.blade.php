@extends('layouts.template')
@section('page-title', 'CendrassosBNB')
@section('body')
<div class="search-container">
    <form class="search-cercador" method="get" action="/search">
        <input type="text" value="{{\Request::get('ubicacio')}}" name="ubicacio" id="ubicacio" placeholder="Barcelona">
        <input type="date" value="{{\Request::get('arribada')}}" name="arribada" id="arribada">
        <input type="date" value="{{\Request::get('sortida')}}" name="sortida" id="sortida">
        <input type="number" value="{{\Request::get('persones')}}" name="persones" id="persones" value="0" min="1">
        <button type="submit" class="search-btn">
            <em class="material-icons">search</em>
        </button>
    </form>
    <div class="search-content">
        <div class="search-map-content">
            <iframe class="search-map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11810.164882281078!2d2.96756695!3d42.26696895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sca!2ses!4v1643902641796!5m2!1sca!2ses" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="search-card-content">
            <p class="search-res-title">Establiments trobats a prop de {{$ubi}}</p>
        @foreach ($hab as $c)
            <a class="result-card" href="/vistaAllotjament?id={{ $c->id }}&ubicacio={{\Request::get('ubicacio')}}&arribada={{\Request::get('arribada')}}&sortida={{\Request::get('sortida')}}&persones={{\Request::get('persones')}}">
                <div class="search-card-text">
                    <p class="card-title">{{$c->nom}}</p>
                    <p class="card-desc">{{$c->descripcio}}</p>
                </div>
                <div class="search-card-image">
                    <img src="https://st3.idealista.com/news/archivos/styles/imagen_big_lightbox/public/2018-11/casa_prefabricada.jpg?sv=fmQ3Et0_&itok=pA16oefo" alt="">
                </div>
            </a>
        @endforeach    
        </div>
    </div>    
</div>
@endsection