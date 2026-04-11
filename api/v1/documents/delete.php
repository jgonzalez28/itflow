<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$document_id = intval($_POST['document_id']);

// Default
$delete_count = false;

if (!empty($document_id)) {
    $row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM documents WHERE document_id = $document_id AND document_client_id = $client_id LIMIT 1"));
    $document_name = $row['document_name'];

    $delete_sql = mysqli_query($mysqli, "DELETE FROM documents WHERE document_id = $document_id AND document_client_id = $client_id LIMIT 1");

    if ($delete_sql && !empty($document_name)) {
        $delete_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Document", "Delete", "$document_name via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../delete_output.php';
