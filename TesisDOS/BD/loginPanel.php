<div id="ventModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm">   
      <div class="modal-content"> 
     
         <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x
            </button>
            <h4>Ingreso a mi Cuenta</h4>
         </div>
     
         <div class="modal-body"><!-- -->
          <div class="container">
           <div class="row">
            <div class="col-xs-10" style="border: 1px solid #e7e5e7 padding-top:12px;">
          
             <form class="form-horizontal" role="form" action="?" method="post">
               <div class="form-group">
                 <div class="col-sm-3">   
                   <label class="control-label " for="">Usuario:  </label>
                   <div class="input-group">
                      <input type="text" class="form-control" name="user" id="user" required/>
                     <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                   </div>
                 </div>
               </div>
               <div class="form-group">
                <div class="col-sm-3"> 
                 <label class="control-label" for="">Clave:  </label>
                 <div class="input-group">
                    <input type="password" class="form-control" name="pass" id="pass"  required />
                    <span class="input-group-addon"><span class="glyphicon glyphicon glyphicon-lock"></span> </span>
                 </div>  
                 <a href="#" style="color:black;" >No sé mi clave.</a>
                </div>
               </div>
               <div class="form-group">
                 <div class="col-sm-3">
                  <label class="control-label" for=""></label>
                  <input type="submit" class="form-control btn btn-info" name="btsend" value="ingresar!" />
                 </div>
               </div>
             </form>

             </div>
            </div>
          </div>           
         </div>
      </div>
   </div>
</div>

<div id="modalAddClientes"  class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">   
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h4>Nuevo Cliente</h4>
      </div>
        <div class="modal-body" >
          <div class="container">
            
              <form class="form-horizontal" id="nCliente" role="form" action="?" method="post">              
              <div class="row">
               <div class="form-group">  
                 <div class="col-xs-3">   
                   <label class="control-label " for="">Nick:  </label>
                   <div class="input-group">
                      <input type="text"  class="form-control nk" name="nk" id="usuario" onblur="compruebo(this.value,'verifUsr.php');" value="" />
                      <span class="input-group-addon">
                        <div id="respuesta"></div>                   
                      </span>
                   </div>
                   
                   <label class="control-label " for="">Contraseña:  </label>
                   <input type="text" class="form-control cd" name="cd" id="cd" value="" />
                   
                   <label class="control-label " for="">Nombre:  </label>
                   <input type="text"  class="form-control nm" name="nm" value="" />
                   
                   <label class="control-label " for="">Apellido:  </label>
                   <input type="text"  class="form-control ap" name="ap" value="" />
                   
                   <label class="control-label " for="">e-mail:  </label>
                   <input type="email" class="form-control em" name="em" value="" />
          
                   <label class="control-label " for="">WEB :  </label>
                   <input type="url" class="form-control wb" name="wb"  value="" placeholder="http://www.fleaMarket.com" />
                   

                 </div>  

                 <div class="col-xs-3">   
                   <label class="control-label " for="">Dirección :  </label>
                   <input type="text"  class="form-control dr" name="dr" value="" />

                   <label class="control-label " for="">Teléfono fijo :  </label>
                   <input type="text"  class="form-control tf" name="tf" value="" />

                   <label class="control-label " for="">Teléfono celular :  </label>
                   <input type="text"  class="form-control tc" name="tc" value="" />
                    
                   <label class="control-label " for="">País :  </label>
                   <select  class="form-control ps" name="ps" id="ps">
                     <?php dibujoSelect("paises"); ?>
                   </select>
                   
                   <label class="control-label " for="">Provincia :  </label>
                   <select  class="form-control prov" name="prov" id="prov">
                     <?php dibujoSelect("provincias"); ?>
                   </select>
                   
                   <label class="control-label " for="">Localidad :  </label>
                   <select  class="form-control" name="lc" id="lc">
                     <?php dibujoSelect("localidades"); ?>
                   </select>
                                     
                  
                   <label class="control-label " for="">Estado :  </label>
                   <select class="form-control" name="ec"  id="ec">
                     <?php dibujoSelect("estadosdeclientes"); ?>
                   </select>
                   
                 </div>
              </div>
              </div>
                <div class="form-group">
                 <div class="col-xs-4">
                  <input type="submit" class="btn btn-info" name="okAddMenu" value="Guardar"  />
                  <button class="btn btn-default"  value="Cerrar" class="close" >Cerrar</button>
                 </div> 
              </div>
            </form>
          </div>
        </div>                    
      </div>
    </div>
  </div>
</div>


<div id="ventErrores" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-md">   
      <div class="modal-content"> <!-- modal-content -->
     
         <div class="modal-header" >
            <button type="button" class="close letBlanco"  data-dismiss="modal" aria-hidden="true">x
            </button>
            <h3 >Error  !!!  </h3>         
            <h4 >Se presentaron los siguientes errores.</h4>         
         </div>
         <div class="modal-body" > <!--modal-body -->
          <div class="container">  <!-- container -->
           <div class="row"><!-- fila-->       
            <div class="col-md-6" ><!-- columna -->       
                
                    <?php muestroErrores($mensajesErrores); ?>
                 
        <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>   

              </div>    <!-- columna -->       
            </div> <!-- fila -->       
          </div>  <!-- container -->       
       </div> <!--modal-body -->
    </div>  <!-- modal-content -->
 </div> <!--modal-body -->
</div>  <!-- modal-content -->
