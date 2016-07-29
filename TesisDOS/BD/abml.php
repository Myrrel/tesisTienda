<?php  
include("constantes.php");

function conectaDB(){

	$link = mysqli_connect(HOST,USER,PASS,DB);
	mysqli_set_charset($link,'utf8');
	if(!$link)  die("No pudo conectarse".mysql_error());
	return $link;
}

function desconectaDB($link){

	mysqli_close($link);
}

function listar($link,$tabla,$idPedido){
	$query = "SELECT * FROM `$tabla` WHERE idPedido = '$idPedido'";
	
	if ($result = mysqli_query($link,$query)){ //realiza la  query
		print("<div class=\"thumbnail\">");
		while ($fila = mysqli_fetch_row($result)){// tomo de a una fila
			for ($i=0; $i < 6; $i++) { // la puedo imprimir por i o por campo
				print($fila[$i]." ");	
			}
			print("<br/>");
		}
		print("</div>");
		mysqli_free_result($result);//  vacio la variable
	}else{
		var_dump($query,mysqli_error($link));
	}
}


function listarGrafico($link,$tabla,$idCategoria){
// dibujo las cajas con imagenes y detalles de producto

//	   0         1        2            3                 4
// idProducto COD/REF Descripcion Precio_Unitario Precio_Mayorista 
			
//        5                6        7          
// Precio_Especial pack_de_venta Imagen

	$query = "SELECT * FROM `$tabla` WHERE `idCategoria` = '$idCategoria'";
	if ($result = mysqli_query($link,$query)){ //realiza la  query	
	//en result tengo las filas de la tabla categoriasyproductos	
		while ($fila = mysqli_fetch_row($result)){// tomo de a una fila
	   		$query = "SELECT * FROM `productos` WHERE `idProducto` = '$fila[1]'";
			$resutado = mysqli_query($link,$query); //realiza la  query	
		 // guardo la fila de la tabla producto segun el idProducto
			$filaproducto = mysqli_fetch_row($resutado);
			?>
			<div class="col-sm-4"><br>
			  <div class="panel panel-primary">
				<div class="thumbnail">
		   			<img src="../<?=$filaproducto[7];?>" class="img-rounded" alt="" style="min-height:200px;height:200px;">
					   <div class="caption">
							<p  style="font-size:110%;">
								<b><?=$filaproducto[1];?></b><br>
								<b><?=$filaproducto[2];?></b><br>
								<span> Precio por Unidad : $  <?=$filaproducto[3];?></span><br>
								<span>Precio por Mayor : $  <?=$filaproducto[4];?></span><br>
								<span>Promoción : $  <?=$filaproducto[5];?></span><br>
								<span>Unids Min x Mayor :  <?=$filaproducto[6];?></span>
							</p>
							
							<label for="">Añadir al Carrito:</label>
							<form class="" role="form" >
							   
								  <input type="number" min="1" class="form-control" name="cantItem" placeholder="Unidades" id="cantItemMas<?=$filaproducto[1];?>" value="" required/>
 							   
                    	 	  <input type="hidden" id="coDRefMas<?=$filaproducto[1];?>" name="coDRef" value ="<?=$filaproducto[1];?>"/> 
							   <button type="button" 
								   class="btn" 
								   id="<?=$filaproducto[1];?>" 
								   name="<?=$filaproducto[1];?>" 
								   onclick ="addCarrito(this.id);"> Agregar
							   <span  class="glyphicon glyphicon-shopping-cart"></span>
							  </button>
							</form>
					  </div>
				</div>
			  </div>	
	 		</div>
		<?php	mysqli_free_result($resutado);//  vacio la variable
		}
		mysqli_free_result($result);//  vacio la variable
	}else{
		var_dump($query,mysqli_error($link));
	}
}

// agrego al menu otros itms dependientes de la sesion
function  cargoMenu($ruta,$admin){
	$link = conectaDB();

	$query = "SELECT `idCategoria`,`NombreCategoria` FROM  `categorias` ";
	
	if ($result = mysqli_query($link,$query)){ //realiza la  query
		
		while ($row = mysqli_fetch_assoc($result)){
		
		?>	 	
			<li><a href="<?=$ruta;?>catalogo.php?var=<?=$row["idCategoria"];?>"> <?=strtoupper($row["NombreCategoria"]);?> </a></li>
		<?php

		}
		?>
			<li><a href="<?=$ruta;?>comocomprar.php" >COMO COMPRAR</a></li>
    		<li><a href="<?=$ruta;?>datosbancarios.php">DATOS BANCARIOS</a></li> 
   			<li><a href="<?=$ruta;?>contacto.php">CONTACTO</a></li>
    <?php
    	if(isset($_SESSION["nivelPerfil"]))
	    	if($_SESSION["nivelPerfil"]==99){
	    ?>		
				<li><a href="<?=$admin;?>Pedidos/menuPedidos.php" >- AREA ADMIN -</a></li>
		<?php
			}

		mysqli_free_result($result);//  vacio la variable
	}else{
		var_dump($query,mysqli_error($link));
	}
	desconectaDB($link);

}



function ejecutoQuery($query){
	$link = conectaDB();

	if ($result = mysqli_query($link,$query)){ //realiza la  query
		
	}else{ 
		var_dump($query,mysqli_error($link));
	}
	
	desconectaDB($link);
}

function precioaAplicar($cantMinima,$mayor,$menor,$especial,$unidadespedidas){
	if ( $unidadespedidas >= $cantMinima) {
		$precio = ($especial >= $mayor)? $especial : $mayor ;	 
		$precio *= $unidadespedidas;
	}else{
		$precio = $unidadespedidas * $menor;
	}
	return $precio; 
}



//*******************************************
//****************** COMBOBOX ***************
//*******************************************


function dibujoSelect($tabla){
	$link = conectaDB();

	$query = "SELECT * FROM `$tabla` ";
		
	if ($result = mysqli_query($link,$query)){ //realiza la  query
		while ($elemento = mysqli_fetch_row($result)){// tomo de a una fila
			print("<option value=\"$elemento[0]\">$elemento[0] - $elemento[1]</option> ");	
		}
		mysqli_free_result($result);//  vacio la variable

	}else{
		var_dump($query,mysqli_error($link));
	}
	desconectaDB($link);
}	


//*********************************************
//****************** VALIDACIONES *************
//*********************************************

function validoText($palabra){

	if(strpos($palabra, '%')>-1) $palabra ="";
	if ($palabra !="") {
		$palabra = trim($palabra); 
		$palabra = htmlspecialchars($palabra);
		$palabra = htmlentities($palabra);
		$palabra = addslashes($palabra);			
	}
	return $palabra;
}


function validoLogin($user,$pass){
	$usr = validoText($user);
	$pss = validoText($pass);
	$row = null;
	if (($usr != "") and ($pss != "")) {
		// $pass = md5($pass."brunilda");
		$link = conectaDB();
		$query = "SELECT * FROM  `perfiles` WHERE  `usrPerfil` = '$usr' and `pssPerfil` = '$pss'";
		
		if ($result = mysqli_query($link,$query)){ //realiza la  query
			
			if ($row = mysqli_fetch_assoc($result)) 	
				return $row;
			
			mysqli_free_result($result);//  vacio la variable

		}else{
			var_dump($query,mysqli_error($link));
		}
		desconectaDB($link);
		return $row;		
	}
}


function hayDeEste($query){
	$link = conectaDB();
	$respuesta = true;

	if ($result = mysqli_query($link,$query)){ //realiza la  query
		$numfilas = mysqli_num_rows($result);

		if ( $numfilas == 0) {
			$respuesta = false; 
			
		}
		mysqli_free_result($result);//  vacio la variable
	}else{
		var_dump($query,mysqli_error($link));
	}
	desconectaDB($link);
	return $respuesta;
}

function ultimoID($tabla,$idtabla){
	$link = conectaDB();

	$query = "SELECT MAX(`$idtabla`) AS id FROM  `$tabla` ";
	
	if ($result = mysqli_query($link,$query)){ //realiza la  query
		
		if ($row = mysqli_fetch_row($result)) 	
			$id = trim($row[0]);

		mysqli_free_result($result);//  vacio la variable

	}else{ 
		var_dump($query,mysqli_error($link));
	}
	desconectaDB($link);
	return $id;
}
// funcion invocada en loginPanel.php para mostrar  los errores, se convina con errores(); javascript
function muestroErrores($mensajesErrores){
	$size = count($mensajesErrores);

   	for ($i=0; $i < $size; $i++) { 
		?>
		    		 <div class="divP"> <?=$mensajesErrores[$i];?> </div>
		<?php
			   	}
}

// imprime a modo de encabezado en catalogo.php
function tituloCategoria($idCategoria){
	$ruta = "../estilos/img/imgCategorias/";
	$link = conectaDB();

	$query = "SELECT * FROM  `categorias` WHERE `idCategoria`= $idCategoria";
	
	if ($result = mysqli_query($link,$query)){ //realiza la  query
		
		if ($row = mysqli_fetch_assoc($result)){
?>
<div class="row"> <!-- FILA DE TITULO DE CATEGORIA -->
		<div class="col-md-2">
			<img class="img-circle img-responsive center-block" src="<?=$ruta.$row['imagenCategoria'];?>" width="140" height="140">
		</div>
		<div class="col-md-10">
		  <h2 class="featurette-heading"><?=$row["NombreCategoria"];?></h2>
		  <h4><?=$row['DescripcionCategoria'];?></h4>	
		</div>

		<hr class="featurette-divider">		
	</div>	
<?php

		} 	

		mysqli_free_result($result);//  vacio la variable

	}else{
		var_dump($query,mysqli_error($link));
	}
	desconectaDB($link);

}

// en index.php muestro un paneo de categorias con su descripcion e imagen
function indexCategoria(){
	$ruta = "estilos/img/imgCategorias/";
	$link = conectaDB();

	$query = "SELECT * FROM  `categorias`";
	
	if ($result = mysqli_query($link,$query)){ //realiza la  query
		$i = 0;
		?>
		<div class="row">
		<?php
		while ($row = mysqli_fetch_assoc($result)){
		  if (($i % 4) == 0) {

		  	?>
			 </div > <!--CIERRO FILA -->
			 <div class="row">
		<?php	
		  	}
?>
		    <div class="col-md-3 text-center">
		      <img class="img-circle" src="<?=$ruta.$row['imagenCategoria'];?>" width="160" height="160">
		      <h2><?=$row["NombreCategoria"];?></h2>
		      <div class="divP"><?=$row['DescripcionCategoria'];?></div>
		      <p><a class="btn btn-default" href="seccion/catalogo.php?var=<?=$row["idCategoria"];?>">>Ver Más<</a></p>
		      
		      
		    </div>
<?php
		$i++;
	}
		  	?>
			 </div > <!--CIERRO FILA -->
		<?php	
		mysqli_free_result($result);//  vacio la variable
	}else{
		var_dump($query,mysqli_error($link));
	}
	desconectaDB($link);
}

function verifIMG($img){
	$bol = false;

	$allowedExts = array("gif", "jpeg", "jpg", "png");

	$extension = end(explode(".", $img["name"]));
	if ((($img["type"] == "image/gif")
	|| ($img["type"] == "image/jpeg")
	|| ($img["type"] == "image/jpg")
	|| ($img["type"] == "image/png"))
	&& ($img["size"] < 90000)
	&& in_array($extension, $allowedExts))
		$bol = true;		
	return $bol;
}

function returnFila($tabla,$idtabla){
	$link = conectaDB();

	$query = "SELECT * FROM `clientes` WHERE  `idPerfil`='$idPerfil'";
	if ($result = mysqli_query($link,$query)){ //realiza la  query
		if ($fC = mysqli_fetch_assoc($result)) 	
			mysqli_free_result($result);//  vacio la variable
	}else{
		var_dump($query,mysqli_error($link));
	}
	desconectaDB($link);
	return $fila;
}

function enviarMail($idPerfil){

//$fC = returnFila("clientes",);// requiero el id del cliente

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$destinatario = $fC["Email"];
$email_subject = "Listado del pedido realizado";
// detalle de pedido

$email_message = "Detalles de Pedido :\n\n";
$email_message .= "Fecha: " . $_POST['first_name'] . "\n";
$email_message .= "Apellido: " . $_POST['last_name'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
$email_message .= "Teléfono: " . $_POST['telephone'] . "\n";
$email_message .= "Comentarios: " . $_POST['comments'] . "\n\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);


}



// function insertoPedido($idPerfil){
// 	$link = conectaDB();

// 	$query = "SELECT * FROM `clientes` WHERE  `idPerfil`='$idPerfil'";
// 	if ($result = mysqli_query($link,$query)){ //realiza la  query
// 		if ($fC = mysqli_fetch_assoc($result)) 	
// 			mysqli_free_result($result);//  vacio la variable
// 	}else{
// 		var_dump($query,mysqli_error($link));
// 	}
// 	desconectaDB($link);


// 	$query = "INSERT INTO `pedidos` ( `idPedido`, `idCliente`, `NombresCliente`, `ApellidosCliente`, `Direccion`, `idLocalidad`, `Localidad`, `idProvincia`, `Provincia`, `idPais`, `Pais`, `telfijo`, `telmovil`, `Email`, `fecha`, `idMediodepago`, `Mediodepago`, `idMediodeenvio`, `Mediodeenvio`, `idEstadodelPedido`) 
// 		VALUES (NULL,'$fC['idCliente']','$fC['NombresCliente']','$fC['ApellidosCliente']','$fC['Direccion']','$fC['idLocalidad']',,'1',,'1',,'$fC['telfijo']','$fC['telmovil']',
// 		'$fC['Email']',,,,,,1)";

// 	ejecutoQuery($query);
	
// 	// ahora inserto  detalle de pedido

// 	$ultimoid = ultimoID("pedidos","idPedido");

// 	insertoDetalle($idPedido);
// }

// function insertoDetalle($idPedido,$carrito){
// 	$link = conectaDB();

	
// 	$valores ="";
// 	for ($i=0; $i < count($carrito) ; $i++) {
// 		$valores .= "(NULL, '$idPedido','$ct[$i]'),";				
// 	}


// " '1', 'e', 'eee', '34');";
// 	$valores = substr($valores, 0, -1);	// elimino ultima coma

// 	$query = "INSERT INTO `detalledepedido` (`idDetalladePedido`, `idPedido`, `Cantidad`, `COD/REF`, `Descripcion`, `ValorPorUnidad`) VALUES ".$valores."";

// 	ejecutoQuery($query);		

// }


?>

