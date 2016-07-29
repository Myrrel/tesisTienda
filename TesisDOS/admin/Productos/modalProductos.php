<div id="modalAddProductos" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">   
      <div class="modal-content">
         <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x
            </button>
            <h4>Nuevo Producto</h4>
         </div>

         <div class="modal-body" >
          <div class="container">
           <div class="row">
             <form  enctype="multipart/form-data" 
             class="form-horizontal" role="form" action="?" method="post">
               
               <div class="form-group">
                 <div class="col-xs-2">   

                   <label class="control-label " for="">Codigo:  </label>
                   <input type="hidden" name="cdV" class="cd" value=""/>
                    <div class="input-group">
                      <input type="text"  class="form-control cd" name="cd" id="cd"  onblur="compruebo(this.value,'verifCod.php');" value="" required />
                      <span class="input-group-addon">
                        <span id="respuesta"></span>                   
                      </span>
                   </div>
                   
                   
                   <label class="control-label " for="">Precio Unitario:  </label>
                   <input type="number" min="0" step="0.000001" class="form-control pu" name="pu" value=""  required/>
                   
                   <label class="control-label " for="">Precio Mayorista:  </label>
                   <input type="number" min="0" step="0.000001"  class="form-control pm" name="pm" value="" required />

                   <label class="control-label " for="">Precio Especial:  </label>
                   <input type="number" min="0" step="0.000001" class="form-control pe" name="pe" value="" required />
                   
                   <label class="control-label " for="">Pack de Venta:  </label>
                   <input type="number"  min="1" class="form-control pk" name="pk" value="" required />
                           
                 </div>

                 <div class="col-xs-3">     
                  <div class="form-group">
                    <label class="control-label">Categorías</label>
                    <select class="form-control ct" name="ct[]" id="ct[]" multiple="multiple">
                     
                      <?php dibujoSelect("categorias"); ?>
                    </select>
                  </div>  

                    <label class="control-label " for="">Descripcion:  </label>
                    <input type="text" class="form-control ds" name="ds" value="" required />
                  
                    
                    <label class="control-label">Seleccione Imagen</label>
                    <input type="file" class="form-control" id="files" accept="image/*"  name="imgArch" >
                    
                 </div>          
               </div>
               <div class="form-group">
                 <div class="col-xs-4">
                 <input type="submit" class="btn btn-info" name="okAdd" value="Guardar" />
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
<div id="modalEditProductos" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">   
      <div class="modal-content">
         <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x
            </button>
            <h4>Edito Producto</h4></div>
         <div class="modal-body" >
          <div class="container">
           <div class="row">
             <form  enctype="multipart/form-data" 
             class="form-horizontal" role="form" action="?" method="post">
               <div class="form-group">
                 <div class="col-xs-2">   
                   <input type="hidden" name="id" class="id" value=""/>
                   <input type="hidden" name="cdV" class="cd" value=""/>
                   <label class="control-label " for="">Codigo:  </label>
                   <div class="input-group">
                      <input type="text"  class="form-control cd" name="cd" id='cd' onblur="compruebo(this.value,'verifCod.php');" value="" required />
                      <span class="input-group-addon">
                        <span id="respuesta"></span>                   
                      </span>
                   </div>
                   
                   <label class="control-label " for="">Precio Unitario:  </label>
                   <input type="number" min="0" step="0.000001" class="form-control pu" name="pu" value=""  required/>
                   
                   <label class="control-label " for="">Precio Mayorista:  </label>
                   <input type="number" min="0" step="0.000001"  class="form-control pm" name="pm" value=""required />

                   <label class="control-label " for="">Precio Especial:  </label>
                   <input type="number" min="0" step="0.000001" class="form-control pe" name="pe" value="" required />
                   
                   <label class="control-label " for="">Pack de Venta:  </label>
                   <input type="number"  min="1" class="form-control pk" name="pk" value="" required />
                           
                 </div>

                 <div class="col-xs-3">     
                  <div class="form-group">
                    <label class="control-label">Categorías Seleccionadas</label>
                    <input type="text" class="form-control ct" name="ctV" value="" />
                    <label class="control-label">Recategorice : </label>
                    <select class="form-control" name="ct[]" multiple="multiple" >
                      <?php dibujoSelect("categorias"); ?>
                    </select>
                  </div>  

                    <label class="control-label " for="">Descripcion:  </label>
                    <input type="text" class="form-control ds" name="ds" value="" required />

                    <label class="control-label " for="">Imagen Actual:  </label>
                    <input type="text" class="form-control im" name="im" value="" />
                   
                    <img src="" id="imt"  style="width: 240px; height: 240px;"   alt="">
                  
                    <label class="control-label">Seleccione Imagen</label>
                    <input type="file" class="form-control" id="files" accept="image/*" name="imgArch">
                    
                 </div>          
               </div>
         
                </div>
                <div class="form-group">
                 <div class="col-xs-4">
                  <input type="submit" class="btn btn-info" name="okEdit" value="Guardar"  />
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

<div id="modalElimProductos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"    aria-hidden="true">
  <div class="modal-dialog modal-sm">   
    <div class="modal-content"> 
      <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><h3>x</h3>
            </button>
            <h4>ELIMINAR Producto</h4>
      </div>
      <div class="modal-body">
       
        <form class="form-horizontal" role="form" action="?" method="post">
          <div class="form-group" >             
            <p align="center">    SE ELIMINARA LA FILA   </p> 
          </div>     
          <div class="btn-group" > 
            <input type="hidden" class="id"  name="id" value=""/>
            <button type="submit" name="okElim" class="btn btn-warning">ELIMINAR</button>          
            <button class="btn btn-success">CANCELAR</button> 
          </div>
        </form>

      </div> 
    </div>
  </div>
</div>