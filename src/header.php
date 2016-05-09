<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> <?=$title?></title>

<meta charset="utf-8"/>

<link href="style.css" rel="stylesheet" type="text/css" />

</head>


<body>
<div class = "header">
	<?php
	if ($isLoggedIn) {
		echo '<div class = "halfHeaderButton" onClick = \'window.location.href = "profile.php"\'> My Profile </div>';
		echo '<div class = "halfHeaderButton" onClick = \'window.location.href = "logout.php"\'> Logout </div>';
		echo '<div class = "headerButton" onClick = \'window.location.href = "newPost.php"\'> New Post </div>';
	}
	else {
		echo '<div class = "halfHeaderButton" onClick = \'window.location.href = "login.php"\'> Login </div>';
		echo '<div class = "halfHeaderButton" onClick = \'window.location.href = "register.php"\'> Register </div>';
	}
	?>
</div>

<div class = "layout">