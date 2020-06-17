<section class="product-page pos-rel">
   <div class="container ptb-60">
      <div class="mt-5">
         <h2 class="ff_rukdeaw font-h2 color-brown text-center">สินค้าของเรา</h2>
         <div class="row product-list">
            <?php if($product){foreach($product as $pitem){ ?>
               <div class="col-md-6">
                  <div class="h-product-img">
                     <img src="<?php echo base_url($pitem['p_thumbnail']); ?>">
                  </div>
                  <div class="text-center mt-5">
                     <a href="<?php echo base_url('Product/detail/'.$pitem['p_id']); ?>" class="btn-product-more">ดูเพิ่มเติม</a>
                  </div>
               </div>
            <?php } } ?>            
         </div>
      </div>
   </div>
</section>