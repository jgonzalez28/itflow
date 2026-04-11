<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$delete_client_id = intval($_POST['client_id']);

// Default
$delete_count = false;

// Require All Clients scope to delete clients
if (!empty($delete_client_id) && $client_id == 0) {
    $row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM clients WHERE client_id = $delete_client_id LIMIT 1"));
    $client_name = $row['client_name'];

    $delete_sql = mysqli_query($mysqli, "DELETE FROM clients WHERE client_id = $delete_client_id LIMIT 1");

    if ($delete_sql && !empty($client_name)) {
        $delete_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Client", "Delete", "$client_name via API ($api_key_name)", $delete_client_id);
    }
}

// Output
require_once '../delete_output.php';
