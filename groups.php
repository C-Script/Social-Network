<?php
    session_start();

    require 'php/db_init.php';
    require 'partials/header.php';
    
    $notification="";

    if(isset($_POST['group_create'])){
        $group_name = $_POST['group_name'];
        $group_desc = $_POST['group_desc'];
        $group_name_name = strtolower($group_name) . rand(1,1000);
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
        <style>
            .group_name {
                margin-bottom:-15px
            }
            .group_list {
                width:20%;
                float:left;
                margin-top: 50px;
                margin-left: 100px;
                text-align:center

            }
            .create_group_form {
                width: 40%;
                float:right;
                margin-top:50px
            }
            #group_desc_input{
                margin-left: -35px
            }
        </style>
    </head>
    <body>
        <?php
            if($_SESSION['email']=="admin@gmail.com"){
                ?>

                    <form action="groups.php" method="POST" class="create_group_form">
                        <h2>Create a group:</h2><br><br>
                        Name: <input type="text" name="group_name"><br><br>
                        <span id="group_desc_input">Description: <input type="text" name="group_desc"></span><br><br>
                        <input type="submit" value="Create" name="group_create"><br>
                        <?= $notification ?>
                    </form>

                <?php
            }
        ?>
        
        <div class="group_list">
            <h2>Groups List</h2>
            <?php

                $query2=mysql_query("SELECT * FROM groups");
                $start_indicator=0;
                while($group = mysql_fetch_array($query2)){
                    
                    if(isset($_POST['delete_group' . $group['group_id']])){
                        $group_id=$group['group_id'];
                        $delete_group_query = mysql_query("DELETE from groups WHERE group_id='$group_id'");
                        header("Refresh:0");
                    }

                    $start_indicator++;
                    ?>
                        <a href="groups/<?= $group['group_name'] ?>">
                            <h3 class="group_name"><?=$group['name']?></h3>
                            <p><?= $group['description'] ?></p>
                        </a>
                    <?php
                         if($_SESSION['email']=="admin@gmail.com"){
                             ?>
                        <form method="POST">
                            <input type="submit" name="delete_group<?= $group['group_id'] ?>" value="Delete Group">
                        </form>
                        <?php
                         }
                         ?>
                        <br>
                    <?php
                }

                if($start_indicator==0){
                    echo "<h4>No groups</h4>";
                }
            ?>
        </div>
    </body>
</html>