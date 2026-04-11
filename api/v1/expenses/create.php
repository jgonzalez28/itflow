<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Expenses require All Clients scope
$insert_id = false;

if ($client_id == 0) {

    $expense_row = false; // Creation, not an update
    require_once 'expense_model.php';

    if (!empty($description)) {

        $insert_sql = mysqli_query($mysqli, "INSERT INTO expenses SET expense_description = '$description', expense_amount = $amount, expense_date = '$date', expense_tax = $tax, expense_notes = '$notes', expense_vendor_id = $vendor_id, expense_category_id = $category_id");

        if ($insert_sql) {
            $insert_id = mysqli_insert_id($mysqli);

            // Logging
            logAction("Expense", "Create", "Created expense $description via API ($api_key_name)", 0, $insert_id);
            logAction("API", "Success", "Created expense $description via API ($api_key_name)", 0);
        }
    }
}

// Output
require_once '../create_output.php';
