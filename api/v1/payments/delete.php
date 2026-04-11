<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$payment_id = intval($_POST['payment_id']);

// Default
$delete_count = false;

// Payments require All Clients scope
if (!empty($payment_id) && $client_id == 0) {
    $row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM payments WHERE payment_id = $payment_id LIMIT 1"));
    $payment_exists = $row['payment_id'];

    $delete_sql = mysqli_query($mysqli, "DELETE FROM payments WHERE payment_id = $payment_id LIMIT 1");

    if ($delete_sql && !empty($payment_exists)) {
        $delete_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Payment", "Delete", "Payment $payment_id via API ($api_key_name)", 0);
    }
}

// Output
require_once '../delete_output.php';
