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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 16px;
            background-color: #f4f4f4;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
            padding: 16px;
            width: 200px;
            height: 200px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .card .product-name {
            font-size: 18px;
            font-weight: bold;
            margin: 8px 0;
            opacity: 0;

        }
        .card .details {
            color: #555;
            font-size: 14px;
            opacity: 0;
        }
    </style>
</head>
<body>

    <?php foreach ($products as $product): ?>
        <div class="card">
            <img src="<?php echo htmlspecialchars($product['image_path']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
            <div class="product-name"><?php echo htmlspecialchars($product['product_name']); ?></div>
            <div class="details">Color: <?php echo htmlspecialchars($product['color']); ?></div>
            <div class="details">Style: <?php echo htmlspecialchars($product['style']); ?></div>
            <div class="addcart"> <button>add to cart</button></div>


        </div>
    <?php endforeach; ?>
</body>
</html>
