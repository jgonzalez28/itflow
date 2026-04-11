<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

$invoice_row = false; // Creation, not an update
require_once 'invoice_model.php';

// Default
$insert_id = false;

// client_id is required for invoices
if (!empty($client_id)) {

    $insert_sql = mysqli_query($mysqli, "INSERT INTO invoices SET invoice_date = '$date', invoice_due_date = '$due_date', invoice_notes = '$notes', invoice_footer = '$footer', invoice_currency_code = '$currency_code', invoice_client_id = $client_id, invoice_status = 'Draft'");

    if ($insert_sql) {
        $insert_id = mysqli_insert_id($mysqli);

        // Logging
        logAction("Invoice", "Create", "Created invoice via API ($api_key_name)", $client_id, $insert_id);
        logAction("API", "Success", "Created invoice via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../create_output.php';
