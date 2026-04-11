<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$network_id = intval($_POST['network_id']);

// Default
$update_count = false;

if (!empty($network_id)) {

    $network_row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM networks WHERE network_id = '$network_id' AND network_client_id = $client_id LIMIT 1"));

    require_once 'network_model.php';

    $update_sql = mysqli_query($mysqli, "UPDATE networks SET network_name = '$name', network_description = '$description', network_address = '$address', network_dns = '$dns', network_gateway = '$gateway', network_vlan = '$vlan', network_notes = '$notes', network_location_id = $location_id WHERE network_id = $network_id AND network_client_id = $client_id LIMIT 1");

    if ($update_sql) {
        $update_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Network", "Edit", "$name via API ($api_key_name)", $client_id);
        logAction("API", "Success", "Edited network $name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../update_output.php';
