@extends('layouts.template')
@section('page-title', 'Descripció') <!--"Descripció = "vistaAllotjament"-->
@section('body')
@if(Auth::user() !== null)
<div class="general" idHabitatge="{{$consultaHabitatge->id}}" idUsuari="{{Auth::user()->id}}">
@endif
    <div class="div-ferSpaceBetween">
        <div>
            <h1 class="page-title"> {{ $consultaHabitatge->nom }}</h1>
        </div>
        <div class="conte-iconaFavorit">
            @if(Auth::user() !== null)
                <favoriticon-component></favoriticon-component>
            @endif
        </div>
    </div>
        <!-- Conté les fotos de l'allotjament -->
    <div class="fotos-allotjament">
        <div class="foto-gran">
            <img class="estils-fotoGran" src="/img/imatgeGran.jpg" alt="imatgeAllotjamentGran">
        </div>

        <div class="p1a-fila">
            <img class="estils-fotoPetita" src="/img/imatgePetita.jpg" alt ="imatgeAllotjamentPetita1">
            <img class="estils-fotoPetita" src="/img/imatgePetita.jpg" alt ="imatgeAllotjamentPetita2">
        </div>

        <div class="s2a-fila">
            <img class="estils-fotoPetita" src="/img/imatgePetita.jpg" alt ="imatgeAllotjamentPetita1">
            <img class="estils-fotoPetita" src="/img/imatgePetita.jpg" alt ="imatgeAllotjamentPetita2">
        </div>
    </div>


    <div class="conte-ambdosServeis">
        <!-- Conté tota la secció dels serveis disponibles -->
        <div class="seccio-serveis">
            <h1 class="titol-serveis">SERVEIS</h1>
            <!-- Div que contindrá els divs de serveis i de la informació adicional. -->
            <div class="serveis-info">

                <!-- Descriu els serveis que inclourá cada allotjament. -->
                <div class="serveis-inclosos">
                    <div class="form-field2">
                        @foreach ($consultaServei as $c)
                            <div class="estil-servei"> 
                                <em class="material-icons">{{ $c->icona }}</em><p class="nom-servei">{{ $c->Serveis }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
         <!-- Informació adicional referent a l'habitatge en qüestió. -->
        <div class="info-adicional">
            <h1 class="titol-descripcio">Descripció</h1>
                <p class="nom-casa">{{ $consultaHabitatge->descripcio }}<br></p>
                <p>La casa  es troba situada al C/{{$consultaHabitatge->adreça}},
                a {{$consultaHabitatge->ciutat}},amb codi postal {{$consultaHabitatge->codiPostal}} a la província de {{$consultaHabitatge->provincia}}.<br>
                Té un total de {{$consultaHabitatge->m2}} m² i el seu preu és de {{$consultaHabitatge->preu}}€ per nit.
                </p>
            <form class="posicionar-botoReserva" method="get" action="/completarReserva">
                <input type="hidden" value="{{ $consultaHabitatge->id }}" name="id">
                <input type="date" value="{{old('arribada', \Request::get('arribada'))}}" name="arribada" id="arribada">
                <input type="date" value="{{old('sortida', \Request::get('sortida'))}}" name="sortida" id="sortida">
                <input type="number" placeholder="Hostes" name="persones" min="0" max="{{old('persones', $consultaHabitatge->capacitat_max)}}">
                <button type="submit" class="boto-reserva">Reserva Ara!</button>
            </form>
            @error('arribada')
                <small class="error-message">{{$message}}</small><br>
            @enderror
            @error('sortida')
                <small class="error-message">{{$message}}</small><br>
            @enderror
            @error('persones')
                <small class="error-message">{{$message}}</small><br>
            @enderror
        </div>
    </div>
</div>
@endsection