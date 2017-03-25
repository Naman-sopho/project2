<?php
//Takes input from register-form and creates new user instance in the database
//also logs in the user and redirects to their portfolio

	require("../includes/helpers.php");

	session_start();

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
	render("../views/header.php", ["title" => "|Register"]);
        render("register_form.php");
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submissions
        if(empty($_POST["username"]))
            apologize("You must provide a username. 
            Click <a href = \"register.php\">here </a>to go back to the registration page.");

        else if(empty($_POST["password"]))
            apologize("You must provide a password. 
            Click <a href = \"register.php\">here </a>to go back to the registration page.");
        
        // compare password and confirmation
        if($_POST["password"] != $_POST["confirmation"])
            apologize("Those passwords do not match. 
            Click <a href = \"register.php\">here </a>to go back to the registration page.");

		//connect to database
		$conn = database_connect();

		// if validated check if username is taken 
		$query = "SELECT * FROM users WHERE username='".$_POST["username"]."'";
        $rows = query($conn, $query);
       
        if (!$rows || mysqli_num_rows($rows) == 0)
        {
			// inserting new user into table
			$user = $_POST["username"];
			$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
			$insert = "INSERT INTO users (username, hash) VALUES('".$user."','".$password."')";
			query($conn, $insert);
			
    		$row = query($conn, "SELECT id FROM users WHERE username='".$_POST["username"]."'");
			$row = $row->fetch_assoc();
            $id = $row["id"];
                
			// log the user in and redirect to portfolio
            $_SESSION["id"] = $id;
            header("Location: /portfolio.php");
        }
      
        // username already taken    
        else
		{
			apologize("Username already taken. 
            Click <a href = \"register.php\">here </a>to go back to the registration page.");
			
        }
    }

?>

