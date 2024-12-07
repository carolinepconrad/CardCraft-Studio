<?php
session_start();
// Include the filter form
include ('../header.php');
include('sidebar.php');
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
  @import url('https://fonts.googleapis.com/css2?family=Bigshot+One&family=Inconsolata:wght@200..900&family=Space+Grotesk:wght@300..700&display=swap');
  
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
      margin-left: 350px;  }
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
