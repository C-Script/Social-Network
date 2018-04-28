<?php
 session_start();     
 include 'partials/header.php';
 //if you entered this if you will see the profile of another user
$query="SELECT profile_name from users GROUP BY first_name";
mysql_query($query);
var_dump($query);
?>