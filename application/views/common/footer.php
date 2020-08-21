	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="footer-logo">
						<?php echo image_asset('logo-footer.png'); ?>
					</div>
				</div>
				<div class="col-md-3 ft-menu">
					<ul>	
						<li><a href="<?php echo base_url(); ?>">หน้าแรก</a></li>
						<li><a href="<?php echo base_url('Product'); ?>">ข้อมูลผลิตภัณฑ์</a></li>
						<!--li><a href="<?php echo base_url('Order'); ?>">ซื้อออนไลน์</a></!--li-->
						<li><a href="<?php echo base_url('Newspromotion'); ?>">ข่าวสารและโปรโมชั่น</a></li>
					</ul>
				</div>
				<div class="col-md-3 ft-menu">
					<ul>						
						<li><a href="<?php echo base_url('About'); ?>">เกี่ยวกับเรา</a></li>
						<li><a href="<?php echo base_url('Contact'); ?>">ติดต่อเรา</a></li>
						<!-- <li><a href="#">นโยบายการคืนสินค้าและคืนเงิน</a></li>
						<li><a href="#">นโยบายการจัดส่ง</a></li>
						<li><a href="#">นโยบายความเป็นส่วนตัว</a></li> -->
					</ul>
				</div>
				<div class="col-md-3">
					<ul>
						<li>ติดต่อ</li>
						<li class="a-hover"><a href="tel:<?php echo $info->contact_tel; ?>"><?php echo $info->contact_tel; ?></a></li>
						<li class="a-hover"><a href="mailto:<?php echo $info->contact_mail; ?>"><?php echo $info->contact_mail; ?></a></li>
						<li class="social-footer">
							<?php if($info->contact_line){ ?>
								<a href="<?php echo 'https://line.me/ti/p/'.$info->contact_line; ?>" target="_blank">
									<?php echo image_asset('icon/line.png'); ?>
								</a>
							<?php } ?>
							<?php if($info->contact_facebook){ ?>
								<a href="<?php echo 'https://www.facebook.com/'.$info->contact_facebook; ?>" target="_blank">
									<img src="<?php echo base_url('assets/images/icon/fb.png'); ?>">
								</a>
							<?php } ?>
							<?php if($info->contact_instagram){ ?>
								<a href="<?php echo 'https://www.instagram.com/'.$info->contact_instagram; ?>" target="_blank">
									<img src="<?php echo base_url('assets/images/icon/ig.png'); ?>">
								</a>
							<?php } ?>			
							<?php if($info->contact_youtube){ ?>
								<a href="<?php echo 'https://www.youtube.com/channel/'.$info->contact_youtube; ?>" target="_blank">
									<img src="<?php echo base_url('assets/images/icon/yt.png'); ?>">
								</a>
							<?php } ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	
	<?php echo js_asset('bootstrap.min.js'); ?>
	<?php echo js_asset('script.js'); ?>
	<script src="<?php echo base_url('assets/slick/slick/slick.min.js'); ?>"></script>
	<script>
		$(window).scroll(function() {
			if ($(window).scrollTop() > 50) {
				$('.navbar').addClass('nav-bg');
				$('.nav-white #cartList').css('background-position','center top');
			}else{
				$('.navbar').removeClass('nav-bg');
				$('.nav-white #cartList').css('background-position','center bottom');
			}
		});

		$(document).ready(function() {
			var cartimg = '<?php echo image_asset("cart.png"); ?>';
			$('.navbar-toggler').click(function(){
				var hasnav = $('.navbar').hasClass('nav-mobile');
				if(hasnav){
					//$('.navbar').removeClass('nav-mobile');
					setTimeout(function(){
						$('.navbar').removeClass('nav-mobile');
					}, 250);
				}else{
					$('.navbar').addClass('nav-mobile');
					$('.cart a').html(cartimg);
				}
			});

			var cartItem = '<?php echo $this->cart->total_items(); ?>';
			var loadCart = '<?php echo base_url('Order/load_cart'); ?>';
			//console.log(cartItem);
			if(cartItem > 0){
				$('.myCart').load(loadCart);
				$('.badge-cart').html(cartItem);
			}			

			$(document).on('click','.romove_cart',function(){
				var row_id=$(this).attr("id"); 
				$.ajax({
						url : "<?php echo base_url('Order/delete_cart');?>",
						method : "POST",
						data : {row_id : row_id},
						success :function(data){
							$('.myCart').load('<?php echo base_url('Order/load_cart'); ?>');
							//$('.badge-cart').load('<?php echo base_url('Order/cartQty'); ?>');
							cartItem = $('.badge-cart').load('<?php echo base_url('Order/cartQty'); ?>');
							if(cartItem > 0){
								
								$('.badge-cart').html(cartItem);
							}
						}
				});
			});

			if ($(window).scrollTop() > 50) {
				$('.navbar').addClass('nav-bg');
				$('.nav-white #cartList').css('background-position','center top');
			}else{
				$('.navbar').removeClass('nav-bg');
				$('.nav-white #cartList').css('background-position','center bottom');
			}
		});
	</script>
</body>
</html>
