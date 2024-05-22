<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/output.css" />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
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
    <section class="mt-20 cart xl:mt-32 md:mt-28">
      <div class="container flex flex-col gap-6">
        <div class="font-semibold breadcrumb">
          <ul class="flex items-center gap-4 text-sm md:text-base">
            <li><a href="index.php">Home > </a></li>
            <li><a href="cart.php" class="text-blue-Neru">Cart</a></li>
          </ul>
        </div>
        <div class="grid grid-cols-4 gap-2 xl:grid-cols-7 md:grid-cols-8 lg:gap-4">
          <div class="flex flex-col col-span-4 gap-3 left-content md:col-span-5">
            <div class="flex flex-col gap-4 px-4 py-6 bg-white user-informations">
              <span class="flex items-center justify-between">
                <h5 class="text-sm font-semibold lg:text-base">Detail Pengeriman</h5>
                <button id="UbahAlamat" data-target="#BoxAlamat<?= $location["id"] ?>"
                  class="flex items-center gap-1 text-sm text-green-500 cursor-pointer lg:text-base">
                  <h6>Ubah Details</h6>
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 lg:w-6 md:w-5" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                    <path d="M16 5l3 3"></path>
                    <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                  </svg>
                  <!-- z-30 -->
                </button>
              </span>
              <hr />
              <?php if (empty($location)): ?>
                <div class="flex flex-col items-center gap-6 wrapper">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-x" width="28"
                    height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 19.5l-5 -2.5l-6 3v-13l6 -3l6 3l6 -3v9" />
                    <path d="M9 4v13" />
                    <path d="M15 7v6.5" />
                    <path d="M22 22l-5 -5" />
                    <path d="M17 22l5 -5" />
                  </svg>
                  <h6 class="text-xs font-medium lg:text-base md:text-sm">Alamat Kosong / Lengkapi Alamat !</h6>
                </div>
              <?php else: ?>
                <div class="flex flex-col gap-6 wrapper">
                  <span>
                    <h6 class="text-sm font-semibold lg:text-base">Nama & Telephone</h6>
                    <h6 class="text-sm font-light lg:text-base">
                      <span><?= $location["user_username_location"] ?></span><br />
                      <span>(<?= $location["user_phone_location"] ?>)</span>
                    </h6>
                  </span>
                  <span>
                    <h6 class="text-sm font-semibold lg:text-base">Alamat</h6>
                    <h6 class="text-sm font-light lg:text-base"><?= $location["user_location"] ?></h6>
                  </span>
                </div>
                <?php include "layout/modal/ModalLocationCart.php"; ?>
              <?php endif; ?>
              <hr />
              <button id="ToggleLocationsBoxSelector"
                class="relative overflow-hidden cursor-pointer self-end group text-blue-Neru border-2 border-blue-Neru md:px-5 px-4 py-1.5 rounded-lg">
                <span class="relative group-hover:z-20">
                  <h6 class="text-xs font-semibold md:text-sm group-hover:text-white">Pilih Alamat Lain?</h6>
                </span>
                <div
                  class="absolute inset-x-0 top-0 z-10 flex items-center justify-center w-full h-full text-white transition-all duration-200 ease-linear -translate-x-full rounded-md bg-blue-Neru group-hover:translate-x-0">
                </div>
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
            <?php if (!empty($showAddedItem)): ?>
              <?php foreach ($showAddedItem as $itemCart): ?>
                <div class="p-3 bg-white cart-item lg:p-5">
                  <hr class="mb-5" />
                  <div class="flex items-center gap-4 md:gap-6">
                    <img src="img/<?= htmlspecialchars($itemCart['product_img']) ?>" class="xl:w-[20%] md:w-[30%] w-[35%]"
                      alt="" />
                    <div class="flex justify-between w-full item-informations">
                      <span class="flex flex-col 3xl:gap-5 2xl:gap-3 xl:gap-2 gap-2.5">
                        <h5 class="text-xs font-semibold lg:text-base md:text-sm line-clamp-2">
                          <?= htmlspecialchars($itemCart['product_name']) ?>
                        </h5>
                        <h6 class="text-xs lg:text-base md:text-sm">
                          Rp.<?= number_format($itemCart['product_price'], 0, ',', '.') ?>
                        </h6>
                        <h6 class="text-xs lg:text-base md:text-sm">Berat Barang:
                          <?= htmlspecialchars($itemCart['product_weight']) ?>
                        </h6>


                        <span id="qty" class="flex gap-2 product_data">
                          <button name="decrement"
                            class="flex items-center justify-center w-6 h-6 text-sm text-white rounded-sm decrement updateQty bg-blue-Neru lg:w-10 md:w-6 lg:h-10 md:h-6 lg:text-base">-</button>
                          <input type="hidden" name="item_id" class="prodId" value="<?= $itemCart['order_id'] ?>">
                          <input type="number" name="quantity"
                            class="quantity current-page lg:w-10 md:w-6 w-6 lg:h-10 md:h-6 h-6 text-center py-1 bg-white xl:text-2xl text-sm outline-none border-blue-Neru border-[1px]"
                            min="1" max="5" value="<?= htmlspecialchars($itemCart['order_quantity']) ?>" />
                          <button type="submit" name="increment "
                            class="flex items-center justify-center w-6 h-6 text-sm text-white rounded-sm increment updateQty bg-blue-Neru lg:w-10 md:w-6 lg:h-10 md:h-6 lg:text-base">+</button>
                        </span>

                        <h6 class="items-center hidden gap-1 text-xs text-green-500 lg:text-base md:text-sm lg:flex">
                          Tulis Catatan
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 lg:w-6" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                            <path d="M16 5l3 3"></path>
                            <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                          </svg>
                        </h6>
                      </span>
                      <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                        href="hapus.php?order_id=<?= htmlspecialchars($itemCart['order_id']) ?>"
                        class="items-center hidden gap-2 text-xs text-red-500 md:gap-4 lg:text-base md:text-sm lg:flex">
                        Delete
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 lg:w-6" viewBox="0 0 24 24" stroke-width="2"
                          stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
            <?php else: ?>
              <div
                class="cart-item bg-white lg:p-5 p-3 3xl:h-[145px] xl:h-[170px] md:h-[120px] h-[60px] flex flex-col justify-center items-center shadow-sm">
                <div class="flex items-center justify-center gap-4 md:gap-6">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-off">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    <path d="M17 17a2 2 0 1 0 2 2" />
                    <path d="M17 17h-11v-11" />
                    <path d="M9.239 5.231l10.761 .769l-1 7h-2m-4 0h-7" />
                    <path d="M3 3l18 18" />
                  </svg>
                  <h6 class="text-xs font-medium lg:text-base md:text-sm">Cart Kosong Yuk Belanja !</h6>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <div class="col-span-4 right-content xl:col-span-2 md:col-span-3">
            <div class="sticky flex flex-col gap-3 top-28">
              <div class="flex flex-col gap-4 px-4 py-6 bg-white kurir">
                <span class="flex items-center justify-between">
                  <h5 class="text-sm font-semibold lg:text-base">Pilih Durasi</h5>
                  <h6
                    class="lg:text-base md:text-sm text-xs text-black flex items-center gap-1.5 relative cursor-pointer"
                    id="durationCargo">
                    Reguler
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 lg:w-5" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 9l6 6l6 -6"></path>
                    </svg>
                    <div
                      class="absolute right-0 p-2 overflow-y-auto transition-all duration-300 ease-in-out bg-white rounded-sm shadow-md opacity-0 durasiBox top-4 w-52 -z-10 md:h-36 h-28">
                      <h6 class="px-4 py-2 text-xs hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm">Reguler
                      </h6>
                      <h6 class="px-4 py-2 text-xs hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm">Same Day
                      </h6>
                      <h6 class="px-4 py-2 text-xs hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm">Cargo</h6>
                      <h6 class="px-4 py-2 text-xs hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm">Ekonomi
                      </h6>
                    </div>
                  </h6>
                </span>
                <hr />
                <div class="flex items-center justify-between gap-6 wrapper">
                  <span class="flex flex-col lg:gap-1 gap-1.5">
                    <h6 class="text-sm font-semibold lg:text-base">Kurir Pilihan</h6>
                    <h6 class="font-light lg:text-base text-xs infoKurir md:w-[85%] w-[50%]">J&T (Rp58.000) Estimasi
                      tiba 16 - 20 Aug</h6>
                  </span>
                  <h6 class="text-black lg:text-base text-xs flex items-center lg:gap-1.5 cursor-pointer relative"
                    id="CargoPilihan">
                    ubah <span class="hidden lg:block">kurir</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                      class="hidden icon icon-tabler icon-tabler-truck-delivery lg:block" width="16" height="16"
                      viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                      stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                      <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                      <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                      <path d="M3 9l4 0"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 lg:w-5" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 9l6 6l6 -6"></path>
                    </svg>
                    <div
                      class="absolute right-0 p-2 overflow-y-auto rounded-sm shadow-md opacity-0 pilihanCargoBox bg-blue-water top-4 -z-10 lg:w-72 w-60 h-36">
                      <h6 class="px-4 py-2 text-xs hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm">
                        GTL (Rp21.500) <br />
                        Estimasi tiba 10 - 12 Aug
                      </h6>
                      <h6 class="px-4 py-2 text-xs hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm">
                        SiCepat Gokil (Rp35.000) <br />
                        Estimasi tiba 10 - 14 Aug
                      </h6>
                      <h6 class="px-4 py-2 text-xs hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm">
                        JNE (Rp65.000) <br />
                        Estimasi tiba 17 - 21 Aug
                      </h6>
                      <h6 class="px-4 py-2 text-xs hover:bg-black hover:bg-opacity-5 lg:text-base md:text-sm">
                        J&T (Rp58.000) <br />
                        Estimasi tiba 16 - 20 Aug
                      </h6>
                    </div>
                  </h6>
                </div>
              </div>
              <div class="accordion-wrapper">
                <div class="relative px-4 py-4 text-white cursor-pointer accordion-header bg-blue-Neru">
                  <div class="flex items-center justify-between wrap">
                    <h5 class="text-sm font-semibold lg:text-base">Ringkasan Belanja</h5>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 lg:w-5" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 9l6 6l6 -6"></path>
                    </svg>
                  </div>
                </div>
                <div class="bg-white shadow-sm accordion-body">
                  <div class="px-4 py-4 content-wrapper">
                    <?php if (!empty($showAddedItem)): ?>
                      <div class="flex flex-col gap-4 wrapper">
                        <div class="xl:h-[300px] h-[150px] overflow-y-auto flex flex-col gap-3 cart-container">
                          <!-- Cart items will be dynamically loaded here -->
                        </div>
                        <hr>
                        <span class="flex justify-between">
                          <h6 class="text-sm lg:text-base">Ongkir</h6>
                          <h6 class="text-sm lg:text-base">Rp -</h6>
                        </span>
                        <span class="flex justify-between">
                          <h6 class="text-sm lg:text-base">Total Belanja</h6>
                          <h6 id="totalBelanja" class="text-sm lg:text-base">Rp. -</h6>
                        </span>
                        <a id="checkoutToggle"
                          class="px-2 py-2 text-sm font-semibold text-center text-white rounded-md cursor-pointer bg-blue-Neru lg:p-2 lg:text-base triggerBox"
                          type="button">Checkout Now </a>
                      </div>
                    <?php else: ?>
                      <div class="flex flex-col gap-4 wrapper">
                        <div class="flex flex-col justify-center h-10 gap-3 overflow-y-auto cart-container">
                          <!-- Cart items will be dynamically loaded here -->
                        </div>
                        <hr>
                        <span class="flex justify-between">
                          <h6 class="text-sm lg:text-base">Ongkir</h6>
                          <h6 class="text-sm lg:text-base">Rp.-</h6>
                        </span>
                        <span class="flex justify-between">
                          <h6 class="text-sm lg:text-base">Total Belanja</h6>
                          <h6 id="totalBelanja" class="text-sm lg:text-base">Rp. -</h6>
                        </span>
                        <a id="checkoutToggle"
                          class="px-2 py-2 text-sm font-semibold text-center text-white rounded-md cursor-pointer bg-blue-Neru lg:p-2 lg:text-base triggerBox"
                          type="button">Checkout Now </a>
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
        <div class="fixed inset-0 flex items-center justify-center text-black bg-black bg-opacity-0 text-start -z-20">
          <div id="PaymentBox"
            class="alamat-wrapper transition-all ease-in-out duration-300 opacity-0 bg-white lg:w-[30%] md:w-[70%] w-[90%] h-fit rounded-lg">
            <div class="flex justify-between p-4">
              <h6>Pembayaran</h6>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 cursor-pointer closeBox text-blue-Neru"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M18 6l-12 12"></path>
                <path d="M6 6l12 12"></path>
              </svg>
            </div>
            <hr />
            <div class="flex flex-col gap-3 p-4">
              <div class="flex items-center justify-between">
                <h6 class="text-xs font-semibold capitalize md:text-base">Metode Pembayaran</h6>
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
              <div class="flex items-center justify-between">
                <h6 class="text-xs font-semibold capitalize md:text-base">Ringkasan Belanja</h6>
              </div>
              <div class="body flex flex-col gap-4 max-h-[180px] overflow-y-auto">
                <?php
                $totalBelanja = 0; // Inisialisasi total belanja
                foreach ($showAddedItem as $cartDetails):
                  $subtotal = $cartDetails['product_price'] * $cartDetails['order_quantity'];
                  $totalBelanja += $subtotal;
                  ?>
                  <hr>
                  <div class="flex flex-col gap-1.5 justify-between">
                    <h6 class="text-sm lg:text-base line-clamp-1"><?= $cartDetails['product_name'] ?></h6>
                    <div class="flex gap-3 wrap-qunatity_total">
                      <h6>Price : Rp.<?= number_format($cartDetails["product_price"], 0, ',', ',') ?></h6>
                      <h6 class="text-red-500">X</h6>
                      <h6>Qty : <?= $cartDetails['order_quantity'] ?></h6>
                    </div>
                    <h6 class="text-sm lg:text-base">Subtotal : Rp.<?= number_format($subtotal, 0, ',', ',') ?></h6>
                  </div>
                <?php endforeach; ?>
                <hr>
              </div>
            </div>
            <div class="flex flex-col gap-3 p-4">
              <span class="flex justify-between font-semibold">
                <h6 class="text-sm lg:text-base">Total Belanja</h6>
                <?php if (!empty($showAddedItem)): ?>
                  <h6 class="text-sm lg:text-base">Rp.<?= number_format($totalBelanja, 0, ',', '.') ?></h6>
                <?php else: ?>
                  <h6 class="text-sm lg:text-base">Rp.-</h6>
                <?php endif; ?>
              </span>
            </div>
            <hr />
            <div class="flex items-center justify-end">
              <a href="paymentWaitingList.php"
                class="w-full py-2 text-xs font-semibold text-center text-white capitalize rounded-lg rounded-t-none cursor-pointer md:text-sm px-9 bg-blue-Neru closeBox animate-pulse">Bayar</a>
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
  document.addEventListener("DOMContentLoaded", function () {
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
    button.addEventListener("click", function () {
      decrementQuantity(index);
    });
  });

  incrementButtons.forEach((button, index) => {
    button.addEventListener("click", function () {
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
  $(document).on('click', '.updateQty', function () {
    var qty = $(this).closest('.product_data').find('.quantity').val();
    var prod_id = $(this).closest('.product_data').find('.prodId').val();

    $.ajax({
      url: 'update_data_cart.php',
      method: "POST",
      data: {
        'order_id': prod_id,
        'order_quantity': qty
      },
      success: function (response) {
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
      success: function (data) {
        var cartHtml = '';
        var totalBelanja = 0;
        data.items.forEach(function (item) {
          var subtotal = item.product_price * item.order_quantity;
          totalBelanja += subtotal;
          cartHtml += `
            <span class="flex flex-col gap-1.5 justify-between">
              <h6 class="text-sm lg:text-base line-clamp-2">Item Name : ${item.product_name}</h6>
              <span class="flex items-center gap-1">
                <h6 class="text-sm lg:text-base">Product Price : Rp.${new Intl.NumberFormat('id-ID').format(item.product_price)} X</h6>
                <input class="w-[30px] h-[30px] outline-none" type="number" readonly value="${item.order_quantity}">
              </span>
              <h6 class="text-sm lg:text-base">Subtotal: Rp. ${new Intl.NumberFormat('id-ID').format(subtotal)}</h6>
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
      error: function (jqXHR, textStatus, errorThrown) {
        console.error('Error updating cart: ' + textStatus, errorThrown);
      }
    });
  }

  // Call updateCart function on page load
  $(document).ready(function () {
    updateCart();
  });
</script>



</html>