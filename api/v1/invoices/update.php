<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$invoice_id = intval($_POST['invoice_id']);

// Default
$update_count = false;

if (!empty($invoice_id)) {

    $invoice_row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM invoices WHERE invoice_id = '$invoice_id' AND invoice_client_id LIKE '$client_id' LIMIT 1"));

    require_once 'invoice_model.php';

    $update_sql = mysqli_query($mysqli, "UPDATE invoices SET invoice_date = '$date', invoice_due_date = '$due_date', invoice_notes = '$notes', invoice_footer = '$footer', invoice_currency_code = '$currency_code' WHERE invoice_id = $invoice_id AND invoice_client_id LIKE '$client_id' LIMIT 1");

    if ($update_sql) {
        $update_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Invoice", "Edit", "Invoice $invoice_id via API ($api_key_name)", $client_id);
        logAction("API", "Success", "Edited invoice $invoice_id via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../update_output.php';
