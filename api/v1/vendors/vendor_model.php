<?php

// Variable assignment from POST (or: blank/from DB is updating)

if (isset($_POST['vendor_name'])) {
    $name = sanitizeInput($_POST['vendor_name']);
} elseif ($vendor_row) {
    $name = mysqli_real_escape_string($mysqli, $vendor_row['vendor_name']);
} else {
    $name = '';
}

if (isset($_POST['vendor_description'])) {
    $description = sanitizeInput($_POST['vendor_description']);
} elseif ($vendor_row) {
    $description = mysqli_real_escape_string($mysqli, $vendor_row['vendor_description']);
} else {
    $description = '';
}

if (isset($_POST['vendor_website'])) {
    $website = preg_replace("(^https?://)", "", sanitizeInput($_POST['vendor_website']));
} elseif ($vendor_row) {
    $website = mysqli_real_escape_string($mysqli, $vendor_row['vendor_website']);
} else {
    $website = '';
}

if (isset($_POST['vendor_phone'])) {
    $phone = sanitizeInput($_POST['vendor_phone']);
} elseif ($vendor_row) {
    $phone = mysqli_real_escape_string($mysqli, $vendor_row['vendor_phone']);
} else {
    $phone = '';
}

if (isset($_POST['vendor_notes'])) {
    $notes = sanitizeInput($_POST['vendor_notes']);
} elseif ($vendor_row) {
    $notes = mysqli_real_escape_string($mysqli, $vendor_row['vendor_notes']);
} else {
    $notes = '';
}
