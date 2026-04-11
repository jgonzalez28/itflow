<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Products require All Clients scope
$insert_id = false;

if ($client_id == 0) {

    $product_row = false; // Creation, not an update
    require_once 'product_model.php';

    if (!empty($name)) {

        $insert_sql = mysqli_query($mysqli, "INSERT INTO products SET product_name = '$name', product_description = '$description', product_price = $price, product_cost = $cost, product_taxable = $taxable, product_type = '$type', product_identifier = '$identifier', product_notes = '$notes'");

        if ($insert_sql) {
            $insert_id = mysqli_insert_id($mysqli);

            // Logging
            logAction("Product", "Create", "Created product $name via API ($api_key_name)", 0, $insert_id);
            logAction("API", "Success", "Created product $name via API ($api_key_name)", 0);
        }
    }
}

// Output
require_once '../create_output.php';
