<?php 
include("abml.php");

    $id = $_GET['variable'];

	$query = "SELECT `NombreCategoria` FROM `categorias` WHERE `NombreCategoria` = '$id'";
	if (hayDeEste($query)) 
	        echo '<span style="color:#FF0000;" class="glyphicon glyphicon-remove-circle"></span><small> No Disponible</small>';
        else
			echo '<span style="color:#00FF00;" class="glyphicon glyphicon-ok-circle"></span><small> Disponible</small>';

?>