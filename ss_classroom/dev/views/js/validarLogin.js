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
  if(!expresionPassword.test($("#password").val()))
    expresionPassword = false;
  else 
    expresionPassword = true;

  // return true;
}
/* VALIDAR REGISTRO DE USUARIOS */
/* ------------------------------------------------------------------------- */
function validarRegistro() {
  // var usuario = document.querySelector("#usuarioLogin").val  ;
  // // Mostrar el value del input: console.log('usuario', usuario);
  // var password = document.querySelector("#passwordLogin").value;

  /* ==== validar extensión de caracteres ==== */
  // var caracteres = usuario.length;
  // if(caracteres > 6) {
  //   document.querySelector("label[for='usuarioLogin']".innerHTML += "<br>No se permiten más de 6 caracteres.")
  //   return false;
  // }
}