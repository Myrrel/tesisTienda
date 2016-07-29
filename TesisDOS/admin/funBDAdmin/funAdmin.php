<?php  
include($BD."abml.php");

//*******************************************
//****************** CATEGORIAS *************
//*******************************************
function listarCategorias($edit,$elim){
	$link = conectaDB();
	$query = "SELECT * FROM `categorias` ";
	if ($result = mysqli_query($link,$query)){ //realiza la  query
	?>
<table id="listado" class="table table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style="vertical-align:middle; text-align:center;">ID Categoría </th>
                <th style="vertical-align:middle; text-align:center;"> Nombre </th>
                <th style="vertical-align:middle; text-align:center;"> Descripción </th>
                <th style="vertical-align:middle; text-align:center;"> Imagen </th>
                <th style="vertical-align:middle; text-align:center;" COLSPAN="2"> Acciones </th>

            </tr>
        </thead>
        <tbody>
	<?php 	while ($fila = mysqli_fetch_assoc($result)){ ?>
			<tr>	
				<td style="vertical-align:middle; text-align:center;"><?=$fila['idCategoria'];?></td>	
				<td style="vertical-align:middle; text-align:center;"><?=$fila['NombreCategoria'];?></td>	
				<td style="vertical-align:middle; text-align:center;"><?=$fila['DescripcionCategoria'];?></td>	
				<td style="vertical-align:middle; text-align:center;"><?=$fila['imagenCategoria'];?></td>	
				<td>
					<a href="#" class="btn btn-success btn-sm" 
						data-toggle="modal" 
						data-target="#<?=$edit;?>"
						data-id="<?php printf($fila['idCategoria']);?>" 
						data-nm="<?php printf($fila['NombreCategoria']);?>"
						data-ds="<?php printf($fila['DescripcionCategoria']);?>"
						data-im="<?php printf($fila['imagenCategoria']);?>"
						> 	<span class="glyphicon glyphicon-pencil"></span> EDITAR
					</a>
				</td>
				<td>
					<a href="#" class="btn btn-warning btn-sm" 
						data-toggle="modal" 
						data-target="#<?=$elim;?>" 
						data-id="<?php printf($fila['idCategoria']);?>" 
						><span class="glyphicon glyphicon-trash"></span> ELIMINAR
					</a>
				</td>
			</tr>
	<?php
		}
	?>      
        </tbody>
    </table>
	<?php	
		mysqli_free_result($result);//  vacio la variable
	}else{
		var_dump($query,mysqli_error());
	}
	desconectaDB($link);
}

?>
<?php
//*******************************************
//****************** PRODUCTOS **************
//*******************************************

function listarProductos($tabla,$edit,$elim){
	$link = conectaDB();

	$query = "SELECT * FROM `$tabla` ";
	if ($result = mysqli_query($link,$query)){ //realiza la  query

	?>
<table id="listado" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style="vertical-align:middle; text-align:center;">ID Productos </th>
                <th style="vertical-align:middle; text-align:center;"> Código </th>
                <th style="vertical-align:middle; text-align:center;"> Descripción </th>
                <th style="vertical-align:middle; text-align:center;"> Precio Unitario </th>
                <th style="vertical-align:middle; text-align:center;"> Precio Mayorista </th>
                <th style="vertical-align:middle; text-align:center;"> Precio Especial </th>
				<th style="vertical-align:middle; text-align:center;"> Pack de Venta </th>
                <th style="vertical-align:middle; text-align:center;"> Imagen </th>
                <th style="vertical-align:middle; text-align:center;"> Categorías </th>
                <th style="vertical-align:middle; text-align:center;" COLSPAN="2"> Acciones </th>	
            </tr>
        </thead>
        <tbody>
	<?php
		while ($fila = mysqli_fetch_row($result)){// tomo de a una fila
			print("<tr>");	
			for ($i=0; $i < 8; $i++) { // la puedo imprimir por i o por campo
		?>
				  <td style="vertical-align:middle; text-align:center;"><?=$fila[$i]?></td>	
		<?php 
			}

			$query2 = "SELECT `idCategoria` FROM `productosycategorias` WHERE `idProducto` = $fila[0]";
			$palabras = "";
			if ($resultado = mysqli_query($link,$query2)){ 
				print("<td style=\"vertical-align:middle; text-align:center;\">");		
				
				while ($fila2 = mysqli_fetch_row($resultado)){// tomo de a una fila
					$query3 = "SELECT `NombreCategoria` FROM `categorias` WHERE `idCategoria` =  $fila2[0]";
					$result3 = mysqli_query($link,$query3);
					$fila3 = mysqli_fetch_row($result3);
			
					$palabras .= " ".$fila3[0]." ";
					}
				}
				print("$palabras</td>");		

			?>

<td>
	<a href="#"  class="btn btn-success btn-sm" 
		data-toggle="modal" 
		data-target="#<?php printf($edit);?>" 
	
		data-id="<?php printf($fila[0]); ?>" 
		data-cd="<?php printf($fila[1]); ?>" 
		data-ds="<?php printf($fila[2]); ?>" 
		data-pu="<?php printf($fila[3]); ?>" 
		data-pm="<?php printf($fila[4]); ?>" 
		data-pe="<?php printf($fila[5]); ?>" 
		data-pk="<?php printf($fila[6]); ?>" 
		data-im="<?php printf($fila[7]); ?>"
		data-ct="<?=$palabras; ?>"
		 >
		<span class="glyphicon glyphicon-edit"></span> EDITAR
	</a>
</td>

<td>
	<a href="#" class="btn btn-warning btn-sm" 
		data-toggle="modal" 
		data-target="#<?php printf($elim);?>" 
		data-id="<?php printf($fila[0]); ?>" 
		>
		<span class="glyphicon glyphicon-trash"></span> ELIMINAR
	</a>
  </td>
</tr>
	<?php
		
	}
	?>      
        </tbody>
    </table>

	<?php	
		mysqli_free_result($result);//  vacio la variable
	}else{
		var_dump($query,mysqli_error());
	}
	desconectaDB($link);
}
?>
<?php


//*******************************************
//****************** PEDIDOS ****************
//*******************************************


function listarPedidos($tabla,$edit){
	$link = conectaDB();

	$query = "SELECT * FROM `$tabla` ";
	if ($result = mysqli_query($link,$query)){ //realiza la  query

	?>

<table id="listado" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th style="vertical-align:middle; text-align:center;"> Fecha </th>
                <th style="vertical-align:middle; text-align:center;"> ID Pedidos </th>
                <th style="vertical-align:middle; text-align:center;"> ID Cliente </th>
                <th style="vertical-align:middle; text-align:center;"> Localidad </th>
                <th style="vertical-align:middle; text-align:center;"> Provincia </th>
                <th style="vertical-align:middle; text-align:center;"> Medio de Pago </th>
                <th style="vertical-align:middle; text-align:center;"> Medio de Envio </th>
				<th style="vertical-align:middle; text-align:center;"> Estado de pedido </th>
                <th style="vertical-align:middle; text-align:center;" COLSPAN="2"> Acciones </th>
               
            </tr>
        </thead>
        <tbody>
	<?php while ($fila = mysqli_fetch_row($result)){ ?>
		<tr>
			<td style="vertical-align:middle; text-align:center;"><?=$fila[14];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila[0];?></td>
			<td style="vertical-align:middle; text-align:center;"><a href="#"><?=$fila[1];?></a></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila[6];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila[8];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila[16];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila[18];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila[19];?></td>
			<td>
				<a href="#"  class="btn btn-success btn-sm" 
				data-toggle="modal" 
				data-target="#<?php printf($edit);?>" 
				data-id = "<?php printf($fila[0]); ?>";
				data-estadoPedido="<?php printf($fila[19]); ?>" >
				<span class="glyphicon glyphicon-pencil"></span> EDITAR</a>
			</td>
			<td>
				<a href="detallePedido.php?id=<?=$fila[0];?>" class="btn btn-warning btn-sm" >
					<span class="	glyphicon glyphicon-eye-open"></span> VER 
				</a>
			</td>
		</tr>
	<?php } // cierra el while ?>      
       </tbody>
    </table>
	<?php	
		mysqli_free_result($result);//  vacio la variable
	}else{
		var_dump($query,mysqli_error());
	}
	desconectaDB($link);
}

?>
<?php


//*******************************************
//****************** CLIENTES ***************
//*******************************************


function listarClientes($edit,$eliminar){
	$link = conectaDB();

	$query = "SELECT * FROM `clientes`, `perfiles` WHERE `clientes`.`idPerfil` = `perfiles`.`idPerfil`";
	if ($result = mysqli_query($link,$query)){ 	?>

<table id="listado" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th style="vertical-align:middle; text-align:center;"> ID Cliente </th>
            	<th style="vertical-align:middle; text-align:center;"> Nick </th>
                <th style="vertical-align:middle; text-align:center;"> Contraseña </th>
                <th style="vertical-align:middle; text-align:center;"> Nombre Cliente </th>
                <th style="vertical-align:middle; text-align:center;"> Apellido Cliente </th>
                <th style="vertical-align:middle; text-align:center;"> Email </th>
                <th style="vertical-align:middle; text-align:center;"> WEB </th>
                <th style="vertical-align:middle; text-align:center;"> Dirección </th>
			    <th style="vertical-align:middle; text-align:center;"> Localidad </th>		
				<th style="vertical-align:middle; text-align:center;"> Estado de Cliente</th>
                <th style="vertical-align:middle; text-align:center;"> Teléfono Celular </th>
				<th style="vertical-align:middle; text-align:center;"> Teléfono Fijo</th>
				<th style="vertical-align:middle; text-align:center;"> Perfil</th>
                <th COLSPAN="2" style="vertical-align:middle; text-align:center;"> Acciones </th>
                
            </tr>
        </thead>
        <tbody>
	<?php while ($fila = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td style="vertical-align:middle; text-align:center;"><?=$fila['idCliente'];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila["usrPerfil"];?></td>	
			<td style="vertical-align:middle; text-align:center;"><?=$fila["pssPerfil"];?></td>	
			<td style="vertical-align:middle; text-align:center;"><?=$fila["NombresCliente"];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila["ApellidosCliente"];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila["Email"];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila["WEB"];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila["Direccion"];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila["idLocalidad"];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila["idEstadocliente"];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila["telmovil"];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila["telfijo"];?></td>	
			<td style="vertical-align:middle; text-align:center;"><?=$fila["idPerfil"];?></td>	


			<td>
				<a href="#"  class="btn btn-success btn-sm" 
				data-toggle="modal" 
				data-target="#<?php printf($edit);?>" 
				
				data-id = "<?php printf($fila["idCliente"]); ?>"
				data-nk = "<?php printf($fila["usrPerfil"]); ?>" 
				data-nkV = "<?php printf($fila["usrPerfil"]); ?>" 
				data-cd = "<?php printf($fila["pssPerfil"]); ?>" 
				data-nm = "<?php printf($fila["NombresCliente"]); ?>" 
				data-ap = "<?php printf($fila["ApellidosCliente"]); ?>" 
				data-em = "<?php printf($fila["Email"]); ?>" 
				data-wb = "<?php printf($fila["WEB"]); ?>" 
				data-dr = "<?php printf($fila["Direccion"]); ?>" 
				data-lc = "<?php printf($fila["idLocalidad"]); ?>" 
				data-ec = "<?php printf($fila["idEstadocliente"]); ?>" 
				data-tc = "<?php printf($fila["telmovil"]); ?>" 
				data-tf = "<?php printf($fila["telfijo"]); ?>" 
				data-idp = "<?php printf($fila["idPerfil"]); ?>" 
				>
				<span class="glyphicon glyphicon-pencil"></span> EDITAR</a>
			</td>
			<td>
				<a href="#" class="btn btn-warning btn-sm" 
					data-toggle="modal" 
					data-target="#<?php printf($eliminar);?>" 
					data-id="<?php printf($fila["idCliente"]); ?>"
					data-idp="<?php printf($fila["idPerfil"]); ?>"
					>
					<span class="glyphicon glyphicon-trash"></span> ELIMINAR 
				</a>
			</td>
		</tr>
	<?php } // cierra el while ?>      
       </tbody>
    </table>
	<?php	
		mysqli_free_result($result);//  vacio la variable
	}else{
		var_dump($query,mysqli_error());
	}
	desconectaDB($link);
}

?>
<?php



//***************************************************
//****************** DETALLE DE PEDIDOS *************
//***************************************************


function listarDetallePedido($tabla,$idPedido){
	$link = conectaDB();

	$query = "SELECT * FROM `$tabla` WHERE `idPedido` = '$idPedido' ";
	if ($result = mysqli_query($link,$query)){ //realiza la  query

?>	
 
<table id="listado" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th style="vertical-align:middle; text-align:center;"> Cantidad </th>
                <th style="vertical-align:middle; text-align:center;"> COD/REF </th>
                <th style="vertical-align:middle; text-align:center;"> Descripción </th>
                <th style="vertical-align:middle; text-align:center;"> Valor por Unidad </th>
            </tr>
        </thead>
        <tbody>
	<?php while ($fila = mysqli_fetch_row($result)){  ?>
		<tr>
			<td style="vertical-align:middle; text-align:center;"><?=$fila[2];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila[3];?></td>
			
			<td style="vertical-align:middle; text-align:center;"><?=$fila[4];?></td>
			<td style="vertical-align:middle; text-align:center;"><?=$fila[5];?></td>
		</tr>
			
	<?php } ?>      
       </tbody>
    </table>

	<?php	
		mysqli_free_result($result);//  vacio la variable
	}else{
		var_dump($query,mysqli_error());
	}
	desconectaDB($link);
}

//*******************************************
//******************            *************
//*******************************************


function retornaIMG($tabla,$columna,$id,$valorid){
	$link = conectaDB();
	$rutaIMG = "";	
	$query = "SELECT `$columna` FROM  `$tabla` WHERE  `$id` = '$valorid'";
	
	if ($result = mysqli_query($link,$query)){ //realiza la  query
		
		if ($row = mysqli_fetch_row($result)) 	
			$rutaIMG = trim($row[0]);

		mysqli_free_result($result);//  vacio la variable

	}else{
		var_dump($query,mysqli_error());
	}
	desconectaDB($link);
	return $rutaIMG;	
}

//*********************************************
//******************              *************
//*********************************************



function menuAdmin($etiqueta){
	$etiquetas = array("Pedidos","Productos","Categorias","Clientes","Detalle de Pedido" ); 
	$size = count($etiquetas) -1;
	?>
	<div class="container">
		<div class="row">
		<div class="col">
		<h3> Area Administración</h3>
			<ul class="nav nav-tabs">
		<?php
			for ($i=0; $i < $size; $i++) { 
				if ($etiquetas[$i] == $etiqueta) {
					print("<li class=\"active\">");	
				}else{
					print("<li>");
				}
		?>
			  <a href="../<?=$etiquetas[$i];?>/menu<?=$etiquetas[$i];?>.php" style="color:black"><?=$etiquetas[$i];?></a></li>
  			
		<?php		
			}// cierre del for
	
			if ("Detalle de Pedido"==$etiqueta){
				print("<li class=\"active\"><a href=\"../Pedidos/detalledepidido.php\" style=\"color:black\">$etiqueta</a></li></ul><br/><h3>$etiqueta</h3>");				
			}else{
		?>
					</ul>
		  			<br>
					<h3><?=$etiqueta;?></h3>

					<div id ="errores">
						
					</div><br>	
		<?php
				if (("Pedidos"!=$etiqueta)&&("Detalle de Pedido"!=$etiqueta)){
		?>
					<h5 class='text-right'>		
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAdd<?=$etiqueta;?>" >
						<i class='glyphicon glyphicon-plus'></i> Agregar <?=$etiqueta;?>
						</button>
					</h5>
<?php
	       		}
	       }
}// fin de la funcion

?>
