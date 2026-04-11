<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$network_id = intval($_POST['network_id']);

// Default
$delete_count = false;

if (!empty($network_id)) {
    $row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM networks WHERE network_id = $network_id AND network_client_id = $client_id LIMIT 1"));
    $network_name = $row['network_name'];

    $delete_sql = mysqli_query($mysqli, "DELETE FROM networks WHERE network_id = $network_id AND network_client_id = $client_id LIMIT 1");

    if ($delete_sql && !empty($network_name)) {
        $delete_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Network", "Delete", "$network_name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../delete_output.php';
