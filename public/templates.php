<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'idp-database.mysql.database.azure.com';
    $DATABASE_USER = 'idpadmin';
    $DATABASE_PASS = 'password112!';
    $DATABASE_NAME = 'itemdatabase';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to MySQL: ' . $exception);
    }
}

// Template header, feel free to customize this
function template_header($title) {
// Get the number of items in the shopping cart, which will be displayed in the header.
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CyberMart - $title</title>
		<link href="css/main.css" rel="stylesheet" type="text/css">
        <link href="css/login.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1>CyberMart -&nbsp;<strong>Europa</strong></h1>
                <nav>
                    <a href="index.php?page=products">All</a>
                    <a href="index.php?page=products-ssd">SSDs</a>
                    <a href="index.php?page=products-gpu">GPUs</a>
                    <a href="index.php?page=products-processors">Processors</a>
                    <a href="index.php?page=products-mice">Mice</a>
                    <a href="index.php?page=products-keyboards">Keyboards</a>
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=login" title="Login">
					<i class="fas fa-user"></i>
					</a>
                    <a href="index.php?page=cart" title="Cart">
                    <i class="fas fa-shopping-cart"></i>
                    <span>$num_items_in_cart</span>
                    </a>
                </div>
                <form action = "index.php?page=search" class="search-form">
                <input class="search-box" type="search" placeholder="Search" aria-label="Search" id="search-box" name="search-value" onfocus="this.value=''">
                </form>
            </div>
        </header>
        <main>
EOT;
}
// Template header, feel free to customize this
function template_header_loggedin($title) {
    // Get the number of items in the shopping cart, which will be displayed in the header.
    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>CyberMart - $title</title>
            <link href="css/main.css" rel="stylesheet" type="text/css">
            <link href="css/login.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.0/css/all.css">
        </head>
        <body>
            <header>
                <div class="content-wrapper">
                    <h1>CyberMart</h1>
                    <nav>
                    <a href="index.php?page=products">All</a>
                    <a href="index.php?page=products-ssd">SSDs</a>
                    <a href="index.php?page=products-gpu">GPUs</a>
                    <a href="index.php?page=products-processors">Processors</a>
                    <a href="index.php?page=products-mice">Mice</a>
                    <a href="index.php?page=products-keyboards">Keyboards</a>
                    </nav>
                    <div class="link-icons">
                        <a href="index.php?page=profile" title="Profile">
                        <i class="fas fa-user-gear"></i>
                        </a>
                        <a href="index.php?page=logout" title="Logout">
                        <i class="fas fa-right-from-bracket"></i>
                        </a>
                        <a href="index.php?page=cart" title="Cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span>$num_items_in_cart</span>
                        </a>
                    </div>
                    <form action = "index.php?page=search" class="search-form">
                    <input class="search-box" type="search" placeholder="Search" aria-label="Search" id="search-box" name="search-value" onfocus="this.value=''">
                    </form>
                </div>
            </header>
            <main>
    EOT;
    }
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year CyberMart</p>
            </div>
        </footer>
    </body>
</html>
EOT;
}
?>