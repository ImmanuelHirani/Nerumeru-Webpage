<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/output.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <title>Nerumeru | Cart</title>
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

  if (isset($_SESSION["user_id"])) {
    // Include your database connection file and create $conn object

    // Assuming you've sanitized your input, you can directly use $_SESSION["user_id"]
    $user_id = $_SESSION["user_id"];

    // Query to fetch locations with status = 1
    $query1 = "SELECT * FROM user_locations INNER JOIN user ON user_locations.user_id = user.user_id WHERE user_locations.user_id = ? AND status = 1";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("i", $user_id);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    // Check if there are any results with status = 1
    if ($result1->num_rows > 0) {
      // Fetch the first row as an associative array
      $location = $result1->fetch_assoc();
    }

    // Query to fetch all user locations
    $query2 = "SELECT * FROM user_locations INNER JOIN user ON user_locations.user_id = user.user_id WHERE user_locations.user_id = ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("i", $user_id);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    // Check if there are any results for all locations
    if ($result2->num_rows > 0) {
      $locations = array();

      while ($row = $result2->fetch_assoc()) {
        $locations[] = $row;
      }
    }
  } else {
    // If the user is not logged in, show an error message
    echo "<script>
      alert('Login Terlebih Dahulu');
      window.location.href = 'login_Register.php'; // Redirect using JavaScript
      </script>";
    exit(); // Stop PHP script execution after sending the error message
  }

  ?>
  <main>
    <section class="cart xl:mt-32 md:mt-28 mt-20">
      <div class="container flex flex-col gap-6">
        <div class="breadcrumb font-semibold">
          <ul class="flex gap-4 items-center md:text-base text-sm">
            <li><a href="index.php">Home > </a></li>
            <li><a href="cart.php" class="text-blue-Neru">Cart</a></li>
          </ul>
        </div>
        <div class="grid xl:grid-cols-7 md:grid-cols-8 grid-cols-4 lg:gap-4 gap-2">
          <div class="left-content md:col-span-5 col-span-4 flex flex-col gap-3">
            <div class="user-informations bg-white px-4 py-6 flex flex-col gap-4">
              <span class="flex justify-between items-center">
                <h5 class="font-semibold lg:text-base text-sm">Detail Pengeriman</h5>
                <button id="UbahAlamat" data-target="#BoxAlamat<?= $location["id"] ?>" class="lg:text-base text-sm flex gap-1 items-center text-green-500 cursor-pointer">
                  <h6>Ubah Details</h6>
                  <svg xmlns="http://www.w3.org/2000/svg" class="lg:w-6 md:w-5 w-4" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                    <path d="M16 5l3 3"></path>
                    <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                  </svg>
                  <!-- z-30 -->
                </button>
              </span>
              <hr />
              <?php if (empty($location)) : ?>
                <div class="wrapper flex flex-col items-center  gap-6">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-x" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 19.5l-5 -2.5l-6 3v-13l6 -3l6 3l6 -3v9" />
                    <path d="M9 4v13" />
                    <path d="M15 7v6.5" />
                    <path d="M22 22l-5 -5" />
                    <path d="M17 22l5 -5" />
                  </svg>
                  <h6 class="lg:text-base md:text-sm text-xs font-medium">Alamat Kosong / Lengkapi Alamat !</h6>
                </div>
              <?php else : ?>
                <div class="wrapper flex flex-col gap-6">
                  <span>
                    <h6 class="font-semibold lg:text-base text-sm">Nama & Telephone</h6>
                    <h6 class="font-light lg:text-base text-sm">
                      <span><?= $location["user_username_location"] ?></span><br />
                      <span>(<?= $location["user_phone_location"] ?>)</span>
                    </h6>
                  </span>
                  <span>
                    <h6 class="font-semibold lg:text-base text-sm">Alamat</h6>
                    <h6 class="font-light lg:text-base text-sm"><?= $location["user_location"] ?></h6>
                  </span>
                </div>
                <?php include "layout/modal/ModalLocationCart.php"; ?>
              <?php endif; ?>
              <hr />
              <button id="ToggleLocationsBoxSelector" class="relative overflow-hidden cursor-pointer self-end group text-blue-Neru border-2 border-blue-Neru md:px-5 px-4 py-1.5 rounded-lg">
                <span class="relative group-hover:z-20">
                  <h6 class="md:text-sm text-xs group-hover:text-white font-semibold">Pilih Alamat Lain?</h6>
                </span>
                <div class="z-10 w-full h-full rounded-md flex items-center justify-center text-white bg-blue-Neru absolute inset-x-0 top-0 -translate-x-full group-hover:translate-x-0 transition-all ease-linear duration-200"></div>
              </button>
            </div>
            <!-- <?php

                  $user_id = $_SESSION["user_id"];
                  $showAddedItem = query("
                SELECT * 
                FROM order_cart 
                INNER JOIN product ON order_cart.product_id = product.product_id 
                WHERE order_cart.user_id = $user_id
            ");
                  ?> -->
            <?php if (!empty($showAddedItem)) : ?>
              <?php foreach ($showAddedItem as $itemCart) : ?>
                <div class="cart-item bg-white lg:p-5 p-3">
                  <hr class="mb-5" />
                  <div class="flex md:gap-6 gap-4 items-center">
                    <img src="img/<?= htmlspecialchars($itemCart['product_img']) ?>" class="xl:w-[20%] md:w-[30%] w-[35%]" alt="" />
                    <div class="item-informations flex justify-between w-full">
                      <span class="flex flex-col 3xl:gap-5 2xl:gap-3 xl:gap-2 gap-2.5">
                        <h5 class="font-semibold lg:text-base md:text-sm text-xs line-clamp-2"><?= htmlspecialchars($itemCart['product_name']) ?></h5>
                        <h6 class="lg:text-base md:text-sm text-xs">
                          Rp.<?= number_format($itemCart['product_price'], 0, ',', '.') ?>
                        </h6>
                        <h6 class="lg:text-base md:text-sm text-xs">Berat Barang: <?= htmlspecialchars($itemCart['product_weight']) ?></h6>


                        <span id="qty" class="product_data flex gap-2">
                          <button name="decrement" class="decrement updateQty bg-blue-Neru text-white lg:w-10 md:w-6 w-6 lg:h-10 md:h-6 h-6 flex items-center justify-center rounded-sm lg:text-base text-sm">-</button>
                          <input type="hidden" name="item_id" class="prodId" value="<?= $itemCart['order_id'] ?>">
                          <input type="number" name="quantity" class="quantity current-page lg:w-10 md:w-6 w-6 lg:h-10 md:h-6 h-6 text-center py-1 bg-white xl:text-2xl text-sm outline-none border-blue-Neru border-[1px]" min="1" max="5" value="<?= htmlspecialchars($itemCart['order_quantity']) ?>" />
                          <button type="submit" name="increment " class="increment updateQty bg-blue-Neru text-white lg:w-10 md:w-6 w-6 lg:h-10 md:h-6 h-6 flex items-center justify-center rounded-sm lg:text-base text-sm">+</button>
                        </span>

                        <h6 class="lg:text-base md:text-sm text-xs gap-1 items-center text-green-500 lg:flex hidden">
                          Tulis Catatan
                          <svg xmlns="http://www.w3.org/2000/svg" class="lg:w-6 w-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                            <path d="M16 5l3 3"></path>
                            <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                          </svg>
                        </h6>
                      </span>
                      <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="hapus.php?order_id=<?= htmlspecialchars($itemCart['order_id']) ?>" class="items-center md:gap-4 gap-2 lg:text-base md:text-sm text-xs text-red-500 lg:flex hidden">
                        Delete
                        <svg xmlns="http://www.w3.org/2000/svg" class="lg:w-6 w-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M4 7l16 0"></path>
                          <path d="M10 11l0 6"></path>
                          <path d="M14 11l0 6"></path>
                          <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                          <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else : ?>
              <div class="cart-item bg-white lg:p-5 p-3 3xl:h-[145px] xl:h-[170px] md:h-[120px] h-[60px] flex flex-col justify-center items-center shadow-sm">
                <div class="flex md:gap-6 gap-4 items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-off">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    <path d="M17 17a2 2 0 1 0 2 2" />
                    <path d="M17 17h-11v-11" />
                    <path d="M9.239 5.231l10.761 .769l-1 7h-2m-4 0h-7" />
                    <path d="M3 3l18 18" />
                  </svg>
                  <h6 class="lg:text-base md:text-sm text-xs font-medium">Cart Kosong Yuk Belanja !</h6>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <div class="right-content xl:col-span-2 md:col-span-3 col-span-4">
            <div class="flex flex-col gap-3 sticky top-28">
              <div class="kurir bg-white px-4 py-6 flex flex-col gap-4">
                <span class="flex justify-between items-center">
                  <h5 class="font-semibold lg:text-base text-sm">Pilih Durasi</h5>
                  <h6 class="lg:text-base md:text-sm text-xs text-black flex items-center gap-1.5 relative cursor-pointer" id="durationCargo">
                    Reguler
                    <svg xmlns="http://www.w3.org/2000/svg" class="lg:w-5 w-4" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 9l6 6l6 -6"></path>
                    </svg>
                    <div class="durasiBox bg-white shadow-md p-2 absolute right-0 top-4 w-52 rounded-sm opacity-0 -z-10 transition-all ease-in-out duration-300 md:h-36 h-28 overflow-y-auto">
                      <h6 class="py-2 px-4 hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm text-xs">Reguler</h6>
                      <h6 class="py-2 px-4 hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm text-xs">Same Day</h6>
                      <h6 class="py-2 px-4 hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm text-xs">Cargo</h6>
                      <h6 class="py-2 px-4 hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm text-xs">Ekonomi</h6>
                    </div>
                  </h6>
                </span>
                <hr />
                <div class="wrapper flex items-center justify-between gap-6">
                  <span class="flex flex-col lg:gap-1 gap-1.5">
                    <h6 class="font-semibold lg:text-base text-sm">Kurir Pilihan</h6>
                    <h6 class="font-light lg:text-base text-xs infoKurir md:w-[85%] w-[50%]">J&T (Rp58.000) Estimasi tiba 16 - 20 Aug</h6>
                  </span>
                  <h6 class="text-black lg:text-base text-xs flex items-center lg:gap-1.5 cursor-pointer relative" id="CargoPilihan">
                    ubah <span class="lg:block hidden">kurir</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery lg:block hidden" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                      <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                      <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                      <path d="M3 9l4 0"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="lg:w-5 w-4" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 9l6 6l6 -6"></path>
                    </svg>
                    <div class="pilihanCargoBox bg-blue-water shadow-md p-2 absolute right-0 top-4 -z-10 opacity-0 lg:w-72 w-60 rounded-sm h-36 overflow-y-auto">
                      <h6 class="py-2 px-4 hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm text-xs">
                        GTL (Rp21.500) <br />
                        Estimasi tiba 10 - 12 Aug
                      </h6>
                      <h6 class="py-2 px-4 hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm text-xs">
                        SiCepat Gokil (Rp35.000) <br />
                        Estimasi tiba 10 - 14 Aug
                      </h6>
                      <h6 class="py-2 px-4 hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm text-xs">
                        JNE (Rp65.000) <br />
                        Estimasi tiba 17 - 21 Aug
                      </h6>
                      <h6 class="py-2 px-4 hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm text-xs">
                        J&T (Rp58.000) <br />
                        Estimasi tiba 16 - 20 Aug
                      </h6>
                    </div>
                  </h6>
                </div>
              </div>
              <div class="accordion-wrapper">
                <div class="accordion-header bg-blue-Neru cursor-pointer text-white px-4 py-4 relative">
                  <div class="wrap flex justify-between items-center">
                    <h5 class="font-semibold lg:text-base text-sm">Ringkasan Belanja</h5>
                    <svg xmlns="http://www.w3.org/2000/svg" class="lg:w-5 w-4" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 9l6 6l6 -6"></path>
                    </svg>
                  </div>
                </div>
                <div class="accordion-body bg-white shadow-sm">
                  <div class="content-wrapper py-4 px-4">
                    <?php if (!empty($showAddedItem)) : ?>
                      <div class="wrapper flex flex-col gap-4">
                        <div class="xl:h-[300px] h-[150px] overflow-y-auto flex flex-col gap-3 cart-container">
                          <!-- Cart items will be dynamically loaded here -->
                        </div>
                        <hr>
                        <span class="flex justify-between">
                          <h6 class="lg:text-base text-sm">Ongkir</h6>
                          <h6 class="lg:text-base text-sm">Rp -</h6>
                        </span>
                        <span class="flex justify-between">
                          <h6 class="lg:text-base text-sm">Total Belanja</h6>
                          <h6 id="totalBelanja" class="lg:text-base text-sm">Rp. -</h6>
                        </span>
                        <a id="checkoutToggle" class="bg-blue-Neru text-center  lg:p-2 py-2 px-2 text-white font-semibold rounded-md lg:text-base text-sm triggerBox cursor-pointer" type="button">Checkout Now </a>
                      </div>
                    <?php else : ?>
                      <div class="wrapper flex flex-col gap-4">
                        <div class="h-10 overflow-y-auto flex flex-col justify-center gap-3 cart-container">
                          <!-- Cart items will be dynamically loaded here -->
                        </div>
                        <hr>
                        <span class="flex justify-between">
                          <h6 class="lg:text-base text-sm">Ongkir</h6>
                          <h6 class="lg:text-base text-sm">Rp.-</h6>
                        </span>
                        <span class="flex justify-between">
                          <h6 class="lg:text-base text-sm">Total Belanja</h6>
                          <h6 id="totalBelanja" class="lg:text-base text-sm">Rp. -</h6>
                        </span>
                        <a id="checkoutToggle" class="bg-blue-Neru text-center   lg:p-2 py-2 px-2 text-white font-semibold rounded-md lg:text-base text-sm triggerBox cursor-pointer" type="button">Checkout Now </a>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include "layout/modal/ModalLocationsSelector.php" ?>
        <!-- Checkout Selection Payment -->
        <div class="text-start fixed inset-0 bg-black bg-opacity-0 flex justify-center items-center -z-20 text-black">
          <div id="PaymentBox" class="alamat-wrapper transition-all ease-in-out duration-300 opacity-0 bg-white lg:w-[30%] md:w-[70%] w-[90%] h-fit rounded-lg">
            <div class="p-4 flex justify-between">
              <h6>Pembayaran</h6>
              <svg xmlns="http://www.w3.org/2000/svg" class="closeBox w-6 cursor-pointer text-blue-Neru" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M18 6l-12 12"></path>
                <path d="M6 6l12 12"></path>
              </svg>
            </div>
            <hr />
            <div class="flex flex-col gap-3 p-4">
              <div class="flex justify-between items-center">
                <h6 class="md:text-base font-semibold text-xs capitalize">Metode Pembayaran</h6>
              </div>
              <div class="flex flex-col gap-4">
                <span class="flex justify-between">
                  <label for="BCA" name="BCA" class="">
                    <img src="img/BCA.png" class="md:w-[70%] w-[50%]" alt="" />
                  </label>
                  <input type="radio" id="BCA" name="paymentMethod" onchange="handleRadioChange(this)" />
                </span>
                <span class="flex justify-between">
                  <label for="MANDIRI" name="MANDIRI" class="">
                    <img src="img/MANDIRI.png" class="md:w-[70%] w-[50%]" alt="" />
                  </label>
                  <input type="radio" id="MANDIRI" name="paymentMethod" onchange="handleRadioChange(this)" />
                </span>
              </div>
            </div>
            <hr />
            <div class="flex flex-col gap-3 p-4">
              <div class="flex justify-between items-center">
                <h6 class="md:text-base font-semibold text-xs capitalize">Ringkasan Belanja</h6>
              </div>
              <div class="body flex flex-col gap-4 max-h-[180px] overflow-y-auto">
                <?php
                $totalBelanja = 0; // Inisialisasi total belanja
                foreach ($showAddedItem as $cartDetails) :
                  $subtotal = $cartDetails['product_price'] * $cartDetails['order_quantity'];
                  $totalBelanja += $subtotal;
                ?>
                  <hr>
                  <div class="flex flex-col gap-1.5 justify-between">
                    <h6 class="lg:text-base text-sm line-clamp-1"><?= $cartDetails['product_name'] ?></h6>
                    <div class="wrap-qunatity_total flex gap-3">
                      <h6>Price : Rp.<?= number_format($cartDetails["product_price"], 0, ',', ',') ?></h6>
                      <h6 class="text-red-500">X</h6>
                      <h6>Qty : <?= $cartDetails['order_quantity'] ?></h6>
                    </div>
                    <h6 class="lg:text-base text-sm">Subtotal : Rp.<?= number_format($subtotal, 0, ',', ',') ?></h6>
                  </div>
                <?php endforeach; ?>
                <hr>
              </div>
            </div>
            <div class="flex flex-col gap-3 p-4">
              <span class="flex justify-between font-semibold">
                <h6 class="lg:text-base text-sm">Total Belanja</h6>
                <?php if (!empty($showAddedItem)) : ?>
                  <h6 class="lg:text-base text-sm">Rp.<?= number_format($totalBelanja, 0, ',', '.') ?></h6>
                <?php else : ?>
                  <h6 class="lg:text-base text-sm">Rp.-</h6>
                <?php endif; ?>
              </span>
            </div>
            <hr />
            <div class="flex items-center justify-end">
              <a href="paymentWaitingList.php" class="text-center md:text-sm text-xs px-9 py-2 font-semibold capitalize bg-blue-Neru text-white closeBox cursor-pointer w-full rounded-lg rounded-t-none animate-pulse">Bayar</a>
            </div>
          </div>
        </div>
        <!-- Checkout Selection Payment End -->
    </section>
    <?php include "layout/floatingButton.php" ?>
  </main>
  <?php include "layout/footer.php" ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="js/swiper.js"></script>
<script src="js/button.js"></script>
<script src="js/nav.js"></script>
<script src="js/cart.js"></script>
<script src="js/accordion.js"></script>
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<script src="js/floatingbtn.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var locationsWrapper = document.querySelector('.wrapperLocationSelector');

    function setWrapperHeight() {
      // Get the number of locations
      var locationsCount = document.querySelectorAll('.user-informations').length;

      // Check if the number of locations is greater than 3
      if (locationsCount > 3 && window.innerWidth <= 480) { // Misalnya, batas untuk "ukuran mobile" adalah 768px
        // Change the max-h-screen to h-[600px]
        locationsWrapper.classList.remove('max-h-screen');
        locationsWrapper.classList.add('h-[600px]');
      } else {
        // Revert the styles if conditions are not met
        locationsWrapper.classList.remove('h-[600px]');
        locationsWrapper.classList.add('max-h-screen');
      }
    }

    // Call setWrapperHeight initially and on window resize
    setWrapperHeight();
    window.addEventListener('resize', setWrapperHeight);
  });
</script>
<script>
  // Get the input elements and the decrement and increment buttons
  var quantityInputs = document.querySelectorAll(".quantity");
  var decrementButtons = document.querySelectorAll(".decrement");
  var incrementButtons = document.querySelectorAll(".increment");

  // Add click event listeners to each decrement and increment button
  decrementButtons.forEach((button, index) => {
    button.addEventListener("click", function() {
      decrementQuantity(index);
    });
  });

  incrementButtons.forEach((button, index) => {
    button.addEventListener("click", function() {
      incrementQuantity(index);
    });
  });

  // Function to decrement the quantity
  function decrementQuantity(index) {
    var quantityInput = quantityInputs[index];
    var currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
      quantityInput.value = currentValue - 1;
    }
  }

  // Function to increment the quantity
  function incrementQuantity(index) {
    var quantityInput = quantityInputs[index];
    var currentValue = parseInt(quantityInput.value);
    var maxValue = parseInt(quantityInput.getAttribute("max"));
    if (currentValue < maxValue) {
      quantityInput.value = currentValue + 1;
    }
  }
</script>
<script>
  const TogglelocationsBoxSelector = document.getElementById("ToggleLocationsBoxSelector")
  const locationsBoxSelector = document.getElementById("locationSelectorBox")
  const CloseToggle = document.getElementById("closeBoxFeatUbahAlamatSelector")

  TogglelocationsBoxSelector.addEventListener("click", () => {
    TogglelocationsBoxSelector.classList.add("toggleActive");
    locationsBoxSelector.classList.remove("hidden");
  })

  CloseToggle.addEventListener("click", () => {
    locationsBoxSelector.classList.add("hidden")
  })
</script>
<!-- Script for updating quantity -->
<script>
  $(document).on('click', '.updateQty', function() {
    var qty = $(this).closest('.product_data').find('.quantity').val();
    var prod_id = $(this).closest('.product_data').find('.prodId').val();

    $.ajax({
      url: 'update_data_cart.php',
      method: "POST",
      data: {
        'order_id': prod_id,
        'order_quantity': qty
      },
      success: function(response) {
        updateCart();
      }
    });
  });
</script>

<!-- Script for updating cart dynamically -->
<script>
  function updateCart() {
    $.ajax({
      url: 'update_cart.php',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        var cartHtml = '';
        var totalBelanja = 0;
        data.items.forEach(function(item) {
          var subtotal = item.product_price * item.order_quantity;
          totalBelanja += subtotal;
          cartHtml += `
            <span class="flex flex-col gap-1.5 justify-between">
              <h6 class="lg:text-base text-sm line-clamp-2">Item Name : ${item.product_name}</h6>
              <span class="flex gap-1 items-center">
                <h6 class="lg:text-base text-sm">Product Price : Rp.${new Intl.NumberFormat('id-ID').format(item.product_price)} X</h6>
                <input class="w-[30px] h-[30px] outline-none" type="number" readonly value="${item.order_quantity}">
              </span>
              <h6 class="lg:text-base text-sm">Subtotal: Rp. ${new Intl.NumberFormat('id-ID').format(subtotal)}</h6>
            </span>
            <hr>`;
        });

        if (cartHtml === '') {
          cartHtml = `
            <span class="flex flex-col gap-1.5 justify-between items-center">
              <h6>Tidak Ada Product Yuk belanja !!</h6>
            </span>`;
        }

        $('.cart-container').html(cartHtml);
        $('#totalBelanja').text('Rp. ' + new Intl.NumberFormat('id-ID').format(totalBelanja));
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error('Error updating cart: ' + textStatus, errorThrown);
      }
    });
  }

  // Call updateCart function on page load
  $(document).ready(function() {
    updateCart();
  });
</script>



</html>