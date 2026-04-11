<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$certificate_id = intval($_POST['certificate_id']);

// Default
$update_count = false;

if (!empty($certificate_id)) {

    $certificate_row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM certificates WHERE certificate_id = '$certificate_id' AND certificate_client_id = $client_id LIMIT 1"));

    // Variable assignment from POST - assigning the current database value if a value is not provided
    require_once 'certificate_model.php';

    $update_sql = mysqli_query($mysqli, "UPDATE certificates SET certificate_name = '$name', certificate_description = '$description', certificate_domain = '$domain', certificate_issued_by = '$issued_by', certificate_expire = '$expire', certificate_public_key = '$public_key', certificate_notes = '$notes', certificate_domain_id = $domain_id WHERE certificate_id = $certificate_id AND certificate_client_id = $client_id LIMIT 1");

    if ($update_sql) {
        $update_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Certificate", "Edit", "$name via API ($api_key_name)", $client_id);
        logAction("API", "Success", "Edited certificate $name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../update_output.php';
