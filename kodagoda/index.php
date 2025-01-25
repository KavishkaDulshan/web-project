<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Shop</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="stylesindex.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
</head>
<body class="space-grotesk-thin">
    <?php include 'navbar.php'; ?>
    <?php include 'categories_navbar.php'; ?>

    <div class="ml-5">
        <div class="bg">
            <h1>Welcome to Our Flower Shop</h1>
            <h3>Explore our wide variety of fresh flowers and services.</h3>
        </div>
        <div class="container mt-5">
        <div class="row mt-4">
            <div class="col-8 abfont">Welcome to your one-stop destination for stunning floral solutions! Whether you're brightening your home, celebrating life’s special moments, or planning unforgettable events, we deliver fresh, vibrant blooms tailored to your needs. From bespoke designs to large-scale arrangements, we’re here to bring the beauty of nature into every aspect of your life."</div>
            <div class="col-4" mb-4><img src="images/tulip.png" style="width: 150px; " class="img-fluid tulip" alt="Flowers"></div>
        </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4 hwrap">
                <a href="services.php?category=Wedding Decos">
                    <img src="images/wedding.png" class="imgbox himg" alt="Flowers">
                    <div class="hcap">Wedding & Bridal Decorations!</div>
                </a>
            </div>  
            <div class="col-md-4 hwrap">
                <a href="services.php?category=Floral Gifts Delivery">
                    <img src="images/floralgift.png" class="imgbox himg" alt="Flowers">
                    <div class="hcap">Floral Gifts Delivery</div>
                </a>
            </div>  
            <div class="col-md-4 hwrap">
                <a href="services.php?category=Corporate Events & Office Decor">
                    <img src="images/corporate.jpg" class="imgbox himg" alt="Flowers">
                    <div class="hcap">Corporate Events & Office Decorations</div>
                </a>
            </div>  
        </div>
        <div class="row mt-3 mb-5">
            <div class="col-md-4 hwrap">
                <a href="services.php?category=Graduation">
                    <img src="images/graduation.png" class="imgbox himg" alt="Flowers">
                    <div class="hcap">Graduation</div>
                </a>
            </div>  
            <div class="col-md-4 hwrap">
                <a href="services.php?category=Home Decor">
                    <img src="images/home.jpeg" class="imgbox himg" alt="Flowers">
                    <div class="hcap">Home Decorations!</div>
                </a>
            </div>  
            <div class="col-md-4 hwrap">
                <a href="services.php?category=Sympathy Flowers">
                    <img src="images/sympathy_flowers.png" class="imgbox himg" alt="Flowers">
                    <div class="hcap">Sympathy Flowers</div>
                </a>
            </div>  
        </div>
    </div>

    <footer class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>&copy; 2023 Flower Shop. All Rights Reserved.</small>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
