<section class="payment" style="color: #000;">
	<div class="container ptb-60">
		<form id="creditForm" method="POST" action="<?php echo base_url('Cart/confirmation'); ?>">
			<input type="hidden" name="omiseToken">
			<input type="hidden" name="omiseSource">
			<input type="hidden" name="hd_invoice" value="<?php echo $order->invoice_no; ?>">
			<input type="hidden" name="hd_nettotal" value="<?php echo $order->nettotal; ?>">
			<button type="submit" id="creditButton">ชำระเงินผ่าน บัตรเครดิต</button>
		</form>
		<form id="iBangkingForm" method="POST" action="<?php echo base_url('Cart/confirmation'); ?>">
			<input type="hidden" name="omiseToken">
			<input type="hidden" name="omiseSource">
			<input type="hidden" name="hd_invoice" value="<?php echo $order->invoice_no; ?>">
			<input type="hidden" name="hd_nettotal" value="<?php echo $order->nettotal; ?>">
			<input type="hidden" name="hd_method" value="internet_banking">
			<button type="submit" id="iBangkingButton">ชำระเงินผ่าน Internet Bangking</button>
		</form>
		<form id="counterForm" method="POST" action="<?php echo base_url('Cart/confirmation'); ?>">
			<input type="hidden" name="omiseToken">
			<input type="hidden" name="omiseSource">
			<input type="hidden" name="hd_invoice" value="<?php echo $order->invoice_no; ?>">
			<input type="hidden" name="hd_nettotal" value="<?php echo $order->nettotal; ?>">
			<input type="hidden" name="hd_method" value="bill_payment_tesco_lotus">
			<button type="submit" id="counterButton">ชำระเงินผ่าน เคาน์เตอร์ (เฉพาะเทสโก้โลตัส)</button>
		</form>
	</div>
</section>
<script type="text/javascript" src="https://cdn.omise.co/omise.js"></script>
<script>
	OmiseCard.configure({
		publicKey: '<?php echo OMISE_PUBLIC_KEY ?>', // เข้าสู่ระบบของ Omise และไปที่ API -> Keys คีย์นี้จะเป็นตัวบอกว่า ชำระเข้าบัญชีของใคร
	});
	var nettotal = '<?php echo str_replace('.','',$order->nettotal) ?>';

	var creditButton = document.querySelector("#creditButton");
	var creditForm = document.querySelector("#creditForm");	
	creditButton.addEventListener("click", (event) => {
		event.preventDefault();
		OmiseCard.open({
			frameLabel:"iFruit Brand",
			image:'<?php echo base_url('assets/images/favicon.png') ?>',
			amount: nettotal,  // เช่น ถ้าชำระ 20 บาท ต้องใส่เป็น 2000;
			currency: "THB",// สกุลเงิน
			defaultPaymentMethod: "credit_card", // ช่องทางการชำระเงิน ค่าเริ่มต้นเป็น credit_card
			onCreateTokenSuccess: (nonce) => {
				if (nonce.startsWith("tokn_")) {
					creditForm.omiseToken.value = nonce;
				} else {
					creditForm.omiseSource.value = nonce;
				};
				creditForm.submit();
			}
		});
	});

	var iBangkingButton = document.querySelector("#iBangkingButton");
	var iBangkingForm = document.querySelector("#iBangkingForm");	
	iBangkingButton.addEventListener("click", (event) => {
		event.preventDefault();
		// OmiseCard.open({
		// 	frameLabel:"iFruit Brand",
		// 	image:'<?php echo base_url('assets/images/favicon.png') ?>',
		// 	amount: nettotal,  // เช่น ถ้าชำระ 20 บาท ต้องใส่เป็น 2000;
		// 	currency: "THB",// สกุลเงิน
		// 	defaultPaymentMethod: "internet_banking", // ช่องทางการชำระเงิน ค่าเริ่มต้นเป็น credit_card
		// 	onCreateTokenSuccess: (nonce) => {
		// 		if (nonce.startsWith("tokn_")) {
		// 			iBangkingForm.omiseToken.value = nonce;
		// 		} else {
		// 			iBangkingForm.omiseSource.value = nonce;
		// 		};
		// 		iBangkingForm.submit();
		// 	}
		// });
		iBangkingForm.submit();
	});

	var counterButton = document.querySelector("#counterButton");
	var counterForm = document.querySelector("#counterForm");	
	counterButton.addEventListener("click", (event) => {
		event.preventDefault();
		OmiseCard.open({
			frameLabel:"iFruit Brand",
			image:'<?php echo base_url('assets/images/favicon.png') ?>',
			amount: nettotal,  // เช่น ถ้าชำระ 20 บาท ต้องใส่เป็น 2000;
			currency: "THB",// สกุลเงิน
			defaultPaymentMethod: "bill_payment_tesco_lotus", // ช่องทางการชำระเงิน ค่าเริ่มต้นเป็น credit_card			
		});
	});
</script>
