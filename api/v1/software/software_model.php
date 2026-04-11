<?php

// Variable assignment from POST (or: blank/from DB is updating)

if (isset($_POST['software_name'])) {
    $name = sanitizeInput($_POST['software_name']);
} elseif ($software_row) {
    $name = mysqli_real_escape_string($mysqli, $software_row['software_name']);
} else {
    $name = '';
}

if (isset($_POST['software_description'])) {
    $description = sanitizeInput($_POST['software_description']);
} elseif ($software_row) {
    $description = mysqli_real_escape_string($mysqli, $software_row['software_description']);
} else {
    $description = '';
}

if (isset($_POST['software_key'])) {
    $key = sanitizeInput($_POST['software_key']);
} elseif ($software_row) {
    $key = mysqli_real_escape_string($mysqli, $software_row['software_key']);
} else {
    $key = '';
}

if (isset($_POST['software_seats'])) {
    $seats = intval($_POST['software_seats']);
} elseif ($software_row) {
    $seats = $software_row['software_seats'];
} else {
    $seats = 0;
}

if (isset($_POST['software_version'])) {
    $version = sanitizeInput($_POST['software_version']);
} elseif ($software_row) {
    $version = mysqli_real_escape_string($mysqli, $software_row['software_version']);
} else {
    $version = '';
}

if (isset($_POST['software_expire'])) {
    $expire = sanitizeInput($_POST['software_expire']);
} elseif ($software_row) {
    $expire = $software_row['software_expire'];
} else {
    $expire = 'NULL';
}

if (isset($_POST['software_notes'])) {
    $notes = sanitizeInput($_POST['software_notes']);
} elseif ($software_row) {
    $notes = mysqli_real_escape_string($mysqli, $software_row['software_notes']);
} else {
    $notes = '';
}

if (isset($_POST['software_type'])) {
    $type = intval($_POST['software_type']);
} elseif ($software_row) {
    $type = $software_row['software_type'];
} else {
    $type = 0;
}

if (isset($_POST['software_vendor_id'])) {
    $vendor_id = intval($_POST['software_vendor_id']);
} elseif ($software_row) {
    $vendor_id = $software_row['software_vendor_id'];
} else {
    $vendor_id = 0;
}
