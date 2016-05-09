
<?php
	session_start();

	global $title;
	$title = "Logga In";
	global $isLoggedIn;
	global $username;

	function login() {
		
		$conn = new PDO("mysql:host=127.0.0.1;dbname=slutprojekt;charset=UTF8","root","");
	

		if (isset($_POST['username']) && isset($_POST['password'])) {
			$isLoggedIn = login(conn, $_POST['username'], $_POST['password'])	

			if ($isLoggedIn)
				echo "<p> Fel lösenord eller användarnamn! </p>";
			else
				header("location: index.php");
		}
	}

	login();

?>

<?php

	include("src/init.php");
	$title = "Index.php";
	include("src/header.php");

?>

<form action="login.php" method="post"><br/>
	Username: <input name="username" type="text" size="10" /><br/>
	Password <input name="password" type="password" size="10" /><br/>
	<input name="submit" type="submit" /><br/>
</form>

<?php

	include("src/footer.php")
?>