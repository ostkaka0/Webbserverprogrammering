<?php
	session_start();
	include("src/init.php");
	$title = "Index.php";
	include("src/header.php");

	$postId = isset($_GET['postId'])? $_GET['postId'] : 0;
	$isTopicFound = false;

	// Find topic:
	if ($postId != 0) {
		$conn = new PDO("mysql:host=127.0.0.1;dbname=slutprojekt;charset=UTF8","root","");
		$sql = "select * from posts where id = postId";
			$stmt = $conn->prepare($sql);
			$success = $stmt->execute();
			$row = $stmt->fetch();

			if (!$success) {
				echo "<p> Ogilitigt konto! </p>";
			}
			else {

				$posterId = $row['id'];

				echo "<p> $posterId $posterId svamp $posterId $posterId </p>";
			}
	}

	if (!$isTopicFound) {
		echo "<p> Could not find topic! </p>";
	}
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