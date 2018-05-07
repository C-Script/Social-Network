<?php
    $group_name=$_GET['group_name'];

    $query="SELECT * FROM groups where group_name='$group_name'";
    $current_group=mysql_fetch_assoc(mysql_query($query));
    $current_group_id=$current_group['group_id'];


    //Handle making a post
    if(isset($_POST['Post']))
    {
        //Create a new post in the table posts
        $new_post=new Post($current_user_info['id']);
        $new_post->add($_POST['post_value'], $current_group['group_id']);
        //refresh user posts query in the header page 
        $current_user_posts=$current_user->getAllPosts();
        //refresh the page to view the posts
        header("Location: /social_network/groups/{$group_name}");
    }

    //Handle making a comment
    if(isset($_POST['comment']))
    {
        require 'php/classes/Comment.php';
        $post_id=$_POST['post_id'];
        $user_id=$_SESSION['id'];
        $newComment=new Comment($user_id,$post_id);
        $newComment->add($_POST['comment_value']);
        //refresh the page to view new comments
        header("Location: /social_network/groups/{$group_name}");
    }

    if(isset($_POST['join_group']))
    {
        $join_group_query = mysql_query("UPDATE groups SET member_array=CONCAT(member_array, '$user_id,') WHERE group_id='$current_group_id'");        
        
        header("Location: /social_network/groups/{$group_name}");
    }


    function isMember($id_to_check, $group_id){
		$idComma = "," . $id_to_check . ",";

		$query="SELECT member_array from groups where group_id='$group_id'";
		$query_run=mysql_fetch_assoc(mysql_query($query));
		$member_array = $query_run['member_array'];

        if((strstr($member_array, $idComma))) {
            return true;
        }
        else {
            return false;
        }
	}


?>