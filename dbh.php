<?php

$conn = mysqli_connect("localhost", "root","root","tastyaccounts");

if(!$conn){
	die("Connection failed: ".mysql_connect_error());
}
?>