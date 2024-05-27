<?php
include 'function.php';

$user_id = $_SESSION["user_id"];

// Fetch cart data from the database
$sql = "
    SELECT * 
    FROM order_cart 
    INNER JOIN product ON order_cart.product_id = product.product_id 
    WHERE order_cart.user_id = $user_id AND cart_status = 0
";

$result = mysqli_query($conn, $sql);
$showAddedItem = mysqli_fetch_all($result, MYSQLI_ASSOC);

$totalBelanja = 0;
foreach ($showAddedItem as &$cartDetails) {
    $subtotal = $cartDetails['product_price'] * $cartDetails['order_quantity'];
    $totalBelanja += $subtotal;
    $cartDetails['subtotal'] = $subtotal;
}
unset($cartDetails);

$response = [
    'items' => $showAddedItem,
    'total' => $totalBelanja
];

echo json_encode($response);
