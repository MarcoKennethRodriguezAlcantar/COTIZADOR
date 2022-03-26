<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
	    	<div class="box-header with-border">
	        	<h3 class="box-title">Registrar producto</h3>
	        </div>
	        <form class="form-horizontal" action="<?php echo base_url(); ?>cadmin/guardarproducto" method="POST" enctype="multipart/form-data">
	        	<div class="box-body">

					<div class="form-group">
		           		<label for="inputEmail3" class="col-sm-2 control-label">Tipo de producto</label>
							<div class="col-sm-10">
		                		<select class="form-control select2" style="width: 100%;" name="txtTipo" id="txtTipo">
				                  	<option selected="selected">Ventana</option>
				                  	<option>Cancel</option>
				                  	<option>Puerta</option>
				                </select>
		            		</div>
              		</div>

		        	<div class="form-group">
		           		<label for="inputEmail3" class="col-sm-2 control-label">Modelo</label>
		                	<div class="col-sm-10">
		                    	<input type="txt" class="form-control" id="txtModelo" name="txtModelo" placeholder="Modelo" 
        						value="<?= set_value('txtModelo'); ?>"><?= form_error('txtModelo','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Altura(cm)</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtAltura" name="txtAltura" placeholder="Altura (cm)" 
        						value="<?= set_value('txtAltura'); ?>"><?= form_error('txtAltura','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Base(cm)</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtBase" name="txtBase" placeholder="Base (cm)" 
        						value="<?= set_value('txtBase'); ?>"><?= form_error('txtBase','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		           		<label for="inputEmail3" class="col-sm-2 control-label">Material del marco</label>
							<div class="col-sm-4">
		                		<select class="form-control select2" style="width: 100%;" name="txtMaterialm" id="txtMaterialm">
				                  	<option value="">Selecciona</option>

		            <?php
			            $i = 0;
			            if ($p == 0 || $p == null) {
			        ?>
			            <h1>No hay meteriales</h1>        
			        <?php
			            } else {
			                foreach ($p as $fila) {
			                    $i = $i + 1;         
			        ?>
				                  	<option value="<?php echo $fila->nombre ?>"><?php echo $fila->nombre ?></option>
		            <?php
		                }
		            }
		            ?>
		         				<option value="activem">Otro*</option>
		            			</select>
		            			<?= form_error('txtMaterialm','<small class="text-danger pl-3">','</small>');?>
		            		</div>
		            		<label for="inputEmail3" class="col-sm-1 control-label">Otro</label>
		                	<div class="col-sm-5">
		                		<input type="txt" class="form-control" id="txtOtro1" name="txtOtro1" placeholder="Otro" 
        						value="<?= set_value('txtOtro1'); ?>" disabled><?= form_error('txtOtro1','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
              		</div>
		            
              		<div class="form-group">
		           		<label for="inputEmail3" class="col-sm-2 control-label">Material del cristal</label>
							<div class="col-sm-4">
		                		<select class="form-control select2" style="width: 100%;" name="txtMaterialc" id="txtMaterialc">
				                  	<option value="">Selecciona</option>

		            <?php
			            $i = 0;
			            if ($p == 0 || $p == null) {
			        ?>
			            <h1>No hay meteriales</h1>        
			        <?php
			            } else {
			                foreach ($p as $fila) {
			                    $i = $i + 1;         
			        ?>
		            
				                  	<option value="<?php echo $fila->nombre ?>"><?php echo $fila->nombre ?></option>
				             
		            <?php
		                }
		            }
		            ?>
		            				<option value="activec">Otro*</option>
		            			</select>
		            			<?= form_error('txtMaterialc','<small class="text-danger pl-3">','</small>');?>
		            		</div>
		            		<label for="inputEmail3" class="col-sm-1 control-label">Otro</label>
		            		<div class="col-sm-5">
		                		<input type="txt" class="form-control" id="txtOtro2" name="txtOtro2" placeholder="Otro" 
        						value="<?= set_value('txtOtro2'); ?>" disabled><?= form_error('txtOtro2','<small class="text-danger pl-3">','</small>');?>
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
		            	<label for="inputEmail3" class="col-sm-2 control-label">Color</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtColor" name="txtColor" placeholder="Color" 
        						value="<?= set_value('txtColor'); ?>"><?= form_error('txtColor','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Ancho de perfil(cm)</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtAnchop" name="txtAnchop" placeholder="Ancho de perfil" 
        						value="<?= set_value('txtAnchop'); ?>"><?= form_error('txtAnchop','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Acabado</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtAcabado" name="txtAcabado" placeholder="Acabado" 
        						value="<?= set_value('txtAcabado'); ?>"><?= form_error('txtAcabado','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Peso (kg)</label>
		                	<div class="col-sm-10">
		                		<input type="txt" class="form-control" id="txtPeso" name="txtPeso" placeholder="Peso (kg)" 
        						value="<?= set_value('txtPeso'); ?>"><?= form_error('txtPeso','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Imagen</label>
		                	<div class="col-sm-10">
		                		<input type="file" class="custom-file-input" id="txtImagen" name="txtImagen" required placeholder="Imagen" 
        						value="<?= set_value('txtImagen'); ?>"><?= form_error('txtImagen','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Cantidad</label>
		                	<div class="col-sm-10">
		                		<input type="Number" class="form-control" id="txtCantidad" name="txtCantidad" placeholder="Cantidad" 
        						value="<?= set_value('txtCantidad'); ?>"><?= form_error('txtCantidad','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Costo produccion</label>
		                	<div class="col-sm-10">
		                		<input type="Number" class="form-control" id="txtProduccion" name="txtProduccion" placeholder="Costo Produccion" 
        						value="<?= set_value('txtProduccion'); ?>"><?= form_error('txtProduccion','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
		            </div>

		            <div class="form-group">
		            	<label for="inputEmail3" class="col-sm-2 control-label">Precio publico</label>
		                	<div class="col-sm-10">
		                		<input type="Number" class="form-control" id="txtPrecio" name="txtPrecio" placeholder="Precio publico" 
        						value="<?= set_value('txtPrecio'); ?>"><?= form_error('txtPrecio','<small class="text-danger pl-3">','</small>');?>
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

<script type="text/javascript">
	$( function() {
	    $("#txtMaterialm").change( function() {
	        if ($(this).val() === "activem") {
	           	$("#txtOtro1").prop("disabled", false);
	        } else {
	            
	            $("#txtOtro1").prop("disabled", true);
	        }
	    });
	});
	$( function() {
	    $("#txtMaterialc").change( function() {
	        if ($(this).val() === "activec") {
	           	$("#txtOtro2").prop("disabled", false);
	        } else {
	            
	            $("#txtOtro2").prop("disabled", true);
	        }
	    });
	});
</script>