<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$domain_id = intval($_POST['domain_id']);

// Default
$delete_count = false;

if (!empty($domain_id)) {
    $row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM domains WHERE domain_id = $domain_id AND domain_client_id = $client_id LIMIT 1"));
    $domain_name = $row['domain_name'];

    $delete_sql = mysqli_query($mysqli, "DELETE FROM domains WHERE domain_id = $domain_id AND domain_client_id = $client_id LIMIT 1");

    if ($delete_sql && !empty($domain_name)) {
        $delete_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Domain", "Delete", "$domain_name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../delete_output.php';
