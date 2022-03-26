<div class="row">
  <div class="col-xs-12">
    <?= $this->session->flashdata('message'); ?>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Tabla de Materiales</h3>
      </div>
      <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tr valign="middle">
          <th>Nombre</th>
          <th>Descripcion</th>
          <th>Cantidad</th>
          <th>Unidad</th>
          <th>Costo</th>
          <th>Tipo</th>
          <th></th>
        </tr>
        <?php
            $idactualizado = null;
            $i = 0;
            if ($p == 0 || $p == null) {
        ?>
            <h1>No hay materiales</h1>        
        <?php
            } else {
                if ($a != 0 || $a != null) {
                    foreach ($a as $key) {
                        $idactualizado = $key->idmateriales;
        ?>
                    <tr bgcolor="#C0C0C0">
                        <td><?php echo $key->nombre ?></td>
                        <td><?php echo $key->descripcion ?></td>
                        <td><?php echo $key->cantidad ?></td>
                        <td><?php echo $key->unidad ?></td>
                        <td><?php echo $key->costo ?></td>
                        <td><?php echo $key->tipo ?></td>
                        <td align="center">
                            <a href="<?php echo base_url("cadmin/eliminarmaterial/") ?><?= $key->idmateriales ?>" class="btn btn-danger btn-group-middle"  data-placement="bottom" title="Eliminar">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                            <a href="<?php echo base_url("cadmin/editamaterial/") ?><?= $key->idmateriales ?>" class="btn btn-warning btn-group-middle"  data-placement="bottom" title="Editar">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
        <?php
                    }
                }
                foreach ($p as $fila) {
                    if ($idactualizado == $fila->idmateriales) {
                         $i = $i + 1;
                    }else{
                    $i = $i + 1;
        ?>
                    <tr>
                        <td><?php echo $fila->nombre ?></td>
                        <td><?php echo $fila->descripcion ?></td>
                        <td><?php echo $fila->cantidad ?></td>
                        <td><?php echo $fila->unidad ?></td>
                        <td><?php echo $fila->costo ?></td>
                        <td><?php echo $fila->tipo ?></td>
                        <td align="center">
                            <a href="<?php echo base_url("cadmin/eliminarmaterial/") ?><?= $fila->idmateriales ?>" class="btn btn-danger btn-group-middle"  data-placement="bottom" title="Eliminar">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                            <a href="<?php echo base_url("cadmin/editamaterial/") ?><?= $fila->idmateriales ?>" class="btn btn-warning btn-group-middle"  data-placement="bottom" title="Editar">
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