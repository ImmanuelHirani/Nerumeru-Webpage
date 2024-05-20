<?php

require "function.php";

function countItemsInOrderCart()
{
    global $conn;

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        $query = "SELECT COUNT(*) as item_count FROM order_cart WHERE user_id = ?";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $user_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $count);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            // Return count as JSON for AJAX call
            echo json_encode(['count' => $count]);
            return;
        }
    }

    // Return zero if user_id is not set or query fails
    echo json_encode(['count' => 0]);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SESSION['user_id'])) {
    countItemsInOrderCart();
}
