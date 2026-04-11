<?php

// Variable assignment from POST (or: blank/from DB is updating)

if (isset($_POST['network_name'])) {
    $name = sanitizeInput($_POST['network_name']);
} elseif ($network_row) {
    $name = mysqli_real_escape_string($mysqli, $network_row['network_name']);
} else {
    $name = '';
}

if (isset($_POST['network_description'])) {
    $description = sanitizeInput($_POST['network_description']);
} elseif ($network_row) {
    $description = mysqli_real_escape_string($mysqli, $network_row['network_description']);
} else {
    $description = '';
}

if (isset($_POST['network_address'])) {
    $address = sanitizeInput($_POST['network_address']);
} elseif ($network_row) {
    $address = mysqli_real_escape_string($mysqli, $network_row['network_address']);
} else {
    $address = '';
}

if (isset($_POST['network_dns'])) {
    $dns = sanitizeInput($_POST['network_dns']);
} elseif ($network_row) {
    $dns = mysqli_real_escape_string($mysqli, $network_row['network_dns']);
} else {
    $dns = '';
}

if (isset($_POST['network_gateway'])) {
    $gateway = sanitizeInput($_POST['network_gateway']);
} elseif ($network_row) {
    $gateway = mysqli_real_escape_string($mysqli, $network_row['network_gateway']);
} else {
    $gateway = '';
}

if (isset($_POST['network_vlan'])) {
    $vlan = sanitizeInput($_POST['network_vlan']);
} elseif ($network_row) {
    $vlan = mysqli_real_escape_string($mysqli, $network_row['network_vlan']);
} else {
    $vlan = '';
}

if (isset($_POST['network_notes'])) {
    $notes = sanitizeInput($_POST['network_notes']);
} elseif ($network_row) {
    $notes = mysqli_real_escape_string($mysqli, $network_row['network_notes']);
} else {
    $notes = '';
}

if (isset($_POST['network_location_id'])) {
    $location_id = intval($_POST['network_location_id']);
} elseif ($network_row) {
    $location_id = $network_row['network_location_id'];
} else {
    $location_id = 0;
}
