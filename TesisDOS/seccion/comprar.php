<?php
include("../admin/sesiones.php");
?>

?>

<?php  
    $admin = "../admin/";   
    $layout = "../layout/";
    $BD = "../BD/";
    $seccion = "";
    $estilos = "../estilos/";
    $home = "../";
  
    include($BD."abml.php");
?>
<?php include($layout."header.php"); ?>

<?php include($layout."menutop.php"); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<div class="navbar-custom">
			
			</div>	
		</div>
		<div class="col-md-8">
			<br>
			<h3> Finalizar Compra </h3>
			<?php 
				if (!isset($_SESSION["usrPerfil"])) {
					print("<h4>Para poder finalizar la compra logueese o registrese</h4> ")	;
				}else{
					
					print("<h4>Se le ha enviado un mail a su cuenta con el detalle de la compra</h4> ");
					print("<h4>Gracias por elegirnos!!</h4> ");//hago insert en pedidos y  detalle dde pedido
					// borro el carrito	
				}
			?>
			
		</div>
		<div class="col-md-2">
			<div class="navbar-custom">
			
			</div>
		</div>
	</div>
</div>
<?php include($layout."footer.php"); ?>