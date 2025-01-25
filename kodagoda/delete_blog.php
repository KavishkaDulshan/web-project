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

$id = $_GET['id'];
$sql = "DELETE FROM blog_posts WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Blog post deleted successfully');
            window.location.href = 'admin.php';
          </script>";
} else {
    echo "<script>
            alert('Error: " . $sql . "<br>" . $conn->error . "');
            window.location.href = 'admin.php';
          </script>";
}

$conn->close();
?>