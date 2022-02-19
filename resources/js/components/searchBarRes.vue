<template>
    <div class="field is-grouped search-add-container">
        <p class="control is-expanded">
            <input class="input search-input2" type="text" placeholder="Troba una reserva">
        </p>
    </div>
</template>


<script>
import $ from 'jquery';

const axios = require('axios');
$(document).on('input', '.search-input2', (e) => {
    let value = e.target.value;
    axios.get('/searchBar2?search='+value).then(response => {
        const ri = response.data;
        let tempo = '';
        ri.forEach(habitatge =>
        tempo += 
        `
        <a class="flex-accommodation-container" href="/vistaAllotjament?id=${habitatge['habitatge_id']}">
        <div class="foto-allotjament">
            <img src="https://st3.idealista.com/news/archivos/styles/imagen_big_lightbox/public/2018-11/casa_prefabricada.jpg?sv=fmQ3Et0_&itok=pA16oefo" alt="" class="accommodation-page-image">
        </div>
        <div class="contingut-allotjament">
            <h1>${habitatge['nom_habitatge']}</h1>
            <p>${habitatge['des_habitatge']}</p>
        </div>
        </a>
        `);
        if (tempo.length < 1) {
            $('.flex-accommodation-main-container').html("<h1 class='white-text'>No s'han trobat cap reserva amb aquest nom</h1>").catch();
        } else {
            $('.flex-accommodation-main-container').html(tempo).catch();
        }
    });
});
</script>