<?php
    session_start();
    include 'partials/header.php';
?>
<html lang="en">
<head>
    <title>Others</title>
    <style>body {text-align:center}</style>
</head>
<body>

<div>
        <h4>Our amazing people in the community</h4>

        <?php
            $query = mysql_query("SELECT * FROM users");
            if(mysql_num_rows($query)==0){
                echo "There are no users!";
            }
            else {
                while($row = mysql_fetch_array($query)){
                    $user_id=$row['id'];
                    $user = new User($user_id);
                    echo "
                    <a href={$user->get('profile_name')}>
                    <img src={$user->get('profile_image')}>
                    <h2>{$user->get('first_name')}" . " " . "{$user->get('last_name')}</h2>
                    </a>
                    <br><br>
                    ";

                }
            }

        ?>
          
    </div>
    
</body>
</html>