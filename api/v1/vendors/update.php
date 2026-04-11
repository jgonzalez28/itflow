<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$vendor_id = intval($_POST['vendor_id']);

// Default
$update_count = false;

if (!empty($vendor_id)) {

    $vendor_row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM vendors WHERE vendor_id = '$vendor_id' AND vendor_client_id = $client_id LIMIT 1"));

    require_once 'vendor_model.php';

    $update_sql = mysqli_query($mysqli, "UPDATE vendors SET vendor_name = '$name', vendor_description = '$description', vendor_website = '$website', vendor_phone = '$phone', vendor_notes = '$notes' WHERE vendor_id = $vendor_id AND vendor_client_id = $client_id LIMIT 1");

    if ($update_sql) {
        $update_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Vendor", "Edit", "$name via API ($api_key_name)", $client_id);
        logAction("API", "Success", "Edited vendor $name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../update_output.php';
