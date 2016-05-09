
<?php
	session_start();

	global $isLoggedIn;
	global $username;

	function register() {

		if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
			$conn = new PDO("mysql:host=127.0.0.1;dbname=slutprojekt;charset=UTF8","root","");

			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$sql = "insert into users(username, email, password) values('$username', '$email', '$password')";
			echo "insert into users(username, email, password) values('$username', '$email', '$password')";
			$stmt = $conn->prepare($sql);
			$success = $stmt->execute();
			$row = $stmt->fetch();


			if ($success) {
				echo "<p> Kunde inte skapa konto! </p>";
				return;
			}

			// TODO: Logga in
			$_SESSION["isLoggedIn"] = true;
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			header("location: index.php");
		}
	}

	register();

?>

<?php

	include("src/init.php");
	$title = "Index.php";
	include("src/header.php");

?>

<form action="register.php" method="post"><br/>
	Username: <input name="username" type="text" size="10" /><br/>
	Email: <input name="email" type="text" size="10" /><br/>
	Password <input name="password" type="password" size="10" /><br/>
	<input name="submit" type="submit" /><br/>
</form>

<?php

	include("src/footer.php")
?>