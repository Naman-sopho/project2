<?php
 	function apologize($message)
    {
	render("header.php", ["title" => "|Sorry"]);
        render("apology.php", ["message" => $message]);
	render("footer.php");
	die();
    }

    /**
     * Redirects user to location, which can be a URL or
     * a relative path on the local host.
     */
    function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }

    /**
     * Renders view, passing in values.
     */
    function render($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables into local scope
            extract($values);
			
            require("../views/{$view}");
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }

	function logout()
    {
        // unset any session variables
        $_SESSION = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
    }

	function database_connect()
	{
		$servername = "127.0.0.1";
		$dbname = "project2";
		$username = "namantiwari";
		$password = "zrrJ8zNEdpuTwuty";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
		{
			apologize("Connection Error: ".mysqli_connect_error());
			die();
		}
		
		return $conn;
	}

	function query($conn, $string)
	{
		$result = mysqli_query($conn, $string);
		return $result;
	}

	function if_empty($check, $message)
	{
		if (empty($check))
			apologize($message);
	}

	// sanitizes user input for html or sql
	function sanitize($target, $lang)
	{
		$result = "";		
		
		$conn = database_connect();
		if($lang === "sql")
			$result = mysqli_real_escape_string($conn, $target);
		else if($lang === "html")
			$result = htmlspecialchars($target);
		
		return $result;
	}
?>
