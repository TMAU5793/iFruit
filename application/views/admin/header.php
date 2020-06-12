<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo (isset($meta_title) ? $meta_title : 'iFruit Brand'); ?></title>
		<link rel="shortcut icon"  type="image/x-icon" href="<?php echo base_url('assets/images/favicon.png');?>">
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/backend.css'); ?>">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Tempusdominus Bbootstrap 4 -->
		<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
		<!-- iCheck -->
		<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
		<!-- JQVMap -->
		<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/jqvmap/jqvmap.min.css'); ?>">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/dist/css/adminlte.min.css'); ?>">
		<!-- overlayScrollbars -->
		<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
		<!-- Daterange picker -->
		<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/daterangepicker/daterangepicker.css'); ?>">
		<!-- summernote -->
		<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/summernote/summernote-bs4.css'); ?>">
		<script src="<?php echo base_url('assets/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="<?php echo base_url('assets/fonts/sukhumvit/font.css'); ?>">
	</head>
	<body class="hold-transition sidebar-mini layout-fixed">
		<?php 
			$session_account = $this->session->userdata('logged_in');
		?>
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>
				</ul>

				<!-- Right navbar links -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle oline-none" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo $session_account['account']; ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="<?php echo base_url('admin/Changepassword'); ?>">เปลี่ยนรหัสผ่าน</a>
							<a class="dropdown-item" href="<?php echo base_url('admin/Logout'); ?>">ออกจากระบบ</a>
						</div>
					</li>
				</ul>
			</nav>
			<!-- /.navbar -->