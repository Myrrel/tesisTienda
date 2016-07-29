<?php
include("../sesiones.php");

if($_SESSION["nivelPerfil"]!=99){
		header("Location:/TesisDOS/index.php");
}

//bateria notebook eurocase batbl10l61
   
    $layout = "../../layout/";
    $BD = "../../BD/";
    $seccion = "../../seccion/";
    $estilos = "../../estilos/";
    $home = "../../";
    
	$admin = "../admin/";
	$fadmin = "../funBDAdmin/";
    include($fadmin."funAdmin.php");


// A PARTIR DE AQUI LA PAGINA

    include($layout."header.php");
    include($layout."menutop.php"); 

/* AQUI EL MENU DE AMINISTRACION GENERADO A TRAVEZ DE UNA FUNCION QUE RECIBE UN PARAMETRO POR EL CUAL SABE QUE ETIQUETA RESALTAR*/    

    menuAdmin("Clientes");

// EN LAS SIGUIENTES LINEAS EJECUTO LAS QUERY O MUESTRO LOS ERRORES POR LOS 
// CUALES LAS QUERY NO SE EJECUTAN
	$mensajesErrores = array(); 
if (isset($_POST["okElimCliente"])) {

	$id = $_POST["id"];
	$idp = $_POST["idp"];
	$query =  "DELETE FROM `clientes` WHERE `idCliente` = '$id'";	
	ejecutoQuery($query); 
	$query =  "DELETE FROM `perfiles` WHERE `idPerfil` = '$idp'";	
	ejecutoQuery($query); 
}

if (isset($_POST["okEditCliente"])){
	$id = $_POST["id"];// id
	$idp = $_POST["idp"];// id perfil
	$nk = $_POST["nkV"];// nick Viejo
	$nk = $_POST["nk"];// nick

	$nm = $_POST["nm"];// nombre
	$ap = $_POST["ap"];// apellido
	$em = $_POST["em"];// email
	$wb = $_POST["wb"];// web
	$dr = $_POST["dr"];// direccion
	$tc = $_POST["tc"];// telefono celular
	$tf = $_POST["tf"];// telefono fijo
	$lc = $_POST["lc"];
	$ec = $_POST["ec"];
	

	//$cd = ($_POST["cdV"] != $_POST["cd"])?  md5($_POST["cd"]."brunilda"): $_POST["cdV"];
	$cd = ($_POST["cdV"] != $_POST["cd"])?  $_POST["cd"] : $_POST["cdV"];
	$nk = ($_POST["nk"]=="")? $_POST["nkV"]: $_POST["nk"]; 

	$mensajesErrores = array(); 
	
	if($nk == "") $mensajesErrores[] = "El campos Nick esta vacio. ";
	if($cd == "") $mensajesErrores[] = "El campos Contraseña esta vacio. ";
	if($nm == "") $mensajesErrores[] = "El campos Nombre esta vacio. ";
	if($ap == "") $mensajesErrores[] = "El campos Apellido esta vacio. ";
	if($em == "") $mensajesErrores[] = "El campos E-mail esta vacio. ";
	if($wb == "") $mensajesErrores[] = "El campos WEB esta vacio. ";
	if($dr == "") $mensajesErrores[] = "El campos Dirección esta vacio. ";
	if($tc == "") $mensajesErrores[] = "El campos Teléfono Celular esta vacio. ";
	if($tf == "") $mensajesErrores[] = "El campos Teléfono Fijo esta vacio. ";
	if($lc == "") $mensajesErrores[] = "El campos Localidad esta vacio. ";
	if($ec == "") $mensajesErrores[] = "El campos Estado esta vacio. ";

	if (strlen($nk > 20))  {
		$mensajesErrores[] = "El nick debe tener menos de 20 caracteres";
	}

	if(!filter_var($em,FILTER_VALIDATE_EMAIL )){ 
		$mensajesErrores[] = "El email no es valido"; 

	} 

	if(!filter_var($wb,FILTER_VALIDATE_URL )){ 
		$mensajesErrores[] = "La url no es valida"; 

	} 

	if ($nk != $_POST["nkV"]) {
		$query = "SELECT `usrPerfil` FROM `perfiles` WHERE `usrPerfil` = '$nk'";
		if (hayDeEste($query)) $mensajesErrores[] = "El Nick ingresado ya existe. ";
	}
	

	if (empty($mensajesErrores)) {
		//$cd = md5($cd."brunilda");	

		$query = "UPDATE `perfiles` SET `usrPerfil` = '$nk',  `pssPerfil` = '$cd' WHERE `perfiles`.`idPerfil` = '$idp'";


		ejecutoQuery($query); 


		$query = "UPDATE `clientes` SET `NombresCliente` = '$nm', `ApellidosCliente` = '$ap', `Email` = '$em', `WEB` = '$wb', `Direccion` = '$dr', `idLocalidad` = '$lc', `idEstadocliente` = '$ec', `telmovil` = '$tc', `telfijo` = '$tf' WHERE `clientes`.`idCliente` = '$id'";
		ejecutoQuery($query); 

	}else{
		?>
			<body onload="errores()">
		<?php
		}

}

?>


		
			
		<?php 
				
			    listarClientes("modalEditClientes","modalElimClientes");	

		?>
		</div>
	</div>
</div>
    <div>
       

<?php include("modalClientes.php"); ?>

<?php include($layout."footer.php"); ?>
	  
	    <script type="text/javascript">
	        $('#modalEditClientes').on('show.bs.modal',function(event){
	          var boton = $(event.relatedTarget)

	          var valorID = boton.data('id')
	          var valorIDP = boton.data('idp')
	          var valorNK = boton.data('nk')// user
	          var valorCD = boton.data('cd')// pass
	          var valorNM = boton.data('nm')
	          var valorAP = boton.data('ap')
	          var valorEM = boton.data('em')
	          var valorWB = boton.data('wb')
	          var valorDR = boton.data('dr')
	          var valorTC = boton.data('tc')
	          var valorTF = boton.data('tf')
	          var valorLC = boton.data('lc')
	          var valorEC = boton.data('ec')

	          var modal = $(this)
	    	  
	          modal.find('.modal-body .id').val(valorID)
	          modal.find('.modal-body .idp').val(valorIDP)
	          modal.find('.modal-body .nk').val(valorNK)
	          modal.find('.modal-body .cd').val(valorCD)
	          modal.find('.modal-body .nm').val(valorNM)
	          modal.find('.modal-body .ap').val(valorAP)
	          modal.find('.modal-body .em').val(valorEM)
	          modal.find('.modal-body .wb').val(valorWB)
	          modal.find('.modal-body .dr').val(valorDR)
	          modal.find('.modal-body .tc').val(valorTC)
	          modal.find('.modal-body .tf').val(valorTF)
	          modal.find('.modal-body .lc').val(valorLC)
	          modal.find('.modal-body .ec').val(valorEC)
	         
	        });
      	</script>
	  
	    <script type="text/javascript">
        $('#modalElimClientes').on('show.bs.modal',function(event){
          var boton = $(event.relatedTarget)
          var valorID = boton.data('id')
          var valorIDP = boton.data('idp')
          var modal = $(this)
          modal.find('.modal-body .id').val(valorID)
          modal.find('.modal-body .idp').val(valorIDP)
        });
       </script>
	  
	   <script type="text/javascript">
        $('#modalAddClientes').on('show.bs.modal',function(event){
          var boton = $(event.relatedTarget)
          var modal = $(this)
          modal.find('.modal-body .id').val("")
          modal.find('.modal-body .nk').val("")
	      modal.find('.modal-body .cd').val("")
	      modal.find('.modal-body .nm').val("")
	      modal.find('.modal-body .ap').val("")
	      modal.find('.modal-body .em').val("")
	      modal.find('.modal-body .wb').val("")
	      modal.find('.modal-body .dr').val("")
	      modal.find('.modal-body .tc').val("")
	      modal.find('.modal-body .tf').val("")
	      modal.find('.modal-body .lc').val("")
	      modal.find('.modal-body .ec').val("")
        });
      </script>



