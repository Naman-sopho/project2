<?php
// renders items available for sale

require("../includes/helpers.php");

// enable sessions
session_start();

//connect to the database
$conn = database_connect();

$query = "SELECT * FROM items";
$rows = query($conn, $query);

$colleges = query($conn, "SELECT college FROM items");
$items = 1;

render("../views/header.php", ["title" => "|Items"]);

if ($_SERVER["REQUEST_METHOD"] === "GET")
{
	render("../views/items_view.php", ["result" => $rows, "colleges" => $colleges, "items" => $items]);
}

else
{
	// if nothing is entered for filtering results
	if (empty($_POST["category"]) && empty($_POST["college"]))
	{
		echo "<h3>Please select a Category or College for filtering results</h3>";
		render("../views/items_view.php", ["result" => $rows, "colleges" => $colleges, "items" => $items]);
	}
	
	// if only college is entered
	elseif (empty($_POST["category"]))
	{
		$query = "SELECT * FROM items WHERE college='".$_POST["college"]."'";
		$row = query($conn, $query);
		
		// render filtered results

		if (mysqli_num_rows($row) > 0)
			render("../views/items_view.php", ["result" => $row, "colleges" => $colleges, "items" => $items]);
		else
			echo "<h1>Sorry!</h1><p>No items match your query.</p>";
	}

	// if only category is entered
	elseif (empty($_POST["college"]))
	{
		$query = "SELECT * FROM items WHERE category='".$_POST["category"]."'";
		$row = query($conn, $query);
		
		// render filtered results
		if (mysqli_num_rows($row) > 0)
			render("../views/items_view.php", ["result" => $row, "colleges" => $colleges, "items" => $items]);
		else
			echo "<h1>Sorry!</h1><p>No items match your query.</p>";
	}
	
	// else both college and category are provided
	else
	{
		$query = "SELECT * FROM items WHERE category='".$_POST["category"]."' AND college='".$_POST["college"]."'";
		$row = query($conn, $query);

		//render filtered results
		if (mysqli_num_rows($row) > 0)
			render("../views/items_view.php", ["result" => $row, "colleges" => $colleges, "items" => $items]);
		else
			echo "<h1>Sorry!</h1><p>No items match your query.</p>";
	}


}

render("../views/footer.php");
?>
