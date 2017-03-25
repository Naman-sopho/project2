<html>
<head>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<script src="js/script.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<title><?= $title ?></title>
</head>
<body>

<div class="container">
	<div class="logo">
		<a href="index.php"><img src="img/logo.jpeg"></a>
	</div>
	<div class="nav">
		<?php if (!empty($_SESSION["id"])): ?>
        	            <ul>
        	                <li><a href="portfolio.php">Portfolio</a></li>
        	                <li><a href="items.php">Items Available</a></li>
        	                <li><a href="sell.php">Sell</a></li>
        	                <li><a href="logout.php"><strong>Log Out</strong></a></li>
        	            </ul>
        	<?php endif; ?>
	</div>
