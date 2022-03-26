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
                        <form class="form-horizontal" action="<?php echo base_url(); ?>cadmin/updateususarios" method="POST">
                        	<input id="id" name="id" type="hidden" value="<?php echo $fila->idusuarios ?>">
	        	<div class="box-body">

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Apellido paterno</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtAppaterno" name="txtAppaterno" placeholder="Apellido Paterno" 
        						value="<?php echo $fila->appaterno ?>"><?= form_error('txtAppaterno','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Apellido materno</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtApmaterno" name="txtApmaterno" placeholder="Apellido materno" 
        						value="<?php echo $fila->apmaterno ?>"><?= form_error('txtApmaterno','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		           		<label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
		                	<div class="col-sm-10">
		                    	<input type="txt" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre" 
        						value="<?php echo $fila->nombre ?>"><?= form_error('txtNombre','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Correo</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtEmail" name="txtEmail" placeholder="Correo" 
        						value="<?php echo $fila->correo ?>"><?= form_error('txtEmail','<small class="text-danger pl-3">','</small>');?>
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
		           		<label for="inputEmail3" class="col-sm-2 control-label">Rol</label>
							<div class="col-sm-10">
		                		<select class="form-control select2" style="width: 100%;" name="txtPuesto" id="txtPuesto">
				                  	<option selected="selected"><?php echo $fila->puesto ?></option>
				                  	<option>Vendedor</option>
				                  	<option>Produccion</option>
				                  	<option>Admin</option>
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