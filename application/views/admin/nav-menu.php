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
            <li class="nav-item">
               <a href="<?php echo base_url('admin/Product'); ?>" class="nav-link <?php echo ($this->router->fetch_class()=='Product')? 'active':'';?>">
                  <i class="nav-icon fab fa-product-hunt"></i>
                  <p>สินค้า</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="<?php echo base_url('admin/Newspromotion'); ?>" class="nav-link <?php echo ($this->router->fetch_class()=='Newspromotion')? 'active':'';?>">
                  <i class="nav-icon fas fa-gift"></i>
                  <p>ข่าวสาร และโปรโมชั่น</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="<?php echo base_url('admin/About'); ?>" class="nav-link <?php echo ($this->router->fetch_class()=='About')? 'active':'';?>">
                  <i class="nav-icon fas fa-file-signature"></i>
                  <p>เกี่ยวกับเรา</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="<?php echo base_url('admin/Contact'); ?>" class="nav-link <?php echo ($this->router->fetch_class()=='Contact')? 'active':'';?>">
                  <i class="nav-icon fas fa-tty"></i>
                  <p>ข้อมูลติดต่อ</p>
               </a>
            </li>      
            <li class="nav-item">
               <a href="<?php echo base_url('admin/Banner'); ?>" class="nav-link <?php echo ($this->router->fetch_class()=='Banner')? 'active':'';?>">
                  <i class="nav-icon fas fa-image"></i>
                  <p>สไลด์แบนเนอร์ (หน้าแรก)</p>
               </a>
            </li>
				<li class="nav-item <?php echo ($this->router->fetch_class()=='Shipping' || $this->router->fetch_class()=='Shippingrate')? 'menu-open':'';?>">
               <a href="#" class="nav-link <?php echo ($this->router->fetch_class()=='Shipping' || $this->router->fetch_class()=='Shippingrate')? 'active':'';?>">
                  <i class="nav-icon fas fa-shipping-fast"></i>
						<p>การจัดส่งสินค้า</p>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu" style="display: none;">
						<li class="<?php echo ($this->router->fetch_class()=='Shipping') ? 'active':'';?>">
							<a href="<?php echo base_url('admin/Shipping'); ?>"><i class="far fa-circle"></i> รูปแบบการจัดส่ง</a>
						</li>
						<li class="<?php echo ($this->router->fetch_class()=='Shippingrate') ? 'active':'';?>">
							<a href="<?php echo base_url('admin/Shippingrate'); ?>"><i class="far fa-circle"></i> ค่าบริการการจัดส่ง</a>
						</li>
					</ul>
            </li>
            <li class="nav-item">
               <a href="<?php echo base_url('admin/Logout'); ?>" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>ออกจากระบบ</p>
               </a>
            </li>
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>
<script>
	$(function(){
		$('.menu-open').find('.treeview-menu').show();
		$('.menu-open').find('.pull-right').removeClass('fa-angle-left');
		$('.menu-open').find('.pull-right').addClass('fa-angle-down');
		
		$('.nav-item').on('click',function(){
			$(this).find('.treeview-menu').show();
			$(this).find('.pull-right').removeClass('fa-angle-left');
			$(this).find('.pull-right').addClass('fa-angle-down');
		});		
	});
</script>
