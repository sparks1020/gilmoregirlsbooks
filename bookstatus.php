<?php

include 'config.php';

$title=$_POST['title'];
//$author=$_POST['author'];
$status=$_POST['status'];

$title= addslashes($title);
$author= addslashes($author);
$status= addslashes($status);

$db = mysqli_connect('localhost:3306', 'wp-admin', MYSQL_PASSWORD);

mysqli_select_db($db , 'rorybooks');
//$query = "insert into books values('')"

$query = "SELECT title FROM rorybooks WHERE title like '$title%'";
$result = mysqli_query($db , $query);

$num_results = mysqli_num_rows($result);

if (!$result)
{
  echo "$query";
}

for ($i=0; $i <$num_results; $i++)
{
  $row = mysqli_fetch_array($result);
  echo '<p><strong>'.($i+1).'. Title: ';
  echo htmlspecialchars(stripslashes($row['title']));
  echo '</strong><br />Author: ';
  echo stripslashes($row['author']);
  echo '</p>';;
  echo '<button>Read</button>';
}





 ?>
