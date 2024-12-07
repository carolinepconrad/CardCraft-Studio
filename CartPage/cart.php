<?php
session_start();

// Debugging: Display session cart
// echo "<pre>";
// print_r($_SESSION['cart']); // Check what's inside the cart session
// echo "</pre>";
// ?>
<?php include '../header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
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
    <h1>Your Cart</h1>

    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Color</th>
                    <th>Style</th>
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
                        <td>
                            <form method="POST">
                                <input type="hidden" name="remove_key" value="<?php echo $key; ?>">
                                <button type="submit" name="remove_from_cart" class="remove-btn">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>

    <a href="/CatalogPage/catalogtry.php">Back to Products</a>

    <?php
    // Handle item removal
    if (isset($_POST['remove_from_cart'])) {
        $remove_key = $_POST['remove_key'];
        unset($_SESSION['cart'][$remove_key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array
        header("Location: cart.php"); // Refresh to reflect changes
        exit();
    }
    ?>
</body>
</html>
