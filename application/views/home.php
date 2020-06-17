<section class="home-banner">
   <?php if($banner){foreach($banner as $btem){ ?>
      <div><img src="<?php echo base_url($btem['images_desktop']); ?>"></div>
   <?php } } ?>
</section>
<section class="green_gradient h-100vh pos-rel">
   <div class="container ptb-60 text-center">
      <div class="mid-center m-unmid-center">
         <h2 class="ff_rukdeaw font-h2">ความอร่อยเพื่อคนรักสุขภาพ</h2>
         <p class="font-h6">
            กล้วยหอมทองทอดอบกรอบ ตรา iFruit  คุณภาพที่ถูกเลือกสรรมาอย่างดี รับประทานได้ทุกวัน ทุกวัย มีกันถึงสองรสชาติ กับ Hot Chili flavor 
         </p>
         <div class="row mt-5">
            <div class="col-md-6 text-right">
               <?php echo image_asset('home/gmp.png'); ?>
            </div>
            <div class="col-md-6 text-left">
               <?php echo image_asset('home/fda.png'); ?>
            </div>
         </div>
         <div class="row mt-5">
            <div class="col-md-6 text-right">
               <a href="#" class="btn-buynow"><span>ซื้อเลย</span></a>
            </div>
            <div class="col-md-6 text-left">
               <a href="#" class="btn-more">อ่านต่อ</a>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="news-promotion h-100vh pos-rel">
   <div class="container ptb-60 text-center">
      <div class="mt-5">
         <h2 class="ff_rukdeaw font-h2">ข่าวสารและโปรโมชั่น</h2>
         <div class="slick-2-items">
            <?php if($newspromotion){foreach($newspromotion as $npitem){ ?>
               <div><img src="<?php echo base_url($npitem['np_thumbnail']); ?>"></div>
            <?php } } ?>
         </div>
      </div>
   </div>
</section>
<section class="online-buying h-100vh pos-rel">
   <div class="container ptb-60">
      <div class="mt-5">
         <h2 class="ff_rukdeaw font-h2 color-green text-center">สั่งซื้อออนไลน์</h2>
         <div class="row product-list">
            <?php if($product){$i=0; foreach($product as $pitem){ $i++; ?>
               <div class="col-md-6">
                  <div class="h-product-img">
                     <img src="<?php echo base_url($pitem['p_thumbnail_buy']); ?>">
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
