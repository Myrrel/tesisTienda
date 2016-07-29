<?php  
    $php = "../php/";
    $layout = "../layout/";
    $BD = "../BD/";
    $seccion = "";
    $estilos = "../estilos/";
    include($php."funciones.php");
?>
<?php include($layout."header.php"); ?>
<?php include($layout."menutop.php"); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<div class="navbar-custom">
				<?php 
					$archivo = $layout."menugral.php";
					rutamenu($seccion,$archivo,1);//1 boton azul	
				?>
			</div>	
		</div>
		<div class="col-md-8">
			





			
		</div>
		<div class="col-md-2">
			<div class="navbar-custom">
			<?php 
				$archivo = $layout."menulateral.php";
				rutamenu($seccion,$archivo,2);//2 boton fucsia	
			?>	
			</div>
		</div>
	</div>
</div>
<?php include($layout."footer.php"); ?>