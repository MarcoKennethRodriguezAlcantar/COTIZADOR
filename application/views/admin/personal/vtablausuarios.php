<div class="row">
  <div class="col-xs-12">
    <?= $this->session->flashdata('message'); ?>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Tabla de Usuarios</h3>
      </div>
      <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tr valign="middle">
          <th>Apellido paterno</th>
          <th>Apellido materno</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Puesto</th>
          <th>Numero</th>
          <th></th>
        </tr>
        <?php
            $idactualizado = null;
            $i = 0;
            if ($p == 0 || $p == null) {
        ?>
            <h1>No hay usuarios</h1>        
        <?php
            } else {
                if ($a != 0 || $a != null) {
                    foreach ($a as $key) {
                        $idactualizado = $key->idusuarios;
                    ?>
                    <tr bgcolor="#C0C0C0">
                        <td><?php echo $key->appaterno ?></td>
                        <td><?php echo $key->apmaterno ?></td>
                        <td><?php echo $key->nombre ?></td>
                        <td><?php echo $key->correo ?></td>
                        <td><?php echo $key->puesto ?></td>
                        <td><?php echo $key->numero ?></td>
                        <td align="center">
                            <a href="<?php echo base_url("cadmin/eliminarPersona/") ?><?= $key->idusuarios ?>" class="btn btn-danger btn-group-middle"  data-placement="bottom" title="Eliminar">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                            <a href="<?php echo base_url("cadmin/editarusuario/") ?><?= $key->idusuarios ?>" class="btn btn-warning btn-group-middle"  data-placement="bottom" title="Editar">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
            <?php
                    }
                }
                foreach ($p as $fila) {
                    if ($idactualizado == $fila->idusuarios) {
                         $i = $i + 1;
                    }else{
                    $i = $i + 1;
        ?>
                    <tr>
                        <td><?php echo $fila->appaterno ?></td>
                        <td><?php echo $fila->apmaterno ?></td>
                        <td><?php echo $fila->nombre ?></td>
                        <td><?php echo $fila->correo ?></td>
                        <td><?php echo $fila->puesto ?></td>
                        <td><?php echo $fila->numero ?></td>
                        <td align="center">
                            <a href="<?php echo base_url("cadmin/eliminarPersona/") ?><?= $fila->idusuarios ?>" class="btn btn-danger btn-group-middle"  data-placement="bottom" title="Eliminar">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                            <a href="<?php echo base_url("cadmin/editarusuario/") ?><?= $fila->idusuarios ?>" class="btn btn-warning btn-group-middle"  data-placement="bottom" title="Editar">
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

