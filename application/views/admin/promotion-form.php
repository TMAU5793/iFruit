<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container">
         <div class="row mb-2">
            <div class="col-sm-6">
               <?php $segment =  $this->uri->segment(3); ?>
               <h1 class="m-0 text-dark"><?php echo ($segment=="form" || $segment=="create" ? 'เพิ่มข้อมูล' : 'แก้ไขข้อมูล'); ?></h1>
            </div>
            <div class="col-sm-6 text-right">
               <div class="btn-manage">
                  <button class="btn btn-success" id="btn_submit">บันทึก</button>
                  <a href="<?php echo base_url('admin/Promotion'); ?>" class="btn btn-warning">ยกเลิก</a>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Main content -->
   <section class="content pb-5">
      <div class="container">
         <form id="frm_submit" action="<?php echo base_url('admin/Promotion/'.$action); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="hd_id" value="<?php echo (isset($info) ? $info->id : ''); ?>">
            <div class="form-group">
               <label for="txt_title">หัวข้อผลงาน</label>
               <input type="text" class="form-control" id="txt_title" name="txt_title" placeholder="ตัวอย่าง : ผลงานด้านที่ปรึกษา" value="<?php echo (isset($info->title) ? $info->title : set_value('txt_title')); ?>">
               <?php echo form_error('txt_title', '<div class="text-danger small">*', '</div>'); ?>
            </div>
            <div class="form-group">
               <label for="txt_shortdesc">รายละเอียดย่อ *</label>
               <textarea name="txt_shortdesc" id="txt_shortdesc" name="txt_shortdesc" class="form-control"><?php echo (isset($info->short_desc) ? $info->short_desc : set_value('txt_shortdesc')); ?></textarea>
               <?php echo form_error('txt_shortdesc', '<div class="text-danger small">*', '</div>'); ?>
            </div>
            <div class="form-group editor_description">
               <label for="txt_description">รายละเอียด</label>
               <textarea name="txt_description" id="txt_description" name="txt_description" class="form-control"><?php echo (isset($info->description) ? $info->description : set_value('txt_description')); ?></textarea>       
            </div>
            <div class="form-group">
               <label for="">รูป</label>
               <small class="d-block mb-2">*ขนาดรูปที่แนะนำ 384 x 500 px</small>
               <div class="thumbnail-section">
                  <img src="<?php echo (isset($info->thumbnail) ? base_url($info->thumbnail) : base_url('assets/images/default.png')); ?>" width="250" id="show_img">
                  <input type="file" class="d-block" name="thumbnail" id="thumbnail">
                  <input type="hidden" name="hd_file_img" id="hd_file_img" value="<?php echo (isset($info->thumbnail) ? $info->thumbnail : ''); ?>">
                  <label for="thumbnail" class="img-select btn-primary">เพิ่มรูป</label>                  
               </div>
            </div>
            <div class="form-group">
               <label for="ddl_status">การเผยแพร่</label>
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
<script src="<?php echo base_url('node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js'); ?>"></script>
<script>
   $(function(){      
      $("#thumbnail").change(function () {
         readURL(this);
      });

      $('#btn_submit').on('click',function(){
         $('#frm_submit').submit();
      });

      ClassicEditor
		.create( document.querySelector( '#txt_shortdesc' ), {
			toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList' ]         
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

      ClassicEditor
		.create( document.querySelector( '#txt_shortwork' ), {
			toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

      CKEDITOR.replace('txt_description'); 
   });
</script>