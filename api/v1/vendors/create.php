<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

$vendor_row = false; // Creation, not an update
require_once 'vendor_model.php';

// Default
$insert_id = false;

if (!empty($name)) {

    $insert_sql = mysqli_query($mysqli, "INSERT INTO vendors SET vendor_name = '$name', vendor_description = '$description', vendor_website = '$website', vendor_phone = '$phone', vendor_notes = '$notes', vendor_client_id = $client_id");

    if ($insert_sql) {
        $insert_id = mysqli_insert_id($mysqli);

        // Logging
        logAction("Vendor", "Create", "Created vendor $name via API ($api_key_name)", $client_id, $insert_id);
        logAction("API", "Success", "Created vendor $name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../create_output.php';
