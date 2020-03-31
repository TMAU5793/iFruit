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
						<li><a href="#">หน้าแรก</a></li>
						<li><a href="#">ข้อมูลผลิตภัณฑ์</a></li>
						<li><a href="#">ซื้อออนไลน์</a></li>
						<li><a href="#">ข่าวสารและโปรโมชั่น</a></li>
						<li><a href="#">บทความดีๆ และรีวิว</a></li>
					</ul>
				</div>
				<div class="col-md-3 ft-menu">
					<ul>
						<li><a href="#">เกี่ยวกับเรา</a></li>
						<li><a href="#">ติดต่อเรา</a></li>
						<li><a href="#">นโยบายการคืนสินค้าและคืนเงิน</a></li>
						<li><a href="#">นโยบายการจัดส่ง</a></li>
						<li><a href="#">นโยบายความเป็นส่วนตัว</a></li>
					</ul>
				</div>
				<div class="col-md-3">
					<ul>
						<li>ติดต่อ</li>
						<li class="a-hover"><a href="tel:+66842242924">+66 84 224 2924</a></li>
						<li>ifruitbrand.com@gmail.com</li>
						<li class="social-footer">
							<a href="#"><?php echo image_asset('icon/ig.png'); ?></a>
							<a href="#"><?php echo image_asset('icon/fb.png'); ?></a>
							<a href="#"><?php echo image_asset('icon/line.png'); ?></a>
							<a href="#"><?php echo image_asset('icon/yt.png'); ?></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<?php echo js_asset('jquery.min.js'); ?>
	<?php echo js_asset('bootstrap.min.js'); ?>
	<?php echo js_asset('script.js'); ?>
	<script src="<?php echo base_url('assets/slick/slick/slick.min.js'); ?>"></script>
	<script>
		$(window).scroll(function() {
			var cartimg = '<?php echo image_asset("cart.png"); ?>';
			if ($(window).scrollTop() > 50) {
				$('.navbar').addClass('nav-bg');
				$('.cart a').html(cartimg);
			}else{
				<?php
					if(!isset($cart_img)){
						if($this->router->fetch_class()=='Home' || $this->router->fetch_class()=='Product' || $this->router->fetch_class()=='Order'){
							$cart_img = "cart.png";
						}else{
							$cart_img = "cart-white.png";
						}
					}
				?>
				cartimg = '<?php echo image_asset($cart_img); ?>';
				$('.navbar').removeClass('nav-bg');
				$('.cart a').html(cartimg);
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
		});
	</script>
</body>
</html>