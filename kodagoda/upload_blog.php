<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flower_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$content = $_POST['content'];
$image = '';

if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $image = $target_file;
    }
}

$sql = "INSERT INTO blog_posts (title, content, image) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $title, $content, $image);

if ($stmt->execute() === TRUE) {
    echo "<script>
            alert('Blog post created successfully');
            window.location.href = 'admin.php';
          </script>";
} else {
    echo "<script>
            alert('Error: " . $stmt->error . "');
            window.location.href = 'admin.php';
          </script>";
}

$stmt->close();
$conn->close();
?>