<?php

// Variable assignment from POST (or: blank/from DB is updating)
// Note: products are not scoped to a client_id

if (isset($_POST['product_name'])) {
    $name = sanitizeInput($_POST['product_name']);
} elseif ($product_row) {
    $name = mysqli_real_escape_string($mysqli, $product_row['product_name']);
} else {
    $name = '';
}

if (isset($_POST['product_description'])) {
    $description = sanitizeInput($_POST['product_description']);
} elseif ($product_row) {
    $description = mysqli_real_escape_string($mysqli, $product_row['product_description']);
} else {
    $description = '';
}

if (isset($_POST['product_price'])) {
    $price = floatval($_POST['product_price']);
} elseif ($product_row) {
    $price = $product_row['product_price'];
} else {
    $price = 0;
}

if (isset($_POST['product_cost'])) {
    $cost = floatval($_POST['product_cost']);
} elseif ($product_row) {
    $cost = $product_row['product_cost'];
} else {
    $cost = 0;
}

if (isset($_POST['product_taxable'])) {
    $taxable = intval($_POST['product_taxable']);
} elseif ($product_row) {
    $taxable = $product_row['product_taxable'];
} else {
    $taxable = 0;
}

if (isset($_POST['product_type'])) {
    $type = sanitizeInput($_POST['product_type']);
} elseif ($product_row) {
    $type = mysqli_real_escape_string($mysqli, $product_row['product_type']);
} else {
    $type = '';
}

if (isset($_POST['product_identifier'])) {
    $identifier = sanitizeInput($_POST['product_identifier']);
} elseif ($product_row) {
    $identifier = mysqli_real_escape_string($mysqli, $product_row['product_identifier']);
} else {
    $identifier = '';
}

if (isset($_POST['product_notes'])) {
    $notes = sanitizeInput($_POST['product_notes']);
} elseif ($product_row) {
    $notes = mysqli_real_escape_string($mysqli, $product_row['product_notes']);
} else {
    $notes = '';
}
