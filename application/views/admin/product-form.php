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
                  <a href="<?php echo base_url('admin/Product'); ?>" class="btn btn-warning">ยกเลิก</a>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Main content -->
   <section class="content pb-5">
      <div class="container">
         <form id="frm_submit" action="<?php echo base_url('admin/Product/'.$action); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="hd_id" value="<?php echo (isset($info) ? $info->p_id : ''); ?>">
            <div class="form-group">
               <label for="txt_name">ชื่อสินค้า *</label>
               <input type="text" class="form-control" id="txt_name" name="txt_name" placeholder="รสฮอตชิลลี่" value="<?php echo (isset($info->p_name) ? $info->p_name : set_value('txt_name')); ?>">
               <?php echo form_error('txt_name', '<div class="text-danger small">*', '</div>'); ?>
            </div>
            <div class="form-group">
               <label for="txt_subtitle">เกี่ยวกับสินค้า</label>
               <input type="text" class="form-control" id="txt_subtitle" name="txt_subtitle" placeholder="กล้วยหอมทองทอดอบกรอบ" value="<?php echo (isset($info->p_subtitle) ? $info->p_subtitle : set_value('txt_subtitle')); ?>">
            </div>
            <div class="form-group">
               <label for="txt_price">ราคาสินค้า (บาท)</label>
               <input type="text" class="form-control" id="txt_price" name="txt_price" placeholder="ตัวอย่าง : 30" value="<?php echo (isset($info->p_price) ? $info->p_price : set_value('txt_price')); ?>">
               <?php echo form_error('txt_price', '<div class="text-danger small">*', '</div>'); ?>
            </div>
            <div class="form-group">
               <label for="txt_shortdesc">รายละเอียดย่อ</label>
               <textarea name="txt_shortdesc" id="txt_shortdesc" name="txt_shortdesc" class="form-control" rows="5"><?php echo (isset($info->p_shortdesc) ? $info->p_shortdesc : set_value('txt_shortdesc')); ?></textarea>
               <?php echo form_error('txt_shortdesc', '<div class="text-danger small">*', '</div>'); ?>
            </div>
            <div class="form-group editor_description">
               <label for="txt_description">รายละเอียด</label>
               <textarea name="txt_description" id="txt_description" name="txt_description" class="form-control" rows="10"><?php echo (isset($info->p_description) ? $info->p_description : set_value('txt_description')); ?></textarea>       
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="">รูป (thumbnail)</label>
                     <small class="d-block mb-2">*ขนาดรูปที่แนะนำ 600 x 400 px</small>
                     <?php echo form_error('hd_thumbnail', '<div class="text-danger small">*', '</div>'); ?>
                     <div class="thumbnail-section">
                        <img src="<?php echo (isset($info->p_thumbnail) ? base_url($info->p_thumbnail) : base_url('assets/images/default.png')); ?>" width="250" id="show_img">
                        <input type="file" class="d-block" name="thumbnail" id="thumbnail">
                        <input type="hidden" name="hd_thumbnail" id="hd_thumbnail" value="<?php echo (isset($info->p_thumbnail) ? $info->p_thumbnail : ''); ?>">
                        <input type="hidden" name="hd_file_img" id="hd_file_img" value="<?php echo (isset($info->p_thumbnail) ? $info->p_thumbnail : ''); ?>">
                        <label for="thumbnail" class="img-select btn-primary">เพิ่มรูป</label>                  
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="">รูป (แบนเนอร์)</label>
                     <small class="d-block mb-2">*ขนาดรูปที่แนะนำ 1920 x 1080 px</small>
                     <div class="thumbnail-section">
                        <img src="<?php echo (isset($info->p_banner) ? base_url($info->p_banner) : base_url('assets/images/default.png')); ?>" width="250" id="show_banner">
                        <input type="file" class="d-block" name="banner" id="banner">
                        <input type="hidden" name="hd_banner" id="hd_banner" value="<?php echo (isset($info->p_banner) ? $info->p_banner : ''); ?>">
                        <label for="banner" class="img-select btn-primary">เพิ่มรูป</label>                  
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="">รูป (สำหน้าหน้าซื้อออนไลน์)</label>
                     <small class="d-block mb-2">*ขนาดรูปที่แนะนำ 500 x 560 px</small>
                     <div class="thumbnail-section">
                        <img src="<?php echo (isset($info->p_thumbnail_buy) ? base_url($info->p_thumbnail_buy) : base_url('assets/images/default.png')); ?>" width="250" id="show_thumb_buy">
                        <input type="file" class="d-block" name="thumb_buy" id="thumb_buy">
                        <input type="hidden" name="hd_thumb_buy" id="hd_thumb_buy" value="<?php echo (isset($info->p_thumbnail_buy) ? $info->p_thumbnail_buy : ''); ?>">
                        <label for="thumb_buy" class="img-select btn-primary">เพิ่มรูป</label>                  
                     </div>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="txt_description">การเผยแพร่</label>
               <select name="ddl_status" id="ddl_status" class="form-control">
                  <option value="1" <?php echo (isset($info) ? ($info->p_status == '1' ? 'selected=selected' : '') : '' ); ?>>เผยแพร่</option>
                  <option value="0" <?php echo (isset($info) ? ($info->p_status == '0' ? 'selected=selected' : '') : '' ); ?>>ไม่เผยแพร่</option>
               </select>      
            </div>
         </form>
      </div>
   </section>
</div>
<aside class="control-sidebar control-sidebar-dark"></aside>
<script src="<?php echo base_url('assets/node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') ?>"></script>
<script>
   $(function(){      
      $("#thumbnail").change(function () {
         readURL(this);
         $('#hd_thumbnail').val($(this)[0].files[0].name);
      });
      $("#banner").change(function () {
         readURL(this,'show_banner');
      });
      $("#thumb_buy").change(function () {
         readURL(this,'show_thumb_buy');
      });
      $('#btn_submit').on('click',function(){
         $('#frm_submit').submit();
      });

      ClassicEditor
         .create( document.querySelector( '#txt_description' ) )
         .then( editor => {
            console.log( editor );
         } )
         .catch( error => {
            console.error( error );
         } );
   });
</script>