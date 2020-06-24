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
                  <button class="btn btn-success d-none" id="btn_submit">บันทึก</button>
                  <a href="<?php echo base_url('admin/Newspromotion'); ?>" class="btn btn-warning">ยกเลิก</a>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Main content -->
   <section class="content pb-5">
      <div class="container">
         <form id="frm_submit" action="<?php echo base_url('admin/Newspromotion/'.$action); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="hd_id" value="<?php echo (isset($info) ? $info->np_id : ''); ?>">
            <div class="form-group">
               <label for="" class="d-block">ประเภทบทความ <small class="text-danger error-type">(*เลือกประเภทบทความเพื่อดำเนินการต่อ)</small></label>
               <?php $infotype = (isset($info) ? $info->np_type : ''); ?>
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="txt_type" id="txt_type1" value="1" <?php echo (isset($infotype) ? ($infotype==1 ? 'checked' : '') : ''); ?>>
                  <label class="form-check-label" for="txt_type1">ข่าวสาร</label>
               </div>
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="txt_type" id="txt_type2" value="2" <?php echo (isset($infotype) ? ($infotype==2 ? 'checked' : '') : ''); ?>>
                  <label class="form-check-label" for="txt_type2">โปรโมชั่น</label>
               </div>
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="txt_type" id="txt_type3" value="3" <?php echo (isset($infotype) ? ($infotype==3 ? 'checked' : '') : ''); ?>>
                  <label class="form-check-label" for="txt_type2">ลิงค์</label>
               </div>
            </div>
            <div class="type-content d-none">
               <div class="form-group">
                  <label for="txt_name">ชื่อข่าวสาร โปรโมชั่น *</label>
                  <input type="text" class="form-control" id="txt_name" name="txt_name" placeholder="ตัวอย่าง : ซื้อ 2 แถม 1" value="<?php echo (isset($info->np_name) ? $info->np_name : set_value('txt_name')); ?>">
                  <?php echo form_error('txt_name', '<div class="text-danger small">*', '</div>'); ?>
               </div>
               <div class="form-group link-url d-none">
                  <label for="txt_link">ลิงค์บทความ *</label>
                  <input type="text" class="form-control" id="txt_link" name="txt_link" value="<?php echo (isset($info->np_link) ? $info->np_link : set_value('txt_link')); ?>">
                  <?php echo form_error('txt_link', '<div class="text-danger small">*', '</div>'); ?>
                  <div class="error-link d-none text-danger">*กรุณาระบุ http:// หรือ https://</div>
               </div>
               <div class="form-group pro-date">
                  <label>กำหนดวันที่</label>
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text">
                           <i class="far fa-calendar-alt"></i>
                        </span>
                     </div>
                     <input type="text" name="txt_datepromotion" class="form-control float-right" id="txt_datepromotion" value="">
                  </div>
               </div>
               <div class="form-group type3link">
                  <label for="txt_shortdesc">รายละเอียดย่อ</label>
                  <textarea name="txt_shortdesc" id="txt_shortdesc" name="txt_shortdesc" class="form-control" rows="5"><?php echo (isset($info->np_shortdesc) ? $info->np_shortdesc : set_value('txt_shortdesc')); ?></textarea>
               </div>
               <div class="form-group editor_description type3link">
                  <label for="txt_description">รายละเอียด</label>
                  <textarea name="txt_description" id="txt_description" name="txt_description" class="form-control"><?php echo (isset($info->np_description) ? $info->np_description : set_value('txt_description')); ?></textarea>       
               </div>
               <div class="form-group">
                  <label for="">รูป</label>
                  <small class="d-block mb-2">*ขนาดรูปที่แนะนำ 450 x 450 px</small>
                  <?php echo form_error('hd_thumbnail', '<div class="text-danger small">*', '</div>'); ?>
                  <div class="thumbnail-section">
                     <img src="<?php echo (isset($info->np_thumbnail) ? base_url($info->np_thumbnail) : base_url('assets/images/default.png')); ?>" width="250" id="show_img">
                     <input type="file" class="d-block" name="thumbnail" id="thumbnail">
                     <input type="hidden" name="hd_file_img" id="hd_file_img" value="<?php echo (isset($info->np_thumbnail) ? $info->np_thumbnail : ''); ?>">
                     <input type="hidden" name="hd_thumbnail" id="hd_thumbnail" value="<?php echo (isset($info->np_thumbnail) ? $info->np_thumbnail : ''); ?>">
                     <label for="thumbnail" class="img-select btn-primary">เพิ่มรูป</label>                  
                  </div>
               </div>
               <div class="form-group">
                  <label for="ddl_status">การเผยแพร่</label>
                  <select name="ddl_status" id="ddl_status" class="form-control">
                     <option value="1" <?php echo (isset($info) ? ($info->np_status == '1' ? 'selected=selected' : '') : '' ); ?>>เผยแพร่</option>
                     <option value="0" <?php echo (isset($info) ? ($info->np_status == '0' ? 'selected=selected' : '') : '' ); ?>>ไม่เผยแพร่</option>
                  </select>      
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
<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/daterangepicker/daterangepicker.css'); ?>">
<script src="<?php echo base_url('assets/adminlte/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<script src="<?php echo base_url('ckeditor-4.14.1/ckeditor.js'); ?>"></script>
<script src="<?php echo base_url('ckfinder-3.4.1/ckfinder.js'); ?>"></script>
<script>
   $(function(){      
      $("#thumbnail").change(function () {
         readURL(this);
         $('#hd_thumbnail').val($(this)[0].files[0].name);
      });
      var startdate = "<?php echo (isset($info) ? $info->np_start : ''); ?>";
      var enddate = "<?php echo (isset($info) ? $info->np_end : ''); ?>";
      if(startdate!=""){
         $('#txt_datepromotion').daterangepicker({
            locale: {
               format: 'YYYY/MM/DD'
            },
            startDate: startdate,
            endDate: enddate
         });
      }else{
         $('#txt_datepromotion').daterangepicker({
            locale: {
               format: 'YYYY/MM/DD'
            }
         });
      }
      var inputradio = $('input[name="txt_type"]').is(":checked");
      if(inputradio){
         $('.type-content').removeClass('d-none');
         $('.btn-manage button').removeClass('d-none');
         $('.error-type').hide();
         if($('input:checked').val() == 2){
            $('.pro-date').show();
         }else{
            $('.pro-date').hide();
         }
         if($('input:checked').val() == 3){
            $('.type3link').hide();
            $('.link-url').removeClass('d-none');
         }else{
            $('.type3link').show();
            $('.link-url').addClass('d-none');
         }
      }
      $('input[type="radio"]').on('change',function(){
         $('.type-content').removeClass('d-none');
         $('.btn-manage button').removeClass('d-none');
         $('.error-type').hide();
         if($(this).val() == 2){
            $('.pro-date').show();
         }else{
            $('.pro-date').hide();
         }
         if($(this).val() == 3){
            $('.type3link').hide();
            $('.link-url').removeClass('d-none');
         }else{
            $('.type3link').show();
            $('.link-url').addClass('d-none');
         }
      });

      $('#txt_link').change(function(){
         /*let link1 = $(this).val().substr(0,7);
         let link2 = $(this).val().substr(0,8);*/
         let result = clink($(this).val());
         if(!result){
            $('.error-link').removeClass('d-none');
         }else{
            $('.error-link').addClass('d-none');
         }
      });

      $('#btn_submit').on('click',function(){         
         let result = clink($('#txt_link').val());
         if(!result){
            $('.error-link').removeClass('d-none');
         }else{
            $('.error-link').addClass('d-none');
            $('#frm_submit').submit();
         }
      });

      var editor = CKEDITOR.replace( 'txt_description' );
      CKFinder.setupCKEditor( editor );
   });   
</script>