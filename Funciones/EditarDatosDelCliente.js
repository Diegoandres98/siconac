
  $('#editarcliente').submit(function (e) {
    e.preventDefault();
    //captura todos los valores que tiene el formulario es decir todos los input que esten en ese formulario...
    var datos=$(this).serialize();
    $.ajax({
        type:"POST",
        url:"../Modelo/EditarDatosDelCliente.php",
        data:datos,
        success:function(data){
            // console.log(data);
            var jsonData = JSON.parse(data);
            // console.log(jsonData);
          if(jsonData.success == "1"){

              Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Datos Cambiados Correctamente',
                  showConfirmButton: false,
                  timer: 2500
                })

                // $("#modal-default34").modal("hide");
                // // alert("asi es bb");
                $('.modal-backdrop').remove();
                ubicacion('listadodeclientes');
          }
          if(jsonData.success == "2")
          {
            Swal.fire({
            icon: 'error',
            title: 'Parece que de una forma fraudelenta no estas poniendo los datos',
            text: 'Para poder crear un portal, ingrese los datos correctamente',
            // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
            })
            // location.href ="../Vista/panel.php";
          }
        }
    });
});




    $(".borrarportal").click(function() {

        var Identificador = $(this).attr('id');

        Swal.fire({
            title: 'Seguro Quieres Borrar Este Usuario?',
            text: "No podas revertir la accion, Perderas todo el registro de trafico que este usuario hizo, Se recomienda que mejor lo suspenda",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: '¡Si, Borrar!'
        }).then((result) => {
            if (result.isConfirmed) {

                var parametros = {
                    "Identificador": Identificador
                };
                $.ajax({
                    data: parametros, //datos que se envian a traves de ajax
                    url: '../Modelo/EliminarCliente.php', //archivo que recibe la peticion
                    type: 'post', //método de envio
                    success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        // $("#resultado").html(response);
                        var jsonData = JSON.parse(response);

                        if (jsonData.success == "1") {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Usuario Retirado Del Sistema Con Exito',
                                showConfirmButton: false,
                                timer: 2500
                            })
                            ubicacion('listadodeclientes');
                            // window.location="../Vista/panel.php";
                            // location.href ="../Vista/panel.php";
                            // setTimeout(window.location="../Vista/panel.php",3000);
                        }
                        if (jsonData.success == "2") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Parece Que este Usuario ya estaba retirado',
                                text: 'Prueba Refrescando Esta Pagina',
                                // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
                            })
                            // location.href ="../Vista/panel.php";
                        }
                    }
                });
            }
        })
    });

