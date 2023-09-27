<?php
include("../HomePage/connection.php");
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Login </title>

        <!-- STYLESHEET -->
        <link rel="stylesheet" href="../HomePage/login_stylesheet.css">
                
        <!-- ICONS -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        
        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    </head>
    
    <body>
        <section class = "container forms">
            <div class = "form login">
                <div class="form-content">
                    <header> Login </header>
                    <form action = "../HomePage/login_process.php" method = "POST">
                        <div class="field input-field">
                            <input type="email" name="email" placeholder="Enter your email" class="input" required>
                        </div>

                        <div class="field input-field">
                            <input type="password" name="password" placeholder="Enter your password" class="password" required>
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="field button-field">
                            <button type="submit" name="login_button">Login</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <!-- <span>Don't have an account? <a href="signup_trialver.php">Sign up</a></span> -->
                        <span>Don't have an account? <a href="../HomePage/signup.php">Sign up</a></span>
                    </div>
                </div>

            </div>
        </section>

        <!-- JavaScript -->
        <script src="../HomePage/login_script.js"></script>
    </body>
</html>