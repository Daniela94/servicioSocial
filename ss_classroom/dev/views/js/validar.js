/* VALIDAR LOGIN */
/* ------------------------------------------------------------------------ */
function validarLogin() {

  /* ==== validar caracteres especiales | expresiones regulares ==== */

  // var expresion = /^[a-zA-Z0-9]*$/;
  var expresionCorreo = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var expresionNoCuenta = /^[0-9]*$/;
  var expresionPassword = /^[a-zA-Z0-9]*$/;

  if(!expresionCorreo.test($("#usuario").val()))
    expresionCorreo = false;
  else
    expresionCorreo = false;
  if(!expresionNoCuenta.test($("#usuario").val()))
    expresionNoCuenta = false;
  else  
    expresionNoCuenta = true;
  if(!expresionPassword.test($("#passwordLogin").val()))
    expresionPassword = false;
  else 
    expresionPassword = true;

  // return true;
}
$(document).ready(function() {
  var pass = $('#pass');
  var password = $('#password');
  var confirmacion = "Las contraseñas coinciden";
  var negacion = "Las contraseñas no coinciden";
  //ocultar por defecto el elemento div
  var alert = $('<div></div>').insertAfter(password);
  alert.hide();
  //función que comprueba las dos contraseñas
  function coincidePassword(){
    var valor1 = pass.val();
    var valor2 = password.val();
    //mostrar el div
    alert.show().removeClass();
    //condiciones dentro de la función
    if(valor1==valor2){
      alert.text(confirmacion).addClass('alert alert-success');
    }
    else {
      alert.text(negacion).removeClass('alert alert-success').addClass('alert alert-danger');
    }
  }
  //ejecutar la función al soltar la tecla
  password.keyup(function(){
  coincidePassword();
  });
})

