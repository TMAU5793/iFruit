<section class="cartOrder online-buying">
	<div class="container ptb-60">
		<h2 class="ff_rukdeaw font-h2 color-green text-center mt-5">สั่งซื้อออนไลน์</h2>
		<div class="row">
			<div class="col-md-8" id="cartItemList">
				<div class="row orderTitle">
					<div class="col-md-3 text-center"><strong>สินค้า</strong></div>
					<div class="col-md-3 text-right"><strong>ราคา/ซอง</strong></div>
					<div class="col-md-3 text-center"><strong>จำนวน</strong></div>
					<div class="col-md-3 text-right"><strong>ราคารวม</strong></div>
				</div>
				<?php
					if($this->cart->total_items() > 0){
						$n=0;
						foreach($this->cart->contents() as $item){
							$n++;
							$itemBorder = "";
							if($n > 1){
								$itemBorder = "itemBorder";
							}
				?>
					<div class="row orderItem <?php echo $itemBorder; ?>">
						<div class="col-md-3 text-center">
							<img src="<?php echo base_url($item['image']); ?>" alt="">
						</div>
						<div class="col-md-3 text-right">
							<span class="f-22"><?php echo number_format($item['price']); ?> ฿</span>
						</div>
						<div class="col-md-3">
							<div class="input-group mb-3">
								<div class="input-group-prepend delItem" data-rowid="<?php echo $item['rowid'] ?>">
									<span class="input-group-text">-</span>
								</div>
								<input type="text" class="form-control text-center numItem-<?php echo $item['id']; ?>" name="txtNum<?php echo $item['id']; ?>" value="<?php echo number_format($item['qty']); ?>">
								<div class="input-group-append addItem" data-rowid="<?php echo $item['rowid'] ?>">
									<span class="input-group-text">+</span>
								</div>
							</div>
						</div>
						<div class="col-md-3 text-right">
							<span class="f-22"><?php echo number_format($item['subtotal']); ?> ฿</span>
						</div>
					</div>
				<?php } }else{ ?>
					<div class="row orderTitle cartEmpty">
						<div class="col-md-12 text-center">ไม่มีสินค้าในตะกร้า <a href="<?php echo base_url('Order'); ?>">เพิ่มสินค้า</a></div>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<div class="cartBox">
					<h5 class="text-center">สินค้าทั้งหมด 4 ซอง</h5>
					<div class="row m-0 tb-border">
						<div class="col-md-6">
							<span>ราคาสินค้ารวม</span>
						</div>
						<div class="col-md-6 text-right">
							<span>500 ฿</span>
						</div>
					</div>
					<div class="cartShipment mt-3 mb-5">
						<div class="input-group">
							<select name="ddl_shipment" id="ddl_shipment" class="form-control">
								<option value="">เลือกการจัดส่ง</option>
								<option value="">A</option>
								<option value="">B</option>
								<option value="">C</option>
							</select>
						</div>
					</div>
					<div class="row m-0 tb-border">
						<div class="col-md-6">
							<span>ราคาสุทธิ</span>
						</div>
						<div class="col-md-6 text-right">
							<span>600 ฿</span>
						</div>
					</div>
					<div class="btn-shipment">
						<button type="submit" class="btn">สั่งซื้อ</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(function(){
		$('.badge-cart').hide();

		$(document).on('click','.delItem',function(){
			var row_id=$(this).data("rowid"); 
			$.ajax({
					url : "<?php echo base_url('Order/delItem');?>",
					method : "POST",
					data : {row_id : row_id},
					success :function(data){
						$('#cartItemList').html(data);
					}
			});
		});

		$(document).on('click','.addItem',function(){
			var row_id=$(this).data("rowid"); 
			$.ajax({
					url : "<?php echo base_url('Order/addItem');?>",
					method : "POST",
					data : {row_id : row_id},
					success :function(data){
						$('#cartItemList').html(data);
					}
			});
		});
	});
</script>
