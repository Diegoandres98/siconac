$(document).ready(function () {
    $('#form').submit(function (e) {
        e.preventDefault();
        //captura todos los valores que tiene el formulario es decir todos los input que esten en ese formulario...
        var datos=$(this).serialize();
        $.ajax({
            type:"POST",
            url:"../Modelo/login.php",
            data:datos,
            success:function(data){

              var jsonData = JSON.parse(data);

              if(jsonData.success == "1"){
                  Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Administrador Logueado Con Exito',
                      showConfirmButton: false,
                      timer: 1500
                    })

                      window.location.href = "../Vista/panel.php";
                    // window.location="../Vista/panel.php";
                    // location.href =
                  // setTimeout(window.location="../Vista/panel.php",3000);
              }
              if(jsonData.success == "2")
              {
                Swal.fire({
                icon: 'error',
                title: 'Datos Incorrectos...',
                text: 'Para poder ingresar rectifica los datos suministrados',
                footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
                })
                // location.href ="../Vista/panel.php";
              }
              if(jsonData.success == "3")
              {
                Swal.fire({
                icon: 'error',
                title: 'Los Campos Estan Vacios',
                text: 'De Forma Fraudenleta Quitaste Los Requerid',
                footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
                })
                // location.href ="../Vista/panel.php";
              }
                //imprimo el resultado en el div mensaje que procesa ajax
                if(jsonData.success == "4"){
                  Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Monitor Logueado Con Exito',
                      showConfirmButton: false,
                      timer: 1500
                    })

                      window.location.href = "../Vista/M/panel.php";
                    // window.location="../Vista/panel.php";
                    // location.href =
                  // setTimeout(window.location="../Vista/panel.php",3000);
              }
            }
        });
    });
});
  function alertass()
  {
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Para poder registrarte debes comunicarte con el administrador',
  footer: '<a href>Contactar Con Administrador</a>'
  })
  }
  function alertasss()
  {
    Swal.fire({
    title: 'NO puede ser',
    text: 'la pagina dice que le dio amciedad que se te olvide la clave',
    imageUrl: 'https://i.pinimg.com/564x/35/ec/cb/35eccb66592bcb023bd635c98327941e.jpg',
    imageWidth: 400,
    imageHeight: 200,
    imageAlt: 'Custom image',
  })
  }

