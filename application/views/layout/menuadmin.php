<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/dist/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('s_usuario'); ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Navegacion</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Personal</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
      <ul class="treeview-menu">
        <li class="active"><a href="<?php echo base_url(); ?>cadmin"><i class="fa fa-table" aria-hidden="true"></i></i> Tabla personal</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>cadmin/viewregistro"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrar personal</a></li>
      </ul>
        </li>
        <li class="treeview">
          <a href="#">
           <i class="fa fa-book" aria-hidden="true"></i> <span>Clientes</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url(); ?>cadmin/vtablaclientes"><i class="fa fa-table" aria-hidden="true"></i></i> Tabla clientes</a></li>
            <li class="active"><a href="<?php echo base_url(); ?>cadmin/vregistroclientes"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrar clientes</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
           <i class="fa fa-tags" aria-hidden="true"></i> <span>Productos</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url(); ?>cadmin/vtablaventanas"><i class="fa fa-table" aria-hidden="true"></i></i> Tabla ventanas</a></li>
            <li class="active"><a href="<?php echo base_url(); ?>cadmin/vtablacanceles"><i class="fa fa-table" aria-hidden="true"></i></i> Tabla canceles</a></li>
            <li class="active"><a href="<?php echo base_url(); ?>cadmin/vtablapuertas"><i class="fa fa-table" aria-hidden="true"></i></i> Tabla puertas</a></li>
            <li class="active"><a href="<?php echo base_url(); ?>cadmin/vregistroproducto"><i class="fa fa-plus" aria-hidden="true"></i> Registrar producto</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
           <i class="fa fa-cubes" aria-hidden="true"></i> <span>Materiales</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url(); ?>cadmin/vtablamateriales"><i class="fa fa-table" aria-hidden="true"></i></i> Tabla Materiales</a></li>
            <li class="active"><a href="<?php echo base_url(); ?>cadmin/vregistromateriales"><i class="fa fa-cube" aria-hidden="true"></i> Registrar Material</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <div class="content">