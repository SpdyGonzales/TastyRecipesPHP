<?php

$conn = mysqli_connect("localhost","root","root","commentsection");

if(!$conn){
	die("Connection failed: ".mysql_connect_error());
}
?>