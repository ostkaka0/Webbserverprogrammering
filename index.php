<?php
	session_start();
	include("src/init.php");
	$title = "Index.php";
	include("src/header.php");

	$sql = "select * from posts order by creationDate desc limit 10";
	$stmt = $conn->prepare($sql);
	$success = $stmt->execute(array(":postID"=>$postID));
	$row = $stmt->fetch();
	do {
		echo "<h2> $row['title'] </h2>";
		$row = $stmt->fetch();
	} while($row);
	
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