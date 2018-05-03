<?php
require 'php/db_init.php';
class User {
	public $user_id='';
	 public function __construct() {
	 	 $argv = func_get_args();
        if( func_num_args()==1 ) {
                self::__construct1($argv[0]);
		 }
		 
		elseif(func_num_args()==2)
		{
			self::__construct2($argv[0],$argv[1]);

		}
	 
         else
         {
        $this->user_id='';
    	}
}
   // to construct an object using user's id
   public function __construct1($id) {
	 	$this->user_id=$id;
	 
	}
   /* to construct an object using any information about him 
	 it will be useful in case you want to search for another user
	 and you don't have his id ,but you have a certain
	 information about him
   */ 

public function __construct2($field_in_user_table,$value ) {
	$query="SELECT id from users where $field_in_user_table ='$value'";
	$query_run=mysql_fetch_assoc(mysql_query($query));
	if($query_run)
	   $this->user_id=$query_run["id"];	
	else
	{
	   echo 'No such user has been found !!';
       exit();
	}
}
	
   
public function get($columnName)
{
	$query="SELECT $columnName from users where id='$this->user_id'";
	$query_run=mysql_fetch_assoc(mysql_query($query));
	return $query_run[$columnName];
}
public function getAll()
{
	$query="SELECT * FROM users where id='$this->user_id'";
	$query_run=mysql_fetch_assoc(mysql_query($query));
	return $query_run;
}
public function getAllPosts()
{
	$query="SELECT * FROM posts where owner='$this->user_id'";
	$query_run=mysql_query($query);
	return $query_run;
}
public function update($columname,$value)
{
	$query="UPDATE users SET $columname = $value WHERE users.id ='$this->user_id'";
	$query_run=mysql_query($query);
	if($query_run)
	{
		return 1;
	}
	else
	{
		return 0;
	}
}
public function add($user_info)
{
	$query="INSERT INTO users (id, first_name, last_name, email, password, age, num_posts, num_likes, friends,profile_name,education,profile_image, friend_array) VALUES (NULL, '$user_info[0]', '$user_info[1]', '$user_info[2]', '$user_info[3]', '$user_info[4]', NULL, NULL, NULL,NULL,NULL,NULL, ',')";
	$query_run=mysql_query($query);
	if($query_run)
	{
		$query="SELECT id from users where email='$user_info[2]'";
		$query_run=mysql_fetch_assoc(mysql_query($query));
		$this->user_id=$query_run['id'];
		// the part below is to add the profile name to the data base
		//profile name should be like firstname.id
		$query="SELECT first_name from users where email='$user_info[2]'";
		$query_run=mysql_fetch_assoc(mysql_query($query));
		$first_name=strtolower($query_run['first_name']);

		//Setting profile_name
		$query="UPDATE users SET profile_name = '$first_name$this->user_id' WHERE id ='$this->user_id'";
		mysql_query($query);

		//Setting profile image
		$rand=rand(1,16);
		$profile_image="assets/images/profile_pics/defaults/{$rand}.png";

		$query="UPDATE users SET profile_image = '$profile_image' WHERE id ='$this->user_id'";
		mysql_query($query);

		return 1;
	}
	else
	{
		return 0;
	}
}
public function remove($id)
{
	$query="DELETE FROM `users` WHERE id='$id'";
	$query_run=mysql_query($query);
	if($query_run)
	{
		return 1;
	}
	else
	{
		return 0;
	}
}
public function remove1()
{
	$query="DELETE FROM `users` WHERE id='$this->user_id'";
	$query_run=mysql_query($query);
	if($query_run)
	{
		
		return 1;
	}
	else
	{
		
		return 0;
	}
}
}
/*
this is user class 
class methodes
1.get(string anything_about_the_user)
2.update(columnName,value)
3.add(array user_info)
4.remove(user_id)
5.getAll()
6.getAllPosts()
*/