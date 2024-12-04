<style>
.catalog {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 2rem;
    margin-left: 250px;
    margin-top: -800px;
  }
  .product-card {
    position: relative; /* Needed for the button to be absolutely positioned within the card */
    width: 30%;
    margin: 0.5rem;
    padding: 1rem;
    text-align: center;
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden; /* Ensures the button doesn’t overflow the card's boundaries */
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  .product-card img {
    display: block;
    width: 100%;
    border-radius: 10px;
  }
  
  .product-card button {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
    padding: 0;
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .product-card:hover button {
    opacity: 1;
    background-color: rgba(255, 255, 255, 0.751);
  }
  
  .product-card button img {
    width: 40px;
    height: auto;
  }
  
  .product-card {
    position: relative;
    display: inline-block;
    margin: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 10px;
    overflow: hidden;
  }
  
  .product-card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
  }
  
  .product-card img {
    display: block;
    width: 100%;
    border-radius: 10px;
  }
  
  .product-card button {
    position: absolute;
    bottom: 10px;
    right: 10px;
    background: transparent;
    border: none;
    cursor: pointer;
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  
  .product-card:hover button {
    opacity: 1;
  }
  


</style>
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
    if (count($line) === count($header)) {
        $data[] = array_combine($header, $line); // Combine header with row values
    }
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
    include '../header.php';
    include 'sidebar.php';

    echo "<section class='catalog'>";
    foreach ($output as $row) {
        echo "<div class='product-card'>";
        // Ensure 'image_path' column exists and has a value
        $imagePath = htmlspecialchars($row['image_path'] ?? '/images/catalog/product1.png');
        $style = htmlspecialchars($row['style']);
        $color = htmlspecialchars($row['color']);
        $productName = htmlspecialchars($row['product_name']);
        
        echo "<form action='add_to_cart.php' method='POST'>";
        echo "<input type='hidden' name='product_id' value='$productName'>";
        echo "<input type='hidden' name='image_path' value='$imagePath'>";
        echo "<input type='hidden' name='style' value='$style'>";
        echo "<input type='hidden' name='color' value='$color'>";
        
        echo "<img src='$imagePath' alt='$productName' class='product-image' />";
        echo "<div class='product-details'>";
        echo "<button type='submit' class='add-to-cart-btn'>
                <img src='/images/catalog/add-to-cart.png' alt='Add to cart' />
              </button>";
        echo "</div>";
        echo "</form>"; // Close form
        echo "</div>";
    }
    echo "</section>";
} else {
    // No matching products found
    echo "<h2>No products found for the selected filters.</h2>";
}
?>