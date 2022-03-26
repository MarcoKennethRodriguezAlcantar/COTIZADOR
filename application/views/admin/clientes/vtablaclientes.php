<div class="row">
  <div class="col-xs-12">
    <?= $this->session->flashdata('message'); ?>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Tabla de Clientes</h3>
      </div>
      <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tr valign="middle">
          <th>Nombre</th>
          <th>Contacto</th>
          <th>Ciudad</th>
          <th>Numero</th>
          <th>Direccion</th>
          <th>Email</th>
          <th></th>
        </tr>
        <?php
            $idactualizado = null;
            $i = 0;
            if ($p == 0 || $p == null) {
        ?>
            <h1>No hay clientes</h1>        
        <?php
            } else {
                if ($a != 0 || $a != null) {
                    foreach ($a as $key) {
                        $idactualizado = $key->idclientes;
        ?>
                    <tr bgcolor="#C0C0C0">
                        <td><?php echo $key->nombre ?></td>
                        <td><?php echo $key->contacto ?></td>
                        <td><?php echo $key->ciudad ?></td>
                        <td><?php echo $key->numero ?></td>
                        <td><?php echo $key->direccion ?></td>
                        <td><?php echo $key->email ?></td>
                        <td align="center">
                            <a href="<?php echo base_url("cadmin/eliminarcliente/") ?><?= $key->idclientes ?>" class="btn btn-danger btn-group-middle"  data-placement="bottom" title="Eliminar">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                            <a href="<?php echo base_url("cadmin/editacliente/") ?><?= $key->idclientes ?>" class="btn btn-warning btn-group-middle"  data-placement="bottom" title="Editar">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
        <?php
                    }
                }
                foreach ($p as $fila) {
                    if ($idactualizado == $fila->idclientes) {
                         $i = $i + 1;
                    }else{
                    $i = $i + 1;
        ?>
                    <tr>
                        <td><?php echo $fila->nombre ?></td>
                        <td><?php echo $fila->contacto ?></td>
                        <td><?php echo $fila->ciudad ?></td>
                        <td><?php echo $fila->numero ?></td>
                        <td><?php echo $fila->direccion ?></td>
                        <td><?php echo $fila->email ?></td>
                        <td align="center">
                            <a href="<?php echo base_url("cadmin/eliminarcliente/") ?><?= $fila->idclientes ?>" class="btn btn-danger btn-group-middle"  data-placement="bottom" title="Eliminar">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                            <a href="<?php echo base_url("cadmin/editacliente/") ?><?= $fila->idclientes ?>" class="btn btn-warning btn-group-middle"  data-placement="bottom" title="Editar">
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