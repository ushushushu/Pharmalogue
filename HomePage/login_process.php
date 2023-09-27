<?php
    session_start();
    require_once '../HomePage/connection.php';
    
    if(!empty($_SESSION['email'])) {
        $user = $_POST['email'];
        header('Location: #');
    }

    if(isset($_POST['login_button'])) {

        $email = $_POST['email'];
        $pass = $_POST['password'];

            $sql = "SELECT * FROM users WHERE (email =:email AND password=:password)";
            $sth = $conn -> prepare($sql);
            $sth -> bindValue(':email', $email, PDO::PARAM_STR);
            $sth -> bindValue(':password', $pass, PDO::PARAM_STR);
            $sth -> execute();
            $count = $sth->rowCount();
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            
            //if($sth->rowCount() > 0) {
            if ($count == 1 && !empty($row)){
            $_SESSION['login_button']=true;
            $_SESSION ['email']=$email;
            $_SESSION ['password']=$pass;
            $_SESSION['login_button'] =$row['email'];
            echo $row['email'];

                switch ($row['userType']){
                        case "admin": header("location: ../AdminUI/final_adminUI.php"); break;
                        case "clerk": header("location: ../ClerkUI/clerkUI.php"); break;
                }

            } else {
            $message = "Email/Password is wrong";
            }
            
    }
?>
