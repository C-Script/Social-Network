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
        <form action="index.php" method="POST">
              <input type="text" placeholder="Wanna Change The World ?!" name="post_value">
            <input type="submit" value="Post" name="Post">            
        </form>


        <!--The partial where the user posts appear-->
        <?php
            include 'partials/my_posts.php'
        ?>

        <!--Log out button-->
        <form action="index.php" method="POST">
            <input type="submit" value="Log out" name="logout">            
        </form>
    </body>
</html>

<?php 
 include 'php/index_handling.php';
?>