<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Flower Shop</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

</head>
<body class="aboutbg space-grotesk-thin">
    <?php include 'navbar.php'; ?>
    <?php include 'categories_navbar.php'; ?>

    <div class="container-flex">
        <div class="container mt-5">
            <h1>Our Services</h1>
            <div class="row">
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

                $category = isset($_GET['category']) ? $_GET['category'] : '';
                $sql = "SELECT * FROM services";
                if ($category) {
                    $sql .= " WHERE category = '$category'";
                }
                $sql .= " ORDER BY created_at DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="col-lg-4 mb-4">';
                        echo '<div class="card h-100">';
                        $images = explode(',', $row['images']);
                        if (!empty($images[0])) {
                            echo '<img src="' . $images[0] . '" class="card-img-top" alt="' . $row['name'] . '">';
                        }
                        echo '<div class="card-body cardcolor">';
                        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                        echo '<a href="service_detail.php?id=' . $row['id'] . '" class="btn btn-outline-info">Browse</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No services found.</p>';
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>