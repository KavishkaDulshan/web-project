<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Detail - Flower Shop</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

</head>
<body class="space-grotesk-thin bgflower">
    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
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
        $sql = "SELECT * FROM services WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<h1>' . $row['name'] . '</h1>';
            $images = explode(',', $row['images']);
            if (!empty($images[0])) {
                echo '<img src="' . $images[0] . '" class="img-fluid mb-4" alt="' . $row['name'] . '">';
            }
            echo '<p>' . $row['description'] . '</p>';
            echo '<div class="row">';
            foreach ($images as $image) {
                if (!empty($image)) {
                    echo '<div class="col-lg-4 mb-4">';
                    echo '<img src="' . $image . '" class="img-fluid" alt="' . $row['name'] . '">';
                    echo '</div>';
                }
            }
            echo '</div>';
        } else {
            echo '<p>Service not found.</p>';
        }

        $conn->close();
        ?>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>