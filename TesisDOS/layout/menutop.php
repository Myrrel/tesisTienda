<!-- <nav class="navbar navbar-inverse">  -->   
<nav class="navbar navbar-custom2 navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="<?= $home; ?>index.php">
                <i class="fa fa-play-circle"></i>  <span class="light"></span> Flea Market
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">   <a href="#page-top"></a>    </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorías<span class="caret"></span></a>
                    <ul class="dropdown-menu">  
                  
                    <?php 
                        cargoMenu($seccion,$admin);
                        
                    ?>
                    </ul>
                </li>
                <li>
                    <?php 
                        include("loginmenu.php");
                        
                    ?>

<?php
if(isset($_POST["okAddMenu"])){
    
    include($BD."addCliente.php");
}
?>
           </ul>
        </div>
    </div>
</nav>
<br/><br/><br/>