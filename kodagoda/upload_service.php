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

$name = $_POST['name'];
$description = $_POST['description'];
$category = $_POST['category'];
$images = [];

if (isset($_FILES['service_images'])) {
    $total_files = count($_FILES['service_images']['name']);
    for ($i = 0; $i < $total_files; $i++) {
        if ($_FILES['service_images']['error'][$i] == 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES['service_images']['name'][$i]);
            if (move_uploaded_file($_FILES['service_images']['tmp_name'][$i], $target_file)) {
                $images[] = $target_file;
            }
        }
    }
}

$images_str = implode(',', $images);

$sql = "INSERT INTO services (name, description, category, images) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $description, $category, $images_str);

if ($stmt->execute() === TRUE) {
    echo "<script>
            alert('Service created successfully');
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
