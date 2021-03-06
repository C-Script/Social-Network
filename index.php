<!--This is the main (home) page-->
<?php
    session_start();     
?>

<html lang="en">
    <head>
        <title>World Changers</title>
        <link rel="stylesheet" type="text/css" href="styles/index.css">
    </head>
    <body>
        <?php
            include 'partials/header.php';
            include 'php/index_handling.php';    
        ?>

        <?php
            if($_SESSION['email']!="admin@gmail.com"){
                ?>
                Welcome <?=$current_user_info['first_name']?>
                <?php
            }
            else {
                ?>
                Welcome Admin!
                <?php
            }
            ?>

        <!--The form where the user submits his new post-->
        <?php 
        if($_SESSION['email']!="admin@gmail.com")
        echo '<div class="post_status_area">
            <form action="index.php" method="POST">
                <input type="text" placeholder="Wanna Change The World ?!" name="post_value">
                <input type="submit" value="Post" name="Post">            
            </form>
        </div>';
        ?>
        <!--The place where the user posts appear-->
        <div class="posts_area">
            <?php
                
                $post=new Post($current_user_info['id']);
                $post->loadPostsFriends();
            ?>
        </div>

        <div>
            <?php
                if($current_user_info['friend_array']!=","){
                    include 'suggestedFriends.php';
                }
            ?>
        </div>

    </body>
</html>

