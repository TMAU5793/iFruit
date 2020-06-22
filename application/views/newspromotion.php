<section class="newspromotion-page pos-rel">
   <div class="container ptb-60 text-center">
      <div class="mt-5 p-title-bg">
         <h2 class="ff_rukdeaw font-h2">ข่าวสารและโปรโมชั่น</h2>         
      </div>
      <div class="row news-list mt-5">
         <?php if($info){foreach($info as $item){ $link = ($item['np_type']==3 ? $item['np_link'] : base_url('Newspromotion/detail/'.$item['np_id'])); ?>
            <div class="col-md-4 col-sm-6">
               <a href="<?php echo $link; ?>" <?php echo ($item['np_type'] == 3 ? 'target="_blank"' : ''); ?>>
                  <div class="news-img">
                     <img src="<?php echo base_url($item['np_thumbnail']); ?>">
                  </div>
                  <div class="news-title">
                     <span class="font-h5"><?php echo $item['np_name']; ?></span>
                  </div>
               </a>
            </div>
         <?php } } ?>         
      </div>
   </div>
</section>