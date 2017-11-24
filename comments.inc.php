<?php
include './dbhmes.inc.php';

function setComments($conn, $recipesite){
	if($_SESSION['uid']) {
		if(isset($_POST['commentSubmit'])){
			$uid = $_POST['uid'];
			$date = $_POST['date'];
			$message = $_POST['message'];


			$sql = "INSERT INTO commentsnew (uid, date, message, site) 
			VALUES ('$uid', '$date', '$message','$recipesite')";
			$result = mysqli_query($conn,$sql);
		}
	} else {
		echo "please log in to comment";
	}
	getComments($conn, $recipesite);
}

function getComments($conn, $recipesite){
	$sql = "SELECT * FROM commentsnew";
	$result = $conn->query($sql);
	echo "<ul class='comments-list' id='comments'>";
	while ($row = $result->fetch_assoc()){
		echo "<div class='comment'>";
		if($recipesite == $row['site']){
		echo '<h5>'.$row['uid'].'</h5>';
		echo '<p class="date">'.$row['date'].'</p>';
		echo '<p>'.$row['message'].'</p>';
			if($_SESSION['uid'] == $row['uid']) {
			echo "<form method='POST' action=''>";
			echo "<input type='hidden' name='cid' value='".$row['cid']."' />";
			echo "<input type='submit' value='delete' name='delSub'/>";
			echo "</form>";
			}
		echo "</div>";
		}
	}
	echo "</ul>";
	if(isset($_POST['delSub'])){
		deleteComment($conn);
	}
}

function deleteComment($conn) {
		$sql = "DELETE FROM commentsnew WHERE cid='".$_POST['cid']."'";
		if ($conn->query($sql) === TRUE) {
	    	echo "Comment deleted successfully";
		} else {
	    	echo "We had a problem deleting your comment";
		}
}
