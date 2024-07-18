<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Obituaries</title>
    <meta name="description" content="View obituaries submitted to the platform.">
    <meta name="keywords" content="obituaries, view obituaries, death notices">
    <meta property="og:title" content="View Obituaries">
    <meta property="og:description" content="View obituaries submitted to the platform.">
    <meta property="og:image" content="your-image-url">
    <meta property="og:url" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:type" content="website">
    <link rel="canonical" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .social-share {
            margin-top: 20px;
        }
        .social-share a {
            display: inline-block;
            margin-right: 10px;
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        .social-share a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>View Obituaries</h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "obituary_platform";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, name, date_of_birth, date_of_death, content, author, submission_date FROM obituaries";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Name</th><th>Date of Birth</th><th>Date of Death</th><th>Content</th><th>Author</th><th>Submission Date</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['date_of_birth'] . '</td>';
            echo '<td>' . $row['date_of_death'] . '</td>';
            echo '<td>' . $row['content'] . '</td>';
            echo '<td>' . $row['author'] . '</td>';
            echo '<td>' . $row['submission_date'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';

        // Social sharing buttons
        echo '<div class="social-share">';
        echo '<a href="https://www.facebook.com/sharer/sharer.php?u=' . urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) . '" target="_blank">Share on Facebook</a>';
        echo '<a href="https://twitter.com/intent/tweet?url=' . urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) . '&text=View%20Obituaries" target="_blank">Share on Twitter</a>';
        // Add more social media share buttons as needed
        echo '</div>';
    } else {
        echo "No obituaries found.";
    }

    // Close connection
    $conn->close();
    ?>

</body>
</html>
