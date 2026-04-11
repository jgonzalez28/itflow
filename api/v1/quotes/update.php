<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$quote_id = intval($_POST['quote_id']);

// Default
$update_count = false;

if (!empty($quote_id)) {

    $quote_row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM quotes WHERE quote_id = '$quote_id' AND quote_client_id LIKE '$client_id' LIMIT 1"));

    require_once 'quote_model.php';

    $update_sql = mysqli_query($mysqli, "UPDATE quotes SET quote_subject = '$subject', quote_date = '$date', quote_expire = '$expire', quote_notes = '$notes', quote_footer = '$footer', quote_currency_code = '$currency_code' WHERE quote_id = $quote_id AND quote_client_id LIKE '$client_id' LIMIT 1");

    if ($update_sql) {
        $update_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Quote", "Edit", "$subject via API ($api_key_name)", $client_id);
        logAction("API", "Success", "Edited quote $subject via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../update_output.php';
