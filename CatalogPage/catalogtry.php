<?php
session_start();
?>
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
$sql = "SELECT id, product_name, image_path, color, style FROM product_catalog";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo "No products found.";
}
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];

    // Fetch the product details from the database
    $sql = "SELECT id, product_name, image_path, color, style FROM product_catalog WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        // Initialize cart if not set
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if product already exists in cart
        $product_exists = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $product_id) {
                $item['quantity'] += 1; // Increment quantity if product already in cart
                $product_exists = true;
                break;
            }
        }

        // If product doesn't exist, add it to the cart with quantity 1
        if (!$product_exists) {
            $product['quantity'] = 1; // Set initial quantity to 1
            $_SESSION['cart'][] = $product;
        }
    }
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
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Responsive grid */
            gap: 15px;
            padding: 20px;
            margin-top: -150px;
            justify-items: center;
            margin-left: 350px;
        }
        .card {
            position: relative;
      border: 1px solid #ddd;
      border-radius: 8px;
      background: #fff;
      padding: 10px;
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
        
        
    </style>
</head>
<body>
    <div class="header">
        <?php include '../header.php'; ?>
    </div>
    <?php include 'sidebar.php'; ?>
    
    <main>
        <div class="product-container">
            <?php foreach ($products as $product): ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($product['image_path']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                    <div class="product-name"><?php echo htmlspecialchars($product['product_name']); ?></div>
                    <!-- <div class="details">
                        <span>Color: <?php echo htmlspecialchars($product['color']); ?></span><br>
                        <span>Style: <?php echo htmlspecialchars($product['style']); ?></span>
                    </div> -->

                    <!-- Add to Cart Form -->
                    <form method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <button type="submit" name="add_to_cart" class="addcart">Add to Cart</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>
