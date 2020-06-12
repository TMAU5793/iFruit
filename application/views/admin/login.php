<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>iFruit Back office</title>
   <link rel="icon" href="<?php echo base_url('assets/images/favicon.png'); ?>">
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/fonts/sukhumvit/font.css'); ?>">
   <?php echo css_asset('backend.css'); ?>
   <?php echo css_asset('bootstrap.min.css'); ?>
   <script src="<?php echo base_url('assets/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
   <?php echo js_asset('bootstrap.min.js'); ?>
   
</head>
<body class="hold-transition login-page">
   <div class="container">
      <div class="d-flex justify-content-center h-100">
         
         <div class="card">
            <div class="p-3 text-center mt-5">
               <img src="<?php echo base_url('assets/images/logo-footer.png'); ?>" class="w-100" style="max-width:120px;">
            </div>
            <div class="card-body">
               <h3 class="text-center">ระบบจัดการข้อมูล</h3>
               <form method="POST" action="<?php echo $action;?>">
                  <div class="text-danger text-center error-login"><?php echo form_error('txt_password'); ?></div>
                  <div class="input-group form-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                     </div>
                     <input type="text" name="txt_account" class="form-control" placeholder="username" value="<?php echo set_value('txt_account'); ?>">                     
                  </div>                  
                  <div class="input-group form-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                     </div>
                     <input type="password" name="txt_password" class="form-control" placeholder="password">                     
                  </div>
                  <div class="form-group">
                     <input type="submit" value="เข้าสู่ระบบ" class="btn float-right login_btn">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</body>
<script>
   $(function(){
      $('input[name="txt_account"], input[name="txt_password"]').on('click',function(){
         $('.error-login').html('');
      });
   });
</script>
</html>
