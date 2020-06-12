<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">เปลี่ยนรหัสผ่าน</h1></h1>
            </div>
            <div class="col-sm-6 text-right">
               <div class="btn-manage">
                  <button class="btn btn-success" id="btn_submit">บันทึก</button>
                  <a href="<?php echo base_url('admin/Employee'); ?>" class="btn btn-warning">ยกเลิก</a>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Main content -->
   <section class="content">
      <div class="container">
         <form id="frm_submit" action="<?php echo base_url('admin/Changepassword/update'); ?>" method="POST" enctype="multipart/form-data">
            <?php
               $session_data = $this->session->userdata('logged_in');
            ?>
            <input type="hidden" name="hd_id" value="<?php echo (isset($session_data) ? $session_data['id'] : ''); ?>">
            <div class="form-group">
               <label for="txt_name">ชื่อผู้ใช้</label>
               <input type="text" class="form-control" id="txt_name" name="txt_name" value="<?php echo (isset($session_data['account']) ? $session_data['account'] : set_value('txt_name')); ?>" disabled>
            </div>
            <div class="form-group">
               <label for="txt_password_old">รหัสผ่านเก่า</label>
               <input type="password" class="form-control" id="txt_password_old" name="txt_password_old" value="">
               <?php echo form_error('txt_password_old', '<div class="text-danger small">*', '</div>'); ?>
            </div>
            <div class="form-group">
               <label for="txt_password_new">รหัสผ่านใหม่</label>
               <input type="password" class="form-control" id="txt_password_new" name="txt_password_new" value="">
               <?php echo form_error('txt_password_new', '<div class="text-danger small">*', '</div>'); ?>
               <span id="lengthpass" class="text-danger"></span>
            </div>
            <div class="form-group">
               <label for="txt_password_confirm">ยืนยันรหัสผ่านใหม่</label>
               <input type="password" class="form-control" id="txt_password_confirm" name="txt_password_confirm" value="">
               <?php echo form_error('txt_password_confirm', '<div class="text-danger small">*', '</div>'); ?>
               <span id="notmatch" class="text-danger"></span>
            </div>
         </form>
      </div>
   </section>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<script type="text/javascript">
   $(function(){
      $('#btn_submit').on('click',function(){
         let passnew = $('#txt_password_new').val();
         let passcom = $('#txt_password_confirm').val();
         console.log(passnew+" "+passcom);
         if(passnew!=passcom && passnew.length < 8){
            $('#notmatch').html('*รหัสผ่านไม่ตรงกัน');
         }else{
            $('#frm_submit').submit();
         }
      });

      $('#txt_password_confirm').on('blur',function(){
         let passnew = $('#txt_password_new').val();
         let passcom = $('#txt_password_confirm').val();
         if(passnew!=passcom){
            $('#notmatch').html('*รหัสผ่านไม่ตรงกัน');
         }
      });
      $('#txt_password_new').on('blur',function(){
         let passnew = $('#txt_password_new').val();
         if(passnew.length < 8){
            $('#lengthpass').html('*ความยาวรหัสผ่าน 8 ตัวอักษรขึ้นไป');
         }
      });
      $('#txt_password_confirm').click(function(){
         $('#notmatch').html('');
      });
      $('#txt_password_new').click(function(){
         $('#lengthpass').html('');
      });
   });
</script>