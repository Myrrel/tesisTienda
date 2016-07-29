<?php
    $nk =  $_POST["nk"];// nick
    $cd =  $_POST["cd"];// pass
    $nm =  $_POST["nm"];// nombre
    $ap =  $_POST["ap"];// apellido
    $em =  $_POST["em"];// email
    $wb =  $_POST["wb"];// web
    $dr =  $_POST["dr"];// direccion
    $tc =  $_POST["tc"];// telefono celular
    $tf =  $_POST["tf"];// telefono fijo
    $lc =  $_POST["lc"];// localidad
    $ec =  $_POST["ec"];// estado cliente


    $mensajesErrores = array(); 
    
    if($nk == "") $mensajesErrores[] = "El campos Nick esta vacio. ";
    if($cd == "") $mensajesErrores[] = "El campos Contraseña esta vacio. ";
    if($nm == "") $mensajesErrores[] = "El campos Nombre esta vacio. ";
    if($ap == "") $mensajesErrores[] = "El campos Apellido esta vacio. ";
    if($em == "") $mensajesErrores[] = "El campos E-mail esta vacio. ";
    if($wb == "") $mensajesErrores[] = "El campos WEB esta vacio. ";
    if($dr == "") $mensajesErrores[] = "El campos Dirección esta vacio. ";
    if($tc == "") $mensajesErrores[] = "El campos Teléfono Celular esta vacio. ";
    if($tf == "") $mensajesErrores[] = "El campos Teléfono Fijo esta vacio. ";
    if($lc == "") $mensajesErrores[] = "El campos Localidad esta vacio. ";
    if($ec == "") $mensajesErrores[] = "El campos Estado esta vacio. ";

    if (strlen($nk > 20))  {
        $mensajesErrores[] = "El nick debe tener menos de 20 caracteres";
    }

    if(!filter_var($em,FILTER_VALIDATE_EMAIL )){ 
        $mensajesErrores[] = "El email no es valido"; 

    } 

    if(!filter_var($wb,FILTER_VALIDATE_URL )){ 
        $mensajesErrores[] = "La url no es valida"; 

    } 

    $query = "SELECT `usrPerfil` FROM `perfiles` WHERE `usrPerfil` = '$nk'";
    if (hayDeEste($query)) $mensajesErrores[] = "El Nick ingresado ya existe. ";

    if (empty($mensajesErrores)) {
            
        $nk = validoText($nk);
        $cd = validoText($cd);
        $nm = validoText($nm);
        $ap = validoText($ap);
        $dr = validoText($dr);
        $tc = validoText($tc);
        $tf = validoText($tf);
        $lc = validoText($lc);
        $ec = validoText($ec);

        //$cd = md5($cd."brunilda");
        $query = "INSERT INTO `perfiles`(`idPerfil`,`usrPerfil`,`pssPerfil`,`nivelPerfil`) VALUES(NULL,'$nk','$cd',1)";
        ejecutoQuery($query);   

        $id = ultimoID("perfiles","idPerfil");
        
        $query = "INSERT INTO `clientes` (`idCliente`,`idPerfil`,`NombresCliente`, `ApellidosCliente`, `Email`, `WEB`, `Direccion`, `idLocalidad`, `idEstadocliente`, `telmovil`, `telfijo`) VALUES (NULL, '$id', '$nm', '$ap', '$em', '$wb', '$dr', '$lc', '$ec', '$tc', '$tf')";
        ejecutoQuery($query);   

    }else{
       ?>
            <body onload="errores()">
        <?php
        }

?>