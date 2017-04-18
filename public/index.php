<?php
require("../includes/helpers.php");

session_start();

render("../views/header.php", ["title" => "|Home"]);
?>
<?php if (empty($_SESSION["id"])): ?>
	<?php render("../views/login_form.php"); ?>
	<br>
	<h2>Or</h2><br>
	<h4>Click <a href="/items.php">here</a> to continue as a <em>Guest</em></h4>
	<?php render("../views/footer.php"); ?>
<?php else: ?>
	<?php redirect("portfolio.php"); ?>

<?php endif; ?>

