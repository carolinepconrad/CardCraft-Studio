<?php
// Database configuration
$servername = "54.165.204.136";
$serverusername = "group3";
$serverpassword = "qux219jmV754[";
$dbname = "group3";

// Create a connection
$conn = mysqli_connect($servername, $serverusername, $serverpassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch products from the database
$sql = "SELECT product_name, image_path, color, style FROM product_catalog";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo "No products found.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cards</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bigshot+One&family=Inconsolata:wght@200..900&family=Space+Grotesk:wght@300..700&display=swap');
  
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Space Grotesk', sans-serif;
            line-height: 1.6;
            background-color: #ffffff;
            height: 100vh;

          
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 1rem;
            text-align: center;
        }
      
        main {
            grid-area: main;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 2rem;
            margin-left: 250px;
            margin-top: -120px;
        }
        .card {
            position: relative;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
            padding: 10px;
            margin-bottom:15px;
            margin-right:-13px;
            width: 300px;
            height: 300px;
            text-align: center;
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .card .product-name, .card .details, .addcart button {
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .card:hover .product-name, .card:hover .details, .card:hover .addcart button {
            opacity: 1;
        }
        .card .product-name {
            font-size: 18px;
            font-weight: bold;
            margin: 8px 0;
        }
        .card .details {
            color: #555;
            font-size: 14px;
        }
        .addcart button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .addcart button:hover {
            background-color: #0056b3;
        }
        .addcart button:active {
            background-color: #003f7f;
        }
    </style>
</head>
<body>
    <div class="header">
    <?php include '../header.php'; ?>
    </div>
        <?php include 'sidebar.php'; ?>
    
    <main>
        <?php foreach ($products as $product): ?>
            <div class="card">
                <img src="<?php echo htmlspecialchars($product['image_path']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                <div class="product-name"><?php echo htmlspecialchars($product['product_name']); ?></div>
                <div class="addcart"> <button>add to cart</button></div>
            </div>
        <?php endforeach; ?>
    </main>
</body>
</html>
