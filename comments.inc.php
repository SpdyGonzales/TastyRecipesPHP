<?php
include './dbhmes.inc.php';

function setComments($conn){
	if($_SESSION['uid']) {
		if(isset($_POST['commentSubmit'])){
			$uid = $_POST['uid'];
			$date = $_POST['date'];
			$message = $_POST['message'];


			$sql = "INSERT INTO comments (uid, date, message) 
			VALUES ('$uid', '$date', '$message')";
			$result = mysqli_query($conn,$sql);
		}
	} else {
		echo "please log in to comment";
	}
}

function deleteComment($conn) {
	if(isset($_POST['delete'])){
		$sql = "DELETE FROM comments WHERE cid='".$_POST['cid']."'";
		if ($conn->query($sql) === TRUE) {
	    	echo "Comment deleted successfully";
	    	// getComments($conn);
		} else {
	    	echo "We had a problem deleting your comment";
		}
	}

}

function getComments($conn){
	$sql = "SELECT * FROM comments";
	$result = $conn->query($sql);
	echo "<ul class='comments-list' id='comments'>";
	while ($row = $result->fetch_assoc()){
		echo "<div class='comment'>";
		if($_SESSION['uid'] == $row['uid']) {
			echo "<form method='POST' action='".deleteComment($conn)."#comments'>";
			echo "<input type='hidden' name='delete' value='delete' />";
			echo "<input type='hidden' name='cid' value='".$row['cid']."' />";
			echo "<input type='submit' value='delete'/>";
			echo "</form>";
		}
		echo '<h5>'.$row['uid'].'</h5>';
		echo '<p class="date">'.$row['date'].'</p>';
		echo '<p>'.$row['message'].'</p>';
		echo "</div>";
	}
	echo "</ul>";
}