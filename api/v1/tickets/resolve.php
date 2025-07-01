<?php

require_once '../validate_api_key.php';

require_once '../require_post_method.php';

// Parse Info
$ticket_id = intval($_POST['ticket_id']);

if (!empty($client_id) AND !empty($ticket_id)) {

    $ticket_row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tickets WHERE ticket_client_id LIKE '$client_id' AND ticket_id = '$ticket_id' LIMIT 1"));

    $ticket_prefix = sanitizeInput($ticket_row['ticket_prefix']);
    $ticket_number = intval($ticket_row['ticket_number']);
   
    // Resolve the ticket
    $update_sql = mysqli_query($mysqli, "UPDATE tickets SET ticket_status = 4, ticket_resolved_at = NOW() WHERE ticket_id = $ticket_id AND ticket_client_id = $client_id");

    // Check insert & get insert ID
    if ($update_sql) {
        $update_count = mysqli_affected_rows($mysqli);

        // Logging
        logAction("Ticket", "Edit", "$ticket_prefix$ticket_number $subject via API ($api_key_name)", $client_id, $ticket_id);
        logAction("API", "Success", "Edited ticket $ticket_prefix$ticket_number $subject via API ($api_key_name)", $client_id);
    }
}

// Output
require_once '../update_output.php';