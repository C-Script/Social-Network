<?php

class post {
	public $owner_id;
	public $post_id;
	 public function __construct() {
	 	 $argv = func_get_args();
        if( func_num_args() ) {
        	switch (func_num_args()) {
        		case 1:
        			self::__construct1($argv[0]);
        			break;
        		
        		case 2:
        			self::__construct2($argv[0],$argv[1]);
        			break;
        	}
                
         }
         else
         {
        $this->owner_id='';
        $this->post_id='';
    	}
}
   public function __construct1($id) {
        $this->owner_id=$id;
    }
    public function __construct2($id,$post_id) {
        $this->owner_id=$id;
        $this->post_id=$post_id;
    }
public function get($columnName)//get one property of that post like num_likes or num_shares ...etc
{
	$query="SELECT $columnName from posts where post_id='$this->post_id'";
	$query_run=mysql_fetch_assoc(mysql_query($query));
	return $query_run['$columnName'];

}
public function getAll()//get all post info like ,post_id,owner_id,post,likes...etc
{
	$query="SELECT * from posts where post_id='$this->post_id'";
	$query_run=mysql_fetch_assoc(mysql_query($query));
	return $query_run;

}

public function update($columname,$value)//update a certain property in the post like num_likes,shares..etc
{

	$query="UPDATE posts SET $columname = $value WHERE posts.post_id ='$this->post_id'";
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

public function add($post_info)//add new post to the table posts
{
	$query="INSERT INTO posts (post_id, owner, post, likes, shares, comments) VALUES (NULL, '$this->owner_id', '$post_info[2]', '$post_info[3]', '$post_info[4]', '$post_info[5]')";
	$query_run=mysql_query($query);

	if($query_run)
	{
		//here we successfully added the post so we need to get its id and save it in $this->post_id
		$post_data=mysql_fetch_assoc(mysql_query("SELECT post_id FROM posts WHERE owner=$this->owner_id"));
		$this->post_id=$post_data['post_id'];	
		return 1;
	}
	else
	{
		return 0;
	}
}

public function remove()//remove that post from the table 
{
	$query="DELETE FROM posts WHERE post_id='$this->post_id'";
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
public function remove1($id)//deleting a post from database according to a known post_id no matter if this post belongs to this user_id or not 
{
	$query="DELETE FROM posts WHERE post_id='$id'";
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



?>