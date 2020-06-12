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
                  <a href="<?php echo base_url('admin/Position'); ?>" class="btn btn-warning">ยกเลิก</a>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Main content -->
   <section class="content pb-5">
      <div class="container">
         <form id="frm_submit" action="<?php echo base_url('admin/Position/'.$action); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="hd_id" value="<?php echo (isset($info) ? $info->id : ''); ?>">
            <div class="form-group">
               <label for="txt_position">ชื่อตำแหน่ง *</label>
               <input type="text" class="form-control" id="txt_position" name="txt_position" placeholder="ตัวอย่าง : ทนายความ" value="<?php echo (isset($info->position) ? $info->position : set_value('txt_position')); ?>">
               <?php echo form_error('txt_position', '<div class="text-danger small">*', '</div>'); ?>
            </div>            
            <div class="form-group editor_description">
               <label for="txt_description">รายละเอียด</label>
               <textarea name="txt_description" id="txt_description" name="txt_description" class="form-control"><?php echo (isset($info->description) ? $info->description : set_value('txt_description')); ?></textarea>       
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
<script src="<?php echo base_url('node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js'); ?>"></script>
<script>
   $(function(){
      $('#btn_submit').on('click',function(){
         $('#frm_submit').submit();
      });

      ClassicEditor
		.create( document.querySelector( '#txt_description' ), {
			toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
      } );
   });
</script>