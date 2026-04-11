<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

$software_row = false; // Creation, not an update
require_once 'software_model.php';

// Default
$insert_id = false;

if (!empty($name)) {

    $insert_sql = mysqli_query($mysqli, "INSERT INTO software SET software_name = '$name', software_description = '$description', software_key = '$key', software_seats = $seats, software_version = '$version', software_expire = '$expire', software_notes = '$notes', software_type = $type, software_vendor_id = $vendor_id, software_client_id = $client_id");

    if ($insert_sql) {
        $insert_id = mysqli_insert_id($mysqli);

        // Logging
        logAction("Software", "Create", "Created software $name via API ($api_key_name)", $client_id, $insert_id);
        logAction("API", "Success", "Created software $name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../create_output.php';
