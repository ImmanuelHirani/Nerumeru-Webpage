<?php
$conn = mysqli_connect('localhost', 'root', '', 'nerumeru');

// Periksa koneksi
if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}


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

// cart Function





function deleteorderCart($id)
{

    global $conn;


    $query = "DELETE FROM order_cart WHERE order_id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// cart End

// Homepage function
// =========================
// Banner
function insertHero($data)
{
    global $conn;

    // Upload Gambar
    $hero_img = upload('gambar');
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
        $hero_img = upload('gambar');
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
// Homepage function End

// Why us Function
function insertwhyus($data)
{
    global $conn;
    $whyus_img = upload('gambar');
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
        $whyus_img = upload('gambar');
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
    $recommend_img = upload('gambar');

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
    if (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] === 4) {
        $recommend_img = $recommend_imgLama;
    } else {
        $recommend_img = upload('gambar');
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
    $event_img = upload('gambar');

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
        $event_img = upload('gambar');
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


// Product function
// =========================
function insertProduct($data)
{
    global $conn;

    // Upload Gambar
    $product_img = upload('gambar');
    if (!$product_img) {
        return false;
    }

    $product_type = htmlspecialchars($data["product_type"]);
    $product_name = htmlspecialchars($data["product_name"]);
    $product_categories = htmlspecialchars($data["product_categories"]);
    $product_stock = htmlspecialchars($data["product_stock"]);
    $product_color = htmlspecialchars($data["product_color"]);
    $product_price = htmlspecialchars($data["product_price"]);
    $product_specification = htmlspecialchars($data["product_specification"]);
    $product_weight = htmlspecialchars($data["product_weight"]);
    $product_warranty = htmlspecialchars($data["product_warranty"]);
    $product_rating = htmlspecialchars($data["product_rating"]);
    $status = $data["status"];


    $query = "INSERT INTO product
VALUES (
'',
'$product_img',
'$product_type',
'$product_name',
'$product_categories',
'$product_stock',
'$product_color',
'$product_price',
'$product_specification',
'$product_weight',
'$product_warranty',
'$product_rating',
NOW(),
NOW(),
'$status'
)";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateProduct($data)
{
    global $conn;

    $product_id = $data["product_id"];
    $product_img = htmlspecialchars($data["product_img"]);
    $product_imgLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['gambar']['error'] === 4) {
        $product_img = $product_imgLama;
    } else {
        $product_img = upload('gambar');
    }

    $product_name = htmlspecialchars($data["product_name"]);
    $product_stock = htmlspecialchars($data["product_stock"]);
    $product_color = htmlspecialchars($data["product_color"]);
    $product_price = htmlspecialchars($data["product_price"]);
    $product_specification = htmlspecialchars($data["product_specification"]);
    $product_categories = htmlspecialchars($data["product_categories"]);
    $product_weight = htmlspecialchars($data["product_weight"]);
    $product_warranty = htmlspecialchars($data["product_warranty"]);
    $product_rating = htmlspecialchars($data["product_rating"]);
    $status = $data["status"];

    $query = "UPDATE product SET
product_img = '$product_img',
product_name = '$product_name',
product_color = '$product_color',
product_price = '$product_price',
product_stock = '$product_stock',
product_specification = '$product_specification',
product_categories = '$product_categories',
product_weight = '$product_weight',
product_warranty = '$product_warranty',
product_rating = '$product_rating',
lastUpdate_date = NOW(),
status = '$status'
WHERE product_id = $product_id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function deleteProduct($id)
{

    global $conn;

    $query = "DELETE FROM product WHERE product_id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Product function End


// Trolly function
// =========================
function insertTrolly($data)
{
    global $conn;

    $trolly_size = htmlspecialchars($data["trolly_size"]);
    $trolly_color = htmlspecialchars($data["trolly_color"]);
    $status = $data["status"];

    $query = "INSERT INTO trolly
VALUES (
'',
'$trolly_size',
'$trolly_color',
NOW(),
NOW(),
'$status'
)";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateTrolly($data)
{
    global $conn;

    $trolly_id = $data["trolly_id"];

    $trolly_size = htmlspecialchars($data["trolly_size"]);
    $trolly_color = htmlspecialchars($data["trolly_color"]);
    $status = $data["status"];

    $query = "UPDATE trolly SET
trolly_size = '$trolly_size',
trolly_color = '$trolly_color',
lastUpdate_date = NOW(),
status = '$status'
WHERE trolly_id = $trolly_id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function deleteTrolly($id)
{

    global $conn;

    $query = "DELETE FROM trolly WHERE trolly_id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Trolly function End

function registerAccount($data)
{
    global $conn;
    $user_email = htmlspecialchars($data['user_email']);
    $user_phone = htmlspecialchars($data['user_phone']);
    $user_password = mysqli_real_escape_string($conn, $data['user_password']);

    // Check if email already exists
    $email_check_query = "SELECT * FROM user WHERE user_email='$user_email' LIMIT 1";
    $result_email = mysqli_query($conn, $email_check_query);
    $user_email_row = mysqli_fetch_assoc($result_email);

    // Check if phone number already exists
    $phone_check_query = "SELECT * FROM user WHERE user_phone='$user_phone' LIMIT 1";
    $result_phone = mysqli_query($conn, $phone_check_query);
    $user_phone_row = mysqli_fetch_assoc($result_phone);

    if ($user_email_row) {
        // Email already exists, return error or handle accordingly
        return "Email already exists";
    } elseif ($user_phone_row) {
        // Phone number already exists, return error or handle accordingly
        return "Phone number already exists";
    } else {
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

    // Panggil fungsi upload('gambar') untuk mengunggah gambar
    $namaFile = upload('gambar');

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

// Multi Img Product
function deleteproductMultiImg($id)
{
    global $conn;

    $query = "DELETE FROM other_product_img WHERE product_id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Multi Img Product End


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



function upload($input_name)
{
    if ($_FILES[$input_name]["size"] == 0) {
        // Jika tidak ada file yang diupload, kembalikan nilai false
        return false;
    }

    // Lakukan proses upload gambar
    $namaFile = $_FILES[$input_name]["name"];
    $extensiGambarValid = ["jpg", "png", "jpeg", "svg"];
    $extensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);

    // Validasi ekstensi gambar
    if (!in_array($extensiGambar, $extensiGambarValid)) {
        echo "<script>
    alert('Yang Anda Upload Bukan Gambar');
</script>";
        return false;
    }

    // Validasi ukuran gambar
    $ukuran_file = $_FILES[$input_name]['size'];
    $batas_ukuran = 60000000; // 60 MB

    if ($ukuran_file > $batas_ukuran) {
        echo "<script>
    alert('Ukuran Gambar Terlalu Besar');
</script>";
        return false;
    }

    // Generate nama file baru dan pindahkan file ke direktori yang ditentukan
    $tmpName = $_FILES[$input_name]["tmp_name"];
    $namaFilebaru = uniqid() . '.' . $extensiGambar;
    $uploadPath = "img/" . $namaFilebaru;

    if (move_uploaded_file($tmpName, $uploadPath)) {
        return $namaFilebaru;
    } else {
        echo "<script>
    alert('Gagal mengunggah gambar');
</script>";
        return false;
    }
}

function insertMultiImg($data)
{
    global $conn;

    $product_img1 = upload('gambar1');
    $product_img2 = upload('gambar2');
    $product_img3 = upload('gambar3');

    // Ensure at least one image is uploaded
    if (!$product_img1 || !$product_img2 || !$product_img3) {
        return false;
    }

    $product_id = $data['product_id'];

    // Corrected SQL syntax: VALUES (not VALUE), and removed quotes around column names
    $query = "INSERT INTO other_product_img (product_id, product_img_1, product_img_2, product_img_3, insert_date, lastUpdate_date)
VALUES
(
'$product_id',
'$product_img1',
'$product_img2',
'$product_img3',
NOW(),
NOW()
)";

    try {
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } catch (mysqli_sql_exception $e) {
        // Print SQL error message for debugging
        echo "SQL Error: " . $e->getMessage();
        return false;
    }
}




function UpdateMultiImg($data)
{
    global $conn;

    $product_id = $data["product_id"];

    // Check if array keys exist before accessing them
    $product_img1 = isset($data["product_img_1"]) ? htmlspecialchars($data["product_img_1"]) : '';
    $product_img2 = isset($data["product_img_2"]) ? htmlspecialchars($data["product_img_2"]) : '';
    $product_img3 = isset($data["product_img_3"]) ? htmlspecialchars($data["product_img_3"]) : '';

    $product_imgLama1 = isset($data["gambarLama1"]) ? htmlspecialchars($data["gambarLama1"]) : '';
    $product_imgLama2 = isset($data["gambarLama2"]) ? htmlspecialchars($data["gambarLama2"]) : '';
    $product_imgLama3 = isset($data["gambarLama3"]) ? htmlspecialchars($data["gambarLama3"]) : '';

    // Handle image uploads
    if ($_FILES['gambar1']['error'] === 4) {
        $product_img1 = $product_imgLama1; // Retain old image if no new one uploaded
    } else {
        $product_img1 = upload('gambar1');
    }

    if ($_FILES['gambar2']['error'] === 4) {
        $product_img2 = $product_imgLama2; // Retain old image if no new one uploaded
    } else {
        $product_img2 = upload('gambar2');
    }

    if ($_FILES['gambar3']['error'] === 4) {
        $product_img3 = $product_imgLama3; // Retain old image if no new one uploaded
    } else {
        $product_img3 = upload('gambar3');
    }

    // Corrected SQL syntax: VALUES (not VALUE), and removed quotes around column names
    $query = "UPDATE other_product_img SET
product_id = '$product_id',
product_img_1 = '$product_img1',
product_img_2 = '$product_img2',
product_img_3 = '$product_img3',
lastUpdate_date = NOW()
WHERE product_id = '$product_id'
";

    try {
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } catch (mysqli_sql_exception $e) {
        // Print SQL error message for debugging
        echo "SQL Error: " . $e->getMessage();
        return false;
    }
}


// Function Add to cart {

function addtoCart($data)
{
    global $conn;

    $productid = htmlspecialchars($data['product_id']);
    $userid = htmlspecialchars($data['user_id']);
    $order_note = htmlspecialchars($data['order_note']);
    $order_quantity = htmlspecialchars($data['order_quantity']);

    $query = "INSERT INTO order_cart (product_id ,user_id , order_note , order_quantity , insert_date, lastUpdate_date)

VALUE (
'$productid',
'$userid',
'$order_note',
'$order_quantity',
NOW(),
NOW()
) ";

    try {
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } catch (mysqli_sql_exception $e) {
        // Print SQL error message for debugging
        echo "SQL Error: " . $e->getMessage();
        return false;
    }
}

// }