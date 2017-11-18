<?php
session_start();

include './dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM users WHERE uid ='$uid'";
$result = $conn->query($sql);

if(!$row = mysqli_fetch_assoc($result)){
	echo "Your username or password is incorrect";
} else{
	if(password_verify($pwd, $row['pwd'])) {
		$_SESSION['id'] = $row['id'];
		$_SESSION['first'] = $row['first'];
		$_SESSION['uid'] = $row['uid'];
	} 

}

header("Location: index.php");

?>