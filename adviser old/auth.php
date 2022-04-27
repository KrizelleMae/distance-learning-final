<?php

require '../includes/db_connection.php';

session_start();

if(isset($_SESSION['role']))
{
    if($_SESSION['role'] != 'adviser')
    {
        header('location: ../adviser/');
    }
}
else{
    header('location: ../');
} 


?>