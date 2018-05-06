<?php
require 'php/classes/graph.php';


$users_graph = array();


$query = $current_user->getPeople();


//Filling the users_graph array
while($row=mysql_fetch_assoc($query)){

    $str=substr($row['friend_array'], 1, strlen($row['friend_array'])-2);

    $users_graph[$row['id']] = explode(",",$str);

};

$g = new Graph($users_graph);

$start_indicator=0;

?>
        <div class="suggested_friends">
            <?php

                $query = $current_user->getPeople();
                
                
                while($row=mysql_fetch_assoc($query)){
                    
                    $output = $g->breadthFirstSearch($user_id, $row['id']);
                    if($output==2)
                    {
                        if($start_indicator==0){
                            echo "<h3>People you may know:</h3>";
                        }
                        $start_indicator++;

                        $suggested_user=new User($row['id']);
                        $suggested_user_info=$suggested_user->getAll();
                        ?>

                        <a href="<?= $suggested_user_info['profile_name']?>">
                            <img src="<?= $suggested_user_info['profile_image'] ?>" style="width:40px;height:40px">
                            <?= $suggested_user_info['first_name'] . " " . $suggested_user_info['last_name'] ?>
                        </a>

                        <br>
                        <?php
                    }
                }

            ?>
        </div>

<!--
    Example of the array while filled:

    $graph = array(
    'A' => array('B', 'F'),
    'B' => array('A', 'D', 'E'),
    'C' => array('F'),
    'D' => array('B', 'E'),
    'E' => array('B', 'D', 'F'),
    'F' => array('A', 'E', 'C'),
    );

-->