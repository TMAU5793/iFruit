<section class="newspromotion-page pos-rel">
   <div class="container ptb-60 text-center">
      <div class="mt-5 p-title-bg">
         <h2 class="ff_rukdeaw font-h2">ข่าวสารและโปรโมชั่น</h2>         
      </div>
      <div class="row news-list mt-5">
         <?php if($info){foreach($info as $item){ ?>
            <div class="col-md-4 col-sm-6">
               <div class="news-img" onclick="location.href='<?php echo base_url('Newspromotion/detail/'.$item['np_id']); ?>'">
                  <img src="<?php echo base_url($item['np_thumbnail']); ?>">
               </div>
               <div class="news-title">
                  <a href="<?php echo base_url('Newspromotion/detail/'.$item['np_id']); ?>" class="font-h5"><?php echo $item['np_name']; ?></a>
               </div>
            </div>
         <?php } } ?>         
      </div>
   </div>
</section>