<div id="modalEditClientes" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">   
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h4>Edito Cliente</h4>
      </div>
        <div class="modal-body" >
          <div class="container">      
              <form class="form-horizontal" role="form" action="?" method="post">              
              <div class="row">
               <div class="form-group">  
                 <div class="col-xs-3">   
                   <label class="control-label " for="">Nick:  </label>
                   <div class="input-group">
                      <input type="hidden" name="nkV" class="nk" value="">
                      <input type="text"  class="form-control nk" name="nk" id="usuario" onblur="compruebo(this.value,'verifUsr.php');" value="" />
                      <span class="input-group-addon">
                        <div id="respuesta"></div>                   
                      </span>
                   </div>
                   
                   <label class="control-label " for="">Nombre:  </label>
                   <input type="text"  class="form-control nm" name="nm" value="" />
                   
                   <label class="control-label " for="">Apellido:  </label>
                   <input type="text"  class="form-control ap" name="ap" value="" />

                   <label class="control-label " for="">Contraseña:  </label>
                   <input type="hidden" class="cd" name="cdV" value="" />
                   <input type="text" class="form-control cd" name="cd" value="" />

                   <label class="control-label " for="">e-mail:  </label>
                   <input type="email" class="form-control em" name="em" value="" />
                   
                   <label class="control-label " for="">WEB :  </label>
                   <input type="url" class="form-control wb" name="wb" value="" placeholder="http://www.fleaMarket.com" />
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
                   
                   <select class="form-control" name="lc" id="lc">
                     <option class="lc"  value=""  selected="selected">Elija opción...</option>
                     <?php dibujoSelect("localidades"); ?>
                   </select>         

                   <label class="control-label " for="">Estado :  </label>
                   
                   <select class="form-control" name="ec"  id="ec">
                     <option class="ec"  value="" selected="selected">Elija opción...</option>
                     <?php dibujoSelect("estadosdeclientes"); ?>
                   </select>
                 </div>
              </div>
              </div>
                <div class="form-group">
                 <div class="col-xs-4">
                  <input type="hidden" class="id" name="id" value="" /> 
                  <input type="hidden" class="idp" name="idp" value="" />
                  <input type="submit" class="btn btn-info" name="okEditCliente" value="Guardar"  />
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

<div id="modalElimClientes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"    aria-hidden="true">
  <div class="modal-dialog modal-sm">   
    <div class="modal-content"> 
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><h3>x</h3></button>
          <h4>ELIMINO Cliente</h4>
      </div>
      <div class="modal-body">
       
        <form class="form-horizontal" role="form" action="?" method="post">
          <div class="form-group" >             
            <p align="center">    SE ELIMINARA LA FILA   </p> 
          </div>     
          <div class="btn-group" > 
            <input type="hidden" class="id"  name="id" value=""/>
            <input type="hidden" class="idp"  name="idp" value=""/>
            <button type="submit" name="okElimCliente" class="btn btn-warning">ELIMINAR</button>       
            <button class="btn btn-success">CANCELAR</button> 
          </div>
        </form>
      </div> 
    </div>
  </div>
</div>