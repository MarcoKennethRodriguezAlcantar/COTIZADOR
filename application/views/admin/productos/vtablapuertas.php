<div class="row">
  <div class="col-xs-12">
    <?= $this->session->flashdata('message'); ?>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Tabla de puertas</h3>
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
            <h1>No hay puertas</h1>        
        <?php
            } else {
                if ($a != 0 || $a != null) {
                    foreach ($a as $key) {
                        $idactualizado = $key->idpuertas;
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
                        <td align="center"><img src="<?php echo base_url('assets/img/productos/puertas/' . $key->imagen) ?>" alt="Cinque Terre" width="100" height="100"></td>
                        <td><?php echo $key->cantidad ?> (pza)</td>
                        <td>$ <?php echo $key->costo_produccion ?></td>
                        <td>$ <?php echo $key->precio_publico ?></td>
                        <td align="center">
                            <a href="<?php echo base_url("cadmin/eliminarpuerta/") ?><?= $key->idpuertas ?>" class="btn btn-danger btn-group-middle"  data-placement="bottom" title="Eliminar">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                            <a href="<?php echo base_url("cadmin/editapuerta/") ?><?= $key->idpuertas ?>" class="btn btn-warning btn-group-middle"  data-placement="bottom" title="Editar">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
        <?php
                    }
                }
                foreach ($p as $fila) {
                    if ($idactualizado == $fila->idpuertas) {
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
                        <td align="center"><img src="<?php echo base_url('assets/img/productos/puertas/'.$fila->imagen) ?>" width="100" height="100"></td>
                        <td><?php echo $fila->cantidad ?> (pza)</td>
                        <td>$ <?php echo $fila->costo_produccion ?></td>
                        <td>$ <?php echo $fila->precio_publico ?></td>
                        <td align="center">
                            <a href="<?php echo base_url("cadmin/eliminarpuerta/") ?><?= $fila->idpuertas ?>" class="btn btn-danger btn-group-middle"  data-placement="bottom" title="Eliminar">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                            <a href="<?php echo base_url("cadmin/editapuerta/") ?><?= $fila->idpuertas ?>" class="btn btn-warning btn-group-middle"  data-placement="bottom" title="Editar">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
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
      <!-- /.box -->
  </div>
</div>