<?php
$host = 'localhost'; // Database host
$dbname = 'groupseven_db'; // Database name
$username = 'root'; // Database username (default is root for local development)
$password = ''; // Database password (default is empty for local development)

try {
    // Create a new PDO instance for database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Handle the comment submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];
    $postId = $_POST['post_id'];

    if (!empty($comment)) {
        // Insert the comment into the database
        $stmt = $pdo->prepare("INSERT INTO comments (post_id, comment) VALUES (?, ?)");
        $stmt->execute([$postId, $comment]);
    }
}

// Retrieve all comments for the given post ID
$postId = isset($_GET['post_id']) ? $_GET['post_id'] : 1; // Default to post_id = 1 if none specified
$stmt = $pdo->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC");
$stmt->execute([$postId]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
