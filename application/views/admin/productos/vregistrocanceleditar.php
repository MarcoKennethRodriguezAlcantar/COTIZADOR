<div class="row">
	<div class="col-md-12">
		<?= $this->session->flashdata('message'); ?>
		<div class="box box-info">
	    	<div class="box-header with-border">
	        	<h3 class="box-title">Editar cancel</h3>
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
        <form class="form-horizontal" action="<?php echo base_url(); ?>cadmin/updatecancel" method="POST" enctype="multipart/form-data">
        	<input id="id" name="id" type="hidden" value="<?php echo $fila->idcanceles ?>">
	        	<div class="box-body">

		        	<div class="form-group">
		           		<label for="inputEmail3" class="col-sm-2 control-label">Modelo</label>
		                	<div class="col-sm-10">
		                    	<input type="txt" class="form-control" id="txtModelo" name="txtModelo" placeholder="Modelo" 
        						value="<?php echo $fila->modelo ?>"><?= form_error('txtModelo','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Altura(cm)</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtAltura" name="txtAltura" placeholder="Altura (cm)" 
        						value="<?php echo $fila->altura ?>"><?= form_error('txtAltura','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Base(cm)</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtBase" name="txtBase" placeholder="Base (cm)" 
        						value="<?php echo $fila->base ?>"><?= form_error('txtBase','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Material del marco</label>
		                	<div class="col-sm-10">
		                		<input type="txt" maxlength="10" class="form-control" id="txtMaterialm" name="txtMaterialm" placeholder="Material del marco" 
        						value="<?php echo $fila->material_marco ?>"><?= form_error('txtMaterialm','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>
		            
		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Material del cristal</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtMaterialc" name="txtMaterialc" placeholder="Material del cristal" 
        						value="<?php echo $fila->material_cristal ?>"><?= form_error('txtMaterialc','<small class="text-danger pl-3">','</small>');?>
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
		            	<label for="inputEmail3" class="col-sm-2 control-label">Color</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtColor" name="txtColor" placeholder="Color" 
        						value="<?php echo $fila->color ?>"><?= form_error('txtColor','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Ancho de perfil(cm)</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtAnchop" name="txtAnchop" placeholder="Ancho de perfil" 
        						value="<?php echo $fila->ancho_perfil ?>"><?= form_error('txtAnchop','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Acabado</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtAcabado" name="txtAcabado" placeholder="Acabado" 
        						value="<?php echo $fila->acabado ?>"><?= form_error('txtAcabado','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Peso (kg)</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtPeso" name="txtPeso" placeholder="Peso (kg)" 
        						value="<?php echo $fila->peso ?>"><?= form_error('txtPeso','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Imagen</label>
		                	<div class="col-sm-10">
		                		<input type="file" class="custom-file-input" id="txtImagen" name="txtImagen" placeholder="Imagen" 
        						value="<?= set_value('txtImagen'); ?>"><?= form_error('txtImagen','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Cantidad</label>
		                	<div class="col-sm-10">
		                		<input type="Number" class="form-control" id="txtCantidad" name="txtCantidad" placeholder="Cantidad" 
        						value="<?php echo $fila->cantidad ?>"><?= form_error('txtCantidad','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Costo produccion</label>
		                	<div class="col-sm-10">
		                		<input type="Number" class="form-control" id="txtProduccion" name="txtProduccion" placeholder="Costo Produccion" 
        						value="<?php echo $fila->costo_produccion ?>"><?= form_error('txtProduccion','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Precio publico</label>
		                	<div class="col-sm-10">
		                		<input type="Number" class="form-control" id="txtPrecio" name="txtPrecio" placeholder="Precio publico" 
        						value="<?php echo $fila->precio_publico ?>"><?= form_error('txtPrecio','<small class="text-danger pl-3">','</small>');?>
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