<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
	    	<div class="box-header with-border">
	        	<h3 class="box-title">Registrar Usuario</h3>
	        </div>
	        <form class="form-horizontal" action="<?php echo base_url(); ?>cadmin/guardar" method="POST">
	        	<div class="box-body">

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Apellido paterno</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtAppaterno" name="txtAppaterno" placeholder="Apellido paterno" 
        						value="<?= set_value('txtAppaterno'); ?>"><?= form_error('txtAppaterno','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Apellido materno</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtApmaterno" name="txtApmaterno" placeholder="Apellido Materno" 
        						value="<?= set_value('txtApmaterno'); ?>"><?= form_error('txtApmaterno','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		           		<label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
		                	<div class="col-sm-10">
		                    	<input type="txt" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre" 
        						value="<?= set_value('txtNombre'); ?>"><?= form_error('txtNombre','<small class="text-danger pl-3">','</small>');?>
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
		            	<label for="inputEmail3" class="col-sm-2 control-label">Numero</label>
		                	<div class="col-sm-10">
		                		<input type="txt" maxlength="10" class="form-control" id="txtNumero" name="txtNumero" placeholder="Numero" 
        						value="<?= set_value('txtNumero'); ?>"><?= form_error('txtNumero','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Password</label>
		                	<div class="col-sm-10">
		                		<input type="password" class="form-control" id="txtClave" name="txtClave" placeholder="Password" 
        						value="<?= set_value('txtClave'); ?>"><?= form_error('txtClave','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		           	<div class="form-group">
		           		<label for="inputEmail3" class="col-sm-2 control-label">Rol</label>
							<div class="col-sm-10">
		                		<select class="form-control select2" style="width: 100%;" name="txtPuesto" id="cbPuesto">
				                  	<option selected="selected">Vendedor</option>
				                  	<option>Produccion</option>
				                  	<option>Admin</option>
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
