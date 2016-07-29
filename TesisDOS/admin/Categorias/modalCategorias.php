<div id="modalEditCategorias" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">   
      <div class="modal-content"> 
         <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x
            </button>
            <h4>Edito Categoría</h4>
         </div>
         <div class="modal-body" >

          <form  enctype="multipart/form-data" class="form-horizontal" role="form" action="?" method="post">   
            <label class="control-label " for="">Nombre Categoría:  </label>
            <input type="hidden" class="nm" name="nmV" value=""/>
            <div class="input-group">
              <input type="text"  class="form-control nm" name="nm" id="nm"  onblur="compruebo(this.value,'verifCat.php');" value="" required />
              <span class="input-group-addon">
                <span id="respuesta"></span>                   
              </span>
            </div>
            
            <label class="control-label " for="">Descripción:  </label>
            <input type="hidden" class="ds" name="dsV" value=""/>       
            <input type="text" class="form-control ds" name="ds" value="" required />

            <label class="control-label " for="">Imagen Actual:  </label>
            <input type="text" class="form-control im" name="im" value="" />
                   
            <img src="" id="imt"  style="width: 240px; height: 240px;"   alt="">
                  
            <label class="control-label">Seleccione Imagen</label>
            <input type="file" class="form-control" id="files" accept="image/*" name="imgArch">
                    

            <input type="hidden" class="id" name="id" value=""/>
            <input type="submit" class="btn btn-info" name="okEdit" value="Guardar" />
            <button class="btn btn-default"  value="Cerrar" class="close" >Cerrar</button>
         </form>
         </div>
      </div>
   </div>
</div>

<div id="modalElimCategorias" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"    aria-hidden="true">
  <div class="modal-dialog modal-sm">   
    <div class="modal-content"> 
      <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><h3>x</h3>
            </button>
            <h4>ELIMINAR Categoría</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" action="?" method="post">
          <div class="form-group" >             
            
            <p align="center">     ELIMINAR FILA</p> 
            <p align="center">Sé eliminará la fila.</p>
              
          </div>     
          <div class="btn-group" > 
            <input type="hidden" class="id" name="id" value="" />
            <button type="submit" name="okElim" class="btn btn-warning"> ELIMINAR</button>   
            <button class="btn btn-success"> CANCELAR</button> 
          </div>
        </form>
      </div> 
    </div>
  </div>
</div>


<div id="modalAddCategorias"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">   
      <div class="modal-content"> 
         <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x
            </button>
            <h4>Agrego Categoría</h4>
         </div>
         <div class="modal-body" >

          <form  enctype="multipart/form-data" class="form-horizontal" role="form" action="?" method="post">   
            <label class="control-label " for="">Nombre Categoría:  </label>
           
            <div class="input-group">
              <input type="text"  class="form-control" name="nm" id="nm"  onblur="compruebo(this.value,'verifCat.php');" value="" required />
              <span class="input-group-addon">
                <span id="respuesta"></span>                   
              </span>
            </div>
            
            <label class="control-label " for="">Descripción:  </label>
            <input type="text" class="form-control ds" name="ds" value="" required  />
            
            <label class="control-label">Seleccione Imagen</label>
            <input type="file" class="form-control" id="files" accept="image/*" name="imgArch">

            <input type="submit" class="btn btn-info" name="okAdd" value="Guardar" />
            <button clzass="btn btn-default"  value="Cerrar" class="close" >Cerrar</button>
         </form>
         </div>
      </div>
   </div>
</div>
