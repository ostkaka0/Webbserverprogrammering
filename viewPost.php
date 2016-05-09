<?php
	session_start();
	include("src/init.php");
	$title = "Index.php";
	include("src/header.php");

	$postId = isset($_GET['postId'])? $_GET['postId'] : 0;
	$isTopicFound = false;
	$posterID;
	$topicID;
	$title;
	$content;
	$creationDate;
	$lastEditDate;

	// Find topic:
	if ($postId != 0) {
		$conn = new PDO("mysql:host=127.0.0.1;dbname=slutprojekt;charset=UTF8","root","");
		$sql = "select * from posts where id = $postId";
		$stmt = $conn->prepare($sql);
		$isTopicFound = $stmt->execute();
		$row = $stmt->fetch();

		if (!$isTopicFound) {
			echo "<p> Ogilitigt! </p>";
		}
		else {

			$posterID = $row['userID'];
			$topicID = $row['topicID'];
			$title = $row['title'];
			$content = $row['content'];
			$creationDate = $row['creationDate'];
			$lastEditDate = $row['lastEditDate'];

			echo "<p> $title $title svamp $title $title </p>";
		}
	}

	if (!$isTopicFound) {
		echo "<p> Could not find topic! </p>";
	}
	else {
	}
?>

<h1><?=$title?></h1>
<p><?=$content?></p>

<?php
	if ($isLoggedIn) {
		echo "<p> Trevligt att se dig $username! </p>";
	}
?>

<?php
	include("src/footer.php")
?>