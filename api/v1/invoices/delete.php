<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$invoice_id = intval($_POST['invoice_id']);

// Default
$delete_count = false;

if (!empty($invoice_id)) {
    $row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM invoices WHERE invoice_id = $invoice_id AND invoice_client_id LIKE '$client_id' LIMIT 1"));
    $invoice_exists = $row['invoice_id'];

    $delete_sql = mysqli_query($mysqli, "DELETE FROM invoices WHERE invoice_id = $invoice_id AND invoice_client_id LIKE '$client_id' LIMIT 1");

    if ($delete_sql && !empty($invoice_exists)) {
        $delete_count = mysqli_affected_rows($mysqli);

        // Also delete invoice items
        mysqli_query($mysqli, "DELETE FROM invoice_items WHERE invoice_item_invoice_id = $invoice_id");

        // Logging
        logAction("Invoice", "Delete", "Invoice $invoice_id via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../delete_output.php';
