<?php
require("../includes/helpers.php");

session_start();


// connect to database
$conn = database_connect();

// get all ads posted by a user
$query = "SELECT * FROM items WHERE user_id='".$_SESSION["id"]."'";
$row = query($conn, $query);

if (mysqli_num_rows($row) > 0)
{
	render("../views/header.php", ["title" => "|Portfolio"]);
	render("../views/items_view.php", ["result" => $row]);
}
else
	apologize("You have not posted any ads yet. Click on <strong>Sell</strong> to post an ad.");

render("../views/footer.php");
?>
