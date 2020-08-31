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
							<div class="iRemove" data-rowid="<?php echo $item['rowid'] ?>">
								<i class="fas fa-times-circle"></i>
							</div>
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
								<input type="text" class="form-control text-center numItem-<?php echo $item['id']; ?>" name="txtNum<?php echo $item['id']; ?>" value="<?php echo number_format($item['qty']); ?>" data-rowid="<?php echo $item['rowid'] ?>">
								<div class="input-group-append addItem" data-rowid="<?php echo $item['rowid'] ?>">
									<span class="input-group-text">+</span>
								</div>
							</div>
						</div>
						<div class="col-md-3 text-right">
							<span class="f-22 subtotal-<?php echo $item['id']; ?>"><?php echo number_format($item['subtotal']); ?> ฿</span>
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
					<form id="frm_order" action="<?php echo base_url('Cart/shipping') ?>" method="POST" enctype="multipart/form-data">
						<h5 class="text-center">สินค้าทั้งหมด <span id="productQty"><?php echo $this->cart->total_items(); ?></span> ซอง</h5>
						<div class="row m-0 tb-border">
							<div class="col-md-6">
								<span>ราคาสินค้า</span>
							</div>
							<div class="col-md-6 text-right">
								<span id="subtotalPrice"><?php echo number_format($this->cart->total()); ?></span> ฿
							</div>
						</div>
						<div class="cartShipment mt-3 mb-5">
							<div class="input-group">
								<select name="ddl_shipment" id="ddl_shipment" class="form-control">
									<option value="">-- เลือกการจัดส่ง --</option>
									<?php 
										if($shipping) {
											foreach ($shipping as $cate){ 
									?>
										<option value="<?php echo $cate['cid']; ?>"><?php echo $cate['name']; ?></option>
									<?php } } ?>
								</select>
							</div>
							<div class="mt-2">ราคาในการจัดส่ง <span id="priceRate">(ยังไม่เลือกการจัดส่ง)</span></div>
							<input type="hidden" name="hd_shippingrate" id="hd_shippingrate" value="">
						</div>
						<div class="row m-0 tb-border">
							<div class="col-md-6">
								<span>ราคาสุทธิ</span>
							</div>
							<div class="col-md-6 text-right">
								<span id="netPrice"><?php echo number_format($this->cart->total()); ?></span> ฿
								<input type="hidden" name="hd_netprice" id="hd_netprice" value="">
							</div>
						</div>
						<div class="btn-shipment">
							<button type="button" class="btn" id="btn_order">สั่งซื้อ</button>
						</div>
					</form>
				</div>				
			</div>
		</div>
	</div>
</section>
<script>
	$(function(){
		$('.badge-cart, .myCart').hide();
		$('#btn_order').on('click',function(){
			if($('#ddl_shipment').val()!=""){
				$('#frm_order').submit();
			}else{
				$('#ddl_shipment').addClass('error');
			}
		});
		$(document).on('click','.delItem',function(){
			var row_id=$(this).data("rowid"); 
			$.ajax({
					url : "<?php echo base_url('api/Cart/delItem/format/json');?>",
					method : "POST",
					data : {row_id : row_id},
					success :function(data){
						$('#subtotalPrice').load('<?php echo base_url('Order/loadTotalPrice') ?>');
						$('#netPrice').load('<?php echo base_url('Order/loadTotalPrice') ?>');
						$('#productQty').load('<?php echo base_url('Order/cartQty') ?>');
						$.each(data, function (i, item) {
							$('.numItem-'+item.id).val(item.qty);
							$('.subtotal-'+item.id).html(item.subtotal.toLocaleString()+' ฿');
						});
					}
			});
		});

		$(document).on('click','.addItem',function(){
			var row_id=$(this).data("rowid");
			$.ajax({
					url : "<?php echo base_url('api/Cart/addItem/format/json');?>",
					method : "POST",
					data : {row_id : row_id},
					success :function(data){
						$('#subtotalPrice').load('<?php echo base_url('Order/loadTotalPrice') ?>');
						$('#netPrice').load('<?php echo base_url('Order/loadTotalPrice') ?>');
						$('#productQty').load('<?php echo base_url('Order/cartQty') ?>');
						$.each(data, function (i, item) { 
							$('.numItem-'+item.id).val(item.qty);
							$('.subtotal-'+item.id).html(item.subtotal.toLocaleString()+' ฿');
						});
					}
			});
		});

		$(document).on('change','input[class*=numItem-]',function(){
			var row_id = $(this).data("rowid");
			var cvalue = $(this).val();
			console.log(cvalue);
			$.ajax({
					url : "<?php echo base_url('api/Cart/changeItem/format/json');?>",
					method : "POST",
					data : {row_id:row_id,val:cvalue},
					success :function(data){
						$('#subtotalPrice').load('<?php echo base_url('Order/loadTotalPrice') ?>');
						$('#netPrice').load('<?php echo base_url('Order/loadTotalPrice') ?>');
						$('#productQty').load('<?php echo base_url('Order/cartQty') ?>');
						$.each(data, function (i, item) { 
							$('.numItem-'+item.id).val(item.qty);
							$('.subtotal-'+item.id).html(item.subtotal.toLocaleString()+' ฿');
						});
					}
			});			
		});

		$('#ddl_shipment').on('change',function(){
			var sid = $(this).val();
			var item = Number($('#productQty').text());
			var netPrice = Number($('#subtotalPrice').text().replace(",", ""));
			$('#ddl_shipment').removeClass('error');
			if(sid !=""){
				$.ajax({
					method: "GET",
					url: "<?php echo base_url('api/Cart/shippingRate');?>",
					data: {id:sid,item:item},
					dataType: "json",
					success: function (response) {
						netPrice = netPrice + Number(response.shipping_rate);
						$('#hd_shippingrate').val(response.id);
						$('#priceRate').html(response.shipping_rate +' ฿');
						$('#netPrice').html(netPrice.toLocaleString());
					}
				});
			}else{
				$('#priceRate').html('(ยังไม่เลือกการจัดส่ง)');
			}
		});

		$('.iRemove').on('click',function(){
			var row_id=$(this).data("rowid");
			console.log(row_id);
			$.ajax({
				url : "<?php echo base_url('api/Cart/removeItem');?>",
				method : "POST",
				data : {row_id : row_id},
				success :function(data){
					location.reload();
				}
			});
		});
	});
</script>
