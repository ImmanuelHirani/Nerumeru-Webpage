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

if (isset($_GET['hero_id']) && isset($_GET['status'])) {
    $idhero = $_GET['hero_id'];
    $status = $_GET['status'];

    // Memperbarui status yang sebelumnya diatur ke 0
    $queryUpdatePreviousStatus = "UPDATE herosection SET status='0' WHERE hero_id != '$idhero'";
    $runningUpdatePreviousStatus = mysqli_query($conn, $queryUpdatePreviousStatus);

    if (!$runningUpdatePreviousStatus) {
        echo "Error updating previous status: " . mysqli_error($conn);
        exit();
    }

    // Mengubah status menjadi lawan dari status saat ini (0 menjadi 1 atau 1 menjadi 0)
    $newStatus = ($status == 1) ? 0 : 1;

    $query = "UPDATE herosection SET status='$newStatus' WHERE hero_id='$idhero'";
    $running = mysqli_query($conn, $query);

    if ($running) {
        echo "<script>alert('Data berhasil diupdate')</script>";
        header('Location:Admin-Homepage.php');
        exit();
    } else {
        echo "Error update data: " . mysqli_error($conn);
    }
}



if (isset($_GET['recommend_id']) && isset($_GET['status'])) { // Mengecek apakah parameter id dan status ada di URL
    $idRecommend = $_GET['recommend_id']; // Mengambil nilai id dari URL
    $status = $_GET['status']; // Mengambil nilai status dari URL

    // Mengubah status menjadi lawan dari status saat ini (0 menjadi 1 atau 1 menjadi 0)
    $newStatus = ($status == 1) ? 0 : 1;

    $query = "UPDATE recommendsection SET status='$newStatus' WHERE recommend_id='$idRecommend'"; // Query update status banner
    $running = mysqli_query($conn, $query); // Menjalankan query

    if ($running) {
        echo "<script>alert('Data berhasil diupdate')</script>"; // Menampilkan pesan sukses
        header('Location:Admin-Homepage.php'); // Redirect ke halaman homebanner.php
        exit();
    } else {
        echo "Error update data: " . mysqli_error($conn); // Menampilkan pesan error
    }
}


if (isset($_GET['event_id']) && isset($_GET['status'])) { // Mengecek apakah parameter id dan status ada di URL
    $idEvent = $_GET['event_id']; // Mengambil nilai id dari URL
    $status = $_GET['status']; // Mengambil nilai status dari URL

    // Mengubah status menjadi lawan dari status saat ini (0 menjadi 1 atau 1 menjadi 0)
    $newStatus = ($status == 1) ? 0 : 1;

    $query = "UPDATE neru_event SET status='$newStatus' WHERE event_id='$idEvent'"; // Query update status banner
    $running = mysqli_query($conn, $query); // Menjalankan query

    if ($running) {
        echo "<script>alert('Data berhasil diupdate')</script>"; // Menampilkan pesan sukses
        header('Location:Admin-Homepage.php'); // Redirect ke halaman homebanner.php
        exit();
    } else {
        echo "Error update data: " . mysqli_error($conn); // Menampilkan pesan error
    }
}

if (isset($_GET['news_id']) && isset($_GET['status'])) { // Mengecek apakah parameter id dan status ada di URL
    $idnews = $_GET['news_id']; // Mengambil nilai id dari URL
    $status = $_GET['status']; // Mengambil nilai status dari URL

    // Mengubah status menjadi lawan dari status saat ini (0 menjadi 1 atau 1 menjadi 0)
    $newStatus = ($status == 1) ? 0 : 1;

    $query = "UPDATE neru_event SET status='$newStatus' WHERE news_id='$idnews'"; // Query update status banner
    $running = mysqli_query($conn, $query); // Menjalankan query

    if ($running) {
        echo "<script>alert('Data berhasil diupdate')</script>"; // Menampilkan pesan sukses
        header('Location:Admin-Homepage.php'); // Redirect ke halaman homebanner.php
        exit();
    } else {
        echo "Error update data: " . mysqli_error($conn); // Menampilkan pesan error
    }
}

if (isset($_GET['bio_id']) && isset($_GET['status'])) {
    $idBio = $_GET['bio_id'];
    $status = $_GET['status'];

    // Memperbarui status yang sebelumnya diatur ke 0
    $queryUpdatePreviousStatus = "UPDATE bio SET status='0' WHERE bio_id != '$idBio'";
    $runningUpdatePreviousStatus = mysqli_query($conn, $queryUpdatePreviousStatus);

    if (!$runningUpdatePreviousStatus) {
        echo "Error updating previous status: " . mysqli_error($conn);
        exit();
    }

    // Mengubah status menjadi lawan dari status saat ini (0 menjadi 1 atau 1 menjadi 0)
    $newStatus = ($status == 1) ? 0 : 1;

    $query = "UPDATE bio SET status='$newStatus' WHERE bio_id='$idBio'";
    $running = mysqli_query($conn, $query);

    if ($running) {
        echo "<script>alert('Data berhasil diupdate')</script>";
        header('Location:Admin-Homepage.php');
        exit();
    } else {
        echo "Error update data: " . mysqli_error($conn);
    }
}


if (isset($_GET['blog_id']) && isset($_GET['status'])) { // Mengecek apakah parameter id dan status ada di URL
    $idBlog = $_GET['blog_id']; // Mengambil nilai id dari URL
    $status = $_GET['status']; // Mengambil nilai status dari URL

    // Mengubah status menjadi lawan dari status saat ini (0 menjadi 1 atau 1 menjadi 0)
    $newStatus = ($status == 1) ? 0 : 1;

    $query = "UPDATE blog SET status='$newStatus' WHERE blog_id='$idBlog'"; // Query update status banner
    $running = mysqli_query($conn, $query); // Menjalankan query

    if ($running) {
        echo "<script>alert('Data berhasil diupdate')</script>"; // Menampilkan pesan sukses
        header('Location:Admin-Blog.php'); // Redirect ke halaman homebanner.php
        exit();
    } else {
        echo "Error update data: " . mysqli_error($conn); // Menampilkan pesan error
    }
}


if (isset($_GET['banner_id']) && isset($_GET['status'])) { // Mengecek apakah parameter id dan status ada di URL
    $idBanner = $_GET['banner_id']; // Mengambil nilai id dari URL
    $status = $_GET['status']; // Mengambil nilai status dari URL

    // Mengubah status menjadi lawan dari status saat ini (0 menjadi 1 atau 1 menjadi 0)
    $newStatus = ($status == 1) ? 0 : 1;

    $query = "UPDATE banner SET status='$newStatus' WHERE banner_id='$idBanner'"; // Query update status banner
    $running = mysqli_query($conn, $query); // Menjalankan query

    if ($running) {
        echo "<script>alert('Data berhasil diupdate')</script>"; // Menampilkan pesan sukses
        header('Location:Admin-Banner.php'); // Redirect ke halaman homebanner.php
        exit();
    } else {
        echo "Error update data: " . mysqli_error($conn); // Menampilkan pesan error
    }
}


if (isset($_GET['product_id']) && isset($_GET['status'])) { // Mengecek apakah parameter id dan status ada di URL
    $idproduct = $_GET['product_id']; // Mengambil nilai id dari URL
    $status = $_GET['status']; // Mengambil nilai status dari URL


    // Mengubah status menjadi lawan dari status saat ini (0 menjadi 1 atau 1 menjadi 0)
    $newStatus = ($status == 1) ? 0 : 1;


    $query = "UPDATE product SET status='$newStatus' WHERE product_id='$idproduct'"; // Query update status banner
    $running = mysqli_query($conn, $query); // Menjalankan query

    if ($running) {
        echo "<script>alert('Data berhasil diupdate')</script>"; // Menampilkan pesan sukses
        header('Location:Admin-Products.php'); // Redirect ke halaman homebanner.php
        exit();
    } else {
        echo "Error update data: " . mysqli_error($conn); // Menampilkan pesan error
    }
}

if (isset($_GET['trolly_id']) && isset($_GET['status'])) { // Mengecek apakah parameter id dan status ada di URL
    $idtrolly = $_GET['trolly_id']; // Mengambil nilai id dari URL
    $status = $_GET['status']; // Mengambil nilai status dari URL

    // Mengubah status menjadi lawan dari status saat ini (0 menjadi 1 atau 1 menjadi 0)
    $newStatus = ($status == 1) ? 0 : 1;


    $query = "UPDATE trolly SET status='$newStatus' WHERE trolly_id='$idtrolly'"; // Query update status banner
    $running = mysqli_query($conn, $query); // Menjalankan query

    if ($running) {
        echo "<script>alert('Data berhasil diupdate')</script>"; // Menampilkan pesan sukses
        header('Location:Admin-Products.php'); // Redirect ke halaman homebanner.php
        exit();
    } else {
        echo "Error update data: " . mysqli_error($conn); // Menampilkan pesan error
    }
}

if (isset($_GET['id_location']) && isset($_GET['status'])) {
    $idlocation = $_GET['id_location'];
    $status = $_GET['status'];

    // Memperbarui status yang sebelumnya diatur ke 0
    $queryUpdatePreviousStatus = "UPDATE user_locations SET status='0' WHERE id != '$idlocation'";
    $runningUpdatePreviousStatus = mysqli_query($conn, $queryUpdatePreviousStatus);

    if (!$runningUpdatePreviousStatus) {
        echo "Error updating previous status: " . mysqli_error($conn);
        exit();
    }

    // Mengubah status menjadi lawan dari status saat ini (0 menjadi 1 atau 1 menjadi 0)
    $newStatus = ($status == 1) ? 0 : 1;

    $query = "UPDATE user_locations SET status='$newStatus' WHERE id='$idlocation'";
    $running = mysqli_query($conn, $query);

    if ($running) {
        echo "<script>alert('Data berhasil diupdate')</script>";
        header('Location:Profile.php');
        exit();
    } else {
        echo "Error update data: " . mysqli_error($conn);
    }
}

if (isset($_GET['id_locationCart']) && isset($_GET['status'])) {
    $idlocation = $_GET['id_locationCart'];
    $status = $_GET['status'];

    // Memperbarui status yang sebelumnya diatur ke 0
    $queryUpdatePreviousStatus = "UPDATE user_locations SET status='0' WHERE id != '$idlocation'";
    $runningUpdatePreviousStatus = mysqli_query($conn, $queryUpdatePreviousStatus);

    if (!$runningUpdatePreviousStatus) {
        echo "Error updating previous status: " . mysqli_error($conn);
        exit();
    }

    // Mengubah status menjadi lawan dari status saat ini (0 menjadi 1 atau 1 menjadi 0)
    $newStatus = ($status == 1) ? 0 : 1;

    $query = "UPDATE user_locations SET status='$newStatus' WHERE id='$idlocation'";
    $running = mysqli_query($conn, $query);

    if ($running) {
        echo "<script>alert('Data berhasil diupdate')</script>";
        header('Location:cart.php');
        exit();
    } else {
        echo "Error update data: " . mysqli_error($conn);
    }
}


if (isset($_GET['img_id']) && isset($_GET['status'])) { // Mengecek apakah parameter id dan status ada di URL
    $idImg = $_GET['img_id'];
    $status = $_GET['status'];

    // Mengubah status menjadi lawan dari status saat ini (0 menjadi 1 atau 1 menjadi 0)
    $newStatus = ($status == 1) ? 0 : 1;

    $query = "UPDATE other_product_img SET status_multiImg='$newStatus' WHERE product_id='$idImg'";
    $running = mysqli_query($conn, $query); // Menjalankan query

    if ($running) {
        echo "<script>alert('Data berhasil diupdate')</script>";
        header("Location: Admin-Multi-img.php?product_id=$idImg");
        exit();
    } else {
        echo "Error update data: " . mysqli_error($conn);
    }
}
