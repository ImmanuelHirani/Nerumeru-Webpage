<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/output.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <title>Nerumeru | Profile</title>
</head>

<body>
  <?php include "layout/navbar.php" ?>
  <?php
  // Pastikan untuk memulai sesi

  // Periksa apakah pengguna sudah login
  // Periksa apakah pengguna sudah login
  if (isset($_SESSION['user_id'])) {
    // Ambil user_id dari session
    $user_id = $_SESSION['user_id'];

    // Lakukan query untuk mengambil data pengguna
    $query = "SELECT * FROM user WHERE user_id = $user_id";
    $result = $conn->query($query);

    // Periksa apakah query berhasil
    if ($result->num_rows > 0) {
      // Ambil data pengguna
      $userData = $result->fetch_assoc();
    } else {
      echo "Data pengguna tidak ditemukan.";
    }

    // Tutup koneksi ke database
  } else {
    // Jika pengguna belum login, tampilkan pesan kesalahan
    echo "<script>
    alert('Login Terlebih Dahulu');
    window.location.href = 'login_Register.php'; // Redirect menggunakan JavaScript
  </script>";
    exit(); // Hentikan eksekusi skrip PHP setelah mengirimkan pesan kesalahan
  }

  if (isset($_POST["submitLocation"])) {
    if (insertlocations($_POST) > 0) {
      echo
      "<script>
          alert('Data berhasil di Tambahkan');
          document.location.href = 'Profile.php';
      </script>";
    } else {
      echo
      "<script>
          alert('Data Gagal di Tambahkan');
          document.location.href = 'Profile.php';
      </script>";
    }
  }

  if (isset($_SESSION["user_id"])) {
    // Include your database connection file and create $conn object

    // Assuming you've sanitized your input, you can directly use $_SESSION["user_id"]
    $user_id = $_SESSION["user_id"];

    // Prepare and execute the query with proper parameter binding
    $query = "SELECT * FROM user_locations INNER JOIN user ON user_locations.user_id = user.user_id WHERE user_locations.user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any results
    if ($result->num_rows > 0) {
      $locations = array();

      while ($row = $result->fetch_assoc()) {
        $locations[] = $row;
      }

      // Process fetched data as needed
    } else {
      echo "Data Pengguna untuk menampilkan alamat tidak ditemukan";
    }
  } else {
    // If the user is not logged in, show an error message
    echo "<script>
      alert('Login Terlebih Dahulu');
      window.location.href = 'login_Register.php'; // Redirect using JavaScript
      </script>";
    exit(); // Stop PHP script execution after sending the error message
  }

  // Menampilkan pesan kesalahan atau pesan sukses
  if (isset($_POST["submitUpdateProfileData"])) {
    $result = updateProfileData($conn);

    if (is_array($result) && isset($result['error'])) {
      echo "<script>
      alert('" . $result['error'] . "');
      document.location.href = 'Profile.php';
  </script>";
    } elseif ($result > 0) {
      echo "<script>
      alert('Data berhasil diubah');
      document.location.href = 'Profile.php';
  </script>";
    } else {
      echo "<script>
      alert('Data gagal diubah');
      document.location.href = 'Profile.php';
  </script>";
    }
  }


  if (isset($_POST["submitLocationUpdate"])) {
    if (updatelokasi($_POST, $conn) > 0) {
      echo "<script>
        alert('Data berhasil diubah');
        document.location.href = 'Profile.php';
        </script>";
    } else {
      echo "<script>
        alert('Data Gagal diubah');
        document.location.href = 'Profile.php';
        </script>";
    }
  }

  // Memanggil fungsi updatePassword()
  if (isset($_POST["submitUpdatePassword"])) {
    $updateResponse = updatePassword();

    // Menampilkan pesan kesalahan atau pesan sukses
    if (isset($updateResponse['error'])) {
      $error_message = $updateResponse['error'];
    } elseif (isset($updateResponse['success'])) {
      $success_message = $updateResponse['success'];
    }
  }

  ?>
  <main class="md:my-24 my-10 md:mt-24 mt-16">
    <section class="profle lg:mt-12 mt-0">
      <!-- Profile Mode -->
      <div class="container">
        <div class="grid grid-cols-8 gap-5">
          <div class="lg:col-span-2 col-span-8 row-span-6 px-8 py-8 bg-white rounded-md">
            <div class="sticky top-32">
              <div class="head flex items-center gap-6">
                <img src="img/<?= $userData["user_img"] ?>" onerror="this.src='https://i.pinimg.com/564x/91/83/cb/9183cb908632a53bf619bbbcdfb68ae7.jpg'" class="object-cover w-12 h-12 rounded-full" alt="" />
                <span class="flex flex-col">
                  <h6 class="font-medium line-clamp-1 lg:text-base md:text-lg"><?= !empty($userData["user_username"]) ? $userData["user_username"] : "Profile" ?></h6>
                  <span class="flex items-center gap-2 text-grey-neru">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                      <path d="M9 12h12l-3 -3" />
                      <path d="M18 15l3 -3" />
                    </svg>
                    <!-- Setelah session_destroy() dipanggil, pengguna diarahkan ke halaman login_Register.php -->
                    <a href="logout.php">
                      <h6 class="flex gap-1 items-center  lg:text-base md:text-lg">Logout</h6>
                    </a>
                  </span>
                </span>
              </div>
              <hr class="my-4" />
              <span class="lg:hidden flex gap-12 items-center justify-center">
                <h5 class="hover:underline underline-offset-8 md:text-lg text-base AkunToggle">Akun</h5>
                <hr class="border-[1px] h-4 border-separate border-black" />
                <h5 class="hover:underline underline-offset-8 md:text-lg text-base PesananToggle">Pesanan</h5>
              </span>
              <div class="body lg:block hidden">
                <ul class="transition-all ease-in-out duration-300">
                  <li class="font-semibold dropdownProfile">
                    <span class="flex justify-between">
                      <h6 class="cursor-pointer AkunToggle">Akun</h6>
                      <svg xmlns="http://www.w3.org/2000/svg" class="transition-all ease-in-out duration-300 w-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6 9l6 6l6 -6" />
                      </svg>
                    </span>
                  </li>
                  <ul class="dropdownBoxProfile transition-all ease-in-out duration-200 absolute -z-10 flex flex-col opacity-0 gap-3 mt-3 ml-6">
                    <li><a href="#profile">Profil</a></li>
                    <li><a href="#alamat">Alamat</a></li>
                    <li><a href="#password">Ubah Password</a></li>
                  </ul>
                </ul>
                <ul class="mt-3">
                  <li class="font-semibold">
                    <h6 class="cursor-pointer PesananToggle">Pesanan Saya</h6>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Akun -->
          <div id="AkunBox" class="lg:col-span-6 col-span-8 row-span-6">
            <div class="flex flex-col gap-5">
              <div id="profile" class="bg-white lg:p-8 md:p-6 p-4 rounded-md">
                <div class="head flex flex-col gap-1">
                  <h6 class="font-semibold">Profile Saya</h6>
                </div>
                <hr class="my-4" />
                <div class="body relative ">
                  <form action="" method="post" class="lg:grid grid-cols-6 flex flex-col-reverse gap-12 lg:py-0 py-6 mt-6" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $userData["user_id"] ?>">
                    <input type="hidden" name="gambarLama" value="<?= $userData["user_img"] ?>">
                    <input type="hidden" name="user_img" value="<?= $userData["user_img"] ?>">
                    <div class="flex flex-col gap-4 w-full col-span-4">
                      <div class="flex md:flex-row lg:items-center flex-col md:gap-6 gap-4">
                        <label class="md:w-28 w-24">
                          <h6>Username</h6>
                        </label>
                        <input type="text" name="user_username" placeholder="Username" class="2xl:text-base xl:text-sm md:text-base text-sm md:w-1/2 w-full outline-none border-[1px] shadow-inner border-grey-neru p-2" value="<?= $userData["user_username"] ?>" />
                      </div>
                      <hr class="lg:hidden" />
                      <div class="flex md:flex-row flex-col md:gap-6 gap-4">
                        <label class="md:w-28 w-24">
                          <h6>Email</h6>
                        </label>
                        <input type="Email" name="user_email" class="2xl:text-base xl:text-sm md:text-base text-sm md:w-1/2 w-full outline-none border-[1px] shadow-inner border-grey-neru p-2" value="<?= $userData["user_email"] ?>" />
                      </div>
                      <hr class="lg:hidden" />
                      <div class="flex md:flex-row flex-col md:gap-6 gap-4">
                        <label class="md:w-28 w-24">
                          <h6>Phone</h6>
                        </label>
                        <input type="number" name="user_phone" class="2xl:text-base xl:text-sm md:text-base text-sm md:w-1/2 w-full outline-none border-[1px] shadow-inner border-grey-neru p-2" value="<?= $userData["user_phone"] ?>" />
                      </div>
                      <button name="submitUpdateProfileData" type="submit" class="bg-blue-Neru w-fit lg:self-start self-end md:absolute bottom-0 lg:right-auto right-0  md:py-2 py-1.5 md:px-4 px-3 md:text-base text-sm rounded-lg text-white font-medium" type="submit">Update Data</button>
                    </div>
                    <div class="col-span-2 w-full flex flex-col gap-4 items-center">
                      <img id="previewImage" src="img/<?= $userData["user_img"] ?>" onerror="this.src='https://i.pinimg.com/564x/91/83/cb/9183cb908632a53bf619bbbcdfb68ae7.jpg'" class="md:w-32 md:h-32 w-24 h-24 object-cover rounded-full" alt="" />
                      <label for="gambarInput" class="border-[1px] cursor-pointer border-grey-neru flex justify-between font-spartanMedium items-center p-2">
                        <h6>Pilih Gambar</h6>
                        <input type="file" id="gambarInput" name="gambar" id="gambar" class="hidden" />
                      </label>
                      <span class="xl:w-1/2 w-full">
                        <h6 class="text-center">Ukuran gambar: maks. 1 MB Format gambar: .JPEG, .PNG</h6>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
              <div id="Alamat" class="bg-white lg:p-8 md:p-6 p-4  rounded-md flex flex-col gap-6">
                <div class="head flex justify-between items-center">
                  <h6 class="font-semibold">Alamat <span class="text-blue-Neru font-semibold md:inline block">(Max 3 alamat)</span> </h6>
                  <a id="OpenLocationsPopUp" class="cursor-pointer flex justify-between items-center px-4 py-2 bg-blue-Neru rounded-lg font-semibold text-white gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 text-white" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 5l0 14" />
                      <path d="M5 12l14 0" />
                    </svg>
                    <h6 class="md:text-sm text-xs">Tambah Alamat</h6>
                  </a>
                </div>
                <?php if (empty($locations)) : ?>
                  <div class="w-full rounded-lg border-2 text-blue-Neru flex flex-col items-center justify-center border-opacity-10 border-black md:h-[150px] h-[100px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M14 19.5l-5 -2.5l-6 3v-13l6 -3l6 3l6 -3v9" />
                      <path d="M9 4v13" />
                      <path d="M15 7v6.5" />
                      <path d="M22 22l-5 -5" />
                      <path d="M17 22l5 -5" />
                    </svg>
                    <h6 class="lg:text-base md:text-sm text-xs font-medium">Alamat Kosong</h6>
                  </div>
                <?php else : ?>
                  <?php foreach ($locations as $location) : ?>
                    <?php if ($location["status"] == 1) : ?>
                      <div class="user-informations bg-blue-Neru bg-opacity-5 border-blue-Neru flex flex-col gap-4 border-2 p-6 rounded-lg">
                        <div class="flex md:flex-row flex-col justify-between items-center gap-4">
                          <div class="wrapper xl:w-1/2 w-full flex flex-col gap-2">
                            <span class="flex md:flex-row flex-col lg:items-center items-start gap-2">
                              <h6 class="font-semibold"><?= $location["user_username_location"] ?></h6>
                              <hr class="md:block hidden border-[1px] h-4 border-separate border-black" />
                              <h6 class="font-light">(<?= $location["user_phone_location"] ?>)</h6>
                            </span>
                            <h6 class="font-light lg:text-base text-sm"><?= $location["user_location"] ?></h6>
                            <div class="flex gap-2 items-center  w-full justify-start mt-4">
                              <button data-target="#popupLocationsUpdate<?= $location["id"] ?>" class="LocationsPopUpToggler text-white bg-green-500 px-4 py-1 rounded-full text-2xl cursor-pointer ">
                                <h6 class="md:text-xs text-[10px]">Ubah Alamat</h6>
                              </button>
                              <hr class="border-[1px] h-4 border-separate border-black" />
                              <span class="lg:text-base text-sm flex gap-1 items-center text-red-500 cursor-pointer">
                                <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="hapus.php?id_location=<?= $location["id"] ?>" class="HapusDataToggler text-white bg-red-500 px-4 py-1 rounded-full text-2xl cursor-pointer ">
                                  <h6 class="md:text-xs text-[10px]">Hapus</h6>
                                </a>
                              </span>
                            </div>
                          </div>
                          <div class="alamatTerpilih flex gap-2 items-center md:w-1/2 w-full md:justify-end justify-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 text-blue-Neru md:block hidden" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M5 12l5 5l10 -10" />
                            </svg>
                            <button class="bg-blue-Neru md:hidden block rounded-lg p-2 text-xs text-white font-medium w-full">Alamat Terpilih</button>
                          </div>
                        </div>
                      </div>
                    <?php else : ?>
                      <div class="user-informations bg-white flex flex-col gap-4 border-2 p-6 rounded-lg">
                        <div class="flex md:flex-row flex-col justify-between items-center gap-4">
                          <div class="wrapper xl:w-1/2 w-full flex flex-col gap-2">
                            <span class="flex md:flex-row flex-col lg:items-center items-start gap-2">
                              <h6 class="font-semibold"><?= $location["user_username_location"] ?></h6>
                              <hr class="md:block hidden border-[1px] h-4 border-separate border-black" />
                              <h6 class="font-light">(<?= $location["user_phone_location"] ?>)</h6>
                            </span>
                            <h6 class="font-light lg:text-base text-sm"><?= $location["user_location"] ?></h6>
                            <div class="flex gap-2 items-center w-full justify-start mt-4">
                              <a data-target="#popupLocationsUpdate<?= $location["id"] ?>" class="LocationsPopUpToggler text-white bg-green-500 px-4 py-1 rounded-full text-2xl cursor-pointer ">
                                <h6 class="md:text-xs text-[10px]">Ubah Alamat</h6>
                              </a>
                              <hr class="border-[1px] h-4 border-separate border-black" />
                              <a class="lg:text-base text-sm flex gap-1 items-center text-red-500 cursor-pointer">
                                <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="hapus.php?id_location=<?= $location["id"] ?>" class="HapusDataToggler text-white bg-red-500 px-4 py-1 rounded-full text-2xl cursor-pointer ">
                                  <h6 class="md:text-xs text-[10px]">Hapus</h6>
                                </a>
                              </a>
                            </div>
                          </div>
                          <div class="flex gap-2 pilihAlamat items-center md:w-1/2 w-full md:justify-end justify-start">
                            <a href="status.php?id_location=<?= $location["id"] ?>&status=<?= $location["status"] ?>" onclick="return alert('Alamat Berhasil Di pilih')" class="md:bg-blue-Neru rounded-lg px-4 text-center justify-center py-2 lg:text-base text-sm flex gap-1 items-center text-black md:border-0 border-2 md:text-white md:w-fit w-full cursor-pointer">
                              <h6 class="md:text-sm text-xs">Pilih Alamat</h6>
                            </a>
                          </div>
                        </div>
                      </div>
                    <?php endif; ?>
                    <?php include("layout/modal/ModalLocations.php") ?>
                  <?php endforeach; ?>
                <?php endif; ?>
                <!-- Input New Data user Locations -->
                <div id="popupLocations" class="fixed hidden  bg-black bg-opacity-50 z-50 inset-0 items-center justify-center">
                  <form action="Profile.php" method="POST">
                    <div class="boxinput-userLocations relative flex p-4 flex-col gap-4 md:w-[650px] w-[340px] bg-white-neru rounded-lg">
                      <label for="">Reciver Name</label>
                      <input required placeholder="Cth : immanuel Christian" type="text" class="bg-white shadow-md border-2 rounded-lg border-opacity-20 border-black w-full p-2 outline-none" name="user_username-location">
                      <label for="">Phone number reciver</label>
                      <input required placeholder="Cth : 081314801945" type="text" class="bg-white shadow-md border-2 rounded-lg border-opacity-20 border-black w-full p-2 outline-none" name="user_phone-location">
                      <textarea required placeholder="Cth : Jalan Kakap raya no 155" name="user_location" class="bg-white border-2 rounded-lg border-opacity-20 border-black shadow-md w-full p-2 outline-none" id="" cols="30" rows="10"></textarea>
                      <button type="submit" name="submitLocation" class="bg-blue-Neru px-3.5 py-1.5 rounded-lg w-fit text-white font-semibold text-sm self-end">Tambah Alamat</button>
                      <div id="CloseLocations" class="cursor-pointer w-10 h-10 text-white font-semibold rounded-br-none bg-blue-Neru rounded-tr-none rounded-full flex items-center justify-center absolute top-0 right-0">
                        X
                      </div>
                    </div>
                  </form>
                </div>
                <!-- Input New Data user Locations end -->
              </div>
              <div id="Password" class="bg-white relative lg:p-8 md:p-6 p-4 rounded-md">
                <div class="head flex gap-1 items-center justify-between">
                  <h6 class="font-semibold">Update Password ?</h6>
                </div>
                <hr class="my-4" />
                <form method="post">
                  <?php
                  if (isset($error_message)) {
                    echo '<script>alert("' . $error_message . '");</script>';
                  }
                  if (isset($success_message)) {
                    echo '<script>alert("' . $success_message . '");</script>';
                  }
                  ?>

                  <div class="user-informations  flex flex-col gap-4">
                    <div class="flex md:flex-row w-full flex-col gap-3 lg:items-center items-start">
                      <label class="w-40">
                        <h6>Old Password</h6>
                      </label>
                      <span class="flex items-center gap-4">
                        <input type="password" required name="old_password" class="passwordInput w-full outline-none border-[1px] shadow-inner border-grey-neru p-2" placeholder="********" />
                        <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer showPasswordBtn w-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                          <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                          <path d="M3 3l18 18" />
                        </svg>

                      </span>
                    </div>
                    <div class="flex md:flex-row flex-col gap-3 lg:items-center items-start">
                      <label class="w-40">
                        <h6>New Password</h6>
                      </label>
                      <span class="flex items-center gap-4">
                        <input type="password" required name="new_password" class="passwordInput w-full outline-none border-[1px] shadow-inner border-grey-neru p-2" placeholder="********" />
                        <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer showPasswordBtn w-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                          <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                          <path d="M3 3l18 18" />
                        </svg>
                      </span>
                    </div>
                    <hr />
                    <button name="submitUpdatePassword" class="bg-blue-Neru w-fit self-end   md:py-2 py-1.5 md:px-4 px-3 md:text-base text-sm rounded-lg text-white font-medium" type="submit">Update Password</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Akun End -->
          <!-- Pesanan -->
          <div id="pesanaBox" class="lg:col-span-6 hidden col-span-8 row-span-6">
            <div class="flex flex-col gap-5">
              <div class="bg-white md:p-8 p-3 rounded-md">
                <ul class="justify-between gap-8 lg:flex hidden">
                  <li class="transition-all ease-in-out duration-300 underline hover:underline hover:text-blue-Neru font-medium underline-offset-[14px]">
                    <a href="">
                      <h6>Semua Pesanan</h6>
                    </a>
                  </li>
                  <li class="transition-all ease-in-out duration-300 hover:underline hover:text-blue-Neru font-medium underline-offset-[14px]">
                    <a href="">
                      <h6>Menunggu Pembayaran</h6>
                    </a>
                  </li>
                  <li class="transition-all ease-in-out duration-300 hover:underline hover:text-blue-Neru font-medium underline-offset-[14px]">
                    <a href="">
                      <h6>Sedang Dikemas</h6>
                    </a>
                  </li>
                  <li class="transition-all ease-in-out duration-300 hover:underline hover:text-blue-Neru font-medium underline-offset-[14px]">
                    <a href="">
                      <h6>Di kirim</h6>
                    </a>
                  </li>
                  <li class="transition-all ease-in-out duration-300 hover:underline hover:text-blue-Neru font-medium underline-offset-[14px]">
                    <a href="">
                      <h6>Selesai</h6>
                    </a>
                  </li>
                  <li class="transition-all ease-in-out duration-300 hover:underline hover:text-blue-Neru font-medium underline-offset-[14px]">
                    <a href="">
                      <h6>Dibatalkan</h6>
                    </a>
                  </li>
                </ul>
                <div class="lg:hidden flex justify-between items-center relative">
                  <h6 class="font-medium lg:text-base md:text-sm text-xs">Pilih Berdasarkan</h6>
                  <button id="ToggleTypePesanan" class="bg-blue-Neru p-3 rounded-sm text-white flex items-center gap-2">
                    <h6 class="font-medium lg:text-base md:text-sm text-xs">Semua Pesanan</h6>
                    <svg xmlns="http://www.w3.org/2000/svg" class="transition-all ease-in-out duration-300 md:w-6 w-4" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 9l6 6l6 -6"></path>
                    </svg>
                  </button>
                  <div class="durasiBox bg-white shadow-md p-2 absolute right-0 top-4 md:w-64 w-52 rounded-sm opacity-0 -z-10 transition-all ease-in-out duration-300 md:h-36 h-28 overflow-y-auto">
                    <h6 class="py-2 px-4 hover:bg-black hover:bg-opacity-5 md:text-base text-xs">Semua Pesanan</h6>
                    <h6 class="py-2 px-4 hover:bg-black hover:bg-opacity-5 md:text-base text-xs">Menunggu Pembayaran</h6>
                    <h6 class="py-2 px-4 hover:bg-black hover:bg-opacity-5 md:text-base text-xs">Sedang Dikemas</h6>
                    <h6 class="py-2 px-4 hover:bg-black hover:bg-opacity-5 md:text-base text-xs">Dikirim</h6>
                    <h6 class="py-2 px-4 hover:bg-black hover:bg-opacity-5 md:text-base text-xs">Selesai</h6>
                    <h6 class="py-2 px-4 hover:bg-black hover:bg-opacity-5 md:text-base text-xs">Dibatalkan</h6>
                  </div>
                </div>
              </div>
              <div class="lg:col-span-6 col-span-8 flex flex-col gap-5">
                <div class="cart-item bg-white lg:p-8 p-3">
                  <hr class="mb-5" />
                  <div class="flex md:gap-6 gap-4 items-center">
                    <img src="img/card-item-2.png" class="lg:w-[20%] md:w-[30%] w-[35%]" alt="" />
                    <div class="item-informations flex justify-between w-full">
                      <span class="flex flex-col 3xl:gap-5 2xl:gap-3 xl:gap-2 gap-2.5">
                        <h5 class="font-semibold lg:text-base md:text-sm text-xs">NeruBedding - Silver Grey</h5>
                        <h6 class="lg:text-base md:text-sm text-xs flex justify-between items-center">Rp.500.000 <span class="lg:text-base md:text-sm text-xs bg-blue-Neru md:px-3 px-2 rounded-sm py-1 text-white font-medium">x1</span></h6>
                        <h6 class="lg:text-base md:text-sm text-xs">Berat Barang : 100g</h6>
                        <h6 class="lg:text-base md:text-sm text-xs gap-1 items-center text-green-500 lg:flex hidden">
                          Catatan
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                            <path d="M16 5l3 3"></path>
                            <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                          </svg>
                        </h6>
                        <h6 class="lg:text-base md:text-sm text-xs text-blue-Neru font-semibold">Beri Nilai</h6>
                      </span>
                    </div>
                  </div>
                  <hr class="mt-5" />
                  <div></div>
                  <div class="flex items-center justify-between">
                    <h6 class="items-center md:gap-4 gap-2 flex mt-2 lg:text-base md:text-sm text-xs">
                      Total Pesanan :
                      <span>Rp 500.000</span>
                    </h6>
                    <h6 class="gap-1 items-center text-green-500 mt-2 lg:hidden flex lg:text-base md:text-sm text-xs">
                      Catatan
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle md:W-6 w-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                        <path d="M16 5l3 3"></path>
                        <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                      </svg>
                    </h6>
                  </div>
                </div>
                <div class="cart-item bg-white lg:p-8 p-3">
                  <hr class="mb-5" />
                  <div class="flex md:gap-6 gap-4 items-center">
                    <img src="img/card-item-2.png" class="lg:w-[20%] md:w-[30%] w-[35%]" alt="" />
                    <div class="item-informations flex justify-between w-full">
                      <span class="flex flex-col 3xl:gap-5 2xl:gap-3 xl:gap-2 gap-2.5">
                        <h5 class="font-semibold lg:text-base md:text-sm text-xs">NeruBedding - Silver Grey</h5>
                        <h6 class="lg:text-base md:text-sm text-xs flex justify-between items-center">Rp.500.000 <span class="lg:text-base md:text-sm text-xs bg-blue-Neru md:px-3 px-2 rounded-sm py-1 text-white font-medium">x1</span></h6>
                        <h6 class="lg:text-base md:text-sm text-xs">Berat Barang : 100g</h6>
                        <h6 class="lg:text-base md:text-sm text-xs gap-1 items-center text-green-500 lg:flex hidden">
                          Catatan
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                            <path d="M16 5l3 3"></path>
                            <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                          </svg>
                        </h6>
                        <h6 class="lg:text-base md:text-sm text-xs text-blue-Neru font-semibold">Beri Nilai</h6>
                      </span>
                    </div>
                  </div>
                  <hr class="mt-5" />
                  <div></div>
                  <div class="flex items-center justify-between">
                    <h6 class="items-center md:gap-4 gap-2 flex mt-2 lg:text-base md:text-sm text-xs">
                      Total Pesanan :
                      <span>Rp 500.000</span>
                    </h6>
                    <h6 class="gap-1 items-center text-green-500 mt-2 lg:hidden flex lg:text-base md:text-sm text-xs">
                      Catatan
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle md:W-6 w-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                        <path d="M16 5l3 3"></path>
                        <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                      </svg>
                    </h6>
                  </div>
                </div>
                <div class="cart-item bg-white lg:p-8 p-3">
                  <hr class="mb-5" />
                  <div class="flex md:gap-6 gap-4 items-center">
                    <img src="img/card-item-2.png" class="lg:w-[20%] md:w-[30%] w-[35%]" alt="" />
                    <div class="item-informations flex justify-between w-full">
                      <span class="flex flex-col 3xl:gap-5 2xl:gap-3 xl:gap-2 gap-2.5">
                        <h5 class="font-semibold lg:text-base md:text-sm text-xs">NeruBedding - Silver Grey</h5>
                        <h6 class="lg:text-base md:text-sm text-xs flex justify-between items-center">Rp.500.000 <span class="lg:text-base md:text-sm text-xs bg-blue-Neru md:px-3 px-2 rounded-sm py-1 text-white font-medium">x1</span></h6>
                        <h6 class="lg:text-base md:text-sm text-xs">Berat Barang : 100g</h6>
                        <h6 class="lg:text-base md:text-sm text-xs gap-1 items-center text-green-500 lg:flex hidden">
                          Catatan
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                            <path d="M16 5l3 3"></path>
                            <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                          </svg>
                        </h6>
                        <h6 class="lg:text-base md:text-sm text-xs text-blue-Neru font-semibold">Beri Nilai</h6>
                      </span>
                    </div>
                  </div>
                  <hr class="mt-5" />
                  <div></div>
                  <div class="flex items-center justify-between">
                    <h6 class="items-center md:gap-4 gap-2 flex mt-2 lg:text-base md:text-sm text-xs">
                      Total Pesanan :
                      <span>Rp 500.000</span>
                    </h6>
                    <h6 class="gap-1 items-center text-green-500 mt-2 lg:hidden flex lg:text-base md:text-sm text-xs">
                      Catatan
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle md:W-6 w-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                        <path d="M16 5l3 3"></path>
                        <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                      </svg>
                    </h6>
                  </div>
                </div>
                <div class="cart-item bg-white lg:p-8 p-3">
                  <hr class="mb-5" />
                  <div class="flex md:gap-6 gap-4 items-center">
                    <img src="img/card-item-2.png" class="lg:w-[20%] md:w-[30%] w-[35%]" alt="" />
                    <div class="item-informations flex justify-between w-full">
                      <span class="flex flex-col 3xl:gap-5 2xl:gap-3 xl:gap-2 gap-2.5">
                        <h5 class="font-semibold lg:text-base md:text-sm text-xs">NeruBedding - Silver Grey</h5>
                        <h6 class="lg:text-base md:text-sm text-xs flex justify-between items-center">Rp.500.000 <span class="lg:text-base md:text-sm text-xs bg-blue-Neru md:px-3 px-2 rounded-sm py-1 text-white font-medium">x1</span></h6>
                        <h6 class="lg:text-base md:text-sm text-xs">Berat Barang : 100g</h6>
                        <h6 class="lg:text-base md:text-sm text-xs gap-1 items-center text-green-500 lg:flex hidden">
                          Catatan
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                            <path d="M16 5l3 3"></path>
                            <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                          </svg>
                        </h6>
                        <h6 class="lg:text-base md:text-sm text-xs text-blue-Neru font-semibold">Beri Nilai</h6>
                      </span>
                    </div>
                  </div>
                  <hr class="mt-5" />
                  <div></div>
                  <div class="flex items-center justify-between">
                    <h6 class="items-center md:gap-4 gap-2 flex mt-2 lg:text-base md:text-sm text-xs">
                      Total Pesanan :
                      <span>Rp 500.000</span>
                    </h6>
                    <h6 class="gap-1 items-center text-green-500 mt-2 lg:hidden flex lg:text-base md:text-sm text-xs">
                      Catatan
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle md:W-6 w-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                        <path d="M16 5l3 3"></path>
                        <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                      </svg>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Pesanan End -->
        </div>
      </div>
      <!-- Profile End -->
    </section>
    <section>
      <div id="notification" class="fixed bg-green-500 right-1/2 translate-x-1/2 md:text-base text-xs top-16 transition-all z-50 ease-in-out duration-300  text-white px-4 py-2 rounded-lg invisible ">
        Alamat Dipilih
      </div>
    </section>
    <?php include "layout/floatingButton.php" ?>
  </main>
  <?php include "layout/footer.php" ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="js/swiper.js"></script>
<script src="js/button.js"></script>
<script src="js/profile.js"></script>
<script src="js/nav.js"></script>
<script src="js/floatingbtn.js"></script>
<!-- <script>
  const pilihAlamat = document.querySelectorAll('.pilihAlamat');
  const alamatTerpilih = document.querySelectorAll('.alamatTerpilih');
  const userInformations = document.querySelectorAll('.user-informations');
  const notification = document.getElementById('notification');

  pilihAlamat.forEach((OtherToggle, index) => {
    OtherToggle.addEventListener("click", () => {
      // Menonaktifkan semua elemen alamat terpilih
      alamatTerpilih.forEach(alamat => {
        alamat.classList.add('non-active-locations');
      });

      // Menghapus kelas non-active-locations dari semua tombol pilih alamat
      pilihAlamat.forEach(pilih => {
        pilih.classList.remove('non-active-locations');
      });

      // Mengaktifkan alamat terpilih yang sesuai dengan tombol yang diklik
      alamatTerpilih[index].classList.remove('non-active-locations');

      // Menonaktifkan tombol pilih alamat yang diklik
      OtherToggle.classList.add('non-active-locations');

      // Mengubah kelas pada user informations
      userInformations.forEach((userInfo, idx) => {
        if (idx === index) {
          userInfo.classList.remove('locationsUnChoose');
          userInfo.classList.add('locationsChoose');
        } else {
          userInfo.classList.add('locationsUnChoose');
          userInfo.classList.remove('locationsChoose');
        }
      });

      // Menampilkan pesan "Alamat berhasil diubah"
      notification.classList.remove('invisible');
      notification.classList.add('animations');


      // Sembunyikan pesan setelah beberapa detik
      setTimeout(() => {
        notification.classList.add('invisible');
        notification.classList.remove('animations');
      }, 500); // Menampilkan pesan selama 1 detik
    });
  });

  // Menentukan index pertama memiliki kelas 'locationsChoose'
</script> -->
<script>
  function togglePasswordVisibility() {
    var passwordInputs = document.querySelectorAll('.passwordInput');
    var showPasswordBtns = document.querySelectorAll('.showPasswordBtn');

    showPasswordBtns.forEach(function(btn, index) {
      btn.addEventListener('click', function() {
        var input = passwordInputs[index];
        if (input.type === 'password') {
          input.type = 'text';
          // Mengubah ikon mata menjadi silau

        } else {
          input.type = 'password';
          // Mengubah ikon silau menjadi mata

        }
      });
    });
  }
  togglePasswordVisibility(); // Panggil fungsi ini untuk menginisialisasi
</script>
<script>
  const gambarInput = document.getElementById('gambarInput');
  const previewImage = document.getElementById('previewImage');

  gambarInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function() {
        previewImage.src = reader.result;
      }
      reader.readAsDataURL(file);
    }
  });
</script>

</html>