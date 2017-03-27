<?php

session_start();

require("../includes/helpers.php");

// connect to database
$conn = database_connect();

render("../views/header.php", ["title" => "|Contact Seller"]);

$contact = 1;
$user_id = "";
if(isset($_GET["ad_id"]))
{
	$query = "SELECT * FROM items WHERE ad_id='".$_GET["ad_id"]."'";
	$row = query($conn, $query);
	render("../views/items_view.php", ["result" => $row, "contact" => $contact]);
	
	$r = query($conn, "SELECT user_id FROM items WHERE ad_id='".$_GET["ad_id"]."'");
	$r = mysqli_fetch_assoc($r);
	$user_id = $r["user_id"];
	echo "<a href=\"contact_seller.php?user_id=".$user_id."\">Click to see all items from this seller</a>";
}

elseif (isset($_GET["user_id"]))
{
	$query = "SELECT * FROM items WHERE user_id='".$_GET["user_id"]."'";
	$row = query($conn, $query);

	render("../views/items_view.php", ["result" => $row]);	
}

render("../views/footer.php");

?>
