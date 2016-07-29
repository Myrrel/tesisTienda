	    <footer>
	    	<div class="container" >
	        	<p class="text-muted" style="color:#FFF;">Arkadia.Net</p>
	    	</div>
		</footer>
		
		<?php include($BD."loginPanel.php"); ?>


	    <script src="<?= $estilos;?>js/jquery.js"></script>
	    <script src="<?= $estilos;?>js/bootstrap.min.js"></script>
	  
	    <script src="<?= $estilos;?>js/jquery.easing.min.js"></script>
		
    <?php include($BD."ajaxComprueboNom.php"); ?>
	
	  <script type="text/javascript">
		function errores() {
  			var $myModal = $('#ventErrores');
 			$myModal.modal('show');
		}
     </script>