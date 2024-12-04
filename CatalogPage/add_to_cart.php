<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'] ?? null;

    if ($product_id) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][] = $product_id;

        // Redirect back to the catalog 
        header('Location: catalog.php'); 
        exit;
    } else {
        echo "Error: Product ID is missing!";
    }
}
?>
