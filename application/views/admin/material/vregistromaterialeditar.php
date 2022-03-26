<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
	    	<div class="box-header with-border">
	        	<h3 class="box-title">Editar Material</h3>
	        </div>
        <?php
            $i = 0;
            if ($p == 0 || $p == null) {
        ?>
            <h1>Error</h1>        
        <?php
            } else {
                foreach ($p as $fila) {
                    $i = $i + 1;         
        ?>
            <form class="form-horizontal" action="<?php echo base_url(); ?>cadmin/updatematerial" method="POST">
	        	<div class="box-body">
		        	
		        	<input id="id" name="id" type="hidden" value="<?php echo $fila->idmateriales ?>">
		        	<div class="form-group">
		           		<label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
		                	<div class="col-sm-10">
		                    	<input type="txt" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre" 
        						value="<?php echo $fila->nombre ?>"><?= form_error('txtNombre','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Descripcion</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="Descripcion" 
        						value="<?php echo $fila->descripcion ?>"><?= form_error('txtDescripcion','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Cantidad</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtCantidad" name="txtCantidad" placeholder="Cantidad" 
        						value="<?php echo $fila->cantidad ?>"><?= form_error('txtCantidad','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Unidad</label>
		                	<div class="col-sm-10">
		                		<input type="txt" maxlength="10" class="form-control" id="txtUnidad" name="txtUnidad" placeholder="Unidad" 
        						value="<?php echo $fila->unidad ?>"><?= form_error('txtUnidad','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>
		            
		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Costo</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtCosto" name="txtCosto" placeholder="Costo" 
        						value="<?php echo $fila->costo ?>"><?= form_error('txtCosto','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		           		<label for="inputEmail3" class="col-sm-2 control-label">Tipo</label>
							<div class="col-sm-10">
		                		<select class="form-control select2" style="width: 100%;" name="txtTipo" id="txtTipo">
				                  	<option selected="selected"><?php echo $fila->tipo ?></option>
				                  	<option>Ventana</option>
				                  	<option>Cancel</option>
				                  	<option>Puerta</option>
				                </select>
		            		</div>
              		</div>

		            <div class="form-group">
		            	<div class="col-sm-10 pull-right">
		               		<button type="submit" class="btn btn-warning pull-right">Actualizar</button>
		                </div>
		        	</div>
	        	</div>
	    	</form>
            <?php
                }
            }
            ?>
		</div>
	</div>
</div>