<?php

include './dbh.php';

$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

if($first && $last && $uid && $pwd) {

$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
$sql = "INSERT INTO users (first, last, uid, pwd)
VALUES ('$first','$last','$uid','$hashedPwd')";
mysqli_query($conn,$sql);

header("Location: ./index.php");

} else {
	echo "please provide information";
}