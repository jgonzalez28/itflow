<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$payment_id = intval($_POST['payment_id']);

// Default
$update_count = false;

// Payments require All Clients scope
if (!empty($payment_id) && $client_id == 0) {

    $payment_row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM payments WHERE payment_id = '$payment_id' LIMIT 1"));

    require_once 'payment_model.php';

    $update_sql = mysqli_query($mysqli, "UPDATE payments SET payment_invoice_id = $invoice_id, payment_amount = $amount, payment_date = '$date', payment_method = '$method', payment_reference = '$reference', payment_notes = '$notes' WHERE payment_id = $payment_id LIMIT 1");

    if ($update_sql) {
        $update_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Payment", "Edit", "Payment $payment_id via API ($api_key_name)", 0);
        logAction("API", "Success", "Edited payment $payment_id via API ($api_key_name)", 0);
    }
}

// Output
require_once '../update_output.php';
