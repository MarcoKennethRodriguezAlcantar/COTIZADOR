<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
	    	<div class="box-header with-border">
	        	<h3 class="box-title">Registrar material</h3>
	        </div>
	        <form class="form-horizontal" action="<?php echo base_url(); ?>cadmin/guardarmaterial" method="POST">
	        	<div class="box-body">
		        	<div class="form-group">
		           		<label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
		                	<div class="col-sm-10">
		                    	<input type="txt" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre" 
        						value="<?= set_value('txtNombre'); ?>"><?= form_error('txtNombre','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Descripcion</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="Descripcion" 
        						value="<?= set_value('txtDescripcion'); ?>"><?= form_error('txtDescripcion','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Cantidad</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtCantidad" name="txtCantidad" placeholder="Cantidad" 
        						value="<?= set_value('txtCantidad'); ?>"><?= form_error('txtCantidad','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Unidad</label>
		                	<div class="col-sm-10">
		                		<input type="txt" maxlength="10" class="form-control" id="txtUnidad" name="txtUnidad" placeholder="Unidad" 
        						value="<?= set_value('txtUnidad'); ?>"><?= form_error('txtUnidad','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>
		            
		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Costo</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtCosto" name="txtCosto" placeholder="Costo" 
        						value="<?= set_value('txtCosto'); ?>"><?= form_error('txtCosto','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		           		<label for="inputEmail3" class="col-sm-2 control-label">Tipo</label>
							<div class="col-sm-10">
		                		<select class="form-control select2" style="width: 100%;" name="txtTipo" id="txtTipo">
				                  	<option selected="selected">Ventana</option>
				                  	<option>Cancel</option>
				                  	<option>Puerta</option>
				                </select>
		            		</div>
              		</div>

		            <div class="form-group">
		            	<div class="col-sm-10 pull-right">
		               		<button type="submit" class="btn btn-success pull-right">Registrar</button>
		                </div>
		        	</div>
	        	</div>
	    	</form>
		</div>
	</div>
</div>