<?php

// Variable assignment from POST (or: blank/from DB is updating)

if (isset($_POST['invoice_date'])) {
    $date = sanitizeInput($_POST['invoice_date']);
} elseif ($invoice_row) {
    $date = $invoice_row['invoice_date'];
} else {
    $date = date('Y-m-d');
}

if (isset($_POST['invoice_due_date'])) {
    $due_date = sanitizeInput($_POST['invoice_due_date']);
} elseif ($invoice_row) {
    $due_date = $invoice_row['invoice_due_date'];
} else {
    $due_date = date('Y-m-d');
}

if (isset($_POST['invoice_notes'])) {
    $notes = sanitizeInput($_POST['invoice_notes']);
} elseif ($invoice_row) {
    $notes = mysqli_real_escape_string($mysqli, $invoice_row['invoice_notes']);
} else {
    $notes = '';
}

if (isset($_POST['invoice_footer'])) {
    $footer = sanitizeInput($_POST['invoice_footer']);
} elseif ($invoice_row) {
    $footer = mysqli_real_escape_string($mysqli, $invoice_row['invoice_footer']);
} else {
    $footer = '';
}

if (isset($_POST['invoice_currency_code'])) {
    $currency_code = sanitizeInput($_POST['invoice_currency_code']);
} elseif ($invoice_row) {
    $currency_code = mysqli_real_escape_string($mysqli, $invoice_row['invoice_currency_code']);
} else {
    $currency_code = '';
}
