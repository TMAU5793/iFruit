<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">ข้อมูลติดต่อ</h1></h1>
            </div>
            <div class="col-sm-6 text-right">
               <div class="btn-manage">
                  <button class="btn btn-warning" id="btn_edit">แก้ไข</button>
                  <button class="btn btn-success d-none" id="btn_submit">บันทึก</button>
                  <a href="<?php echo base_url('admin/Contact'); ?>" class="btn btn-warning d-none" id="btn_cancel">ยกเลิก</a>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Main content -->
   <section class="content pb-5">
      <div class="container">
         <form id="frm_submit" action="<?php echo base_url('admin/Contact/update'); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="hd_id" value="<?php echo ($info ? $info->id : ''); ?>">
            <div class="form-group">
               <label for="txt_address">ที่อยู่</label>
               <textarea name="txt_address" id="txt_address" name="txt_address" class="form-control"><?php echo (isset($info->address) ? $info->address : set_value('txt_address')); ?></textarea>
               <?php echo form_error('txt_address', '<div class="text-danger small">*', '</div>'); ?>
            </div>
            <div class="row">
               <div class="col-md-6 form-group">
                  <label for="txt_email">อีเมล</label>
                  <input type="email" class="form-control" id="txt_email" name="txt_email" value="<?php echo (isset($info->contact_mail) ? $info->contact_mail : set_value('txt_email')); ?>" require>
                  <?php echo form_error('txt_email', '<div class="text-danger small">*', '</div>'); ?>
               </div>
               <div class="col-md-6 form-group">
                  <label for="txt_tel">เบอร์โทร</label>
                  <input type="text" class="form-control" id="txt_tel" name="txt_tel" value="<?php echo (isset($info->contact_tel) ? $info->contact_tel : set_value('txt_tel')); ?>" require>
                  <?php echo form_error('txt_tel', '<div class="text-danger small">*', '</div>'); ?>
               </div>
               <div class="col-md-6 form-group">
                  <label for="txt_fax">เบอร์โทรสาร</label>
                  <input type="text" class="form-control" id="txt_fax" name="txt_fax" value="<?php echo (isset($info->contact_fax) ? $info->contact_fax : set_value('txt_fax')); ?>" require>
                  <?php echo form_error('txt_fax', '<div class="text-danger small">*', '</div>'); ?>
               </div>            
               <div class="col-md-6 form-group">
                  <label for="txt_line">Line ID</label>
                  <input type="text" class="form-control" id="txt_line" name="txt_line" value="<?php echo (isset($info->contact_line) ? $info->contact_line : set_value('txt_line')); ?>">
               </div>
               <div class="col-md-6 form-group">
                  <label for="txt_facebook">Facebook</label>
                  <input type="text" class="form-control" id="txt_facebook" name="txt_facebook" value="<?php echo (isset($info->contact_facebook) ? $info->contact_facebook : set_value('txt_facebook')); ?>">
               </div>
               <div class="col-md-6 form-group">
                  <label for="txt_instagram">Instagram</label>
                  <input type="text" class="form-control" id="txt_instagram" name="txt_instagram" value="<?php echo (isset($info->contact_instagram) ? $info->contact_instagram : set_value('txt_instagram')); ?>">
               </div>
               <div class="col-md-6 form-group">
                  <label for="txt_youtube">Youtube chanel</label>
                  <input type="text" class="form-control" id="txt_youtube" name="txt_youtube" value="<?php echo (isset($info->contact_youtube) ? $info->contact_youtube : set_value('txt_youtube')); ?>">
               </div>
               <div class="col-md-6 form-group">
                  <label for="txt_web">Website</label>
                  <input type="text" class="form-control" id="txt_web" name="txt_web" value="<?php echo (isset($info->contact_web) ? $info->contact_web : set_value('txt_web')); ?>">
               </div>
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
<script>
   //import $ from '../../../node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor';   
   $(function(){
      $('input, textarea').attr('disabled','disabled');
      $('#btn_edit').on('click',function(){
         $('input, textarea').removeAttr('disabled');
         $('#btn_submit').removeClass('d-none');
         $('#btn_cancel').removeClass('d-none');
         $(this).addClass('d-none');
      });

      $('#btn_submit').on('click',function(){
         $('#frm_submit').submit();
      });
   });
</script>