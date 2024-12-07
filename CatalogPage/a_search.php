<?php
session_start();
// Include the filter form
include ('../header.php');
?>

<!-- Display products -->
<main>
    <div class="product-container">
    <?php
    // Database connection and product fetching (same as before)
    $servername = "54.165.204.136";
    $serverusername = "group3";
    $serverpassword = "qux219jmV754[";
    $dbname = "group3";
    $conn = mysqli_connect($servername, $serverusername, $serverpassword, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the selected filters (if any)
    $style = isset($_GET['style']) ? $_GET['style'] : '';
    $color = isset($_GET['color']) ? $_GET['color'] : '';

    // Filter query
    $sql = "SELECT id, product_name, image_path, color, style FROM product_catalog WHERE 1";

    if (!empty($style)) {
        $sql .= " AND style LIKE ?";
    }
    if (!empty($color)) {
        $sql .= " AND color LIKE ?";
    }

    $stmt = $conn->prepare($sql);

    $params = [];
    if (!empty($style)) $params[] = "%$style%";
    if (!empty($color)) $params[] = "%$color%";

    if (count($params) > 0) {
        $stmt->bind_param(str_repeat('s', count($params)), ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // Handle the Add to Cart functionality
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];

        // Fetch product details from the database
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

    // Display the products
    foreach ($products as $product) {
        echo "<div class='card'>";
        echo "<img src='" . htmlspecialchars($product['image_path']) . "' alt='" . htmlspecialchars($product['product_name']) . "' class='product-image'>";
        echo "<div class='product-name'>" . htmlspecialchars($product['product_name']) . "</div>";
        echo "<div class='details'>Color: " . htmlspecialchars($product['color']) . "<br>Style: " . htmlspecialchars($product['style']) . "</div>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='product_id' value='" . $product['id'] . "'>";
        echo "<button type='submit' name='add_to_cart' class='addcart'>Add to Cart</button>";
        echo "</form>";
        echo "</div>";
    }

    $conn->close();
    ?>
    </div>
</main>

<style>
/* General layout */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}

.product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

/* Card styling */
.card {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 250px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-bottom: 20px;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

/* Product Image */
.product-image {
    width: 100%;
    height: auto;
    border-bottom: 1px solid #ddd;
}

/* Product name */
.product-name {
    font-size: 18px;
    font-weight: bold;
    margin: 10px 0;
    color: #333;
}

/* Product details */
.details {
    font-size: 14px;
    color: #777;
    margin-bottom: 15px;
}

/* Add to Cart Button */
.addcart {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.addcart:hover {
    background-color: #0056b3;
}

.addcart:active {
    background-color: #003f7f;
}

.addcart:focus {
    outline: none;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .product-container {
        justify-content: center;
    }

    .card {
        width: 100%;
        max-width: 300px;
    }
}
</style>
