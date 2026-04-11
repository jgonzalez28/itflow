<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

$network_row = false; // Creation, not an update
require_once 'network_model.php';

// Default
$insert_id = false;

if (!empty($name)) {

    $insert_sql = mysqli_query($mysqli, "INSERT INTO networks SET network_name = '$name', network_description = '$description', network_address = '$address', network_dns = '$dns', network_gateway = '$gateway', network_vlan = '$vlan', network_notes = '$notes', network_location_id = $location_id, network_client_id = $client_id");

    if ($insert_sql) {
        $insert_id = mysqli_insert_id($mysqli);

        // Logging
        logAction("Network", "Create", "Created network $name via API ($api_key_name)", $client_id, $insert_id);
        logAction("API", "Success", "Created network $name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../create_output.php';
