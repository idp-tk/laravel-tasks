<?php

session_destroy();

if (!isset($_SESSION['loggedin'])) {
	template_header('Order Placed');
    $_SESSION['name'] = "Guest User";
}
else{
	template_header_loggedin('Order Placed');
}
?>

<div class="placeorder content-wrapper">
    <h1>Thank you&nbsp;<?=htmlspecialchars($_SESSION['name'], ENT_QUOTES)?>, your order has been placed.</h1>
    <p>Thank you for ordering with us! We'll contact you by email with your order details.</p>
    <form action="index.php?page=index.php" method="post">
        <input type="submit" value="Return to Homepage">
    </form>
</div>

<?=template_footer()?>  