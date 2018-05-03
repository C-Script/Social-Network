<?php
    session_start();     
    include 'partials/header.php';
    include 'partials/display_posts.php';
    include 'php/profile_handling.php';
?>
<html>
<head>
    <title>others profile</title>
    <link rel="stylesheet" type="text/css" href="styles/profile.css">
    <link href="https://fonts.googleapis.com/css?family=Hi+Melody" rel="stylesheet">
   </head>
<body>
<!--The structure that holds the info is: $profile_user_info-->
This is the profile of <?=$profile_user_info['first_name']?> <?=$profile_user_info['last_name']?>

<?php
if($profile_user_info['education']!=NULL)
    {
        echo"<br>";
        echo 'his education is: '.$profile_user_info['education'];
    }

?>

<div class="posts_area">
    <?php    
        $post=new Post($current_user_info['id']);
        $post->loadPostsFriends();
    ?>
</div>


<!--form to log out-->
<form action="index.php" method="POST">
    <input type="submit" value="Log out" name="logout">            
</form>

</body>
</html>