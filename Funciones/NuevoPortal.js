$(document).ready(function () {
    $('#formularionuevoportal').submit(function (e) {
        e.preventDefault();
        //captura todos los valores que tiene el formulario es decir todos los input que esten en ese formulario...
        var datos=$(this).serialize();
        $.ajax({
            type:"POST",
            url:"../Modelo/CrearPortal.php",
            data:datos,
            success:function(data){
                // console.log(data);
                var jsonData = JSON.parse(data);
                // console.log(jsonData);
              if(jsonData.success == "1"){

                  Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Portal Creado Correctamente',
                      showConfirmButton: false,
                      timer: 2500
                    })
                    // window.location="../Vista/panel.php";
                    // location.href ="../Vista/panel.php";
                  // setTimeout(window.location="../Vista/panel.php",3000);
                  ubicacion("crearportal");
              }
              if(jsonData.success == "2")
              {
                Swal.fire({
                icon: 'error',
                title: 'Parece Que Este Portal Ya Existe, Revisa Por Favor',
                text: 'Para poder crear otro portal debes usar otro numero de serie',
                // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
                })
                // location.href ="../Vista/panel.php";
              }
              if(jsonData.success == "3")
              {
                Swal.fire({
                icon: 'error',
                title: 'Parece que de una forma fraudelenta no estas poniendo los datos',
                text: 'Para poder crear un portal, ingrese los datos correctamente',
                // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
                })
                // location.href ="../Vista/panel.php";
              }

                //imprimo el resultado en el div mensaje que procesa ajax
                $("#resultado").html(data);
            }
        });
    });
});