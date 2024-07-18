<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $dod = $_POST['dod'];
    $content = $_POST['content'];
    $author = $_POST['author'];

    
    $servername = "localhost"; // Replace with your MySQL server name
    $username = "root"; // Replace with your MySQL username (default is 'root' for XAMPP)
    $password = ""; // Replace with your MySQL password (default is empty for XAMPP)
    $dbname = "obituary_platform"; // Replace with your MySQL database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO obituaries (name, date_of_birth, date_of_death, content, author) VALUES ('$name', '$dob', '$dod', '$content', '$author')";

    if ($conn->query($sql) === TRUE) {
        echo "Obituary submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
