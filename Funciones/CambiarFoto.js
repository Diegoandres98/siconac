$(document).ready(function () {
    $('#enviarfotonueva').click(function (e) {
        e.preventDefault();
        //captura todos los valores que tiene el formulario es decir todos los input que esten en ese formulario...
        // var datos=$(this).serialize();
        var datos=new FormData($('#CambiarFoto')[0]);
        // console.log(datos);
        $.ajax({
            type:"POST",
            processData: false,
            contentType: false,
            url:"../../Modelo/M/CambiarFoto.php",
            data:datos,
            success:function(data){
                //  console.log(data);
                 var jsonData = JSON.parse(data);
                // console.log(jsonData);
              if(jsonData.success == "1"){
                  Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Foto Cambiada Con Exito',
                      showConfirmButton: false,
                      timer: 2500
                    })
                    location.reload();
              }

              if(jsonData.success == "2")
              {
                Swal.fire({
                icon: 'error',
                title: 'No se puedo cambiar la foto',
                text: 'Enviaste un archivo vacio',
                // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
                })
                // location.href ="../Vista/panel.php";
              }

            }
        });
    });
});
