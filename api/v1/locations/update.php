<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$location_id = intval($_POST['location_id']);

// Default
$update_count = false;

if (!empty($location_id)) {

    $location_row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM locations WHERE location_id = '$location_id' AND location_client_id = $client_id LIMIT 1"));

    require_once 'location_model.php';

    $update_sql = mysqli_query($mysqli, "UPDATE locations SET location_name = '$name', location_description = '$description', location_country = '$country', location_address = '$address', location_city = '$city', location_state = '$state', location_zip = '$zip', location_hours = '$hours', location_notes = '$notes', location_primary = $primary WHERE location_id = $location_id AND location_client_id = $client_id LIMIT 1");

    if ($update_sql) {
        $update_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Location", "Edit", "$name via API ($api_key_name)", $client_id);
        logAction("API", "Success", "Edited location $name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../update_output.php';
