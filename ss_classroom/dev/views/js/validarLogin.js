/* VALIDAR LOGIN */
/* ------------------------------------------------------------------------ */
function validarLogin() {

  /* ==== validar caracteres especiales | expresiones regulares ==== */

  // var expresion = /^[a-zA-Z0-9]*$/;
  var expresionLogin = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if(!expresionLogin.test($("#usuario").val()))
    expresionLogin = false;
  else 
    expresionLogin = true;
  if(!expresionLogin.test($("#password").val()))
    expresionLogin = false;
  else 
    expresionLogin = true;

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