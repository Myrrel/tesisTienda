<?php 
 session_start();
// // procesoCarrito.php
 include("abml.php");  
// // coDRef Desc cantItem PrecioMen
  
if ((isset($_GET['coDRef']))&&(isset($_GET['cantItem']))){// if 1
  $coDRef = $_GET['coDRef'];     
  $cantItem = $_GET['cantItem'];
  $coDRef = validoText($coDRef);
  $cantItem = is_numeric($cantItem)? $cantItem : 0 ;
  $bol = false;
  if($cantItem > 0){ /// if 2
    $carrito = array();
    if (!isset($_SESSION["carrito"])) {/// if 3
      $carrito[$coDRef] = agregoElem($coDRef,$cantItem);  
      $_SESSION['carrito'] = $carrito;      
    }else{// si $_SESSION existe  else de if 3
      $carrito = $_SESSION['carrito'];         
      // busco en el carrito si el producto ingresado ya existe    
      foreach ($_SESSION['carrito'] as $producto) 
        if (in_array($coDRef, $producto)) {
          $carrito[$producto['coDRef']]['cantItem'] = $cantItem;
          $bol = true;
        }
    }// fin if 3
    if ($bol) { // si no lo encontré
        $carrito[$coDRef] = agregoElem($coDRef,$cantItem);  
        $_SESSION['carrito'] = $carrito;      
    }
  }else{ // else de  if 2
    $mensajesErrores[] = "La cantidad ingresada debe ser mayor a 0. ";    
?>
      <body onload="errores();">
<?php    
  }// fin if 2
}// fin if 1
?>

<table class="table">
<?php
    if (isset($_SESSION["carrito"])) {
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
          <button class="btn btn-warning"  value="eliminar" id="<?=$carrito[$producto['coDRef']]['coDRef'];?>" name="<?=$carrito[$producto['coDRef']]['coDRef'];?>" onclick="borroCarrito(this.id);" class="close" >X</button>
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
   
 <?php 
}


 function agregoElem($coDRef,$cantItem){
  // hago query que me devuelve los datos del producto
  $datosNuevos = array();
  $link = conectaDB();
  $query = "SELECT * FROM `productos` WHERE `COD/REF` = '$coDRef'";

  if ($result = mysqli_query($link,$query)){ //realiza la  query
    if ($row = mysqli_fetch_assoc($result)){
      $datosNuevos['coDRef'] = $coDRef;
      $datosNuevos['Desc'] = $row['Descripcion'];
      $datosNuevos['cantItem'] = $cantItem;
      $datosNuevos['PrecioMen'] = $row['Precio_Unitario'];
    }
    mysqli_free_result($result);//  vacio la variable
  }else{
    var_dump($query,mysqli_error($link));
  }

  desconectaDB($link);
  return $datosNuevos;
}
       
?>



