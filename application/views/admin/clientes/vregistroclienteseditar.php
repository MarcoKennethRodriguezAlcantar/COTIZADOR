<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
	    	<div class="box-header with-border">
	        	<h3 class="box-title">Editar Usuario</h3>
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
            <form class="form-horizontal" action="<?php echo base_url(); ?>cadmin/updatecliente" method="POST">
	        	<div class="box-body">
		        	<div class="form-group">
		           		<label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
		                	<div class="col-sm-10">
		                		<input id="id" name="id" type="hidden" value="<?php echo $fila->idclientes ?>">
		                    	<input type="txt" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre" 
        						value="<?php echo $fila->nombre ?>"><?= form_error('txtNombre','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Contacto</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtContacto" name="txtContacto" placeholder="Contacto" 
        						value="<?php echo $fila->contacto ?>"><?= form_error('txtContacto','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Ciudad</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtCiudad" name="txtCiudad" placeholder="Ciudad" 
        						value="<?php echo $fila->ciudad ?>"><?= form_error('txtCiudad','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Numero</label>
		                	<div class="col-sm-10">
		                		<input type="txt" maxlength="10" class="form-control" id="txtNumero" name="txtNumero" placeholder="Numero" 
        						value="<?php echo $fila->numero ?>"><?= form_error('txtNumero','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>
		            
		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Direccion</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Direccion" 
        						value="<?php echo $fila->direccion ?>"><?= form_error('txtDireccion','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Correo</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtEmail" name="txtEmail" placeholder="Correo" 
        						value="<?php echo $fila->email ?>"><?= form_error('txtEmail','<small class="text-danger pl-3">','</small>');?>
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