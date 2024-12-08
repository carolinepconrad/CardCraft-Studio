<?php
session_start();



// Handle the "Remove one quantity from cart" action
if (isset($_POST['remove_from_cart'])) {
    $remove_key = $_POST['remove_key'];

    // Check if the key exists in the session cart
    if (isset($_SESSION['cart'][$remove_key])) {
        // Decrease the quantity of the product
        $_SESSION['cart'][$remove_key]['quantity'] -= 1;

        // If the quantity becomes 0 or less, remove the product from the cart
        if ($_SESSION['cart'][$remove_key]['quantity'] <= 0) {
            unset($_SESSION['cart'][$remove_key]);
        }
    }
}

// Debugging: Display session cart
// echo "<pre>";
// print_r($_SESSION['cart']); // Check what's inside the cart session
// echo "</pre>";
?>

<?php include ('../Employee/employee_header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bigshot+One&family=Inconsolata:wght@200..900&family=Space+Grotesk:wght@300..700&display=swap');

        body {
            font-family: 'Space Grotesk', sans-serif;
            line-height: 1.6;
            text-align: center;
        }
        a {
            text-decoration: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
        }
        .remove-btn {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .remove-btn:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <h1 style="margin-top: 25px">Your Cart</h1>

   
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Color</th>
                    <th>Style</th>
                    <th>Quantity</th> <!-- Added Quantity column -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $key => $product): ?>
                    <tr>
                        <td><img src="<?php echo htmlspecialchars($product['image_path']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>" style="width: 50px; height: auto;"></td>
                        <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                        <td><?php echo htmlspecialchars($product['color']); ?></td>
                        <td><?php echo htmlspecialchars($product['style']); ?></td>
                        <td><?php echo $product['quantity']; ?></td> 
                        <td>
                            <form method="POST">
                                <input type="hidden" name="remove_key" value="<?php echo $key; ?>">
                                <button type="submit" name="remove_from_cart" class="remove-btn">Remove </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <button><a href="/CatalogPage/catalogtry.php">Back to Products</a></button>

</body>
</html>
