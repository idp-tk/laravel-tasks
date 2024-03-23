<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['Id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM items WHERE Id = ?');
    $stmt->execute([$_GET['Id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>

<?php
if (!isset($_SESSION['loggedin'])) {
	template_header('Product');
}
else{
	template_header_loggedin('Product');
}
?>


<div class="product content-wrapper">
    <img src="/<?=$product['ImagePath']?>" width="500" height="500" alt="<?=$product['Name']?>">
    <div>
        <h1 class="name"><?=$product['Name']?></h1>
        <span class="price">
        &#163;<?=$product['Price']?>
            <?php if ($product['RRP'] > $product['Price']): ?>
            <span class="rrp">&#163;<?=$product['RRP']?></span>
            <?php endif; ?>
        </span>
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['Quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['Id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?=$product['Description']?>
        </div>
    </div>
</div>

<?=template_footer()?>