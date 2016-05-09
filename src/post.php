<?php

class Post {
	public $posterID = 0;
	public $topicID = 0;
	public $title = "";
	public $content = "";
	public $creationDate = null;
	public $lastEditDate = null;
}

function rowToPost($row) {
	$post = new Post;
	$post->posterID = $row['userID'];
	$post->topicID = $row['topicID'];
	$post->title = $row['title'];
	$post->content = $row['content'];
	$post->creationDate = $row['creationDate'];
	$post->lastEditDate = $row['lastEditDate'];
	return $post;
}

function loadPost($conn, $postID) {
	$sql = "select * from posts where id = :postID";
	$stmt = $conn->prepare($sql);
	$success = $stmt->execute(array(":postID"=>$postID));
	$row = $stmt->fetch();

	if (!$success)
		return null;

	return rowToPost($row);
}

function listPosts($conn, $limit) {
	$sql = "select * from posts order by creationDate desc limit :limit";
	$stmt = $conn->prepare($sql);
	$success = $stmt->execute(array(":limit"=>$limit));
	$postArray = array();
	$row = $stmt->fetch();
	while($row) {
		$row = $stmt->fetch();
		array_push($postArray, rowToPost($row));
	}
	return $postArray;
}
?>