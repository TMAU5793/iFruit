<section class="payment">
	<div class="container ptb-60">
		<form name="checkoutForm" method="POST" action="checkout.php">
	<script type="text/javascript" src="https://cdn.omise.co/omise.js"
		data-key="pkey_test_5kwio2ljfyi61k6jdbx"
		data-image="<?php echo base_url('assets/images/logo.png') ?>"
		data-frame-label="Merchant site name"
		data-button-label="Pay now"
		data-submit-label="Submit"
		data-location="no"
		data-amount="10025"
		data-currency="thb"
		>
	</script>
	<!--the script will render <input type="hidden" name="omiseToken"> for you automatically-->
	</form>
	</div>
</section>
<script>
	$(function(){
		
	});
</script>
