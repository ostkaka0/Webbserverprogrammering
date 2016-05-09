<?php
function login($conn, $username, $password) {
	$sql = "select * from users where username = '$username'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$row = $stmt->fetch();

	if (!$row)
		return false;
	if ($password != $row["password"])
		return false;

	$_SESSION["isLoggedIn"] = true;
	$_SESSION["username"] = $username;
	$_SESSION["password"] = $password;
	return true;
}
?>