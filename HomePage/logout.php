<?php
    session_start();
    if(empty($_SESSION['email'])):
        // unset($_SESSION['email']);
        header('Location: index.php');
    endif;

    include('../HomePage/connection.php');
    session_destroy();

?>