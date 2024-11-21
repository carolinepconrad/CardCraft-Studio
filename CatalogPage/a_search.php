<?php
// Open the CSV file
$csvfile = fopen("product_catalog.csv", "r");

if ($csvfile === false) {
    echo "<h2>Error opening the product catalog file!</h2>";
    exit;
}

// Read the header row and initialize an empty array for the data
$header = fgetcsv($csvfile); // Save header for later use
$data = []; // Array to store rows as associative arrays

// Loop through each line of the file
while (($line = fgetcsv($csvfile)) !== false) {
    $data[] = array_combine($header, $line); // Combine header with row values
}

// Close the CSV file after reading
fclose($csvfile);

// Get the selected filter options from the dropdown
$style = isset($_GET['style']) ? htmlspecialchars($_GET['style']) : '';
$color = isset($_GET['color']) ? htmlspecialchars($_GET['color']) : '';

// Filter the data based on the selected criteria
$output = array_filter($data, function ($row) use ($style, $color) {
    $styleMatch = empty($style) || stripos($row['style'], $style) !== false;
    $colorMatch = empty($color) || stripos($row['color'], $color) !== false;
    return $styleMatch && $colorMatch;
});

// Display the filtered products dynamically as cards
if (!empty($output)) {
    echo "<section class='catalog'>";
    foreach ($output as $row) {
        echo "<div class='product-card'>";
        // Ensure 'image_path' column exists and has a value
        $imagePath = htmlspecialchars($row['image_path'] ?? '/images/catalog/default.png');
        $style = htmlspecialchars($row['style']);
        $color = htmlspecialchars($row['color']);

        echo "<img src='$imagePath' alt='$style'>";
        echo "<p>Style: $style</p>";
        echo "<p>Color: $color</p>";
        echo "<button><img src='/images/catalog/add-to-cart.png' alt='Add to cart'></button>";
        echo "</div>";
    }
    echo "</section>";
} else {
    // No matching products found
    echo "<h2>No products found for the selected filters.</h2>";
}
?>
