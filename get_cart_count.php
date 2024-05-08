<?php
    session_start();

    // Hitung jumlah item dalam session cart
    $cartCount = count($_SESSION['cart']);

    // Kembalikan jumlah item dalam format JSON
    echo json_encode(['count' => $cartCount]);
?>
