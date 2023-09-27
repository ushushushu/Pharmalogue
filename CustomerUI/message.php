<?php
    require "../CustomerUI/chatbot_connection.php";

    try {

        // getting user message through ajax
        $getMesg = $_POST['text'];

        // checking user query to database query
        $check_data = "SELECT replies FROM chatbot WHERE queries LIKE :getMesg";
        $stmt = $conn->prepare($check_data);
        $stmt->bindValue(':getMesg', '%' . $getMesg . '%');
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // fetching reply from the database according to the user query
            $fetch_data = $stmt->fetch(PDO::FETCH_ASSOC);
            // storing reply to a variable which we'll send to ajax
            $reply = $fetch_data['replies'];
            echo $reply;
            
        } else {
            echo "Hello, thank you for expressing interest in using our PharmaKonsulta!<br><br>
            Our consultation sessions are available from 8:00 AM to 6:30 PM PHT.<br><br>
            We will get back to you soon! Stay healthy!";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>