<section class="online-buying pos-rel">
   <div class="container ptb-60">
      <div class="mt-5">
         <h2 class="ff_rukdeaw font-h2 color-green text-center">สั่งซื้อออนไลน์</h2>
         <div class="row product-list">
            <?php if($product){$i=0; foreach($product as $pitem){ $i++; ?>
               <div class="col-md-6 mb-5">
                  <div class="h-product-img">
                     <img src="<?php echo base_url($pitem['p_thumbnail_buy']); ?>" alt="">
                  </div>
                  <div class="<?php echo ($i % 2 == 0 ? 'h-hotchili-desc' : 'h-truffle-desc'); ?>">
                     <h3><?php echo $pitem['p_name']; ?></h3>
                     <p><?php echo ($pitem['p_subtitle'] ? $pitem['p_subtitle'] : ''); ?></p>
                     <h3>ราคา <?php echo $pitem['p_price']; ?> บาท</h3>
                     <a href="#" class="btn-buynow2">ซื้อเลย</a>
                  </div>
               </div>
            <?php } } ?>
         </div>
      </div>
   </div>
</section>