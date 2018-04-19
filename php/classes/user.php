<?php
require 'php/db_init.php';
class user {
	public $user_id='';

	 public function __construct() {
	 	 $argv = func_get_args();
        if( func_num_args() ) {
                self::__construct1($argv[0]);
         }
         else
         {
        $this->user_id='';
    	}
}
   public function __construct1($id) {
        $this->user_id=$id;
    }
public function get($columnName)
{
	$query="SELECT $columnName from users where id='$this->user_id'";
	$query_run=mysql_fetch_assoc(mysql_query($query));
	return $query_run['$columnName'];

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
	$query="INSERT INTO users (id, first_name, last_name, email, password, age, num_posts, num_likes, friends) VALUES (NULL, '$user_info[0]', '$user_info[1]', '$user_info[2]', '$user_info[3]', '$user_info[4]', NULL, NULL, NULL)";
	$query_run=mysql_query($query);

	if($query_run)
	{
		$query="SELECT id from users where email='$user_info[2]'";
		$query_run=mysql_fetch_assoc(mysql_query($query));
		$this->user_id=$query_run['id'];
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