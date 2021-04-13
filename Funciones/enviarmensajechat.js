$(document).ready(function () {
  
  $('#EnviarMensaje').click(function (e) {
    e.preventDefault();
    
    var arreglodepersonas= [];
      // para cada checkbox "chequeado"
      var ps=0;
      $("input[type=checkbox]:checked").each(function(){
        result=[];
        var i = 0;
        
        // buscamos el td más cercano en el DOM hacia "arriba"
        // luego encontramos los td adyacentes a este
        $(this).closest('td').siblings().each(function(){
    
          // obtenemos el texto del td 
          result[i]= $(this).text();
          ++i;
        });
        arreglodepersonas[ps]=result[0];
        console.log(arreglodepersonas[ps]);
        ++ps;
      });

      Tag=$("#seleccion").val();
      AsuntoMensaje= $("#AsuntoMensaje").val();
      Texto=$("#compose-textarea").val();
      // var jsonPersonas =JSON.stringify(arreglodepersonas);
      //  console.log(JSON.stringify(arreglodepersonas));

      var parametros = {
        'Tag' : Tag,
        'AsuntoMensaje' : AsuntoMensaje,
        'Texto' : Texto,
        'Destinatarios': JSON.stringify(arreglodepersonas)
      };

        $.ajax({
            type:"POST",
            url:"../Modelo/Chat.php",
            data:parametros,
            success:function(data){
                var jsonData = JSON.parse(data);
                console.log(jsonData);
              if(jsonData.success == "1"){
                  Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Mensajes Enviados Con Exito',
                      showConfirmButton: false,
                      timer: 2500
                    })

                    ubicacion("enviaralerta");

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
                $("#resultado").html(data);
            }
        });
    });
});