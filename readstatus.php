<?php

include 'config.php';

$title=$_POST['title'];
$author=$_POST['author'];
$status=$_POST['status'];

$title= addslashes($title);
$author= addslashes($author);
$status= addslashes($status);

$db = mysqli_connect('localhost:3306', 'wp-admin', MYSQL_PASSWORD);

mysqli_select_db($db , 'rorybooks');
//$query = "insert into books values('')"

$query = "UPDATE rorybooks SET read_status = '$status' WHERE title = '$title' and author = '$author'";
echo "$query";
$result = mysqli_query($db , $query);




 ?>
