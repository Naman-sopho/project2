<?php
require("../includes/helpers.php");

session_start();

render("../views/header.php", ["title" => "|Portfolio"]);
render("../views/portfolio.php");
render("../views/footer.php");
?>
