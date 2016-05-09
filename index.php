<?php
	include_once("src/post.php");

	session_start();
	include("src/init.php");
	$title = "Index.php";
	include("src/header.php");

	$conn = new PDO("mysql:host=127.0.0.1;dbname=slutprojekt;charset=UTF8","root","");

	$postArray = listPosts($conn, 10);

	foreach ($postArray as $post) {
		$title = $post->title;
		$id = $post->id;
		echo "<a href = 'viewPost.php?postID=$id'><h2> $title </h2></a>";
	}

	/*$sql = "select * from posts order by creationDate desc limit 10";
	$stmt = $conn->prepare($sql);
	$success = $stmt->execute();
	$row = $stmt->fetch();
	while($row) {
		$title = $row['title'];
		$id = $row['id'];
		echo "<a href = 'viewPost.php?postID=$id'><h2> $title </h2></a>";
		$row = $stmt->fetch();
	}*/
	
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