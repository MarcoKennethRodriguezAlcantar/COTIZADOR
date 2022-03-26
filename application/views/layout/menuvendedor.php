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
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-book" aria-hidden="true"></i> <span>Ventas</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> Cotizacion</a></li>
          </ul>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url(); ?>cvendedor/viewtabla"><i class="fa fa-table" aria-hidden="true"></i> Tabla Cotizaciones</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <div class="content">