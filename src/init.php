<?php
	global $title;
	$title = "...";
	global $isLoggedIn;
	global $username;
	global $password;

	$isLoggedIn = (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']);
	if ($isLoggedIn) {
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
	}
?>