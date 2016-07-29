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


if (isset($_POST["okEdit"])) {

	$idPedido = $_POST["idPedido"];
	$estado = $_POST["estadoV"];

	if (isset($_POST["estadoN"])) {
		$estado = $_POST["estadoN"];
	}
	$query = "UPDATE `pedidos` SET `idEstadodelPedido`= '$estado' WHERE `idPedido`= '$idPedido'";
	ejecutoQuery($query);
	header("location:menuPedidos.php");
}

// A PARTIR DE AQUI LA PAGINA

    include($layout."header.php");
    include($layout."menutop.php"); 

/* AQUI EL MENU DE AMINISTRACION GENERADO A TRAVEZ DE UNA FUNCION QUE RECIBE UN PARAMETRO POR EL CUAL SABE QUE ETIQUETA RESALTAR*/    

    menuAdmin("Pedidos");
 

    listarPedidos("pedidos","modalEditPedidos","");	

		?>
		</div>
	</div>
</div>
    <div>
       

<?php include("modalPedidos.php"); ?>

	    <footer>
	    	<div class="container" >
	        	<p class="text-muted" style="color:#FFF;">Arkadia.Net</p>
	    	</div>
		</footer>
		
		<?php include($BD."loginPanel.php"); ?>
		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.js"></script>

	    <script src="<?= $estilos;?>js/jquery.js"></script>
	    <script src="<?= $estilos;?>js/bootstrap.min.js"></script>
	    <script src="bootstrap-modal.js"></script>
	    <script src="<?= $estilos;?>js/jquery.easing.min.js"></script>
	   
	   
	   <script type="text/javascript">
        $('#modalEditPedidos').on('show.bs.modal',function(event){
          var boton = $(event.relatedTarget)

          var valorID = boton.data('id')
          var valorES = boton.data('estadodepedido')
   
          var modal = $(this)
   
          modal.find('.modal-body .id').val(valorID)
          modal.find('.modal-body .ed').val(valorES)
          
        });
      
      </script>
	  
	</body>
</html>