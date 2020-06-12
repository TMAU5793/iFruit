<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">ข้อมูลหน้าแรก</h1></h1>
            </div>
            <div class="col-sm-6 text-right">
               <div class="btn-manage">
                  <button class="btn btn-success" id="btn_submit">บันทึก</button>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Main content -->
   <section class="content pb-5">
      <div class="container">
         <form id="frm_submit" action="<?php echo base_url('admin/Home/update'); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="hd_id" value="<?php echo ($info ? $info->id : ''); ?>">
            <div class="form-group editor_description">
               <label for="txt_description">รายละเอียด</label>
               <textarea name="txt_description" id="txt_description" name="txt_description" class="form-control"><?php echo (isset($info->description) ? $info->description : set_value('txt_description')); ?></textarea>       
            </div>
            <!--div class="form-group">
               <label for="">รูป</label>
               <small class="d-block mb-2">*ขนาดรูปที่แนะนำ 370 x 406 px</small>
               <div class="thumbnail-section">
                  <img src="<?php echo (isset($info->thumbnail) ? base_url($info->thumbnail) : base_url('assets/images/default.png')); ?>" width="250" id="show_img">
                  <input type="file" class="d-block" name="thumbnail" id="thumbnail">
                  <input type="hidden" name="hd_file_img" id="hd_file_img" value="<?php echo (isset($info->thumbnail) ? $info->thumbnail : ''); ?>">
                  <label for="thumbnail" class="img-select btn-primary">เพิ่มรูป</label>                  
               </div>
            </!--div-->
         </form>
      </div>
   </section>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
</aside>
<script>
   //import $ from '../../../node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor';   
   $(function(){      
      $("#thumbnail").change(function () {
         readURL(this);
      });

      $('#btn_submit').on('click',function(){
         $('#frm_submit').submit();
      });

      CKEDITOR.replace('txt_description');    
   });
</script>