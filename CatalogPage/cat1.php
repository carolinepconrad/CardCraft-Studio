<?php
$servername = "localhost";
$username = "group3";
$password = "qux219jmV754[";
$dbname = "group3";

$db = new mysqli($servername, $username, $password, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
session_start();

// Include necessary files
// include '../header.php'; 
// include 'sidebar.php';


// // Get the search/filter parameters (if any)
// $style = isset($_GET['style']) ? htmlspecialchars($_GET['style']) : '';
// $color = isset($_GET['color']) ? htmlspecialchars($_GET['color']) : '';

// // Query to fetch products based on filter
// $query = "SELECT * FROM products WHERE style LIKE ? AND color LIKE ?";
// $stmt = $db->prepare($query);
// $stmt->bind_param("ss", "%$style%", "%$color%"); // Search for the style and color
// $stmt->execute();
// $result = $stmt->get_result();

// // Display the catalog if products are found
// if ($result->num_rows > 0):
// ?>

// <section class="catalog">
//   <?php while ($row = $result->fetch_assoc()): ?>
//   <div class="product-card">
//     <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="<?php echo htmlspecialchars($row['product_name']); ?>" class="product-image">
//     <form action="add_to_cart.php" method="POST">
//       <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
//       <button type="submit" class="add-to-cart-btn">
//         <img src="/images/catalog/add-to-cart.png" alt="Add to Cart">
//       </button>
//     </form>
//   </div>
//   <?php endwhile; ?>
// </section>

// <?php
// else:
//     echo "<h2>No products found for the selected filters.</h2>";
// endif;

// // Close database connection
// $stmt->close();
// include '../footer.php';
?>
