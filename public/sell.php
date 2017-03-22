<?php

require("../includes/helpers.php");

// enable sessions
session_start();

// check if user is logged in
if(empty($_SESSION["id"]))
{
	render("../views/login_form.php", ["title" => "|Sorry"]);
	apologize("You need to login before you can view this page.");
}

else
{
	// check if user is redirected via POST or GET request
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		render("../views/sell_form.php");
	}

	else
	{
		// validate user input
		if_empty($_POST["category"], "Please provide a category for your item.");
		if_empty($_POST["title"], "Please provide a name for your item.");
		if_empty($_POST["desc"], "Please provide a description for your item.");
		if_empty($_POST["info"], "Please provide your contact info.");
		if (empty($_POST["price"]) && $_POST["radio"] === "0")
			apologize("Please set a price for your item.");
		
		// connect to database
		$conn = database_connect();

		// sanitize user input
		$title = sanitize($_POST["title"], "sql");
		$desc = sanitize($_POST["desc"], "sql");
		$info = sanitize($_POST["info"], "sql");
		$price = sanitize($_POST["price"], "sql");
		
		$newfilename = "0";
		// upload image file if provided by user
		if (!empty($_FILES["fileToUpload"]["name"]))
			require("upload.php");
		
		// insert into database
		$query = "INSERT INTO items VALUES ('".$_SESSION["id"]."', '".$title."', '".$_POST["category"]."', '".$desc."', '".$info."', '".$price."', '".$newfilename."')";

		query($conn, $query);
	}
}

?>
