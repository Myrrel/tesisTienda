<?php
include("admin/sesiones.php");?>
<?php  
   
    $admin = "admin/";
    $layout = "layout/";
    $BD = "BD/";
    $seccion = "seccion/";
    $estilos = "estilos/";
    $home = "";
    
	include($BD."abml.php");
?>
<?php include($layout."header.php"); ?>
<?php include($layout."portada.php"); ?>
<div class="container">
	<div class="row" id="cuerpo"> <br ><!-- fila de espaciado --><br> </div> 
<br><br><br>	
		<!-- 4 columns of text below the carousel -->
		  <?php  indexCategoria(); ?>

	<div class="row page-scroll" id="comoComprar"> <br ><!-- fila de espaciado --><br> </div>
	<div>
		<img src="<?=$estilos."img/proceso_de_compra.png"?>" alt="">
	</div>


  <!-- /END THE FEATURETTES -->


	</div> 
</div>

	
    <h4 class="pull-right push-down"><a href="#cuerpo" class="page-scroll" style="color:black;">
    <button class="btn btn-success"><span class="glyphicon glyphicon-menu-up"></span></button></a></h4>

<br><br><br>	

<?php include($layout."footer.php"); ?>	




<script type="text/javascript">
/* AQUI LA ANIMACION DE TRANSICION Y EL MENU INVISIBLE CON EFECTO */
/*!
 * Start Bootstrap - Grayscale Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// $uery to collapse the navbar on scroll
 
function collapseNavbar() {

    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
}

$(window).scroll(collapseNavbar);
$(document).ready(collapseNavbar);

// $uery for page scrolling feature - requires $uery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
  if ($(this).attr('class') != 'dropdown-toggle active' && $(this).attr('class') != 'dropdown-toggle') {
    $('.navbar-toggle:visible').click();
  }
});     </script>	
</body></html>