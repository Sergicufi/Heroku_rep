<template>
    <div class="field is-grouped search-add-container">
        <p class="control is-expanded">
            <input class="input search-input" type="text" placeholder="Troba un allotjament">
        </p>
        <a class="button is-success" href="/newAccommodation"><em class="material-icons">add</em></a>
    </div>
</template>

<script>
const axios = require('axios');
$(document).on('input', '.search-input', (e) => {
    let value = e.target.value;
    axios.get('/searchBar?search='+value).then(response => {
        const r = response.data;

        let temp = '';
        r.forEach(habitatge => 
        temp += 
        `
        <a class="flex-accommodation-container" href="/vistaAllotjament?id=${habitatge['id']}">
        <div class="foto-allotjament">
            <img src="https://st3.idealista.com/news/archivos/styles/imagen_big_lightbox/public/2018-11/casa_prefabricada.jpg?sv=fmQ3Et0_&itok=pA16oefo" alt="" class="accommodation-page-image">
        </div>
        <div class="contingut-allotjament">
            <h1>${habitatge['nom']}</h1>
            <p>${habitatge['descripcio']}</p>
        </div>
        </a>
        `);
        if (temp.length < 1) {
            $('.flex-accommodation-main-container').html("<h1 class='white-text'>No s'ha trobat cap allotjament amb aquest nom</h1>");
        } else {
            $('.flex-accommodation-main-container').html(temp);
        }
    });
});
</script>
