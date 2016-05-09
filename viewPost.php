<?php
	include_once("src/post.php");

	session_start();
	include("src/init.php");
	$title = "Index.php";
	include("src/header.php");

	$postId = isset($_GET['postID'])? $_GET['postID'] : 0;
	$post;
	$title = "";
	$content = "";


	// Find topic:
	if ($postId != 0) {
		$conn = new PDO("mysql:host=127.0.0.1;dbname=slutprojekt;charset=UTF8","root","");
		$post = loadPost($conn, $postId);
	}

	if ($post != null) {
		$title = $post->title;
		$content = $post->content;
	} else {
		echo "<p> Could not find topic! </p>";
	}
?>

<h1><?=$title?></h1>
<p><?=$content?></p>


<?php
	include("src/footer.php")
?>