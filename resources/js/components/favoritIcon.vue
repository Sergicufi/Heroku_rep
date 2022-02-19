<template>
    <em class="material-icons" id="icona-favorit"></em>
</template>

<style scoped>
#icona-favorit {
    font-size: 40px !important;
    cursor: pointer;
    color: red;
}
</style>

<script>
   
    const axios = require('axios');
    const habitatge_id = $('.general').attr('idHabitatge');
    const user_id = $('.general').attr('idUsuari');
    $(document).ready(() => {
        axios.get('/checkFav?user_id='+user_id+'&habitatge_id='+habitatge_id).then(response => {
            const r = response.data;
            $('#icona-favorit').text(r);
        });
    });

    $(document).on('click', '#icona-favorit', () => {
        let text = $('#icona-favorit').text();
        if (text == 'favorite') {
            axios.get('/checkFav2?user_id='+user_id+'&habitatge_id='+habitatge_id).then(() => {
                $('#icona-favorit').text('favorite_border');
            });
        } else {
            axios.get('/checkFav3?user_id='+user_id+'&habitatge_id='+habitatge_id).then(() => {
                $('#icona-favorit').text('favorite');
            });
        }
    });

</script>