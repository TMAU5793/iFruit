<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container">
         <div class="row mb-2">
            <div class="col-sm-6">
               <?php $segment =  $this->uri->segment(3); ?>
               <h1 class="m-0 text-dark"><?php echo ($segment=="form" ? 'เพิ่มข้อมูล' : 'แก้ไขข้อมูล') ?></h1>
            </div>
            <div class="col-sm-6 text-right">
               <div class="btn-manage">
                  <button class="btn btn-success" id="btn_submit">บันทึก</button>
                  <a href="<?php echo base_url('admin/Banner'); ?>" class="btn btn-warning">ยกเลิก</a>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Main content -->
   <section class="content pb-5">
      <div class="container">
         <form id="frm_submit" action="<?php echo base_url('admin/Banner/'.$action); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="hd_id" value="<?php echo (isset($info) ? $info->id : ''); ?>">
            <div class="form-group">
               <label for="txt_name">ชื่อแบนเนอร์</label>
               <input type="text" class="form-control" id="txt_name" name="txt_name" placeholder="แบนเนอร์หน้าแรก" value="<?php echo (isset($info->name) ? $info->name : set_value('txt_name')); ?>">
            </div>
            <div class="form-group">
               <label for="ddl_page">แสดงที่หน้า *</label>
               <select name="ddl_page" id="ddl_page" class="form-control">
                  <option value="">-- แสดงที่หน้า --</option>
                  <option value="home" <?php echo (isset($info) ? ($info->page == 'home' ? 'selected=selected' : '') : ''); ?>>หน้าแรก</option>
                  <option value="about" <?php echo (isset($info) ? ($info->page == 'about' ? 'selected=selected' : '') : ''); ?>>เกี่ยวกับเรา</option>
                  <option value="executive" <?php echo (isset($info) ? ($info->page == 'executive' ? 'selected=selected' : '') : ''); ?>>ประวัติผู้บริหาร</option>
                  <option value="service" <?php echo (isset($info) ? ($info->page == 'service' ? 'selected=selected' : '') : ''); ?>>บริการของเรา</option>
                  <option value="work" <?php echo (isset($info) ? ($info->page == 'work' ? 'selected=selected' : '') : ''); ?>>ผลงานของเรา</option>
                  <option value="contact" <?php echo (isset($info) ? ($info->page == 'contact' ? 'selected=selected' : '') : ''); ?>>ติดต่อเรา</option>
               </select>
               <?php echo form_error('ddl_page', '<div class="text-danger small">*', '</div>'); ?>
            </div>
            <div class="row form-group">
               <div class="col-md-6">
                  <label for="">รูป (Desktop)</label>
                  <small class="d-block mb-2" id="d-size">*ขนาดรูปที่แนะนำ 1920 x 500 px</small>
                  <div class="thumbnail-section">
                     <img src="<?php echo (isset($info->images_desktop) ? base_url($info->images_desktop) : base_url('assets/images/default.png')); ?>" width="250" id="show_img">
                     <input type="file" class="d-block" name="thumbnail" id="thumbnail">
                     <input type="hidden" name="hd_file_img" id="hd_file_img" value="<?php echo (isset($info->images_desktop) ? $info->images_desktop : ''); ?>">
                     <input type="hidden" name="img_remove" id="img_remove" value="<?php echo (isset($info->images_desktop) ? $info->images_desktop : ''); ?>">
                     <label for="thumbnail" class="img-select btn-primary">เพิ่มรูป</label>
                     <?php echo form_error('hd_file_img', '<div class="text-danger small">*', '</div>'); ?>
                  </div>
               </div>
               <div class="col-md-6">
                  <label for="">รูป (Mobile)</label>
                  <small class="d-block mb-2">*ขนาดรูปที่แนะนำ 1000 x 650 px</small>
                  <div class="thumbnail-section">
                     <img src="<?php echo (isset($info->images_mobile) ? base_url($info->images_mobile) : base_url('assets/images/default.png')); ?>" width="250" id="show_img_mb">
                     <input type="file" class="d-block" name="thumbnail_mobile" id="thumbnail_mobile">
                     <input type="hidden" name="hd_file_img_mb" id="hd_file_img_mb" value="<?php echo (isset($info->images_mobile) ? $info->images_mobile : ''); ?>">
                     <input type="hidden" name="img_remove_mb" id="img_remove_mb" value="<?php echo (isset($info->images_mobile) ? $info->images_mobile : ''); ?>">
                     <label for="thumbnail_mobile" class="img-select btn-primary">เพิ่มรูป</label>
                     <?php echo form_error('thumbnail_mobile', '<div class="text-danger small">*', '</div>'); ?>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="txt_description">การเผยแพร่</label>
               <select name="ddl_status" id="ddl_status" class="form-control">
                  <option value="1" <?php echo (isset($info) ? ($info->status == '1' ? 'selected=selected' : '') : '' ); ?>>เผยแพร่</option>
                  <option value="0" <?php echo (isset($info) ? ($info->status == '0' ? 'selected=selected' : '') : '' ); ?>>ไม่เผยแพร่</option>
               </select>      
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
      $("#thumbnail").change(function () {
         readURL(this);
         let file = $("#thumbnail")[0].files[0];
         $('#hd_file_img').val(file.name);
      });

      $("#thumbnail_mobile").change(function () {
         readURL(this,'show_img_mb');
         let file = $("#thumbnail_mobile")[0].files[0];
         $('#hd_file_img_mb').val(file.name);
      });

      let result = $('#ddl_page').val();
      if(result=='home'){
         $('#d-size').html('*ขนาดรูปที่แนะนำ 1920 x 970 px');
      }
      $('#ddl_page').on('change',function(){
         result = $(this).val();
         if(result=='home'){
            $('#d-size').html('*ขนาดรูปที่แนะนำ 1920 x 970 px');
         }else{
            $('#d-size').html('*ขนาดรูปที่แนะนำ 1920 x 500 px');
         }
      });

      $('#btn_submit').on('click',function(){
         $('#frm_submit').submit();
      });
   });
</script>