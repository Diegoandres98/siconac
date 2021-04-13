$(document).ready(function () {
    $('#formUpdateInst').submit(function (e) {
        e.preventDefault();
        //captura todos los valores que tiene el formulario es decir todos los input que esten en ese formulario...
        // var datos=$(this).serialize();
        var datos=new FormData($('#formUpdateInst')[0]);
        $.ajax({
            type:"POST",
            processData: false,
            contentType: false,
            url:"../Modelo/ActualizarinfoInstitucional.php",
            data:datos,
            success:function(data){
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
                    ubicacion('datosprincipales');
              }

              if(jsonData.success == "2")
              {
                Swal.fire({
                icon: 'error',
                title: 'No Puedes Enviar Datos Vacios',
                text: 'Quitaste de forma Fraudenta los requerid',
                // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
                })
                // location.href ="../Vista/panel.php";
              }

              if(jsonData.success == "3")
              {
                Swal.fire({
                icon: 'error',
                title: 'Ya Este Usuario Existe',
                text: 'No Tiene Sentido Registrar 2 veces al mismo monitor',
                // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
                })
                // location.href ="../Vista/panel.php";
              }
                //imprimo el resultado en el div mensaje que procesa ajax
                // $("#resultado").html(data);
            }
        });
    });
});
