<?php

require "function.php";

if (isset($_GET['whyus_id']) && isset($_GET['status'])) { // Mengecek apakah parameter id dan status ada di URL
    $idwhyus = $_GET['whyus_id']; // Mengambil nilai id dari URL
    $status = $_GET['status']; // Mengambil nilai status dari URL

    // Mengubah status menjadi lawan dari status saat ini (0 menjadi 1 atau 1 menjadi 0)
    $newStatus = ($status == 1) ? 0 : 1;

    $query = "UPDATE whyus SET status='$newStatus' WHERE whyus_id='$idwhyus'"; // Query update status banner
    $running = mysqli_query($conn, $query); // Menjalankan query

    if ($running) {
        echo "<script>alert('Data berhasil diupdate')</script>"; // Menampilkan pesan sukses
        header('Location:Admin-Homepage.php'); // Redirect ke halaman homebanner.php
        exit();
    } else {
        echo "Error update data: " . mysqli_error($conn); // Menampilkan pesan error
    }
}

if (isset($_GET['hero_id']) && isset($_GET['status'])) { // Mengecek apakah parameter id dan status ada di URL
    $idhero = $_GET['hero_id']; // Mengambil nilai id dari URL
    $status = $_GET['status']; // Mengambil nilai status dari URL

    // Mengubah status menjadi lawan dari status saat ini (0 menjadi 1 atau 1 menjadi 0)
    $newStatus = ($status == 1) ? 0 : 1;

    $query = "UPDATE herosection SET status='$newStatus' WHERE hero_id='$idhero'"; // Query update status banner
    $running = mysqli_query($conn, $query); // Menjalankan query

    if ($running) {
        echo "<script>alert('Data berhasil diupdate')</script>"; // Menampilkan pesan sukses
        header('Location:Admin-Homepage.php'); // Redirect ke halaman homebanner.php
        exit();
    } else {
        echo "Error update data: " . mysqli_error($conn); // Menampilkan pesan error
    }
}



if(isset($_GET['recommend_id']) && isset($_GET['status'])){ // Mengecek apakah parameter id dan status ada di URL
    $idhero = $_GET['recommend_id']; // Mengambil nilai id dari URL
    $status = $_GET['status']; // Mengambil nilai status dari URL

    // Mengubah status menjadi lawan dari status saat ini (0 menjadi 1 atau 1 menjadi 0)
    $newStatus = ($status == 1) ? 0 : 1;

    $query = "UPDATE recommendsection SET status='$newStatus' WHERE recommend_id='$idhero'"; // Query update status banner
    $running = mysqli_query($conn, $query); // Menjalankan query

    if($running){
        echo "<script>alert('Data berhasil diupdate')</script>"; // Menampilkan pesan sukses
        header('Location:Admin-Homepage.php'); // Redirect ke halaman homebanner.php
        exit();
    }
    else{
        echo "Error update data: " . mysqli_error($conn); // Menampilkan pesan error
    }
}