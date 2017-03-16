<?php
 	function apologize($message)
    {
        render("apology.php", ["message" => $message]);
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
			
			require("../views/header.php");
            require("../views/{$view}");
			require("../views/footer.php");
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
		$servername = "localhost";
		$dbname = "project2";
		$username = "admin";
		$password = "123456789";

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
?>
