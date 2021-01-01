<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">E-Money</li>
        <li class="">

          <a class="nav-link" href="<?php echo site_url('home') ?>">
          <i class="fa fa-barcode"></i>
            <span>Menu</span>
          </a>
        </li> 
          <li class="treeview ?>">
            <a href="">
              <i class="fa fa-barcode"></i>
              <span>Option's</span><span class="pull-right-container"></span>
            </a>
            <!--SubMenu -->
            <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('C_rfid')?>"><i class="fa fa-circle-o "></i>RFID Registered List</a></li>
                    <li><a href="<?php echo site_url('C_rfid/newindex')?>"><i class="fa fa-circle-o"></i>RFID Unregistered List</a></li>
            </ul>
          </li>

      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>