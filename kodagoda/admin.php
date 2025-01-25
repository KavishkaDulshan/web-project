<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Flower Shop</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <h1>Admin Panel</h1>
        <ul class="nav nav-tabs" id="adminTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="blog-tab" data-toggle="tab" href="#blog" role="tab" aria-controls="blog" aria-selected="true">Blog Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="services-tab" data-toggle="tab" href="#services" role="tab" aria-controls="services" aria-selected="false">Services</a>
            </li>
        </ul>
        <div class="tab-content" id="adminTabContent">
            <div class="tab-pane fade show active" id="blog" role="tabpanel" aria-labelledby="blog-tab">
                <h2 class="mt-4">Manage Blog Posts</h2>
                <form action="upload_blog.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="10" maxlength="2000" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <h3 class="mt-4">Existing Blog Posts</h3>
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

                    $sql = "SELECT * FROM blog_posts ORDER BY created_at DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="col-lg-4 mb-4">';
                            echo '<div class="card h-100">';
                            if ($row['image']) {
                                echo '<img src="' . $row['image'] . '" class="card-img-top" alt="' . $row['title'] . '">';
                            }
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                            echo '<p class="card-text">' . substr($row['content'], 0, 100) . '...</p>';
                            echo '<a href="edit_blog.php?id=' . $row['id'] . '" class="btn btn-warning">Edit</a> ';
                            echo '<a href="delete_blog.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No blog posts found.</p>';
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
            <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                <h2 class="mt-4">Manage Services</h2>
                <form action="upload_service.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Service Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="Wedding Decos">Wedding Decos</option>
                            <option value="Floral Gifts Delivery">Floral Gifts Delivery</option>
                            <option value="All Floral Gifts">All Floral Gifts</option>
                            <option value="All Addons">All Addons</option>
                            <option value="Graduation">Graduation</option>
                            <option value="Corporate Events & Office Decor">Corporate Events & Office Decor</option>
                            <option value="Home Decor">Home Decor</option>
                            <option value="Sympathy Flowers">Sympathy Flowers</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service_images">Images (up to 20)</label>
                        <input type="file" class="form-control-file" id="service_images" name="service_images[]" multiple>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <h3 class="mt-4">Existing Services</h3>
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

                    $sql = "SELECT * FROM services ORDER BY created_at DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="col-lg-4 mb-4">';
                            echo '<div class="card h-100">';
                            $images = explode(',', $row['images']);
                            if (!empty($images[0])) {
                                echo '<img src="' . $images[0] . '" class="card-img-top" alt="' . $row['name'] . '">';
                            }
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                            echo '<p class="card-text">' . $row['description'] . '</p>';
                            echo '<a href="service_detail.php?id=' . $row['id'] . '" class="btn btn-primary">View Details</a> ';
                            echo '<a href="edit_service.php?id=' . $row['id'] . '" class="btn btn-warning">Edit</a> ';
                            echo '<a href="delete_service.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a>';
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
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>