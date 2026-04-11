<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$expense_id = intval($_POST['expense_id']);

// Default
$delete_count = false;

// Expenses require All Clients scope
if (!empty($expense_id) && $client_id == 0) {
    $row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM expenses WHERE expense_id = $expense_id LIMIT 1"));
    $expense_description = $row['expense_description'];

    $delete_sql = mysqli_query($mysqli, "DELETE FROM expenses WHERE expense_id = $expense_id LIMIT 1");

    if ($delete_sql && !empty($expense_description)) {
        $delete_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Expense", "Delete", "$expense_description via API ($api_key_name)", 0);
    }
}

// Output
require_once '../delete_output.php';
