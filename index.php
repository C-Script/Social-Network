<!--This is the main (home) page-->
<?php
    session_start();     
    
?>

<html lang="en">
    <head>
        <title>World Changers</title>
        <link rel="stylesheet" type="text/css" href="styles/index.css">
        <link href="https://fonts.googleapis.com/css?family=Hi+Melody" rel="stylesheet">
    </head>
    <body>
        <?php
            include 'partials/header.php';
        ?>

        Welcomee <?=$current_user_info['first_name']?>

        <!--The form where the user submits his new post-->
        <div class="post_status_area">
            <form action="index.php" method="POST">
                <input type="text" placeholder="Wanna Change The World ?!" name="post_value">
                <input type="submit" value="Post" name="Post">            
            </form>
        </div>
        <!--The partial where the user posts appear-->
        <div class="posts_area">
            <?php
                include 'php/index_handling.php';
            
                $post=new Post($current_user_info['id']);
                $post->loadPostsFriends();
            ?>
        </div>

        <!--Log out button-->
        <form action="index.php" method="POST">
            <input type="submit" value="Log out" name="logout">            
        </form>
    </body>
</html>

