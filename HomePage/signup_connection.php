<?php

require_once '../HomePage/connection.php';

if (isset($_POST['insert'])) {
    try {

        // Retrieve user data
        $firstName = $_POST['firstName'];
        $middleInitial = $_POST['middleInitial'];
        $surname = $_POST['surname'];
        $nameSuffix = $_POST['nameSuffix'];
        $contactNumber = $_POST['contactNumber'];
        $birthDate = $_POST['birthDate'];
        $email = $_POST['email'];
        $branchLocation = $_POST['branchLocation'];
        $workingHours = $_POST['workingHours'];
        $userType = $_POST['userType'];
        $password = $_POST['password'];

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if contact number already exists
        $sql1 = "SELECT COUNT(*) FROM users WHERE contactNumber = ?";
        $stmt = $conn->prepare($sql1);
        $stmt->execute([$contactNumber]);
        $contactNumberCount = $stmt->fetchColumn();

        // Check if password already exists
        // $sql2 = "SELECT COUNT(*) FROM users WHERE password = ?";
        // $stmt = $conn->prepare($sql2);
        // $stmt->execute([$password]);
        // $passwordCount = $stmt->fetchColumn();

        // Display error messages for duplicate fields
        if ($contactNumberCount > 0) {
            echo "<script>
                    alert('Contact number already exists. Please choose a different contact number.')
                  </script>";
            echo "<script>
                    window.location='../HomePage/signup.php'
                  </script>";
            exit;
        }

        // Check if the branch exists and retrieve the branch ID
        $sql3 = "SELECT branch_ID FROM pharmacy_branch WHERE branch_Name = ?";
        $stmt = $conn->prepare($sql3);
        $stmt->execute([$branchLocation]);
        $branchID = $stmt->fetchColumn();

        // If the branch does not exist, insert it into `pharmacy_branch` table
        if (!$branchID) {
            $sql4 = "INSERT INTO pharmacy_branch (branch_Name) VALUES (?)";
            $stmt = $conn->prepare($sql4);
            $stmt->execute([$branchLocation]);
            $branchID = $conn->lastInsertId();
        }

        // Insert data into `pharmacy_user` table with the corresponding branch ID
        $sql5 = "INSERT INTO users (branch_ID, firstName, middleInitial, surname, nameSuffix, contactNumber, birthDate, 
                email, workingHours, userType, password) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql5);
        $stmt->execute([$branchID, $firstName, $middleInitial, $surname, $nameSuffix, $contactNumber, $birthDate, 
        $email, $workingHours, $userType, $password]);

            // Successfully inserted data
            echo "<script>
                    window.location='../HomePage/signup_success.php'
                  </script>";

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $conn = null;

    }
?>