$(document).ready(function () {
    $('#editarportal').submit(function (e) {
        e.preventDefault();
        //captura todos los valores que tiene el formulario es decir todos los input que esten en ese formulario...
        var datos=$(this).serialize();
        $.ajax({
            type:"POST",
            url:"../Modelo/EditarPortal.php",
            data:datos,
            success:function(data){
                // console.log("diego estrada");
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
                    
                    $("#modal-default").modal("hide");
                    // alert("asi es bb");
                    $('.modal-backdrop').remove();
                    ubicacion('listadeportales');
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
});