<script language="javascript" type="text/javascript">

// crea el ambiente JS para recibir la respuesta dinamica
var xmlHttp = new XMLHttpRequest();

/*
// para IE se hace asi
var xmlHttp = false;
try {
  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
   xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttp = false;
  }
}
*/
function compruebo(valor,archivo) {
  // Obtiene el nombre escrito a medida que se escribe
  var variable  = valor;
  
  // Sigo solo si hay datos
  if ((variable == null) || (variable == "")) return;

  // Arma la URL para hacer la consulta
  //var url = "getValues.php?usuario=" + escape(usuario);
  var url = "<?= $BD;?>"+archivo+"?variable="+encodeURI(valor);

  // Abre la conxion con el servidor
  xmlHttp.open("GET", url, true);

  // Determina la funcion a ejecutar cuando se obtiene la respuesta del servidor
  xmlHttp.onreadystatechange = updatePage;

  // Envia la peticion
  xmlHttp.send(null);
  
}

// Funcion que actualiza la pagina con la respuesta
function updatePage() {
  if (xmlHttp.readyState == 4) {
    var response = xmlHttp.responseText;
    document.getElementById("respuesta").innerHTML = response;
  }
}

</script>