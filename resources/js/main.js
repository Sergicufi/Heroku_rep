const URLactual = jQuery(location).attr('href');

// userDropdownNav ID listener
$(document).on('change', '#userDropdownNav', () => {
    const valor = $('#userDropdownNav').val();
    const user_id = $('option').attr('user_id');
    // logout
    if (valor == 'Logout') {
        $('#logout-form').submit();
    }

    if (valor == 'Allotjaments') {
        $(location).attr('href','/Allotjaments?id=' + user_id);
    }

    if (valor == 'Favorits') {
        $(location).attr('href','/Favorits?id=' + user_id);
    }

    if (valor == 'Reserves') {
        $(location).attr('href','/Reserva?id=' + user_id);
    }
})

// Funció perque el menú del navbar sigui funcional quan estigui en mode responsive.
$(document).ready(function() {

    $(".navbar-burger").click(function() {
  
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
  
    });
  });

$(document).on('click', '.removeBtn', () => {
    const habitatge_id = $('.general').attr('idHabitatge');
    const user_id = $('.general').attr('idUsuari');

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'button is-success m-2',
          cancelButton: 'button is-danger m-2'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: 'Estàs segur que vols eliminar aquest allotjament?',
        text: "No podràs recuperar-la un cop borrada",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar!',
        cancelButtonText: 'No, cancel·lar!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          swalWithBootstrapButtons.fire(
            'Eliminat!',
            'L\'allotjament s\'ha eliminat correctament.',
            'success'
          )
          setTimeout(() => {
            $(location).attr('href','/removeAccommodation?habitatge_id=' + habitatge_id + '&user_id=' + user_id);
          },3000);

        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancel·lat',
            'No s\'ha eliminat l\'allotjament.',
            'error'
          )
        }
      })
});