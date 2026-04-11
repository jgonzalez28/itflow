<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$expense_id = intval($_POST['expense_id']);

// Default
$update_count = false;

// Expenses require All Clients scope
if (!empty($expense_id) && $client_id == 0) {

    $expense_row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM expenses WHERE expense_id = '$expense_id' LIMIT 1"));

    require_once 'expense_model.php';

    $update_sql = mysqli_query($mysqli, "UPDATE expenses SET expense_description = '$description', expense_amount = $amount, expense_date = '$date', expense_tax = $tax, expense_notes = '$notes', expense_vendor_id = $vendor_id, expense_category_id = $category_id WHERE expense_id = $expense_id LIMIT 1");

    if ($update_sql) {
        $update_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Expense", "Edit", "$description via API ($api_key_name)", 0);
        logAction("API", "Success", "Edited expense $description via API ($api_key_name)", 0);
    }
}

// Output
require_once '../update_output.php';
