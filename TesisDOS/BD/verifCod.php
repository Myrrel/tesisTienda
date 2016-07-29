<?php 
include("abml.php");

    $id = $_REQUEST['variable'];
	$link = conectaDB();

	$query = "SELECT `COD/REF` FROM `productos` WHERE `COD/REF` = '$id'";
	
	if(hayDeEste($query)){
?>
      <span style="color:#FF0000;" class="glyphicon glyphicon-remove-circle"></span><small> No Disponible</small>
<?php
	}else{
?>
	  <span style="color:#00FF00;" class="glyphicon glyphicon-ok-circle"></span><small> Disponible</small>
<?php
	}

?>