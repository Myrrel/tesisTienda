<div id="modalEditPedidos" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">   
      <div class="modal-content">
         <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x
            </button>
            <h4 class="modal-title">Estado de Pedido</h4>
         </div>

         <div class="modal-body" >
          <div class="container">
           <div class="row">
             <form class="form-horizontal" role="form" action="?" method="post">
               
              <div class="form-group">
               <label class="col-xs-2 control-label">Seleccione estado : </label>
                  <div class="col-xs-4">
                      <input type="hidden" value="" class="id" name="idPedido" />
                      <input type="hidden" value="" class="ed" name="estadoV" />
                      <select class="form-control" name="estadoN">
                          <?php                             
                            dibujoSelect("estadosdepedidos","NomEstadoDePedido");
                          ?>
                      </select>
                  </div>
                 </div>  

                <div class="form-group">
                 <div class="col-xs-4">
                  <input type="hidden" class="id" name="id" value=""  />
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

