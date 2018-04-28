<?php
//Redirecting to the register page if the value isset($_SESSION['email']) is not set
//We set that value when the login is successful
// this is just typical to index_handling.php 

require 'php/classes/Post.php';

if(!isset($_SESSION['email'])){
	header("Location: register.php");
	   
}

 if(isset($_POST['logout'])){
    session_destroy();
	header("Location: register.php");
	
}

if(isset($_POST['Post']))
{
	//Create a new post in the table posts
	$new_post=new Post($current_user_info['id']);
	$new_post->add($_POST['post_value']);
	//refresh user posts query in the header page 
	$current_user_posts=$current_user->getAllPosts();
	//refresh the page to view the posts
	header("Location: profile.php");
}


$profile_user=new user('profile_name',$_GET['profile_name']);
$profile_user_info=$profile_user->getAll();//getting everything about this user based on his id in $user_id
//$profile_user_posts=$profile_user->getAllPosts();//getting an sql query of all posts that user have based on owner_id which is a column in the posts table that enabes us to know  which post is for whom
if($_GET['profile_name']!=$profile_user_info['profile_name'])
{
	echo ' No such user ';
	exit();
}