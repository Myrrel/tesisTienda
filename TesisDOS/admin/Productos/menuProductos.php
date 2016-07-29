<?php
include("../sesiones.php"); 

if($_SESSION["nivelPerfil"]!=99){
		header("Location:/TesisDOS/index.php");
}

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

    menuAdmin("Productos");


// EN LAS SIGUIENTES LINEAS EJECUTO LAS QUERY O MUESTRO LOS ERRORES POR LOS 
// CUALES LAS QUERY NO SE EJECUTAN

if (isset($_POST["okElim"])) { 

	$id = $_POST["id"];
	
// borro archivo imagen
	if($rutaIMG = retornaIMG("productos","Imagen","idProducto",$id)){
		$fichero_subido = $_SERVER['DOCUMENT_ROOT'] .'TesisDOS'.$rutaIMG;
		@unlink($fichero_subido);
	}
// borro de producto por id
	$query =  "DELETE FROM `productos` WHERE `idProducto` = '$id'";
	ejecutoQuery($query); 
// borro de producto y categorias por id
	$query =  "DELETE FROM `productosycategorias` WHERE `idProducto` = '$id'";
	ejecutoQuery($query); 
}

if (isset($_POST["okEdit"])){

	
	$id = $_POST["id"];// id 
	$cd = $_POST["cd"];// codigo
	$cdV = $_POST["cdV"];// codigo
	$ds = $_POST["ds"];// descripcion
	$pe = $_POST["pe"];// precio especial
	$pu = $_POST["pu"];// precio unitario
	$pm = $_POST["pm"];// precio mayorista
	$pk = $_POST["pk"];// pack de venta
	$im = $_POST["im"];// imagen vieja
	
	if (isset($_POST["ctV"])){
	    $ctV = explode(" ", $_POST["ctV"]);
	    $ctV = array_filter($ctV);
	    $ctV = array_slice($ctV, 0);
	}

	
	$ct = "";
	if (isset($_POST["ct"]))
	    $ct = $_POST["ct"];
	else
		$ct = $ctV;
	//print_r($ctV);
	
	$mensajesErrores = array(); 
	
	if($id == "") $mensajesErrores[] = "El campo ID esta vacio. ";
	if($cd == "") $mensajesErrores[] = "El campo Código esta vacio. ";
	if($ds == "") $mensajesErrores[] = "El campo Descripción esta vacio. ";
	if($pu == "") $mensajesErrores[] = "El campo Precio Unitario esta vacio. ";
	if($pm == "") $mensajesErrores[] = "El campo Precio Mayorista esta vacio. ";

	
	
	if($pu < 0) $mensajesErrores[] = "El campo Precio Unitario debe ser mayor a cero. ";
	if($pm < 0) $mensajesErrores[] = "El campo Precio Mayorista debe ser mayor a cero.";
	if($pe < 0) $mensajesErrores[] = "El campo Precio Especial debe ser mayor o igual a cero. ";
	if($pk < 0) $mensajesErrores[] = "El campo Pack de Venta debe ser mayor o igual a cero. ";

	if(empty($ct)) $mensajesErrores[] = "Debe elegir al menos una categoria. ";

	if ($cd != $cdV) {
		$query = "SELECT `COD/REF` FROM `productos` WHERE `COD/REF` = '$cd'";
		if (hayDeEste($query)) $mensajesErrores[] = "El Código ingresado ya existe. ";
	}
	

	if (!empty($_FILES['imgArch']['name'])) {
		unlink($_SERVER['DOCUMENT_ROOT'] .'TesisDOS'.$im);

		// la imagen cambia
		$im = '/BD/imgBD/'.basename($_FILES['imgArch']['name']);// ruta para la bd
		$fichero_subido = $_SERVER['DOCUMENT_ROOT'] .'TesisDOS'.$im;// ruta para el server
		if (!move_uploaded_file($_FILES['imgArch']['tmp_name'], $fichero_subido)){
		    $mensajesErrores[] = "El campo Imagen esta vacio. ";		
		}  
	}
	

 if (empty($mensajesErrores)) {

 	$id = validoText($id);
	$cd = validoText($cd);
	$ds = validoText($ds);
	$pe = validoText($pe);
	$pu = validoText($pu);
	$pm = validoText($pm);
	$pk = validoText($pk);
	
	for ($i=0; $i < count($ct) ; $i++) {
		$ct[$i] = validoText($ct[$i]);				
	}
	
	$im = validoText($im);

	// borro todas la categorias asociadas con ese id
	$query = "DELETE FROM `productosycategorias` WHERE `idProducto` = '$id'";
	ejecutoQuery($query);

		// agrego id con todas las categorias asociadas a el
	$valores ="";
	for ($i=0; $i < count($ct) ; $i++) {
		$valores .= "(NULL,'$id','$ct[$i]'),";				
	}

	$valores = substr($valores, 0, -1);	// elimino ultima coma
	$query = "INSERT INTO `productosycategorias`(`idProductoYCategorias`, `idProducto`, `idCategoria`) VALUES ".$valores."";

	ejecutoQuery($query);		
	

    // actualizo  poducto por su id 
		$query = "UPDATE `productos` SET `idProducto`= '$id',`COD/REF`= '$cd',`Descripcion`='$ds',`Precio_Unitario`='$pu',`Precio_Mayorista`='$pm',`Precio_Especial`='$pe',`pack_de_venta`='$pk',`Imagen`='$im' WHERE `idProducto`= '$id'";
					
		ejecutoQuery($query);
 }else{
 	?>
			<body onload="errores()">
		<?php
	}

	
}// cierra if okEdit

if (isset($_POST["okAdd"])){
	
	$ct = "";
	$cd = $_POST["cd"];// codigo
	$ds = $_POST["ds"];// descripcion
	$pe = $_POST["pe"];// precio especial
	$pu = $_POST["pu"];// precio unitario
	$pm = $_POST["pm"];// precio mayorista
	$pk = $_POST["pk"];// pack de venta
	if (isset($_POST["ct"]))
	   $ct = $_POST["ct"];
	
	
$mensajesErrores = array(); 
	
	if($cd == "") $mensajesErrores[] = "El campo Código esta vacio. ";
	if($ds == "") $mensajesErrores[] = "El campo Descripción esta vacio. ";
	if($pu == "") $mensajesErrores[] = "El campo Precio Unitario esta vacio. ";
	if($pm == "") $mensajesErrores[] = "El campo Precio Mayorista esta vacio. ";
	
	
	if($pu < 0) $mensajesErrores[] = "El campo Precio Unitario debe ser mayor a cero. ";
	if($pm < 0) $mensajesErrores[] = "El campo Precio Mayorista debe ser mayor a cero.";
	if($pe < 0) $mensajesErrores[] = "El campo Precio Especial debe ser mayor o igual a cero. ";
	if($pk < 0) $mensajesErrores[] = "El campo Pack de Venta debe ser mayor o igual a cero. ";

	if(empty($ct)) $mensajesErrores[] = "Debe elegir al menos una categoria. ";
	
	$query = "SELECT `COD/REF` FROM `productos` WHERE `COD/REF` = '$cd'";
	if (hayDeEste($query)) $mensajesErrores[] = "El Código ingresado ya existe. ";
	

	if (!empty($_FILES['imgArch']['name'])) {
		// la imagen cambia
		$im = '/BD/imgBD/IMG'.basename($_FILES['imgArch']['name']);// ruta para la bd
		$fichero_subido = $_SERVER['DOCUMENT_ROOT'] .'TesisDOS'.$im;// ruta para el server
		
		if (!move_uploaded_file($_FILES['imgArch']['tmp_name'], $fichero_subido)){
		    $mensajesErrores[] = "El campo Imagen esta vacio. ";		
		}
	}
	
 if (empty($mensajesErrores)) {

 	
	$cd = validoText($cd);
	$ds = validoText($ds);
	$pe = validoText($pe);
	$pu = validoText($pu);
	$pm = validoText($pm);
	$pk = validoText($pk);
	for ($i=0; $i < count($ct) ; $i++) {
		$ct[$i] = validoText($ct[$i]);				
	}

	$im = validoText($im);
	
	$query = "INSERT INTO `productos` (`idProducto`, `COD/REF`, `Descripcion`, `Precio_Unitario`, `Precio_Mayorista`, `Precio_Especial`, `pack_de_venta`, `Imagen`) VALUES (NULL, '$cd', '$ds', '$pu', '$pm', '$pe', '$pk', '$im');";
				
	ejecutoQuery($query);

	$id = ultimoID("productos","idProducto");

	$valores ="";
	for ($i=0; $i < count($ct) ; $i++) {
		$valores .= "(NULL,'$id','$ct[$i]'),";				
	}
	
	// elimino ultima coma
	$valores = substr($valores, 0, -1);

	$query = "INSERT INTO `productosycategorias`(`idProductoYCategorias`, `idProducto`, `idCategoria`) VALUES ".$valores;
	ejecutoQuery($query);		
	rename($fichero_subido, $_SERVER['DOCUMENT_ROOT'] .'TesisDOS'.$id.$cd);	
 }else{
 	
 	?>
			<body onload="errores()">
		<?php
	}


}


?>
    	<?php listarProductos("productos","modalEditProductos","modalElimProductos");	?>
		</div>
	</div>
</div>
    <div>
       

<?php include("modalProductos.php"); ?>

<?php include($layout."footer.php"); ?>
	 
	    
	    <script type="text/javascript">
	        $('#modalEditProductos').on('show.bs.modal',function(event){
	          var boton = $(event.relatedTarget)
	          
	          var valorID = boton.data('id')
	          var valorCD = boton.data('cd')
	          var valorDS = boton.data('ds')
	          var valorPU = boton.data('pu')
	          var valorPM = boton.data('pm')
	          var valorPE = boton.data('pe')
	          var valorPK = boton.data('pk')
	          var valorCT = boton.data('ct')	
	          var valorIM = boton.data('im')
				
	          var modal = $(this)

	          modal.find('.modal-body .id').val(valorID)
	          modal.find('.modal-body .cd').val(valorCD)
	          modal.find('.modal-body .ds').val(valorDS)
	          modal.find('.modal-body .pu').val(valorPU)
	          modal.find('.modal-body .pm').val(valorPM)
	          modal.find('.modal-body .pe').val(valorPE)
	          modal.find('.modal-body .pk').val(valorPK)
	          modal.find('.modal-body .ct').val(valorCT)
	          modal.find('.modal-body .im').val(valorIM)
	          $('#imt').attr('src','../..'+valorIM)
	         // modal.find('.modal-body .imt').attr('src', modal.find('').attr('src'))

	        });
      	</script>
	  
	    <script type="text/javascript">
        $('#modalElimProductos').on('show.bs.modal',function(event){
          var boton = $(event.relatedTarget)

          var valorID = boton.data('id')
          
          var modal = $(this)
    		
          modal.find('.modal-body .id').val(valorID)
          
        });
       </script>
	  
	   <script type="text/javascript">
        $('#modalAddProductos').on('show.bs.modal',function(event){
          var boton = $(event.relatedTarget)      
          var modal = $(this)
          
          modal.find('.modal-body .cd').val("")
          modal.find('.modal-body .ds').val("")
          modal.find('.modal-body .pu').val("")
          modal.find('.modal-body .pm').val("")
          modal.find('.modal-body .pe').val("")
          modal.find('.modal-body .pk').val("")
          
          modal.find('.modal-body .im').attr('src', "")
        });
      </script>
     
     
	</body>
</html>