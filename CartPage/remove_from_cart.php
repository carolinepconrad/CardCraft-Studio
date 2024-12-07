<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'] ?? null;

    if ($product_id && isset($_SESSION['cart'])) {
        // Find the index of the product in the cart and remove it
        $index = array_search($product_id, $_SESSION['cart']);
        if ($index !== false) {
            unset($_SESSION['cart'][$index]);
            // Re-index the array to maintain numeric keys
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}

// Redirect back to the cart
header('Location: cart.php');
exit;
?>

