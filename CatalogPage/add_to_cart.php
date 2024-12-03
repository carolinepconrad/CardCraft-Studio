<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'] ?? null;

    if ($product_id) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][] = $product_id;

        // Redirect back to the catalog or display success message
        header('Location: catalog.php'); // Replace with your catalog page URL
        exit;
    } else {
        echo "Error: Product ID is missing!";
    }
}
?>



