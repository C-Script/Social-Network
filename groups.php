<?php
    session_start();

    require 'php/db_init.php';
    require 'partials/header.php';
    
    $notification="";

    if(isset($_POST['group_create'])){
        $group_name = $_POST['group_name'];
        $group_desc = $_POST['group_desc'];
        $group_name_name = $group_name . rand(1,1000);
        $query="INSERT INTO groups (group_id, name, num_posts, member_array, description, group_name) VALUES (NULL, '$group_name', 0, ',', '$group_desc', '$group_name_name')";
        $query_run=mysql_query($query);

        if($query_run){
            $notification="Successfully created";
        }
        else {
            $notification="Group couldn't be created";
        }
        
    }
?>
<html>
    <head>
        <title>Groups</title>
        

    </head>
    <body>
        <?php
            if($_SESSION['email']=="admin@gmail.com"){
                ?>

                    <form action="groups.php" method="POST" class="">
                        Create a group:
                        Name: <input type="text" name="group_name"><br>
                        Description: <input type="text" name="group_desc"><br>
                        <input type="submit" value="Create" name="group_create"><br>
                        <?= $notification ?>
                    </form>

                <?php
            }
        ?>
        

        <h2>Groups List</h2>

        <?php


        ?>

    </body>
</html>