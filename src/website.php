<?php
        // Database configuration
        $servername = "localhost";
        $username = "web_user"; // MySQL username
        $password = "StrongPassword@123"; // MySQL password
        $dbname = "web_db"; // database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create a simple table if it doesn't exist
        $sql = "CREATE TABLE IF NOT EXISTS visits (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            ip_address VARCHAR(45) NOT NULL,
            visit_time DATETIME DEFAULT CURRENT_TIMESTAMP
        )";

        if ($conn->query($sql) === TRUE) {
            // Insert visitor's IP address into the table
            $visitor_ip = $_SERVER['REMOTE_ADDR'];
            $insert_sql = "INSERT INTO visits (ip_address) VALUES ('$visitor_ip')";
            $conn->query($insert_sql);
        }

        // Get the current time
        $current_time = date('Y-m-d H:i:s');

        // Display the message
        echo "<h1>Hello, World!</h1>";
        echo "<p>Your IP address is: " . $visitor_ip . "</p>";
        echo "<p>The current time is: " . $current_time . "</p>";

        // Close connection
        $conn->close();
        ?>