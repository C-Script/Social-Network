<!--This Div shows all the current user posts -->
<div>
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