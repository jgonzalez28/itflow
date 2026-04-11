<?php

// Variable assignment from POST (or: blank/from DB is updating)

if (isset($_POST['quote_subject'])) {
    $subject = sanitizeInput($_POST['quote_subject']);
} elseif ($quote_row) {
    $subject = mysqli_real_escape_string($mysqli, $quote_row['quote_subject']);
} else {
    $subject = '';
}

if (isset($_POST['quote_date'])) {
    $date = sanitizeInput($_POST['quote_date']);
} elseif ($quote_row) {
    $date = $quote_row['quote_date'];
} else {
    $date = date('Y-m-d');
}

if (isset($_POST['quote_expire'])) {
    $expire = sanitizeInput($_POST['quote_expire']);
} elseif ($quote_row) {
    $expire = $quote_row['quote_expire'];
} else {
    $expire = date('Y-m-d', strtotime('+30 days'));
}

if (isset($_POST['quote_notes'])) {
    $notes = sanitizeInput($_POST['quote_notes']);
} elseif ($quote_row) {
    $notes = mysqli_real_escape_string($mysqli, $quote_row['quote_notes']);
} else {
    $notes = '';
}

if (isset($_POST['quote_footer'])) {
    $footer = sanitizeInput($_POST['quote_footer']);
} elseif ($quote_row) {
    $footer = mysqli_real_escape_string($mysqli, $quote_row['quote_footer']);
} else {
    $footer = '';
}

if (isset($_POST['quote_currency_code'])) {
    $currency_code = sanitizeInput($_POST['quote_currency_code']);
} elseif ($quote_row) {
    $currency_code = mysqli_real_escape_string($mysqli, $quote_row['quote_currency_code']);
} else {
    $currency_code = '';
}
