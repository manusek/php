<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // Check if form is submitted
    if(isset($_GET['submit'])){
        $email = $_GET['email'];
        $option = $_GET['option'];
        $price = $_GET['price'];
        $comment = $_GET['comment'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ai1_lab4";
    
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully. <br>";

            // Prepare and execute SQL statement
            $stmt = $conn->prepare("INSERT INTO questions (email, offer_type, budget, comment) VALUES (?, ?, ?, ?)");
            $stmt->bindParam(1, $email);
            $stmt->bindParam(2, $option);
            $stmt->bindParam(3, $price);
            $stmt->bindParam(4, $comment);
            $stmt->execute();
            
            echo "New record created successfully. <br>";
            $conn = null;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
      }
    } else {
        echo "Form not submitted. <br>";
    // } if else
    // echo "Method not supported. <br>";
    }
?>
