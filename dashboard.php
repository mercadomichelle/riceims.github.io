<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="images/logo.png">
    </head>

    <body>

    <?php 
        $role=$_SESSION['user_role'];

        if($role=='staff') {
    
            include('includes/staff-menu.php');
					
        }
    
        if($role=='admin') {

            include('includes/admin-menu.php');
        } 
    ?>
					
    </body>
</html>