<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$software_id = intval($_POST['software_id']);

// Default
$update_count = false;

if (!empty($software_id)) {

    $software_row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM software WHERE software_id = '$software_id' AND software_client_id = $client_id LIMIT 1"));

    require_once 'software_model.php';

    $update_sql = mysqli_query($mysqli, "UPDATE software SET software_name = '$name', software_description = '$description', software_key = '$key', software_seats = $seats, software_version = '$version', software_expire = '$expire', software_notes = '$notes', software_type = $type, software_vendor_id = $vendor_id WHERE software_id = $software_id AND software_client_id = $client_id LIMIT 1");

    if ($update_sql) {
        $update_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Software", "Edit", "$name via API ($api_key_name)", $client_id);
        logAction("API", "Success", "Edited software $name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../update_output.php';
