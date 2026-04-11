<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

$quote_row = false; // Creation, not an update
require_once 'quote_model.php';

// Default
$insert_id = false;

if (!empty($subject) && !empty($client_id)) {

    $insert_sql = mysqli_query($mysqli, "INSERT INTO quotes SET quote_subject = '$subject', quote_date = '$date', quote_expire = '$expire', quote_notes = '$notes', quote_footer = '$footer', quote_currency_code = '$currency_code', quote_client_id = $client_id, quote_status = 'Draft'");

    if ($insert_sql) {
        $insert_id = mysqli_insert_id($mysqli);

        // Logging
        logAction("Quote", "Create", "Created quote $subject via API ($api_key_name)", $client_id, $insert_id);
        logAction("API", "Success", "Created quote $subject via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../create_output.php';
