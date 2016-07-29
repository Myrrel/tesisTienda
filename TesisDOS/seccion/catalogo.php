<?php
include("../admin/sesiones.php");
?>

<?php  

	$admin = "../admin/";   
    $layout = "../layout/";
    $BD = "../BD/";
    $seccion = "";
    $estilos = "../estilos/";
    $home = "../";

$mensajesErrores = array(); // que puede que no la use    
?>
<?php include($BD."abml.php"); ?>
<?php include($layout."header.php"); ?>
<?php include($layout."menutop.php"); ?>
<div class="container">

	<?php 
		if (isset($_GET["var"])) {
			$idCategoria = $_GET["var"] ;
	
			tituloCategoria($idCategoria); 

	?>
	<div class="row">	<!-- LISTADO DE PRODUCTOS -->
		<div class="col-md-8">
		<br>

		<?php
			
				$link = conectaDB();
				$tabla = "productosycategorias";
			
				
				listarGrafico($link,$tabla,$idCategoria);
				desconectaDB($link);
			}	
		?>	
		</div>
		<div class="col-md-4" > <!-- EL CARRITO DEBE SER UN DIV  -->
			<div class="navbar-custom">
			 	

				<div class="panel panel-primary">
				    <div id="divTotal" class="panel-heading">
				        <h3 class="panel-title">Detalle del Pedido</h3>
				    </div>
				    <div class="panel-body">
				        <div id="aquiCarrito"> </div>
				    </div>
				</div>
				 
				<div class="text-center">
				    <a href="comprar.php" class="btn btn-danger">Comprar <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
				    </a>
				</div>

			</div>
		</div>
	</div>
</div>

<?php include($layout."footer.php"); ?>
<?php include($BD."ajaxCarrito.php"); ?>
<?php include($BD."ajaxElimCarrito.php"); ?>

 