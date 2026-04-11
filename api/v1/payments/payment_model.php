<?php

// Variable assignment from POST (or: blank/from DB is updating)
// Note: payments are not scoped to a client_id directly

if (isset($_POST['payment_invoice_id'])) {
    $invoice_id = intval($_POST['payment_invoice_id']);
} elseif ($payment_row) {
    $invoice_id = $payment_row['payment_invoice_id'];
} else {
    $invoice_id = 0;
}

if (isset($_POST['payment_amount'])) {
    $amount = floatval($_POST['payment_amount']);
} elseif ($payment_row) {
    $amount = $payment_row['payment_amount'];
} else {
    $amount = 0;
}

if (isset($_POST['payment_date'])) {
    $date = sanitizeInput($_POST['payment_date']);
} elseif ($payment_row) {
    $date = $payment_row['payment_date'];
} else {
    $date = date('Y-m-d');
}

if (isset($_POST['payment_method'])) {
    $method = sanitizeInput($_POST['payment_method']);
} elseif ($payment_row) {
    $method = mysqli_real_escape_string($mysqli, $payment_row['payment_method']);
} else {
    $method = '';
}

if (isset($_POST['payment_reference'])) {
    $reference = sanitizeInput($_POST['payment_reference']);
} elseif ($payment_row) {
    $reference = mysqli_real_escape_string($mysqli, $payment_row['payment_reference']);
} else {
    $reference = '';
}

if (isset($_POST['payment_notes'])) {
    $notes = sanitizeInput($_POST['payment_notes']);
} elseif ($payment_row) {
    $notes = mysqli_real_escape_string($mysqli, $payment_row['payment_notes']);
} else {
    $notes = '';
}
