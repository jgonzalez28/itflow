<?php

// Variable assignment from POST (or: blank/from DB is updating)
// Note: expenses are not scoped to a client_id

if (isset($_POST['expense_description'])) {
    $description = sanitizeInput($_POST['expense_description']);
} elseif ($expense_row) {
    $description = mysqli_real_escape_string($mysqli, $expense_row['expense_description']);
} else {
    $description = '';
}

if (isset($_POST['expense_amount'])) {
    $amount = floatval($_POST['expense_amount']);
} elseif ($expense_row) {
    $amount = $expense_row['expense_amount'];
} else {
    $amount = 0;
}

if (isset($_POST['expense_date'])) {
    $date = sanitizeInput($_POST['expense_date']);
} elseif ($expense_row) {
    $date = $expense_row['expense_date'];
} else {
    $date = date('Y-m-d');
}

if (isset($_POST['expense_tax'])) {
    $tax = floatval($_POST['expense_tax']);
} elseif ($expense_row) {
    $tax = $expense_row['expense_tax'];
} else {
    $tax = 0;
}

if (isset($_POST['expense_notes'])) {
    $notes = sanitizeInput($_POST['expense_notes']);
} elseif ($expense_row) {
    $notes = mysqli_real_escape_string($mysqli, $expense_row['expense_notes']);
} else {
    $notes = '';
}

if (isset($_POST['expense_vendor_id'])) {
    $vendor_id = intval($_POST['expense_vendor_id']);
} elseif ($expense_row) {
    $vendor_id = $expense_row['expense_vendor_id'];
} else {
    $vendor_id = 0;
}

if (isset($_POST['expense_category_id'])) {
    $category_id = intval($_POST['expense_category_id']);
} elseif ($expense_row) {
    $category_id = $expense_row['expense_category_id'];
} else {
    $category_id = 0;
}
