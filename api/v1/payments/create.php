<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Payments require All Clients scope
$insert_id = false;

if ($client_id == 0) {

    $payment_row = false; // Creation, not an update
    require_once 'payment_model.php';

    if (!empty($invoice_id) && !empty($amount)) {

        $insert_sql = mysqli_query($mysqli, "INSERT INTO payments SET payment_invoice_id = $invoice_id, payment_amount = $amount, payment_date = '$date', payment_method = '$method', payment_reference = '$reference', payment_notes = '$notes'");

        if ($insert_sql) {
            $insert_id = mysqli_insert_id($mysqli);

            // Logging
            logAction("Payment", "Create", "Created payment for invoice $invoice_id via API ($api_key_name)", 0, $insert_id);
            logAction("API", "Success", "Created payment for invoice $invoice_id via API ($api_key_name)", 0);
        }
    }
}

// Output
require_once '../create_output.php';
