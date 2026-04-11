<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$domain_id = intval($_POST['domain_id']);

// Default
$update_count = false;

if (!empty($domain_id)) {

    $domain_row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM domains WHERE domain_id = '$domain_id' AND domain_client_id = $client_id LIMIT 1"));

    require_once 'domain_model.php';

    $update_sql = mysqli_query($mysqli, "UPDATE domains SET domain_name = '$name', domain_description = '$description', domain_registrar = '$registrar', domain_expire = '$expire', domain_notes = '$notes', domain_vendor_id = $vendor_id WHERE domain_id = $domain_id AND domain_client_id = $client_id LIMIT 1");

    if ($update_sql) {
        $update_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Domain", "Edit", "$name via API ($api_key_name)", $client_id);
        logAction("API", "Success", "Edited domain $name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../update_output.php';
