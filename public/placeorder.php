<?php
if (!isset($_SESSION['loggedin'])) {
	template_header('Order Placed');
}
else{
	template_header_loggedin('Order Placed');
}
?>

<div class="placeorder content-wrapper">
    <h1>Your Order Has Been Placed</h1>
    <p>Thank you for ordering with us! We'll contact you by email with your order details.</p>
</div>

<?=template_footer()?>