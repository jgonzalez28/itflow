<?php

// Variable assignment from POST (or: blank/from DB is updating)

if (isset($_POST['domain_name'])) {
    $name = sanitizeInput($_POST['domain_name']);
} elseif ($domain_row) {
    $name = mysqli_real_escape_string($mysqli, $domain_row['domain_name']);
} else {
    $name = '';
}

if (isset($_POST['domain_description'])) {
    $description = sanitizeInput($_POST['domain_description']);
} elseif ($domain_row) {
    $description = mysqli_real_escape_string($mysqli, $domain_row['domain_description']);
} else {
    $description = '';
}

if (isset($_POST['domain_registrar'])) {
    $registrar = sanitizeInput($_POST['domain_registrar']);
} elseif ($domain_row) {
    $registrar = mysqli_real_escape_string($mysqli, $domain_row['domain_registrar']);
} else {
    $registrar = '';
}

if (isset($_POST['domain_expire'])) {
    $expire = sanitizeInput($_POST['domain_expire']);
} elseif ($domain_row) {
    $expire = $domain_row['domain_expire'];
} else {
    $expire = 'NULL';
}

if (isset($_POST['domain_notes'])) {
    $notes = sanitizeInput($_POST['domain_notes']);
} elseif ($domain_row) {
    $notes = mysqli_real_escape_string($mysqli, $domain_row['domain_notes']);
} else {
    $notes = '';
}

if (isset($_POST['domain_vendor_id'])) {
    $vendor_id = intval($_POST['domain_vendor_id']);
} elseif ($domain_row) {
    $vendor_id = $domain_row['domain_vendor_id'];
} else {
    $vendor_id = 0;
}
