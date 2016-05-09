<?php
	session_start();
	include("src/init.php");
	$title = "Index.php";
	include("src/header.php");

?>


<p> Välkommen till en meningslös sida! </p>

<?php
	if ($isLoggedIn) {
		echo "<p> Trevligt att se dig $username! </p>";
	}
?>

<?php
	include("src/footer.php")
?>