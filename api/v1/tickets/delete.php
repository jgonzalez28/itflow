<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse ID
$ticket_id = intval($_POST['ticket_id']);

// Default
$delete_count = false;

if (!empty($ticket_id)) {
    $row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tickets WHERE ticket_id = $ticket_id AND ticket_client_id = $client_id LIMIT 1"));
    $ticket_subject = $row['ticket_subject'];

    $delete_sql = mysqli_query($mysqli, "DELETE FROM tickets WHERE ticket_id = $ticket_id AND ticket_client_id = $client_id LIMIT 1");

    if ($delete_sql && !empty($ticket_subject)) {
        $delete_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Ticket", "Delete", "$ticket_subject via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../delete_output.php';
