<?php
include("../sesiones.php");

if($_SESSION["nivelPerfil"]!=99){
		header("Location:/TesisDOS/index.php");
}

?>

<?php  
    
    $layout = "../../layout/";
    $BD = "../../BD/";
    $seccion = "../../seccion/";
    $estilos = "../../estilos/";
    $home = "../../";
    
	$admin = "../admin/";
	$fadmin = "../funBDAdmin/";

    include($fadmin."funAdmin.php");

// EN LAS SIGUIENTES LINEAS EJECUTO LAS QUERY O MUESTRO LOS ERRORES POR LOS 
// CUALES LAS QUERY NO SE EJECUTAN
 
	$mensajesErrores = array(); 
if (isset($_POST["okEdit"])) {

	$id = $_POST["id"];
	$im = $_POST["im"];
	$nm = ($_POST["nm"]=="")? $_POST["nmV"]: $_POST["nm"]; 
	$ds = ($_POST["ds"]=="")? $_POST["dsV"]: $_POST["ds"]; 
	
	if($id == "") $mensajesErrores[] = "El campo ID esta vacio. ";
	if($nm == "") $mensajesErrores[] = "El campo Nombre esta vacio. ";
	if($ds == "") $mensajesErrores[] = "El campo Descripción esta vacio. ";
	if($im == "") $mensajesErrores[] = "El campo Imagen esta vacio. ";

	if ($nm != $_POST["nmV"]) {
		$query = "SELECT `NombreCategoria` FROM `categorias` WHERE `NombreCategoria` = '$nm'";
		if (hayDeEste($query)) $mensajesErrores[] = "El Nombre ingresado ya existe. ";		
	}

	if (!empty($_FILES['imgArch']['name'])) {
		if ( @verifIMG($_FILES['imgArch'])) {
			
			unlink($_SERVER['DOCUMENT_ROOT'] .'TesisDOS'.'/estilos/img/imgCategorias/'.$im);

			// la imagen cambia
			$im = basename($_FILES['imgArch']['name']);// ruta para la bd
			$fichero_subido = $_SERVER['DOCUMENT_ROOT'] .'TesisDOS'.'/estilos/img/imgCategorias/'.$im;// ruta para el server
			if (!move_uploaded_file($_FILES['imgArch']['tmp_name'], $fichero_subido)){
			    $mensajesErrores[] = "El campo Imagen esta vacio. ";		
			}  
		}else{
			    $mensajesErrores[] = "La imagen no puede ser mayor a 85 KB. ";		
			    $mensajesErrores[] = "Se admiten los siguientes tipos de imagenes. (jpg,jpeg,png,gif)";					    
		}
	}
	
	if (empty($mensajesErrores)) {
		$nm = validoText($nm);
		$ds = validoText($ds);


		$query = "UPDATE `categorias` SET `NombreCategoria` = '$nm',`DescripcionCategoria` = '$ds', `imagenCategoria` = '$im' WHERE `categorias`.`idCategoria` = $id";
		ejecutoQuery($query);
	
	}else{
 	?>
			<body onload="errores()">
		<?php
	}

	
}// cierra if okEdit


if (isset($_POST["okAdd"])) {

	$nm = $_POST["nm"];
	$ds = $_POST["ds"];
	$im = "";

	$query = "SELECT `NombreCategoria` FROM `categorias` WHERE `NombreCategoria` = '$nm'";
	if (hayDeEste($query)) $mensajesErrores[] = "El Nombre ingresado ya existe. ";
	

	if (!empty($_FILES['imgArch']['name'])) {
	  if ( @verifIMG($_FILES['imgArch'])) { 	
		// la imagen cambia
		$im = basename($_FILES['imgArch']['name']);// ruta para la bd
		$fichero_subido = $_SERVER['DOCUMENT_ROOT'] .'TesisDOS'.'/estilos/img/imgCategorias/'.$im;// ruta para el server
		
		if (!move_uploaded_file($_FILES['imgArch']['tmp_name'], $fichero_subido)){
		    $mensajesErrores[] = "Error no se puede guardar la imagen. ";		
		}
	  }else{
	  		$mensajesErrores[] = "La imagen no puede ser mayor a 85 KB. ";		
			$mensajesErrores[] = "Se admiten los siguientes tipos de imagenes. (jpg,jpeg,png,gif)";					    
	  }
	}else{
		$mensajesErrores[] = "El campo Imagen esta vacio. ";		
	}

 if (empty($mensajesErrores)) {
	$nm = validoText($nm);
	$ds = validoText($ds);

		$query = "INSERT INTO `categorias`(`idCategoria`, `NombreCategoria`, `DescripcionCategoria`,`imagenCategoria`) VALUES (NULL,'$nm','$ds','$im')";
		ejecutoQuery($query);
    }else{


 	?>
			<body onload="errores()">
		<?php
	}

	
}// cierra if okAdd


if (isset($_POST["okElim"])) {

	$id = $_POST["id"];
	
	$query = "SELECT `idCategoria` FROM  `productosycategorias` WHERE  `idCategoria` = '$id'";
	if (!(hayDeEste($query))) {
		// borro archivo imagen
		if($rutaIMG = retornaIMG("categorias","imagenCategoria","idCategoria",$id)){
			$fichero_subido = $_SERVER['DOCUMENT_ROOT'] .'TesisDOS'.$rutaIMG;
			@unlink($fichero_subido);
		}	
		$query = "DELETE FROM `categorias` WHERE `idCategoria` = '$id'";
		ejecutoQuery($query);
	}else{
		    $mensajesErrores[] = "Imposible borrar la categoria seleccionada.<br> Aun existen productos asociados a ella. ";		

?>
			<body onload="errores()">
		<?php
	}
}



// A PARTIR DE AQUI LA PAGINA

    include($layout."header.php");
    include($layout."menutop.php"); 

/* AQUI EL MENU DE AMINISTRACION GENERADO A TRAVEZ DE UNA FUNCION QUE RECIBE UN PARAMETRO POR EL CUAL SABE QUE ETIQUETA RESALTAR*/    

    menuAdmin("Categorias");

?>
			
		<?php     listarCategorias("modalEditCategorias","modalElimCategorias");		?>

		</div>
	</div>
</div>

<?php include("modalCategorias.php"); ?>

<?php include($layout."footer.php"); ?>
	 
	  <script type="text/javascript">	
        $('#modalEditCategorias').on('show.bs.modal',function(event){
          var boton = $(event.relatedTarget)
          
          var valorID = boton.data('id')// id categoria
          var valorNM = boton.data('nm')// nombre categoria
          var valorDS = boton.data('ds')// descripcion
          var valorIM = boton.data('im')// imagen
          
          var modal = $(this)
   	      
          modal.find('.modal-body .id').val(valorID)
          modal.find('.modal-body .nm').val(valorNM)
          modal.find('.modal-body .ds').val(valorDS)
          modal.find('.modal-body .im').val(valorIM)
          $('#imt').attr('src','../../estilos/img/imgCategorias/'+valorIM)          
        });      
      </script>
	  
	  <script type="text/javascript">
        $('#modalElimCategorias').on('show.bs.modal',function(event){
          var boton = $(event.relatedTarget)
          var valorID = boton.data('id')
          var modal = $(this)
          modal.find('.modal-body .id').val(valorID)
        });
      </script>

	  <script type="text/javascript">
        $('#modalAddCategorias').on('show.bs.modal',function(event){
          var boton = $(event.relatedTarget)
          var modal = $(this)
        });
      </script>

	</body>
</html>