$(document).ready(function (){
    //Cabeza Hogar
    $('#registroCabeza').submit(function (e){
        console.log('Enviando Cabeza Hogar');
        e.preventDefault();
        $.ajax({
            type : $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (response){
                if (response.message === 'Error al insertar datos'){
                    console.log('Error mysql Cabeza Hogar -> ' + response.mysql);
                }

                if (response.message === 'Exito al registrar cabeza de hogar'){
                    $('#registroCabeza').trigger('reset');
                }

                Swal.fire({
                    position: 'center',
                    icon: response.option,
                    title: response.message,
                    showConfirmButton: false,
                    timer: 2500
                });
            }
        });
    });

    //Beneficiario
    $('#registroBeneficiario').submit(function (e){
        console.log('Enviando Beneficiario');
        e.preventDefault();
        $.ajax({
            type : $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (response){
                if (response.message === 'Error al insertar datos'){
                    console.log('Error mysql Beneficiario -> ' + response.mysql);
                }

                if (response.message === 'Exito al registrar beneficiario'){
                    $('#registroBeneficiario').trigger('reset');
                }

                Swal.fire({
                    position: 'center',
                    icon: response.option,
                    title: response.message,
                    showConfirmButton: false,
                    timer: 2500
                });
            }
        });
    });
});