<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$quote_id = intval($_POST['quote_id']);

// Default
$delete_count = false;

if (!empty($quote_id)) {
    $row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM quotes WHERE quote_id = $quote_id AND quote_client_id LIKE '$client_id' LIMIT 1"));
    $quote_subject = $row['quote_subject'];

    $delete_sql = mysqli_query($mysqli, "DELETE FROM quotes WHERE quote_id = $quote_id AND quote_client_id LIKE '$client_id' LIMIT 1");

    if ($delete_sql && !empty($quote_subject)) {
        $delete_count = mysqli_affected_rows($mysqli);

        // Also delete quote items
        mysqli_query($mysqli, "DELETE FROM quote_items WHERE quote_item_quote_id = $quote_id");

        // Logging
        logAction("Quote", "Delete", "$quote_subject via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../delete_output.php';
