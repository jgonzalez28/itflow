<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$product_id = intval($_POST['product_id']);

// Default
$update_count = false;

// Products require All Clients scope
if (!empty($product_id) && $client_id == 0) {

    $product_row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM products WHERE product_id = '$product_id' LIMIT 1"));

    require_once 'product_model.php';

    $update_sql = mysqli_query($mysqli, "UPDATE products SET product_name = '$name', product_description = '$description', product_price = $price, product_cost = $cost, product_taxable = $taxable, product_type = '$type', product_identifier = '$identifier', product_notes = '$notes' WHERE product_id = $product_id LIMIT 1");

    if ($update_sql) {
        $update_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Product", "Edit", "$name via API ($api_key_name)", 0);
        logAction("API", "Success", "Edited product $name via API ($api_key_name)", 0);
    }
}

// Output
require_once '../update_output.php';
