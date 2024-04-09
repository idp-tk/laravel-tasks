<?php
// The amounts of products to show on each page
$num_products_on_each_page = 4;
// The current page - in the URL, will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select products ordered by the date added
echo '<script type="text/javascript">const t0 = performance.now(); localStorage.setItem("t0", t0);</script>';
$stmt = $pdo->prepare('SELECT * FROM items WHERE Category = "Processors" ORDER BY Name DESC LIMIT ?,?');
// bindValue will allow us to use an integer in the SQL statement, which we need to use for the LIMIT clause
$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of products
$total_products = $pdo->query('SELECT * FROM items WHERE Category = "Processors"')->rowCount();
echo '<script type="text/javascript">const t1 = performance.now(); localStorage.setItem("t1", t1);</script>';
echo '<script type="text/javascript">localStorage.getItem("t1");localStorage.getItem("t0"); rawTime = t1 - t0; rawTimeFixed = rawTime.toFixed(2); responseTime = `Response Time: ${rawTimeFixed} ms.`; localStorage.setItem("responseTime", responseTime);</script>';
?>

<?php
if (!isset($_SESSION['loggedin'])) {
	template_header('Processors');
}
else{
	template_header_loggedin('Processors');
}
?>

<div class="products content-wrapper">
    <h1>Processors</h1>
    <p><?=$total_products?> Products -  <script>document.write(localStorage.getItem("responseTime"))</script></p>
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