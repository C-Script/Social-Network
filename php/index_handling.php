<?php

//Redirecting to the register page if the value isset($_SESSION['email']) is not set
//We set that value when the login is successful
require 'php/classes/post.php';
if(!isset($_SESSION['email'])){
    header("Location: register.php");    
}

if(isset($_POST['logout'])){
    session_destroy();
    header("Location: register.php");
}

if(isset($_POST['Post']))
{
	//update values in the user table
	$num_posts=$current_user_info['num_posts'];
	$num_posts+=1;
	$current_user->update("num_posts",$num_posts);
	//we need to creat a new post in the table posts
	$post_value=$_POST['post_value'];
	$new_post=new post($current_user_info['id']);
	$post_data=array('','',$post_value,'','','');
	$new_post->add($post_data);
	//refresh user posts query in the header page 
	$current_user_posts=$current_user->getAllPosts();
	//refresh the page to view the posts
	header("Location: index.php");
}