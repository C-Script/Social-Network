<?php
    session_start();     
    require 'php/classes/Post.php';    
    include 'partials/header.php';
    require 'php/group_handling.php';
?>
<html>
    <head>
        <title><?= $current_group['name'] ?></title>
        <link rel="stylesheet" type="text/css" href="/social_network/styles/group.css">
    </head>
    <body>

        <div class="heading" style="text-align:center;margin-bottom:20px">
            <h1 style="margin-bottom:15px"><?= $current_group['name'] ?></h1>
            <?= $current_group['description'] ?>
        </div>

        <?php
            if(!isMember($user_id, $current_group_id) && $_SESSION['email']!="admin@gmail.com"){
                ?>
                    <form method="POST">
                        <input type="submit" name="join_group" value="Join Group">
                    </form>
                <?php
            }
            
        ?>
        

        <?php 
        if($_SESSION['email']!="admin@gmail.com")
        echo '<div class="post_status_area">
            <form method="POST">
                <input type="text" placeholder="Post into this group" name="post_value">
                <input type="submit" value="Post" name="Post">            
            </form>
        </div>';
        ?>

        
        <?php
            $post=new Post();
            if(isMember($user_id, $current_group_id) || $_SESSION['email']=="admin@gmail.com")
                $post->loadGroupPosts($current_group['group_id']);
            else 
                echo "<h2>Join the group to view its posts!</h2>";
            ?>

            <div class="members_list">
                <?php

                //Listing members:
                echo "<h3>Members:</h3>";
                if(isMember($user_id, $current_group_id) || $_SESSION['email']=="admin@gmail.com"){
                    $query=mysql_query("SELECT * FROM users");
                    $start_indicator=0;
                    while($user = mysql_fetch_array($query)){
                        if(isMember($user['id'], $current_group_id)){
                        $start_indicator++;
                    ?>
                        
                        <a href="/social_network/<?= $user['profile_name']?>">
                            <img src="<?= $user['profile_image'] ?>" style="width:40px;height:40px">
                            <?= $user['first_name'] . " " . $user['last_name'] ?>
                        </a><br>

                    <?php
                        }
                    }
                    if($start_indicator==0){
                        echo "<h4>No members yet!</h4>";
                    }
                }
                
            ?>
        </div>
    
    </body>
</html>