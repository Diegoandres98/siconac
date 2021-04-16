$(document).ready(function () {
    $('#FormRegistroUsuarios').submit(function (e) {
        e.preventDefault();
        //captura todos los valores que tiene el formulario es decir todos los input que esten en ese formulario...
        // var datos=$(this).serialize();
        var datos=new FormData($('#FormRegistroUsuarios')[0]);

        $.ajax({
            url:"../Modelo/CrearUsuario(s).php",
            type:"POST",
            processData: false,
            contentType: false,
            data:datos,
            beforeSend: function() {
                let timerInterval
                Swal.fire({
                  title: 'Se Estan Guardando ',
                  html: 'I will close in <b></b> milliseconds.',
                  timer: 20000,
                  timerProgressBar: false,
                  didOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                      const content = Swal.getContent()
                      if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                          b.textContent = Swal.getTimerLeft()
                        }
                      }
                    }, 100)
                  },
                  willClose: () => {
                    clearInterval(timerInterval)
                  }
                }).then((result) => {
                  /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                  }
                })

              },
            success:function(data){

                  let arraysJsonData = JSON.parse(data);
                  let array_1 = arraysJsonData[0];
                  let array_2 = arraysJsonData[1];
  
                //  console.log(arraysJsonData);
                 $("#FormRegistroUsuarios")[0].reset();
                //imprimo el resultado en el div mensaje que procesa ajax
                // $("#resultado").html(data);
                if(array_1.success == "2")
                {
                  Swal.fire({
                    // position: 'top-end',
                    icon: 'error',
                    title: 'No se Guardaron estos usuarios',
                    showConfirmButton: false,
                    timer: 1200
                  })

                  for(let x in array_2) 
                  {
                  var fila = '<tr id="row' + x + '" class="claseid" ><td>' + array_2[x]['NID'] + '</td><td>' + array_2[x]['Nombre'] + '</td> </tr>'; //esto seria lo que contendria la fila
                  // <td style="display:none;" >' + MonitoresDePortalEnJs[item]['mp_id_mp'] + '</td>
                  $('#ListDeRechazados tr:first').after(fila);

                  }
                  $("#modal-danger").modal("show");
                }
                if(array_1.success == "1")
                {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Todo El Archivo cvs Fue Guardado Correctamente',
                        showConfirmButton: false,
                        timer: 2500
                      })
                    // location.href ="../Vista/panel.php";
                }


                if(array_1.success == "3")
                  {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Guardado Un Usuario Correctamente',
                        showConfirmButton: false,
                        timer: 2500
                      })
                    // location.href ="../Vista/panel.php";
                  }
                  if(array_1.success == "4")
                  {
                    Swal.fire({
                    icon: 'error',
                    title: 'Ya Estaba Registrado Este Usuario En La Base De Datos',
                    text: 'Intenta Registrando A Una Nueva Persona, o verifica los datos',
                    // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
                    })
                    // location.href ="../Vista/panel.php";
                  }
                  if(array_1.success == "5")
                  {
                    Swal.fire({
                    icon: 'error',
                    title: 'No Enviaste Ningun Dato Para Ser Registrado',
                    text: 'Para poder registrar debes poner los datos o el archivo csv',
                    // footer: '<a href>Si olvidaste la contraseña contacta con el administrador</a>'
                    })
                    // location.href ="../Vista/panel.php";
                  }
            }
        });
    });
});
