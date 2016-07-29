<?php 
session_start();
// procesoElim.php
include("abml.php");  
// coDRef Desc cantItem PrecioMen
  
if (isset($_GET['coDRef'])){// if 1
  $coDRef = $_GET['coDRef'];     
  $coDRef = validoText($coDRef);

    $carrito = $_SESSION["carrito"];
    foreach ($_SESSION['carrito'] as $producto) {
        if (in_array($coDRef, $producto)) {
    	    unset($carrito[$producto['coDRef']]);
        }
      }
 
}// fin if 1
?>

  <table class="table">
<?php
    $total = 0;
    $carrito = $_SESSION["carrito"];
    foreach ($_SESSION['carrito'] as $producto) {
      
       $subtotal = 0;
       $subtotal = $carrito[$producto['coDRef']]['cantItem'] * $carrito[$producto['coDRef']]['PrecioMen'];
       $total += $subtotal;
?> 
    <tr>
     <td style="vertical-align:middle; text-align:left;">Codigo : <?=$carrito[$producto['coDRef']]['coDRef'];?></td>
     <td style="vertical-align:middle; text-align:center;">Cantidad : <?=$carrito[$producto['coDRef']]['cantItem'];?></td>
     <td style="vertical-align:middle; text-align:right;">$ <?=$carrito[$producto['coDRef']]['PrecioMen'];?></td>    
     <td style="vertical-align:middle; text-align:right;">
        <button class="btn btn-warning"  value="<?=$carrito[$producto['coDRef']]['coDRef'];?>" id="<?=$carrito[$producto['coDRef']]['coDRef'];?>" name="<?=$carrito[$producto['coDRef']]['coDRef'];?>" onclick="borroCarrito(this.id);" class="close" >X</button>
     </td>    

    </tr>
    <tr>
     <td colspan="3" style="vertical-align:middle; text-align:left;">Subtotal : $<?=$subtotal;?></td>
    </tr>
  <?php 
    } // fin for
  ?>
  </table>
  <p style="vertical-align:middle; text-align:left;">TOTAL : $<?=$total;?></p>
 

