<?php
	session_start();

	$_SESSION["isLoggedIn"] = false;
	$_SESSION["username"] = "";
	$_SESSION["password"] = "";
	header("location: index.php");

	include("src/init.php");
	$title = "Index.php";
	include("src/header.php");

?>


<p> Loggar ut... </p>

<?php
	include("src/footer.php")
?>