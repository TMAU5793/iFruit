<?php 
   $session_account = $this->session->userdata('logged_in');
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="p-3 text-center">
         <a href="<?php echo base_url('admin'); ?>">
            <img src="<?php echo base_url('assets/images/favicon.png'); ?>" class="w-100" style="max-width:100px;">
         </a>
      </div>
      <div class="user-panel pb-3 mb-3 text-center">
         <div class="info p-0">
            <span class="text-white">iFruit Brand</span>
         </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview menu-open">
               <a href="<?php echo base_url('admin/Product'); ?>" class="nav-link <?php echo ($this->router->fetch_class()=='Product')? 'active':'';?>">
                  <i class="nav-icon fab fa-product-hunt"></i>
                  <p>สินค้า</p>
               </a>
            </li>
            <li class="nav-item has-treeview menu-open">
               <a href="<?php echo base_url('admin/Promotion'); ?>" class="nav-link <?php echo ($this->router->fetch_class()=='Promotion')? 'active':'';?>">
                  <i class="nav-icon fas fa-gift"></i>
                  <p>โปรโมชั่น</p>
               </a>
            </li>
            <!--li class="nav-item has-treeview menu-open">
               <a href="<?php echo base_url('admin/Home/form'); ?>" class="nav-link <?php echo ($this->router->fetch_class()=='Home')? 'active':'';?>">
                  <i class="nav-icon fas fa-home"></i>
                  <p>หน้าแรก</p>
               </a>
            </!--li>
            <li class="nav-item has-treeview menu-open">
               <a href="<?php echo base_url('admin/About'); ?>" class="nav-link <?php echo ($this->router->fetch_class()=='About')? 'active':'';?>">
                  <i class="nav-icon fas fa-file-signature"></i>
                  <p>เกี่ยวกับเรา</p>
               </a>
            </li>
            <li class="nav-item has-treeview menu-open">
               <a href="<?php echo base_url('admin/Service'); ?>" class="nav-link <?php echo ($this->router->fetch_class()=='Service')? 'active':'';?>">
                  <i class="nav-icon fas fa-hand-holding"></i>
                  <p>บริการ</p>
               </a>
            </li>
            <li class="nav-item has-treeview menu-open">
               <a href="<?php echo base_url('admin/Work'); ?>" class="nav-link <?php echo ($this->router->fetch_class()=='Work')? 'active':'';?>">
                  <i class="nav-icon fas fa-praying-hands"></i>
                  <p>ผลงาน</p>
               </a>
            </li>
            <li class="nav-item has-treeview menu-open">
               <a href="<?php echo base_url('admin/Contact'); ?>" class="nav-link <?php echo ($this->router->fetch_class()=='Contact')? 'active':'';?>">
                  <i class="nav-icon fas fa-tty"></i>
                  <p>ข้อมูลติดต่อ</p>
               </a>
            </li>
            <li class="nav-item has-treeview menu-open">
               <a href="<?php echo base_url('admin/Banner'); ?>" class="nav-link <?php echo ($this->router->fetch_class()=='Banner')? 'active':'';?>">
                  <i class="nav-icon fas fa-image"></i>
                  <p>แบนเนอร์</p>
               </a>
            </li>
            <li-- class="nav-item has-treeview menu-open">
               <a href="<?php echo base_url('admin/Gallery/addimages'); ?>" class="nav-link <?php echo ($this->router->fetch_class()=='Gallery')? 'active':'';?>">
                  <i class="nav-icon fas fa-images"></i>
                  <p>แกลลอรี่</p>
               </a>
            </li-->
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>