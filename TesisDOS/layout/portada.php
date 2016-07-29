<body id="page-top" data-offset="80" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i>  <span class="light"></span> Flea Market
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
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
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

 <h1 class="brand-heading   stroke" style="margin: 0 0 35px; text-transform: uppercase;  
 font-family: Montserrat;  font-weight: 700;  letter-spacing: 1px; ">Flea Market</h1>
                        <p class="intro-text   stroke"><b>TODO LO QUE BUSCAS<br>EN UN SOLO LUGAR.</b><br></p>
                        <a href="#cuerpo" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>