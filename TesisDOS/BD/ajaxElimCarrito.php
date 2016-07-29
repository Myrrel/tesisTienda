<script language="javascript" type="text/javascript">
// crea el ambiente JS para recibir la respuesta dinamica
var xmlHttp = new XMLHttpRequest();

/*
// para IE se hace 
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
function borroCarrito(valor) {
  // Obtiene el nombre escrito a medida que se escribe
  var coDRef  = document.getElementById(valor).value;
 
   // Sigo solo si hay datos
  if ((coDRef == null) || (coDRef == "")) return;

  // Arma la URL para hacer la consulta
  // var url = "getValues.php?usuario=" + escape(usuario);
  // 
  // coDRef Desc cantItem PrecioMen
  var url = "<?= $BD;?>procesoElim.php?coDRef="+encodeURI(coDRef);

  // Abre la conxion con el servidor
  xmlHttp.open("GET", url, true);

  // Determina la funcion a ejecutar cuando se obtiene la respuesta del servidor
  xmlHttp.onreadystatechange = updateCarrito;

  // Envia la peticion
  xmlHttp.send(null);
}

// Funcion que actualiza la pagina con la respuesta
function updateCarrito() {
  if (xmlHttp.readyState == 4) {
    var response = xmlHttp.responseText;
    document.getElementById("aquiCarrito").innerHTML = response;
  }
}
</script>
