@extends('layouts.template')
@section('page-title', 'Nou allotjament')
@section('body')
<h1 class="page-title">Nou allotjament</h1>
<div class="newAccommodation-main-container">
    <img src="https://images.pexels.com/photos/1370704/pexels-photo-1370704.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
    <form action="/newAccommodation-validationForm" method="post" class="new-accommodation" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="form-field">
            <label for="tipo">Tipus d'allotjament</label>
            <select name="tipo" id="tipo" value="{{old('tipo')}}">
                <option value="" selected hidden>---</option>
                @foreach ($llistacategories as $categoria)
                    <option value="{{$categoria->id}}"> {{$categoria->nom}} </option>
                @endforeach
            </select>
            @error('tipo')
                <br>
                <small class="error-message">{{$message}}</small>
            @enderror
        </div>
        
        <div class="form-field">
            <label for="espai">Tipus d'espai que rebràn els teus hostes</label>
            <select name="espai" id="espai" value="{{old('espai')}}">
                <option value="" selected hidden>---</option>
                @foreach ($llistatipuscat as $tipus)
                    <option value="{{$tipus->id}}"> {{$tipus->nom}} </option>
                @endforeach
            </select>
            @error('espai')
                <br>
                <small class="error-message">{{$message}}</small>
            @enderror
        </div>

        <div class="form-field">
            <label for="adreça">Adreça</label>
            <input type="text" id="adreça" name="adreça" placeholder="Major, 4" value="{{old('adreça')}}">
            @error('adreça')
                <br>
                <small class="error-message">{{$message}}</small>
            @enderror
        </div>

        <div class="form-field">
            <label for="poblacio">Població</label>
            <input type="text" id="poblacio" name="poblacio" placeholder="L'Escala" value="{{old('poblacio')}}">
            @error('poblacio')
                <br>
                <small class="error-message">{{$message}}</small>
            @enderror
        </div>

        <div class="form-field">
            <label for="provincia">Província</label>
            <input type="text" id="provincia" name="provincia" placeholder="Girona" value="{{old('provincia')}}">
            @error('provincia')
                <br>
                <small class="error-message">{{$message}}</small>
            @enderror
        </div>

        <div class="form-field">
            <label for="codipostal">Codi Postal</label>
            <input type="text" id="codipostal" name="codipostal" placeholder="17158" value="{{old('codipostal')}}">
            @error('codipostal')
                <br>
                <small class="error-message">{{$message}}</small>
            @enderror
        </div>

        <div class="form-field">
            <label for="imatges">Afegeix imatges</label>
            <input type="file" id="imatges" name="imatges[]" multiple value="{{old('imatges')}}">
            @error('imatges')
                <br>
                <small class="error-message">{{$message}}</small>
            @enderror
        </div>

        <div class="form-field">
            <label for="descripcio">Afegeix una descripció</label>
            <textarea name="descripcio" value="{{old('descripcio')}}" id="descripcio" cols="30" rows="10" placeholder="Petita casa acollidora a les afores de Figueres..."></textarea>
            @error('descripcio')
                <br>
                <small class="error-message">{{$message}}</small>
            @enderror
        </div>

        <label for="serveis">Selecciona els diferents serveis dels que disposa l'habitatge</label>
        <div class="form-field2">
            @foreach ($llistaServeis as $servei) 
                <p><input type="checkbox" name="checkbox-list[]" value="{{ $servei->id }}"> {{ $servei->nom }}</p>
            @endforeach
            @error('checkbox-list')
                <br>
                <small class="error-message">{{$message}}</small>
            @enderror
        </div>

        <div class="form-field">
            <label for="hostes">Quants hostes es poden allotjar?</label>
            <input type="number" min="0" id="hostes" name="hostes" placeholder="0" value="{{old('hostes')}}">
            @error('hostes')
                <br>
                <small class="error-message">{{$message}}</small>
            @enderror
        </div>

        <div class="form-field">
            <label for="m2">Metres quadrats de l'habitatge</label>
            <input type="number" min="0" id="m2" name="m2" placeholder="0" value="{{old('m2')}}">
            @error('m2')
                <br>
                <small class="error-message">{{$message}}</small>
            @enderror
        </div>

        <div class="form-field">
            <label for="preu">Preu per nit</label>
            <input type="number" min="0" id="preu" name="preu" placeholder="0" value="{{old('preu')}}">
            @error('preu')
                <br>
                <small class="error-message">{{$message}}</small>
            @enderror
        </div>

        <div class="form-field">
            <label for="nom">Títol o nom que rebrà l'allotjament</label>
            <input type="text" id="nom" name="nom" value="{{old('nom')}}">
            @error('nom')
                <br>
                <small class="error-message">{{$message}}</small>
            @enderror
        </div>

        <button type="submit" id="publicarAllotjament" class="button is-info">Publicar</button>

    </form>
</div>
    
@endsection