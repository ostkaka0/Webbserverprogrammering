<?php
	session_start();
	include("src/init.php");
	$title = "Index.php";
	include("src/header.php");

	$postTitle = isset($_POST['postTitle']) ? $_POST['postTitle'] : "";
	$postContent = isset($_POST['postContent']) ? $_POST['postContent'] : "";

	if ($postTitle != "" && $postContent != "") {

		$conn = new PDO("mysql:host=127.0.0.1;dbname=slutprojekt;charset=UTF8","root","");
		$userId;
		$topicId = 0;

		{
			$sql = "select id from users where username = '$username' and password = '$password'";
			$stmt = $conn->prepare($sql);
			$success = $stmt->execute();
			$row = $stmt->fetch();

			if (!$success) {
				echo "<p> Ogilitigt konto! </p>";
			}
			else {

				$userId = $row['id'];

				echo "<p> $userId $userId svamp $userId $userId </p>";
			}
		}
		{

			

			$sql = "insert into posts(userId, topicId, title, content) values(:userId, :topicId, :postTitle, :postContent);";
			
			$stmt = $conn->prepare($sql);
			$success = $stmt->execute(array(":userId"=>$userId,':topicId'=>$topicId, ':postTitle'=>$postTitle, ':postContent'=>$postContent));
			$row = $stmt->fetch();

			$postID = $conn->lastInsertId();

			if (!$success)
				echo "<p> Kunde inte skapa konto! </p>";
			else 
				header("location: viewPost.php?postID=$postID");
		}
	}
	
?>


<p> Laddar upp... </p>

<?php
	if ($isLoggedIn) {
		echo "<p> Trevligt att se dig $username! </p>";
	}
?>

<?php
	include("src/footer.php")
?>