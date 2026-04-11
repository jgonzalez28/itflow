<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$software_id = intval($_POST['software_id']);

// Default
$delete_count = false;

if (!empty($software_id)) {
    $row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM software WHERE software_id = $software_id AND software_client_id = $client_id LIMIT 1"));
    $software_name = $row['software_name'];

    $delete_sql = mysqli_query($mysqli, "DELETE FROM software WHERE software_id = $software_id AND software_client_id = $client_id LIMIT 1");

    if ($delete_sql && !empty($software_name)) {
        $delete_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Software", "Delete", "$software_name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../delete_output.php';
