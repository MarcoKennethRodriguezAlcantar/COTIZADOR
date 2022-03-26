<div class="row">
	<div class="col-md-12">
		<?= $this->session->flashdata('message'); ?>
		<div class="box box-info">
	    	<div class="box-header with-border">
	        	<h3 class="box-title">Cotizacion</h3>
	        </div>
	        <div>
	        	
	        	<form class="form-horizontal" action="<?php echo base_url(); ?>cadmin/guardarcliente" method="POST">
					<div class="box-body">
					<h5 class="box-title">Cliente</h5>
						
						<div class="form-group">
		           			<label for="inputEmail3" class="col-sm-2 control-label">Cliente registrado</label>
							<div class="col-sm-10">
		                		<select class="form-control select2" style="width: 100%;" name="txtClienteR" id="txtClienteR">
				                  	<option value="">Selecciona</option>
				                  	
				                  	<?php 
									    foreach($c as $data){
									    	echo "<option value='".$data['idclientes']."' >".$data['nombre']."</option>";
									   	}
									?>
		            
		         					<option value="activem">Nuevo</option>
		            			</select>
		            			<?= form_error('txtClienteR','<small class="text-danger pl-3">','</small>');?>
		            		</div>
              			</div>

			        	<div class="form-group">
			           		<label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
			                	<div class="col-sm-10">
			                    	<input type="txt" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre" 
	        						value="<?= set_value('txtNombre'); ?>" disabled><?= form_error('txtNombre','<small class="text-danger pl-3">','</small>');?>
			                  	</div>
			            </div>

			            <div class="form-group">
			            	<label for="inputEmail3" class="col-sm-2 control-label">Contacto</label>
			                	<div class="col-sm-10">
			                		<input type="txt" class="form-control" id="txtContacto" name="txtContacto" placeholder="Contacto" 
	        						value="<?= set_value('txtContacto'); ?>" disabled><?= form_error('txtContacto','<small class="text-danger pl-3">','</small>');?>
			                  	</div>
			            </div>

			            <div class="form-group">
			            	<label for="inputEmail3" class="col-sm-2 control-label">Ciudad</label>
			                	<div class="col-sm-10">
			                		<input type="txt" class="form-control" id="txtCiudad" name="txtCiudad" placeholder="Ciudad" 
	        						value="<?= set_value('txtCiudad'); ?>" disabled><?= form_error('txtCiudad','<small class="text-danger pl-3">','</small>');?>
			                  	</div>
			            </div>

			            <div class="form-group">
			            	<label for="inputEmail3" class="col-sm-2 control-label">Numero</label>
			                	<div class="col-sm-10">
			                		<input type="txt" maxlength="10" class="form-control" id="txtNumero" name="txtNumero" placeholder="Numero" 
	        						value="<?= set_value('txtNumero'); ?>" disabled><?= form_error('txtNumero','<small class="text-danger pl-3">','</small>');?>
			                  	</div>
			            </div>
			            
			            <div class="form-group">
			            	<label for="inputEmail3" class="col-sm-2 control-label">Direccion</label>
			                	<div class="col-sm-10">
			                		<input type="txt" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Direccion" 
	        						value="<?= set_value('txtDireccion'); ?>" disabled><?= form_error('txtDireccion','<small class="text-danger pl-3">','</small>');?>
			                  	</div>
			            </div>

			            <div class="form-group">
			            	<label for="inputEmail3" class="col-sm-2 control-label">Correo</label>
			                	<div class="col-sm-10">
			                		<input type="txt" class="form-control" id="txtEmail" name="txtEmail" placeholder="Correo" 
	        						value="<?= set_value('txtEmail'); ?>" disabled><?= form_error('txtEmail','<small class="text-danger pl-3">','</small>');?>
			                  	</div>
			            </div>

		        	</div>

		        	<div class="box-header with-border"></div>

		        	<div class="box-body">
								<h5 class="box-title">Productos</h5>

								<div class="form-group">
		            	<div class="col-sm-10">
		               		<button type="button" class="btn btn-success pull-left" id="myBtn">Agregar Producto</button>
		                </div>
		        		</div>

		        		<!-- Modal -->
							  <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="myModal" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
							    
							      <!-- Modal content-->
							      <div class="modal-content">
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title">Asistente de productos</h4>
							        </div>
							        <div class="modal-body">
							          
							        	<div class="box">
      <div class="box-header">
        <h3 class="box-title">Tabla de ventanas</h3>
      </div>
      <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tr valign="middle">
          <th>Modelo</th>
          <th>Altura</th>
          <th>Base</th>
          <th>Material marco</th>
          <th>Material cristal</th>
          <th>Descripcion</th>
          <th>Color</th>
          <th>Ancho perfil</th>
          <th>Acabado</th>
          <th>Peso</th>
          <th>Imagen</th>
          <th>Cantidad</th>
          <th>Costo produccion</th>
          <th>Precio publico</th>
          <th></th>
        </tr>
        <?php
            $idactualizado = null;
            $i = 0;
            if ($p == 0 || $p == null) {
        ?>
            <h1>No hay ventanas</h1>        
        <?php
            } else {
                if ($a != 0 || $a != null) {
                    foreach ($a as $key) {
                        $idactualizado = $key->idventanas;
        ?>
                    <tr bgcolor="#C0C0C0">
                        <td><?php echo $key->modelo ?></td>
                        <td><?php echo $key->altura ?> (cm)</td>
                        <td><?php echo $key->base ?> (cm)</td>
                        <td><?php echo $key->material_marco ?></td>
                        <td><?php echo $key->material_cristal ?></td>
                        <td><?php echo $key->descripcion ?></td>
                        <td><?php echo $key->color ?></td>
                        <td><?php echo $key->ancho_perfil ?> (cm)</td>
                        <td><?php echo $key->acabado ?></td>
                        <td><?php echo $key->peso ?> (kg)</td>
                        <td align="center"><img src="<?php echo base_url('assets/img/productos/ventanas/'.$key->imagen) ?>" width="100" height="100"></td>
                        <td><?php echo $key->cantidad ?> (pza)</td>
                        <td>$ <?php echo $key->costo_produccion ?></td>
                        <td>$ <?php echo $key->precio_publico ?></td>
                        <td align="center">
                            <a href="<?php echo base_url("cadmin/eliminarventana/") ?><?= $key->idventanas ?>" class="btn btn-success btn-group-middle"  data-placement="bottom" title="Eliminar">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
        <?php
                    }
                }
                foreach ($p as $fila) {
                    if ($idactualizado == $fila->idventanas) {
                         $i = $i + 1;
                    }else{
                    $i = $i + 1;
        ?>
                    <tr>
                        <td><?php echo $fila->modelo ?></td>
                        <td><?php echo $fila->altura ?> (cm)</td>
                        <td><?php echo $fila->base ?> (cm)</td>
                        <td><?php echo $fila->material_marco ?></td>
                        <td><?php echo $fila->material_cristal ?></td>
                        <td><?php echo $fila->descripcion ?></td>
                        <td><?php echo $fila->color ?></td>
                        <td><?php echo $fila->ancho_perfil ?> (cm)</td>
                        <td><?php echo $fila->acabado ?></td>
                        <td><?php echo $fila->peso ?> (kg)</td>
                        <td align="center"><img src="<?php echo base_url('assets/img/productos/ventanas/'.$fila->imagen) ?>" width="100" height="100"></td>
                        <td><?php echo $fila->cantidad ?> (pza)</td>
                        <td>$ <?php echo $fila->costo_produccion ?></td>
                        <td>$ <?php echo $fila->precio_publico ?></td>
                        <td align="center">
                            <a href="<?php echo base_url("cadmin/eliminarventana/") ?><?= $fila->idventanas ?>" class="btn btn-success btn-group-middle"  data-placement="bottom" title="Eliminar">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
        <?php
                }
            }
        }
        ?>
      </table>
      <script src="http://localhost/Cotizador/js/admin.js"></script>
    </div>
      <!-- /.box-body -->
    </div>

							        </div>
							        <div class="modal-footer">
							        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							        </div>
							      </div>
							      
							    </div>
							  </div>

		        		<table class="table table-hover">
					        <tr valign="middle">
					          <th>Item</th>
					          <th>Descripcion</th>
					          <th>Cantidad</th>
					          <th>Valor Unitario</th>
					          <th>Total</th>
					          <th></th>
					        </tr>
					      </table>

							</div>

							<div class="box-header with-border"></div>

		        	<div class="box-body">
								<h5 class="box-title">Venta</h5>

		            <div class="form-group">
		           		<label for="inputEmail3" class="col-sm-2 control-label">Condiciones comerciales</label>
									<div class="col-sm-4">
		              	<select class="form-control select2" style="width: 100%;" name="txtCondicion" id="txtCondicion">
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
		            		<?= form_error('txtCondicion','<small class="text-danger pl-3">','</small>');?>
		            	</div>
		            		<label for="inputEmail3" class="col-sm-1 control-label">Otro</label>
		                	<div class="col-sm-5">
		                		<input type="txt" class="form-control" id="txtOtro1" name="txtOtro1" placeholder="Otro" 
        								value="<?= set_value('txtOtro1'); ?>" disabled><?= form_error('txtOtro1','<small class="text-danger pl-3">','</small>');?>
		                  	</div>
              		</div>

              		<div class="form-group">
			            	<label for="inputEmail3" class="col-sm-2 control-label">Subtotal</label>
			                	<div class="col-sm-10">
			                		<input type="txt" class="form-control" id="txtSub" name="txtSub" placeholder="Subtotal" 
	        						value="<?= set_value('txtSub'); ?>"><?= form_error('txtSub','<small class="text-danger pl-3">','</small>');?>
			                  	</div>
			            </div>

			            <div class="form-group">
			            	<label for="inputEmail3" class="col-sm-2 control-label">Iva</label>
			                	<div class="col-sm-10">
			                		<input type="txt" class="form-control" id="txtIva" name="txtIva" placeholder="Iva" 
	        						value="<?= set_value('txtIva'); ?>"><?= form_error('txtIva','<small class="text-danger pl-3">','</small>');?>
			                  	</div>
			            </div>

			            <div class="form-group">
			            	<label for="inputEmail3" class="col-sm-2 control-label">Total</label>
			                	<div class="col-sm-10">
			                		<input type="txt" class="form-control" id="txtTotal" name="txtTotal" placeholder="Total" 
	        						value="<?= set_value('txtTotal'); ?>"><?= form_error('txtTotal','<small class="text-danger pl-3">','</small>');?>
			                  	</div>
			            </div>

							</div>
    			</form>
	        </div>
		</div>
	</div>
</div>

<!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type='text/javascript'>
  $(document).ready(function(){
 
   $("#txtClienteR").change(function(){
    var nombre = $(this).val();
    $.ajax({
     url:'<?php echo base_url(); ?>cvendedor/clienteDetails',
     method: 'post',
     data: {nombre: nombre},
     dataType: 'json',
     success: function(response){
       var len = response.length;
       $("#txtNombre,#txtContacto,#txtCiudad,#txtNumero,#txtDireccion,#txtEmail").val("");
       if(len > 0){
         // Read values
         $('#txtNombre').val(response[0].nombre);
         $('#txtContacto').val(response[0].contacto);
         $('#txtCiudad').val(response[0].ciudad);
         $('#txtNumero').val(response[0].numero);
         $('#txtDireccion').val(response[0].direccion);
         $('#txtEmail').val(response[0].email);
       }
     }
   });
  });
 });

$( function() {
    $("#txtClienteR").change( function() {
        if ($(this).val() === "activem" || $(this).val() != "" ) {
           	$("#txtNombre").prop("disabled", false);
            $("#txtContacto").prop("disabled", false);
            $("#txtCiudad").prop("disabled", false);
            $("#txtNumero").prop("disabled", false);
            $("#txtDireccion").prop("disabled", false);
            $("#txtEmail").prop("disabled", false);
        } else {
            $("#txtNombre").prop("disabled", true);
            $("#txtContacto").prop("disabled", true);
            $("#txtCiudad").prop("disabled", true);
            $("#txtNumero").prop("disabled", true);
            $("#txtDireccion").prop("disabled", true);
            $("#txtEmail").prop("disabled", true);
        }
    });
});
$( function() {
	    $("#txtCondicion").change( function() {
	        if ($(this).val() === "activem") {
	           	$("#txtOtro1").prop("disabled", false);
	        } else {
	            
	            $("#txtOtro1").prop("disabled", true);
	        }
	    });
	});
 </script>

 <script type="text/javascript">
 	$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
  });
});
 </script>