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
$name = $_POST['name'];
$description = $_POST['description'];
$image = '';

if (isset($_FILES['service_image']) && $_FILES['service_image']['error'] == 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['service_image']['name']);
    if (move_uploaded_file($_FILES['service_image']['tmp_name'], $target_file)) {
        $image = $target_file;
    }
}

if ($image) {
    $sql = "UPDATE services SET name='$name', description='$description', image='$image' WHERE id=$id";
} else {
    $sql = "UPDATE services SET name='$name', description='$description' WHERE id=$id";
}

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Service updated successfully');
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