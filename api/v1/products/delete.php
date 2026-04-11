<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$product_id = intval($_POST['product_id']);

// Default
$delete_count = false;

// Products require All Clients scope
if (!empty($product_id) && $client_id == 0) {
    $row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM products WHERE product_id = $product_id LIMIT 1"));
    $product_name = $row['product_name'];

    $delete_sql = mysqli_query($mysqli, "DELETE FROM products WHERE product_id = $product_id LIMIT 1");

    if ($delete_sql && !empty($product_name)) {
        $delete_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Product", "Delete", "$product_name via API ($api_key_name)", 0);
    }
}

// Output
require_once '../delete_output.php';
