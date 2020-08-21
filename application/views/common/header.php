<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="iFruit">
	<title><?php echo (isset($metatitle) ? $metatitle : 'iFruit brand'); ?></title>
	<link rel="icon" href="<?php echo base_url('assets/images/favicon.png'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/fonts/sukhumvit/font.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/fonts/rukdeaw/font.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/fonts/thunder/font.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/slick/slick/slick.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/slick/slick/slick-theme.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('ckfinder-3.4.1/skins/moono/ckfinder.css'); ?>">
	<?php echo js_asset('jquery.min.js'); ?>
	<?php echo css_asset('bootstrap.min.css'); ?>
	<?php echo css_asset('ifruit.css'); ?>	
</head>
<body>
	<?php
		if(!isset($nav_class) && !isset($cart_img)){
			$ctrlName = $this->router->fetch_class();
			if($ctrlName=='Home' || $ctrlName=='Product' || $ctrlName=='Order' || $ctrlName=='Cart'){
				$nav_class = "nav-brown";		
			}else{
				$nav_class = "nav-white";
			}
		}
	?>
	<nav class="navbar navbar-expand-lg fixed-top <?php echo $nav_class; ?>">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url(); ?>">
				<img src="<?php echo base_url('assets/images/logo-footer.png'); ?>" width="100">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			 <span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto"></ul>
				<ul class="navbar-nav">
					<li class="nav-item <?php echo ($this->router->fetch_class()=='Home')? 'active':'';?>">
						<a class="nav-link" href="<?php echo base_url(); ?>">หน้าแรก</a>
					</li>
					<li class="nav-item <?php echo ($this->router->fetch_class()=='Product')? 'active':'';?>">
						<a class="nav-link" href="<?php echo base_url('Product'); ?>">สินค้า</a>
					</li>
					<li class="nav-item <?php echo ($this->router->fetch_class()=='Order')? 'active':'';?>">
						<a class="nav-link" href="<?php echo base_url('Order'); ?>">ซื้อออนไลน์</a>
					</li>
					<li class="nav-item <?php echo ($this->router->fetch_class()=='Newspromotion')? 'active':'';?>">
						<a class="nav-link" href="<?php echo base_url('Newspromotion'); ?>">ข่าวสาร และโปรโมชั่น</a>
					</li>
					<li class="nav-item <?php echo ($this->router->fetch_class()=='About')? 'active':'';?>">
						<a class="nav-link" href="<?php echo base_url('About'); ?>">เกี่ยวกับเรา</a>
					</li>
					<li class="nav-item <?php echo ($this->router->fetch_class()=='Contact')? 'active':'';?>">
						<a class="nav-link" href="<?php echo base_url('Contact'); ?>">ติดต่อเรา</a>
					</li>
					<li class="nav-item cart">
						<a class="nav-link" href="#" id="cartList" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>						
						<span class="badge badge-danger badge-cart"></span>						
						<div class="dropdown" aria-labelledby="cartList">							
							<div class="dropdown-menu myCart">
								<div class="arrow"></div>
								<span class="emptyCart text-center d-block p-2">ไม่มีสินค้าในตระกร้า</span>
								<a href="<?php echo base_url('Order'); ?>" class="text-center d-block">เพิ่มสินค้า</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
