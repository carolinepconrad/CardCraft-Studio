<?php
session_start();

// Check if the cart is empty
$cart = $_SESSION['cart'] ?? [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cartstyle.css"> <!-- Optional for styling -->
</head>
<body>
    <?php include '../header.php'; ?>
    <h1>Your Shopping Cart</h1>

    <?php if (empty($cart)): ?>
        <p>Your cart is empty. <a href="catalog.php">Continue shopping</a>.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Count occurrences of each product ID
                $product_counts = array_count_values($cart);

                // Example: Map product IDs to product names
                $product_names = [
                    1 => 'Product 1',
                    2 => 'Product 2',
                    3 => 'Product 3',
                    // Add more products here
                ];

                foreach ($product_counts as $product_id => $quantity): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product_id); ?></td>
                        <td><?php echo htmlspecialchars($product_names[$product_id] ?? 'Unknown Product'); ?></td>
                        <td><?php echo htmlspecialchars($quantity); ?></td>
                        <td>
                            <form action="remove_from_cart.php" method="POST" style="display:inline;">
                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p><a href="checkout.php">Proceed to Checkout</a></p>
    <?php endif; ?>

    <?php include '../footer.php'; ?>
</body>
</html>
