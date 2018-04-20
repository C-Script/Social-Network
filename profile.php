<!--This is the profile of each user-->

<?php
    session_start();     
    
?>
<html lang="en">
    <head>
        <title>World Changers</title>
    </head>
    <body>
        <?php
            include 'partials/header.php';
        ?>
        
        This is the profile of <?=$current_user_info['first_name']?> <?=$current_user_info['last_name']?>

        <!--The partial where the user posts appear-->
        <?php
            include 'partials/my_posts.php'
        ?>

    </body>
</html>