<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$vendor_id = intval($_POST['vendor_id']);

// Default
$delete_count = false;

if (!empty($vendor_id)) {
    $row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM vendors WHERE vendor_id = $vendor_id AND vendor_client_id = $client_id LIMIT 1"));
    $vendor_name = $row['vendor_name'];

    $delete_sql = mysqli_query($mysqli, "DELETE FROM vendors WHERE vendor_id = $vendor_id AND vendor_client_id = $client_id LIMIT 1");

    if ($delete_sql && !empty($vendor_name)) {
        $delete_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Vendor", "Delete", "$vendor_name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../delete_output.php';
