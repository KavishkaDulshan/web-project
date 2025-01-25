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

$id = $_POST['id'];
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

if ($image) {
    $sql = "UPDATE blog_posts SET title='$title', content='$content', image='$image' WHERE id=$id";
} else {
    $sql = "UPDATE blog_posts SET title='$title', content='$content' WHERE id=$id";
}

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Blog post updated successfully');
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