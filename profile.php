<!--This is the profile of the user as he sees it-->

<?php
    session_start();     
    include 'partials/header.php';
   
    //if you entered this if you will see the profile of another user
    if(isset($_GET['id'])) //the id that the user entered..it consists of (firstname.databaseid) 
           include 'php/others.php';
    else
           include 'php/me.php';
     
?>
        
       
      

 