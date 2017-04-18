<?php
//Validates input taken from login-form against database
//Sets a cookie and redirects user to portfolio upon successful validation

// enable sessions
session_start();

require("../includes/helpers.php");
// if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("login_form.php", ["title" => "Log In"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
		}
        
        // connecting to database
		$conn = database_connect();
		
        // query database for user
		$query = "SELECT * FROM users WHERE username = '".$_POST["username"]."'";
		
		$rows = mysqli_query($conn, $query);
        // if we found user, check password
        if (mysqli_num_rows($rows) == 1)
        {
            // first (and only) row
            foreach($rows as $row)
	    {
            	// compare hash of user's input against hash that's in database
            	if (password_verify($_POST["password"], $row["hash"]))
            	{
                	// remember that user's now logged in by storing user's ID in session
                	$_SESSION["id"] = $row["id"];

                	// redirect to portfolio
                	redirect("/portfolio.php");
            	}
	    }
        }

        // else apologize
        apologize("Invalid username and/or password.");
    }
?>

