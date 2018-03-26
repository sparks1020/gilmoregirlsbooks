<?php

include 'config.php';

//sql query to db to select first three results from table and spit out
$db = mysqli_connect('localhost:3306', 'wp-admin', MYSQL_PASSWORD);

mysqli_select_db($db , 'rorybooks');
$query = "SELECT title, author FROM rorybooks where read_status = null or read_status = '' ORDER by ID LIMIT 3";
$result = mysqli_query($db , $query);

$num_results = mysqli_num_rows($result);

echo '<p>Number of books found: '.$num_results.'</p>';

for ($i=0; $i <$num_results; $i++)
{
  $row = mysqli_fetch_array($result);
  echo '<p><strong>'.($i+1).'. Title: ';
  echo htmlspecialchars(stripslashes($row['title']));
  echo '</strong><br />Author: ';
  echo stripslashes($row['author']);
  echo '</p>';
}


 ?>
