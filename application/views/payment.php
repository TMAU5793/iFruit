<section class="payment" style="color: #000;">
	<div class="container ptb-60">
		<!--form name="checkoutForm" method="POST" action="<?php echo base_url('Cart/payment'); ?>">
			<script type="text/javascript" src="https://cdn.omise.co/omise.js"
				data-key="pkey_test_5kwio2ljfyi61k6jdbx"
				data-image="<?php echo base_url('assets/images/favicon.png') ?>"
				data-frame-label="iFruit Brand"
				data-button-label="ชำระเงินผ่านบัตรเครดิต"
				data-submit-label="ชำระเงิน"
				data-location="no"
				data-amount="<?php echo str_replace('.','',$order->nettotal); ?>"
				data-currency="thb"
				>
			</script>
		</!--form-->
		<form id="checkoutForm" method="POST" action="<?php echo base_url('Cart/payment'); ?>">
			<input type="hidden" name="omiseToken">
			<input type="hidden" name="omiseSource">
			<input type="hidden" name="hd_invoice" value="<?php echo $order->invoice_no; ?>">
			<button type="submit" id="checkoutButton">Checkout</button>
		</form>
	</div>
</section>
<script type="text/javascript" src="https://cdn.omise.co/omise.js"></script>
<script>

	OmiseCard.configureButton('#checkoutButton', {
		publicKey: "pkey_test_5kwio2ljfyi61k6jdbx",
		amount: 100000,
		currency: 'THB',
		frameLabel: 'iFruit Brand',
		submitLabel: 'ชำระเงินผ่านบัตรเครดิต'
	});
	var button = document.querySelector("#checkoutButton");
	var form = document.querySelector("#checkoutForm");

	button.addEventListener("click", (event) => {
		event.preventDefault();
		OmiseCard.open({
			amount: 10000,
			currency: "THB",
			defaultPaymentMethod: "credit_card",
			onCreateTokenSuccess: (nonce) => {
				if (nonce.startsWith("tokn_")) {
					form.omiseToken.value = nonce;
				} else {
					form.omiseSource.value = nonce;
				};
				form.submit();
			}
		});
	});
</script>
