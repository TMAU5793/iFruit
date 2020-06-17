<section class="about-page pos-rel">
   <div class="container ptb-60">
      <div class="mt-5 about-logo">
         <img src="<?php echo base_url('assets/images/about-logo.png'); ?>" alt="">
      </div>
      <div class="about-product text-center mt-5">
         <img src="<?php echo ($info->thumbnail ? base_url($info->thumbnail) : ''); ?>">
      </div>
      <div class="text-center mt-5">
         <?php echo $info->description; ?>
      </div>
   </div>
</section>