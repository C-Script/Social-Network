<?php
    session_start();     
    include 'partials/header.php';
    
?>
<html>
    <head>
        <title>Group</title>
        <link rel="stylesheet" type="text/css" href="styles/group.css">
        <link rel="stylesheet" type="text/css" href="../styles/group.css">        

    </head>
    <body>
        <?php
            require 'php/group_handling.php';
        ?>

        Group


    </body>
</html>