<?php
// The amounts of products to show on each page
$num_products_on_each_page = 4;
// The current page - in the URL, will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select products ordered by the date added
$stmt = $pdo->prepare('SELECT * FROM items WHERE Category = "SSDs" ORDER BY Name DESC LIMIT ?,?');
// bindValue will allow us to use an integer in the SQL statement, which we need to use for the LIMIT clause
$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of products
$total_products = $pdo->query('SELECT * FROM items WHERE Category = "SSDs"')->rowCount();
?>

<?php
if (!isset($_SESSION['loggedin'])) {
	template_header('SSDs');
}
else{
	template_header_loggedin('SSDs');
}
?>

<div class="products content-wrapper">
    <h1>SSDs</h1>
    <p><?=$total_products?> Products</p>
    <div class="products-wrapper">
        <?php foreach ($products as $product): ?>
        <a href="index.php?page=product&Id=<?=$product['Id']?>" class="product">
            <img src="/<?=$product['ImagePath']?>" width="200" height="200" alt="<?=$product['Name']?>">
            <span class="name"><?=$product['Name']?></span>
            <span class="price">
                &#163;<?=$product['Price']?>
                <?php if ($product['RRP'] > $product['Price']): ?>
                <span class="rrp">&#163;<?=$product['RRP']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
    <div class="buttons">
        <?php if ($current_page > 1): ?>
        <a href="index.php?page=products&p=<?=$current_page-1?>">Prev</a>
        <?php endif; ?>
        <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
        <a href="index.php?page=products&p=<?=$current_page+1?>">Next</a>
        <?php endif; ?>
    </div>
</div>

<?=template_footer()?>