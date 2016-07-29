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
			<h3> Como Comprar </h3>
			<h4>Mecanismo de Compra</h4> 

			<p>Una vez finalizado el proceso de compra mediante nuestro sitio Web Ud. recibirá un correo electrónico con el detalle de su pedido, mas adelante recibirá un segundo correo electrónico donde se incluirán los datos de nuestras cuentas bancarias para que realice el depósito o transferencia electrónica.</p>

			<p>Una vez acreditado el depósito, el pedido será preparado, controlado y embalado. En este proceso, puede que algún producto no supere el control de calidad o surja algún faltante de stock con respecto a su pedido original, por lo que le recomendamos que abone el importe del pedido lo antes posible.</p>

			<p>Si su pedido tuviese algún faltante, estando abonado, un asesor de ventas se comunicará telefónicamente para completar juntos el pedido.</p>
		</div>
		<div class="col-md-2">
			<div class="navbar-custom">
			
			</div>
		</div>
	</div>
</div>
<?php include($layout."footer.php"); ?>