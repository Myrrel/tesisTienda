                <?php  
                if(isset($_POST['user'])){
                    $nick = $_POST['user'];
                    $pass = $_POST['pass'];

                    if ($fila = validoLogin($nick,$pass)) {
                        $_SESSION['usrPerfil'] = $fila['usrPerfil'];
                        $_SESSION['nivelPerfil'] = $fila['nivelPerfil'];

                    ?>
                    <script>alert("Bienvenido!!!");</script>
                    <form action="?" method="post">
                        <div class="letBlanco"><br><span class="glyphicon glyphicon-user"></span>  <?=$_SESSION['usrPerfil'];?> 
                            <input type="submit" class="btn btn-default" value="salir" name="salir" />
                        </div>
                        </form>                

                <?php
                    header("Refresh:0");
                    }else {
                ?>  
                    <script>alert("Usuario o Contraseña invalidos!!!");</script>
                    <a href="#"  class="letBlanco" data-toggle="modal" data-target="#modalAddClientes"><span class="glyphicon glyphicon-user"></span> Registrarse!</a>
                    </li>
                    <li>
                        <a href="#" class="letBlanco" data-toggle="modal" data-target="#ventModal"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                    </li> 
                <?php    
                    }
                }else {
                    if(isset($_SESSION['usrPerfil'])){
                ?>
                    <form action="?" method="post">
                    <div class="letBlanco"><br><span class="glyphicon glyphicon-user"></span>  <?=$_SESSION['usrPerfil'];?> 
                        <input type="submit" class="btn btn-default" value="salir" name="salir" />
                    </div>
                    </form>                
                <?php

                    }else {
                ?>       

                         <a href="#"  class="letBlanco" data-toggle="modal" data-target="#modalAddClientes"><span class="glyphicon glyphicon-user"></span> Registrarse!</a>
                        </li>
                        <li>
                            <a href="#" class="letBlanco" data-toggle="modal" data-target="#ventModal"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                        </li>
            <?php                    
                    }
                }
            
            ?>
