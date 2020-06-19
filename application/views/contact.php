<section class="contact-page pos-rel">
   <div class="container ptb-60">
      <div class="row mt-5rem">
         <div class="col-md-6 contact-social order-m2">
            <ul class="mt-5">
               <?php if($info->contact_line){ ?>
                  <li>
                     <a href="<?php echo 'https://line.me/ti/p/'.$info->contact_line; ?>" target="_blank">
                        <img src="<?php echo base_url('assets/images/icon/line.png'); ?>">
                        <span><?php echo $info->contact_line; ?></span>
                     </a>
                  </li>
               <?php } ?>
               <?php if($info->contact_facebook){ ?>
                  <li>
                     <a href="<?php echo 'https://www.facebook.com/'.$info->contact_facebook; ?>" target="_blank">
                        <img src="<?php echo base_url('assets/images/icon/fb.png'); ?>">
                        <span><?php echo $info->contact_facebook; ?></span>
                     </a>
                  </li>
               <?php } ?>
               <?php if($info->contact_instagram){ ?>
                  <li>
                     <a href="<?php echo 'https://www.instagram.com/'.$info->contact_instagram; ?>" target="_blank">
                        <img src="<?php echo base_url('assets/images/icon/ig.png'); ?>">
                        <span><?php echo $info->contact_instagram; ?></span>
                     </a>
                  </li>
               <?php } ?>
               <?php if($info->contact_youtube){ ?>
                  <li>
                     <a href="<?php echo 'https://www.youtube.com/channel/'.$info->contact_youtube; ?>" target="_blank">
                        <img src="<?php echo base_url('assets/images/icon/yt.png'); ?>">
                        <span>ifruitbrand</span>
                     </a>
                  </li>
               <?php } ?>
               <?php if($info->contact_web){ ?>
                  <li>
                     <a href="<?php echo 'http://'.$info->contact_web; ?>">
                        <img src="<?php echo base_url('assets/images/icon/web.png'); ?>">
                        <span><?php echo $info->contact_web; ?></span>
                     </a>
                  </li>
               <?php } ?>
            </ul>
         </div>
         <div class="col-md-6 order-m1">
            <h5 class="font-h5 ff_sukhumvit_setsemibold text-center">ติดต่อเรา</h5>
            <form id="frm_contact" action="" method="POST">
               <div id="contactflase d-none"></div>
               <div class="row contact-form">                  
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="txt_subject">เรื่องติดต่อ</label>
                        <input type="text" class="form-control" id="txt_subject" name="txt_subject" required>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="txt_name">ชื่อผู้ติดต่อ</label>
                        <input type="text" class="form-control" id="txt_name" name="txt_name" required>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="txt_phone">เบอร์ติดต่อ</label>
                        <input type="text" class="form-control" id="txt_phone" name="txt_phone" required>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="txt_email">อีเมล</label>
                        <input type="email" class="form-control" id="txt_email" name="txt_email" required>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <label for="txt_message">ข้อความ</label>
                     <textarea class="form-control" id="txt_message" name="txt_message" rows="3" required></textarea>
                  </div>
                  <div class="col-md-12 text-center mt-3">
                     <button type="submit" class="btn-send">ส่ง</button>
                     <div id="loader"></div>
                  </div>
               </div>
            </form>
         </div>
         <div class="col-md-12 mt-5 text-center order-m3">
            <span>I fruit CO., LTD  645/4 Sukhumvit Road  Prakanong, Khlong toei ,Bangkok 10260</span>
         </div>
      </div>
   </div>
</section>

<?php echo js_asset('jquery.validate.min.js'); ?>
<script>
   $(function(){
      $( "#frm_contact" ).validate({
         submitHandler: function(form) {
         // do other things for a valid form
            $('.btn-send').hide();
            $('#loader').show();
            $.ajax({
               type: "POST",
               url: "<?php echo base_url('Contact/sendmail'); ?>",
               data: $(form).serialize(),
               success: function() {
                  $('#loader').hide();
                  $('.btn-send').show();
                  setTimeout(function() {
                     $("#contactflase").html('ส่งข้อมูลเรียบร้อย');
                     $("#contactflase").removeClass('d-none');
                  }, 3000);
                  form.reset();
               },
               error: function() {
                  $('#loader').hide();
                  $('.btn-send').show();
                  setTimeout(function() {
                     $("#contactflase").html('เกิดข้อผิดพลาดในการส่งข้อมูล');
                     $("#contactflase").removeClass('d-none');
                  }, 3000);
               }
            });
         },
         rules: {
            field: {
               required: true
            }
         }
      });
   });
</script>