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
  <title>Nerumeru | Payment</title>
</head>

<body>
  <?php include "layout/navbar.php" ?>
  <main>
    <section class="paymentwatingList lg:mt-44 md:mt-32">
      <div class="container">
        <div class="font-semibold breadcrumb">
          <ul class="flex items-center gap-4 text-sm md:text-base">
            <li><a href="index.php">Home > </a></li>
            <li><a href="cart.php">Cart > </a></li>
            <li><a href="payment-method.php"> Payment Method > </a></li>
            <li><a href="paymentWaitingList.php" class="text-blue-Neru"> Payment Waiting list</a></li>
          </ul>
        </div>
        <div class="grid grid-cols-5 gap-6 mt-6">
          <div class="col-span-5 lg:col-span-3">
            <div class="wrapper rounded-lg border-[1px] border-grey-neru">
              <div class="p-4 text-white rounded-lg rounded-b-none head bg-blue-Neru">
                <h6 class="font-bold">BCA Virtual Account</h6>
              </div>
              <hr class="border-grey-neru" />
              <div class="flex flex-col gap-6 p-4 bg-white rounded-lg rounded-t-none body">
                <div class="flex flex-col gap-2">
                  <h6>Nomor Virtual Account</h6>
                  <span class="flex items-center justify-between">
                    <h6 class="font-bold">01872309818478179</h6>
                    <a href="" class="flex items-center gap-1 font-semibold text-blue-Neru">
                      Salin
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z"></path>
                        <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
                      </svg>
                    </a>
                  </span>
                </div>
                <div class="flex flex-col gap-2">
                  <h6>Total Pembayaran</h6>
                  <span class="flex items-center justify-between">
                    <h6 class="font-bold">Rp.9.000.000</h6>
                    <a href="" class="flex items-center gap-1 font-semibold text-blue-Neru">
                      Lihat Detail
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-description"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                        <path d="M9 17h6"></path>
                        <path d="M9 13h6"></path>
                      </svg>
                    </a>
                  </span>
                </div>
              </div>
            </div>
            <span class="flex items-center gap-1 mt-3 text-center md:gap-4">
              <a href=" payment-method.php"
                class="relative group overflow-hidden p-3 transition-all ease-in-out duration-300 hover:text-white text-blue-Neru rounded-lg w-full border-[1px] font-semibold border-blue-Neru md:text-sm text-[11px]">Payment
                Method
                <div
                  class="absolute inset-x-0 top-0 flex items-center justify-center w-full h-full text-white transition-all duration-200 ease-linear -translate-x-full rounded-md -z-10 bg-blue-Neru group-hover:translate-x-0">
                </div>
              </a>
              <a href=""
                class="p-3 bg-blue-Neru text-white rounded-lg w-full font-semibold md:text-sm text-[11px]">Belanja
                lagi</a>
            </span>
          </div>
          <div class="col-span-5 lg:col-span-2">
            <div class="wrapper py-4 bg-white rounded-lg border-[1px] border-grey-neru">
              <div class="flex flex-col gap-3 p-4 text-center bg-white rounded-lg rounded-t-none body">
                <h6>Selesaikan Pembayaran Dalam</h6>
                <h6 class="font-semibold text-blue-Neru">23:45:30</h6>
                <h6>Batas Akhir Pembayaran</h6>
                <h6 class="font-bold">Senin , 7 agustus 2023 07:24 AM</h6>
              </div>
            </div>
            <h6 class="my-4 font-semibold text-blue-Neru">Cara Pembayaran</h6>
            <div class="accordion-wrapper rounded-lg border-grey-neru border-[1px]" id="HowToPay">
              <div class="relative px-4 py-4 bg-white rounded-lg cursor-pointer accordion-header">
                <div class="flex items-center justify-between wrap">
                  <h5 class="text-sm font-semibold lg:text-base">ATM BCA</h5>
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 lg:w-5" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 9l6 6l6 -6"></path>
                  </svg>
                </div>
                <hr class="mt-4 border-grey-neru" />
              </div>
              <div class="bg-white rounded-lg shadow-sm accordion-body">
                <div class="p-4 content-wrapper">
                  <ul class="ml-4 flex flex-col gap-1.5">
                    <li>Masukkan Kartu ATM BCA & PIN</li>
                    <li>Pilih menu Transaksi Lainnya > Transfer > ke Rekening BCA Virtual Account</li>
                    <li>Masukkan 5 angka kode perusahaan untuk Tokopedia (80777) dan Nomor HP yang terdaftar di akun
                      Tokopedia Anda (Contoh: 80777081314801945)</li>
                    <li>Di halaman konfirmasi, pastikan detil pembayaran sudah sesuai seperti No WA, Nama,
                      Perusahaan/Produk dan Total Tagihan</li>
                    <li>Masukkan Jumlah Transfer sesuai dengan Total Tagihan</li>
                    <li>Ikuti instruksi untuk menyelesaikan transaksi</li>
                    <li>Simpan struk transaksi sebagai bukti pembayaran</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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

</html>