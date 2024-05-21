<?php

include "function.php";

function updateCart($data)
{
    global $conn;
    $idCart = $data["order_id"];
    $quantity = $data['order_quantity'];

    $query = "UPDATE order_cart SET 
              order_quantity = ? 
              WHERE order_id = ?";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ii", $quantity, $idCart);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Quantity updated successfully";
    } else {
        echo "Failed to update quantity cannot be less than 1 or more than 5";
    }

    mysqli_stmt_close($stmt);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    updateCart($_POST);
}
