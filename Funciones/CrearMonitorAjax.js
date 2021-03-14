$(document).ready(function () {
    $('#FormRegistroMonitor').submit(function (e) {
        e.preventDefault();
        //captura todos los valores que tiene el formulario es decir todos los input que esten en ese formulario...
        // var datos=$(this).serialize();
        var datos=new FormData($('#FormRegistroMonitor')[0]);
        console.log(datos);
        $.ajax({
            type:"POST",
            processData: false,
            contentType: false,
            url:"../Modelo/CrearMonitor.php",
            data:datos,
            success:function(data){
                 console.log(data);
                 var jsonData = JSON.parse(data);
                // console.log(jsonData);
              if(jsonData.success == "1"){
                  Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Monitor Creado Con Exito',
                      showConfirmButton: false,
                      timer: 2500
                    })
              }

              if(jsonData.success == "2")
              {
                Swal.fire({
                icon: 'error',
                title: 'La Contraseña Actual Es Incorrecta...',
                text: 'Para poder cambiar los datos debes ingresar la contraseña actual correctamente',
                // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
                })
                // location.href ="../Vista/panel.php";
              }

              if(jsonData.success == "3")
              {
                Swal.fire({
                    icon: 'error',
                    title: 'Las Nuevas Contraseñas No Coinciden',
                    text: 'Debes rectificar que las esten bien escritas las nuevas contraseñas',
                    // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
                    })
              }

              if(jsonData.success == "4")
              {

              }
                //imprimo el resultado en el div mensaje que procesa ajax
                // $("#resultado").html(data);
            }
        });
    });
});
