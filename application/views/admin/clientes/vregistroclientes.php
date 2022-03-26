<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
	    	<div class="box-header with-border">
	        	<h3 class="box-title">Registrar clientes</h3>
	        </div>
	        <form class="form-horizontal" action="<?php echo base_url(); ?>cadmin/guardarcliente" method="POST">
	        	<div class="box-body">
		        	<div class="form-group">
		           		<label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
		                	<div class="col-sm-10">
		                    	<input type="txt" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre" 
        						value="<?= set_value('txtNombre'); ?>"><?= form_error('txtNombre','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Contacto</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtContacto" name="txtContacto" placeholder="Contacto" 
        						value="<?= set_value('txtContacto'); ?>"><?= form_error('txtContacto','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Ciudad</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtCiudad" name="txtCiudad" placeholder="Ciudad" 
        						value="<?= set_value('txtCiudad'); ?>"><?= form_error('txtCiudad','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Numero</label>
		                	<div class="col-sm-10">
		                		<input type="txt" maxlength="10" class="form-control" id="txtNumero" name="txtNumero" placeholder="Numero" 
        						value="<?= set_value('txtNumero'); ?>"><?= form_error('txtNumero','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>
		            
		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Direccion</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Direccion" 
        						value="<?= set_value('txtDireccion'); ?>"><?= form_error('txtDireccion','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Correo</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtEmail" name="txtEmail" placeholder="Correo" 
        						value="<?= set_value('txtEmail'); ?>"><?= form_error('txtEmail','<small class="text-danger pl-3">','</small>');?>
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