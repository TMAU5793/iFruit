<section class="cartOrder shipping-page online-buying">
	<div class="container ptb-60">
		<h2 class="ff_rukdeaw font-h2 color-green text-center mt-5">สั่งซื้อออนไลน์</h2>
		<form id="frm_payment" action="<?php echo base_url('Cart/payment'); ?>" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="hd_shipment" value="<?php echo $postinfo['ddl_shipment']; ?>">
			<div class="row">
				<div class="col-md-8" id="cartItemList">
					<div class="orderTitle">
						<h5 class="text-center mb-0">ข้อมูลการจัดส่งสินค้า</h5>
					</div>
					<div class="row mr-0 ml-0 orderItem">
						<div class="col-md-6">
							<div class="form-group">
								<label for="txt_name">ชื่อ - นามสกุล</label>
								<input type="text" class="form-control" id="txt_name" name="txt_name" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="txt_phone">เบอร์โทร</label>
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
							<div class="form-group">
								<label for="txt_address">ที่อยู่</label>
								<textarea name="txt_address" id="txt_address" rows="3" class="form-control" required></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="ddl_province">จังหวัด</label>
								<select name="ddl_province" id="ddl_province" class="form-control" required>
									<option value="">-- เลือกจังหวัด --</option>
									<?php if($provinces) { foreach ($provinces as $province) { ?>
										<option value="<?php echo $province['id']; ?>"><?php echo $province['name_th']; ?></option>
									<?php } } ?> 
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="ddl_amphur">อำเภอ/เขต</label>
								<select name="ddl_amphur" id="ddl_amphur" class="form-control" required>
									<option value="">-- เลือกอำเภอ/เขต --</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="ddl_district">ตำบล/แขวง</label>
								<select name="ddl_district" id="ddl_district" class="form-control" required>
									<option value="">-- ตำบล/แขวง --</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="txt_postcode">รหัสไปรษณีย์</label>
								<input type="text" class="form-control" id="txt_postcode" name="txt_postcode" required>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="cartBox">
						<h5 class="text-center">สรุปรายการสั่งซื้อ</h5>
						<div class="row m-0 mb-3">
							<div class="col-md-6">
								<span>ราคาสินค้า</span>
							</div>
							<div class="col-md-6 text-right">
								<span id="subtotalPrice"><?php echo number_format($this->cart->total()); ?></span> ฿
								<input type="hidden" name="hd_subtotal" id="hd_subtotal" value="">
							</div>
						</div>
						<div class="row m-0 mb-3">
							<div class="col-md-6">
								<span>ราคาการจัดส่ง</span>
							</div>
							<div class="col-md-6 text-right">
								<span id="shippingrate"><?php echo $shipping->shipping_rate; ?></span> ฿
								<input type="hidden" name="hd_subtotal" id="hd_subtotal" value="<?php echo $shipping->shipping_rate; ?>">
							</div>
						</div>
						<div class="row m-0 tb-border">
							<div class="col-md-6">
								<span>ราคาสุทธิ</span>
							</div>
							<div class="col-md-6 text-right">
								<span id="netPrice"><?php echo number_format($this->cart->total())+$shipping->shipping_rate; ?></span> ฿
								<input type="hidden" name="hd_netprice" id="hd_netprice" value="<?php echo number_format($this->cart->total())+$shipping->shipping_rate; ?>">
							</div>
						</div>
						<div class="btn-shipment">
							<button type="submit" class="btn" id="btn_order">ยืนยัน</button>
						</div>
					</div>				
				</div>
			</div>
		</form>
	</div>
</section>
<script>
	$(function(){
		$('.badge-cart, .myCart').hide();

		$('#ddl_province').on('change',function(){
			console.log($(this).val());
			$.ajax({
				method: "POST",
				url: "<?php echo base_url('api/Cart/amphures') ?>",
				data: {id:$(this).val()},
				dataType: "json",
				success: function (response) {
					var html = '<option value="">-- เลือกอำเภอ/เขต --</option>';
					$.each(response, function (i, item) {
						html += '<option value="'+item.id+'">'+item.name_th+'</option>';
					});
					$('#ddl_amphur').html(html);
					$('#ddl_district').html('<option value="">-- ตำบล/แขวง --</option>');
					$('#txt_postcode').val('');
				}
			});
		});

		$('#ddl_amphur').on('change',function(){
			console.log($(this).val());
			$.ajax({
				method: "POST",
				url: "<?php echo base_url('api/Cart/districts') ?>",
				data: {id:$(this).val()},
				dataType: "json",
				success: function (response) {
					var html = '<option value="">-- ตำบล/แขวง --</option>';
					$.each(response, function (i, item) {
						html += '<option value="'+item.id+'">'+item.name_th+'</option>';
					});
					$('#ddl_district').html(html);
					$('#txt_postcode').val('');
				}
			});
		});

		$('#ddl_district').on('change',function(){
			console.log($(this).val());
			$.ajax({
				method: "POST",
				url: "<?php echo base_url('api/Cart/postcode') ?>",
				data: {id:$(this).val()},
				dataType: "json",
				success: function (response) {
					$('#txt_postcode').val(response.zip_code);
				}
			});
		});
	});
</script>
