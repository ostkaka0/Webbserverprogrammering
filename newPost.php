<?php
	session_start();
	include("src/init.php");
	$title = "Index.php";
	include("src/header.php");

?>

<?php
	if ($isLoggedIn) {
		echo "<form action='uploadPost.php' method='post'><br/>";
		echo "	Rubrik: <input name='postTitle' type='text' size='10' /><br/>";
		echo "	Text:<br/> <textarea name='postContent' class='textarea'> Skriv här t</textarea>";
		echo "	<input name='submit' type='submit' /><br/>";
		echo "</form>";

	}
	else {
		echo "<p> Du måste <a href = 'login.php'>logga in</a> för att skriva ett inlägg.</p>";
	}
?>

<?php
	include("src/footer.php")
?>