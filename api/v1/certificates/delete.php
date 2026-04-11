<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$certificate_id = intval($_POST['certificate_id']);

// Default
$delete_count = false;

if (!empty($certificate_id)) {
    $row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM certificates WHERE certificate_id = $certificate_id AND certificate_client_id = $client_id LIMIT 1"));
    $certificate_name = $row['certificate_name'];

    $delete_sql = mysqli_query($mysqli, "DELETE FROM certificates WHERE certificate_id = $certificate_id AND certificate_client_id = $client_id LIMIT 1");

    if ($delete_sql && !empty($certificate_name)) {
        $delete_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Certificate", "Delete", "$certificate_name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../delete_output.php';
