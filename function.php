<?php


$conn = mysqli_connect('localhost', 'root', '', 'nerumeru');

session_start();
// Global Function
function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    foreach ($result as $row) {
        $rows[] = $row;
    }
    return $rows;
}
// Global Function end

// Homepage function
// =========================
// Banner  
function insertHero($data)
{
    global $conn;

    // Upload Gambar
    $hero_img = upload();
    if (!$hero_img) {
        return false;
    }

    $hero_title1 = htmlspecialchars($data["hero_title1"]);
    $hero_title2 = htmlspecialchars($data["hero_title2"]);
    $hero_title3 = htmlspecialchars($data["hero_title3"]);
    $hero_subtitle = htmlspecialchars($data["hero_subtitle"]);
    $hero_button1 = htmlspecialchars($data["hero_button1"]);
    $hero_button2 = htmlspecialchars($data["hero_button2"]);
    $status = $data["status"];

    $query = "INSERT INTO herosection 
    VALUES (
        '',
        '$hero_title1',
        '$hero_title2',
        '$hero_title3',
        '$hero_subtitle',
        '$hero_button1',
        '$hero_button2',
        '$hero_img',
        NOW(),
        NOW(),
        '$status'
    )";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}



function updateHero($data)
{
    global $conn;

    $hero_id = $data["hero_id"];
    $hero_img = htmlspecialchars($data["hero_img"]);
    $hero_imgLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['gambar']['error'] === 4) {
        $hero_img = $hero_imgLama;
    } else {
        $hero_img = upload();
    }

    $hero_title1 = htmlspecialchars($data["hero_title1"]);
    $hero_title2 = htmlspecialchars($data["hero_title2"]);
    $hero_title3 = htmlspecialchars($data["hero_title3"]);
    $hero_subtitle = htmlspecialchars($data["hero_subtitle"]);
    $hero_button1 = htmlspecialchars($data["hero_button1"]);
    $hero_button2 = htmlspecialchars($data["hero_button2"]);
    $status = $data["status"];

    $query = "UPDATE herosection SET 
                hero_img = '$hero_img', 
                hero_title1 = '$hero_title1', 
                hero_title2 = '$hero_title2', 
                hero_title3 = '$hero_title3', 
                hero_subtitle = '$hero_subtitle', 
                hero_button1 = '$hero_button1', 
                hero_button2 = '$hero_button2', 
                insert_date = NOW(),
                lastUpdate_date = NOW(),
                status = '$status'
              WHERE hero_id = $hero_id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function deleteHero($id)
{

    global $conn;

    $query = "DELETE FROM herosection WHERE hero_id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Homepage function  End

// Why us Function 
function insertwhyus($data)
{
    global $conn;
    $whyus_img = upload();
    $whyus_title = htmlspecialchars($data["whyus_title"]);
    $whyus_subtitle = htmlspecialchars($data["whyus_subtitle"]);

    if (!$whyus_img) {
        return false;
    }


    $status = $data["status"];

    $query = "INSERT INTO whyus 
    VALUES (
        '',
        '$whyus_img',
        '$whyus_title',
        '$whyus_subtitle',
        '$status',

        NOW(),
        NOW()
   
    )";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updatewhyus($data)
{
    global $conn;

    $whyus_id = $data["whyus_id"];
    $whyus_img = htmlspecialchars($data["whyus_img"]);
    $whyus_imgLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['gambar']['error'] === 4) {
        $whyus_img = $whyus_imgLama;
    } else {
        $whyus_img = upload();
    }

    $whyus_title = htmlspecialchars($data["whyus_title"]);
    $whyus_subtitle = htmlspecialchars($data["whyus_subtitle"]);
    $status = $data["status"];

    $query = "UPDATE whyus SET 
                whyus_img = '$whyus_img', 
                whyus_title = '$whyus_title', 
                whyus_subtitle = '$whyus_subtitle', 
                status = '$status',
                insert_date = NOW(),
                lastUpdate_date = NOW()
           
              WHERE whyus_id = $whyus_id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function deletewhyus($id)
{

    global $conn;

    $query = "DELETE FROM whyus WHERE whyus_id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Why us Function End



// product recommended Function 
function insertProductRecom($data)
{
    global $conn;
    $recommend_img = upload();

    if (!$recommend_img) {
        return false;
    }


    $recommend_title = htmlspecialchars($data["recommend_title"]);
    $recommend_link = htmlspecialchars($data["recommend_targetLink"]);


    $status = $data["status"];

    $query = "INSERT INTO recommendsection
    VALUES (
        '',
        '$recommend_img',
        '$recommend_title',
        '$recommend_link',
        '$status',
        NOW(),
        NOW()
    )";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateProductRecom($data)
{
    global $conn;

    $recommend_id = $data["recommend_id"];
    $recommend_img = htmlspecialchars($data["recommend_img"]);
    $recommend_imgLama = htmlspecialchars($data["gambarLama"]);
    $recommend_link = htmlspecialchars($data["recommend_targetLink"]);
    if ($_FILES['gambar']['error'] === 4) {
        $recommend_img = $recommend_imgLama;
    } else {
        $recommend_img = upload();
    }

    $recommend_title = htmlspecialchars($data["recommend_title"]);
    $status = $data["status"];

    $query = "UPDATE recommendsection SET 
                recommend_img = '$recommend_img', 
                recommend_title = '$recommend_title', 
                recommend_targetLink = '$recommend_link', 
                status = '$status',
                insert_date = NOW(),
                lastUpdate_date = NOW()
              WHERE recommend_id = $recommend_id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function deleteProductRecom($id)
{

    global $conn;

    $query = "DELETE FROM recommendsection WHERE recommend_id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// product recommended Function End


// Event Function 
function insertEvent($data)
{
    global $conn;
    $event_img = upload();

    if (!$event_img) {
        return false;
    }

    $event_type = htmlspecialchars($data["event_type"]);

    $status = $data["status"];

    $query = "INSERT INTO neru_event
    VALUES (
        '',
        '$event_type',
        '$event_img',
        '$status',
        NOW(),
        NOW()
    )";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateEvent($data)
{
    global $conn;

    $event_id = $data["event_id"];
    $event_img = htmlspecialchars($data["event_img"]);
    $event_imgLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['gambar']['error'] === 4) {
        $event_img = $event_imgLama;
    } else {
        $event_img = upload();
    }

    $event_type = htmlspecialchars($data["event_type"]);
    $status = $data["status"];

    $query = "UPDATE neru_event SET 
                event_type = '$event_type',
                event_img = '$event_img', 
                status = '$status',
                insert_date = NOW(),
                lastUpdate_date = NOW()
              WHERE event_id = $event_id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function deleteEvent($id)
{

    global $conn;

    $query = "DELETE FROM neru_event WHERE event_id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Event Function End


// Event Function 
function insertBio($data)
{
    global $conn;

    $bio_title = htmlspecialchars($data["bio_title"]);
    $bio_subtitle = htmlspecialchars($data["bio_subtitle"]);
    $bio_full = htmlspecialchars($data["bio_full"]);


    $status = $data["status"];

    $query = "INSERT INTO bio
    VALUES (
        '',
        '$bio_title',
        '$bio_subtitle',
        '$bio_full',
        '$status',
        NOW(),
        NOW()
    )";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateBio($data)
{
    global $conn;

    $bio_id = $data["bio_id"];
    $bio_title = htmlspecialchars($data["bio_title"]);
    $bio_subtitle = htmlspecialchars($data["bio_subtitle"]);
    $bio_full = htmlspecialchars($data["bio_full"]);
    $status = $data["status"];

    $query = "UPDATE bio SET 
                bio_title = '$bio_title',
                bio_subtitle = '$bio_subtitle',
                bio_full = '$bio_full',
                status = '$status',
                insert_date = NOW(),
                lastUpdate_date = NOW()
              WHERE bio_id = $bio_id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function deleteBio($id)
{

    global $conn;

    $query = "DELETE FROM bio WHERE bio_id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Event Function End


// Event Function 
function insertBlogIcon($data)
{
    global $conn;
    $blog_type = htmlspecialchars($data["blog_type"]);
    $blog_icon = htmlspecialchars($data["blog_icon"]);
    $blog_link = htmlspecialchars($data["blog_targetLink"]);
    $blog_icon_title = htmlspecialchars($data["blog_icon_title"]);
    $status = $data["status"];

    $query = "INSERT INTO blog
    VALUES (
        '',
        '$blog_type',
        '$blog_icon',
        '$blog_link',
        '$blog_icon_title',
        '',
        '$status',
        NOW(),
        NOW()
    )";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateBlogIcon($data)
{
    global $conn;

    $blog_id = $data["blog_id"];
    $blog_type = htmlspecialchars($data["blog_type"]);
    $blog_icon = htmlspecialchars($data["blog_icon"]);
    $blog_link = htmlspecialchars($data["blog_targetLink"]);
    $blog_icon_title = htmlspecialchars($data["blog_icon_title"]);
    $status = $data["status"];

    $query = "UPDATE blog SET 
                blog_type = '$blog_type',
                blog_icon = '$blog_icon',
                blog_targetLink = '$blog_link',
                blog_icon_title = '$blog_icon_title',
                status = '$status',
                insert_date = NOW(),
                lastUpdate_date = NOW()
              WHERE blog_id = $blog_id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function deleteBlogIcon($id)
{

    global $conn;

    $query = "DELETE FROM blog WHERE blog_id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Event Function End



// Banner 
function insertBanner($data)
{
    global $conn;
    $banner_img = htmlspecialchars($data["banner_img"]);
    $banner_title = htmlspecialchars($data["banner_title"]);
    $banner_subtitle = htmlspecialchars($data["banner_subtitle"]);
    $banner_button = htmlspecialchars($data["banner_button"]);
    $status = $data["status"];

    $query = "INSERT INTO banner
    VALUES (
        '',
        '$banner_img ',
        '$banner_title',
        '$banner_subtitle',
        '$banner_button',
        '',
        '$status',
        NOW(),
        NOW()
    )";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateBanner($data)
{
    global $conn;

    $banner_id = $data["banner_id"];
    $banner_img = htmlspecialchars($data["banner_img"]);
    $banner_title = htmlspecialchars($data["banner_title"]);
    $banner_subtitle = htmlspecialchars($data["banner_subtitle"]);
    $banner_button = htmlspecialchars($data["banner_button"]);
    $status = $data["status"];

    $query = "UPDATE blog SET 
                banner_img = '$banner_img',
                banner_title = '$banner_title',
                banner_subtitle = '$banner_subtitle',
                banner_button = '$banner_button',
                status = '$status',
                insert_date = NOW(),
                lastUpdate_date = NOW()
              WHERE banner_id = $banner_id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function deleteBanner($id)
{

    global $conn;

    $query = "DELETE FROM banner WHERE banner_id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// banner end


function registerAccount($data)
{
    global $conn;
    $user_email = htmlspecialchars($data['user_email']);
    $user_phone = htmlspecialchars($data['user_phone']);
    $user_password = mysqli_real_escape_string($conn, $data['user_password']);

    // Encrypted Code Password Security
    $encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);

    // Insert Into Database
    $query = "INSERT INTO user 
              (user_password, user_phone, user_email, insert_date, lastUpdate_date)
              VALUES (
                '$encrypted_password',
                '$user_phone', 
                '$user_email', 
                NOW(),
                NOW()
                )";

    // Execute Query
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function insertlocations($data)
{
    global $conn;

    // Pastikan session user_id tersedia dan tidak kosong
    if (isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];

        $username_location_receiver = mysqli_real_escape_string($conn, htmlspecialchars($data["user_username-location"]));
        $phone_location_receiver = mysqli_real_escape_string($conn, htmlspecialchars($data["user_phone-location"]));
        $location_receiver = mysqli_real_escape_string($conn, htmlspecialchars($data["user_location"]));

        // Perhatikan penamaan kolom di dalam query
        $query_location = "INSERT INTO user_locations (user_id, user_location, user_phone_location, user_username_location)
                        VALUES ('$user_id', '$location_receiver', '$phone_location_receiver', '$username_location_receiver')";

        // Execute Query untuk menambahkan lokasi
        mysqli_query($conn, $query_location);

        return mysqli_affected_rows($conn);
    } else {
        // Handle jika user_id tidak tersedia
        return 0;
    }
}


function updateProfileData($conn)
{

    // Panggil fungsi upload() untuk mengunggah gambar
    $namaFile = upload();

    // Periksa apakah pengguna sudah login
    if (isset($_SESSION['user_id'])) {
        // Ambil user_id dari session
        $user_id = $_SESSION['user_id'];

        // Lakukan query untuk mengupdate data pengguna
        $username = $_POST['user_username'];
        $email = $_POST['user_email'];
        $phone = $_POST['user_phone'];

        // Prevent SQL Injection
        $username = mysqli_real_escape_string($conn, $username);
        $email = mysqli_real_escape_string($conn, $email);
        $phone = mysqli_real_escape_string($conn, $phone);

        // Jika ada gambar yang diunggah, update juga kolom user_img
        if ($namaFile !== false) {
            $query = "UPDATE user SET user_username='$username', user_email='$email', user_phone='$phone', user_img='$namaFile' , lastUpdate_date=NOW() WHERE user_id = $user_id";
            $result = mysqli_query($conn, $query);
            if ($result) {
                return mysqli_affected_rows($conn);
            } else {
                return mysqli_error($conn);
            }
        } else {
            // Jika tidak ada gambar yang diunggah
            $query = "UPDATE user SET user_username='$username', user_email='$email', user_phone='$phone' , lastUpdate_date=NOW() WHERE user_id = $user_id";
            $result = mysqli_query($conn, $query);
            if ($result) {
                return mysqli_affected_rows($conn);
            } else {
                return mysqli_error($conn);
            }
        }
    } else {
        // Jika pengguna belum login, tampilkan pesan kesalahan
        return array('error' => 'Login Terlebih Dahulu');
    }
}

function updatelokasi($data, $conn)
{
    // Periksa apakah pengguna sudah login
    if (isset($_SESSION['user_id'])) {
        // Ambil user_id dari session
        $user_id = $_SESSION['user_id'];

        // Lakukan query untuk mengupdate data pengguna
        $username = $data['user_username-location'];
        $id = $data["id"];
        $phone = $data['user_phone-location'];
        $location = $data['user_location'];

        // Lakukan query untuk mengupdate lokasi pengguna
        $query = "UPDATE user_locations SET user_username_location='$username', user_phone_location='$phone', user_location='$location' WHERE user_id = $user_id AND id = $id";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } else {
        // Jika pengguna belum login, tampilkan pesan kesalahan
        return array('error' => 'Login Terlebih Dahulu');
    }
}



function deleteUser($id)
{

    global $conn;

    $query = "DELETE FROM user WHERE user_id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Location

function deleteLocation($id)
{

    global $conn;

    $query = "DELETE FROM user_locations WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Location End


function updatePassword()
{
    global $conn;

    $response = array(); // Membuat array untuk menyimpan pesan kesalahan atau pesan sukses

    // Memeriksa apakah semua variabel yang diperlukan ada
    if (isset($_POST["old_password"]) && isset($_POST["new_password"]) && isset($_SESSION["user_id"])) {
        $old_password = $_POST["old_password"];
        $new_password = $_POST["new_password"];

        // Periksa apakah password lama benar
        $query = "SELECT user_password FROM user WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $_SESSION["user_id"]);
        $stmt->execute();
        $result = $stmt->get_result();

        // Memeriksa apakah ada hasil yang ditemukan
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row["user_password"];

            if (password_verify($old_password, $hashed_password)) {
                // Hash password baru
                $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Update password di database
                $update_query = "UPDATE user SET user_password = ? WHERE user_id = ?";
                $update_stmt = $conn->prepare($update_query);
                $update_stmt->bind_param("si", $new_hashed_password, $_SESSION["user_id"]);
                $update_stmt->execute();

                // Beri pesan sukses kepada pengguna
                $response['success'] = "Password berhasil diperbarui!";
            } else {
                // Password lama tidak cocok, beri pesan error kepada pengguna
                $response['error'] = "Password lama tidak cocok. Gagal diperbaharui";
            }
        } else {
            // Tidak ada baris yang ditemukan, beri pesan error kepada pengguna
            $response['error'] = "User tidak ditemukan.";
        }
    } else {
        // Jika satu atau lebih variabel yang diperlukan tidak tersedia, beri pesan error kepada pengguna
        $response['error'] = "Data tidak lengkap.";
    }

    return $response; // Mengembalikan pesan kesalahan atau pesan sukses
}



function upload()
{
    if ($_FILES["gambar"]["size"] == 0) {
        // Jika tidak ada file yang diupload, kembalikan nilai false
        return false;
    }

    // Lakukan proses upload gambar
    $namaFile = $_FILES["gambar"]["name"];
    $extensiGambarValid = ["jpg", "png", "jpeg", "svg"];
    $extensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);

    // Validasi ekstensi gambar
    if (!in_array($extensiGambar, $extensiGambarValid)) {
        echo "<script>alert('Yang Anda Upload Bukan Gambar');</script>";
        return false;
    }

    // Validasi ukuran gambar
    $ukuran_file = $_FILES['gambar']['size'];
    $batas_ukuran = 6000000; // 6 MB

    if ($ukuran_file > $batas_ukuran) {
        echo "<script>alert('Ukuran Gambar Terlalu Besar');</script>";
        return false;
    }

    // Generate nama file baru dan pindahkan file ke direktori yang ditentukan
    $tmpName = $_FILES["gambar"]["tmp_name"];
    $namaFilebaru = uniqid() . '.' . $extensiGambar;
    $uploadPath = "img/" . $namaFilebaru;

    if (move_uploaded_file($tmpName, $uploadPath)) {
        return $namaFilebaru;
    } else {
        echo "<script>alert('Gagal mengunggah gambar');</script>";
        return false;
    }
}
