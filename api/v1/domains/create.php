<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse Info
$domain_row = false; // Creation, not an update
require_once 'domain_model.php';

// Default
$insert_id = false;

if (!empty($name)) {

    $insert_sql = mysqli_query($mysqli, "INSERT INTO domains SET domain_name = '$name', domain_description = '$description', domain_registrar = '$registrar', domain_expire = '$expire', domain_notes = '$notes', domain_vendor_id = $vendor_id, domain_client_id = $client_id");

    if ($insert_sql) {
        $insert_id = mysqli_insert_id($mysqli);

        // Logging
        logAction("Domain", "Create", "Created domain $name via API ($api_key_name)", $client_id, $insert_id);
        logAction("API", "Success", "Created domain $name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../create_output.php';
