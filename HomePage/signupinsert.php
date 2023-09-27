<?php
require_once '../HomePage/connection.php';

if (isset($_POST['insert'])) {
    try {
        // Retrieve user data
        $user_FirstName = $_POST['user_FirstName'];
        $user_MiddleInitial = $_POST['user_MiddleInitial'];
        $user_SuffixName = $_POST['user_SuffixName'];
        $user_LastName = $_POST['user_LastName'];
        $user_Email = $_POST['user_Email'];
        $user_WorkingHours = $_POST['user_WorkingHours'];
        $user_Birthday = $_POST['user_Birthday'];
        $branch_Name = $_POST['branch_Name'];
        $user_Type = $_POST['user_Type'];
        $user_ContactNumber = $_POST['user_ContactNumber'];
        $user_ProfilePicture = $_POST['user_ProfilePicture'];
        $user_Password = $_POST['user_Password'];

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if contact number already exists
        $stmt = $conn->prepare("SELECT COUNT(*) FROM `pharmacy_user` WHERE `user_ContactNumber` = ?");
        $stmt->execute([$user_ContactNumber]);
        $contactNumberCount = $stmt->fetchColumn();

        // Check if password already exists
        $stmt = $conn->prepare("SELECT COUNT(*) FROM `pharmacy_user` WHERE `user_Password` = ?");
        $stmt->execute([$user_Password]);
        $passwordCount = $stmt->fetchColumn();

        // Display error messages for duplicate fields
        if ($contactNumberCount > 0) {
            echo "<script>alert('Contact number already exists. Please choose a different contact number.')</script>";
            echo "<script>window.location='AdminSignUP.php'</script>";
            exit;
        }

        if ($passwordCount > 0) {
            echo "<script>alert('Password already exists. Please choose a different password.')</script>";
            echo "<script>window.location='AdminSignUP.php'</script>";
            exit;
        }

        // Check if the branch exists and retrieve the branch ID
        $stmt = $conn->prepare("SELECT `branch_ID` FROM `pharmacy_branch` WHERE `branch_Name` = ?");
        $stmt->execute([$branch_Name]);
        $branchId = $stmt->fetchColumn();

        // If the branch does not exist, insert it into `pharmacy_branch` table
        if (!$branchId) {
            $stmt = $conn->prepare("INSERT INTO `pharmacy_branch` (`branch_Name`) VALUES (?)");
            $stmt->execute([$branch_Name]);
            $branchId = $conn->lastInsertId();
        }

        // Insert data into `pharmacy_user` table with the corresponding branch ID
        $stmt = $conn->prepare("INSERT INTO `pharmacy_user` (`user_FirstName`, `user_MiddleInitial`, `user_SuffixName`, `user_LastName`, `user_Email`, `user_WorkingHours`,
            `user_Birthday`, `user_Type`, `user_ContactNumber`, `user_ProfilePicture`, `user_Password`, `branch_ID`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$user_FirstName, $user_MiddleInitial, $user_SuffixName, $user_LastName, $user_Email, $user_WorkingHours, $user_Birthday, $user_Type, $user_ContactNumber, $user_ProfilePicture, $user_Password, $branchId]);

            // echo "<script>alert('Successfully inserted data!')</script>";
            echo "<script>window.location='signup_success.php'</script>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $conn = null;

    }
?>