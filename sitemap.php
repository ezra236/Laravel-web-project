<?php
// Database connection details
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

// Query to fetch obituary URLs
$sql = "SELECT id, submission_date FROM obituaries";
$result = $conn->query($sql);

// Initialize XML output
header("Content-Type: application/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php
    // Loop through results and output each URL
    while ($row = $result->fetch_assoc()) {
        // Example URL format, adjust based on your actual structure
        $url = 'http://example.com/obituaries.php?id=' . $row['id'];
        $date = date('Y-m-d', strtotime($row['submission_date']));
    ?>
    <url>
        <loc><?php echo htmlspecialchars($url); ?></loc>
        <lastmod><?php echo $date; ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <?php } ?>
</urlset>

<?php
// Close connection
$conn->close();
?>
