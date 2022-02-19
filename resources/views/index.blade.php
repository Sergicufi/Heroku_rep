@extends('layouts.template')
@section('page-title', 'CendrassosBNB')
@section('body')
    <div class="index-container">
        <form class="search-cercador" method="get" action="/search" autocomplete="off">
            <input type="text" name="ubicacio" id="ubicacio" placeholder="Ciutat">
            <input type="date" name="arribada" id="arribada">
            <input type="date" name="sortida" id="sortida">
            <input type="number" name="persones" id="persones" placeholder="0" min="1">
            <button type="submit" class="search-btn">
                <em class="material-icons">search</em>
            </button>
        </form>
        <div class="index-cards-container">
            <p class="most-wanted-title">Recomenats <em class="material-icons">search</em></p>
            <div class="most-wanted-card-container">
                @foreach ($NomHabitatges as $Nom)
                    <a class="most-wanted-card" href="/vistaAllotjament?id={{ $Nom->id }}">
                        <div class="card-image">
                            <img src="https://st3.idealista.com/news/archivos/styles/imagen_big_lightbox/public/2018-11/casa_prefabricada.jpg?sv=fmQ3Et0_&itok=pA16oefo" alt="">
                        </div>
                        <div class="card-text">
                            <p>{{ $Nom->nom }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        @if(Auth::user() !== null)
        <div class="index-cards-container">
            <p class="most-wanted-title">Favorits <em class="material-icons">favorite</em></p>
            <div class="most-wanted-card-container">
                @foreach ($favorits as $favorit)
                    <a class="most-wanted-card" href="/vistaAllotjament?id={{ $favorit->habitatge_id }}">
                        <div class="card-image">
                            <img src="https://st3.idealista.com/news/archivos/styles/imagen_big_lightbox/public/2018-11/casa_prefabricada.jpg?sv=fmQ3Et0_&itok=pA16oefo" alt="">
                        </div>
                        <div class="card-text">
                            <p>{{ $favorit->nom }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
@endsection