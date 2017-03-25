<?php
require("../includes/helpers.php");

session_start();

render("../views/header.php", ["title" => "|Home"]);
?>
<? if (empty($_SESSION["id"])): ?>
	<? render("../views/login_form.php"); ?>
	<br>
	<h2>Or</h2><br>
	<h4>Click <a href="/items.php">here</a> to continue as a <em>Guest</em></h4>
	<? render("../views/footer.php"); ?>
<? else: ?>
	<? redirect("portfolio.php"); ?>

<? endif; ?>
?>
