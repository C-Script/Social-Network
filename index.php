<!--This is the main (home) page-->
<?php
    session_start();     
    
?>

<html lang="en">
    <head>
        <title>Social Network</title>
    </head>
    <body>
        <?php
            include 'partials/header.php';
        ?>

        <form action="index.php" method="POST">
              <input type="text" placeholder="Wanna Change The World ?!" name="post_value">
            <input type="submit" value="Post" name="Post">            
        </form>
        <div><!--This Div shows all the user posts -->
             <?php 
             if(mysql_num_rows($user_posts))
        {
            echo " <h3> Your posts </h3>";
             while ($post=mysql_fetch_assoc( $user_posts)) {


                echo "<label> <h4> ".$post['post']." <h4></label>";


                
             }
         }
             ?>  
        </div>
        <form action="index.php" method="POST">
            <input type="submit" value="Log out" name="logout">            
        </form>
    </body>
</html>
<?php 
require 'php/index_handling.php';
?>