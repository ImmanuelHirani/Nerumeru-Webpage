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
    <?php

    // Periksa apakah pengguna sudah login
    if (!isset($_SESSION['user_id'])) {
        echo "<script>
                alert('Login Terlebih Dahulu');
                window.location.href = 'login_Register.php'; // Redirect menggunakan JavaScript
              </script>";
        exit(); // Hentikan eksekusi skrip PHP setelah mengirimkan pesan kesalahan
    }


    ?>
    <!-- <?php
    $user_id = $_SESSION["user_id"];
    $showAddedItem = query("
    SELECT * 
    FROM order_cart 
    INNER JOIN product ON order_cart.product_id = product.product_id 
    WHERE order_cart.user_id = $user_id AND cart_status = 0
");
    ?> -->
    <main>
        <section class="paymentwatingList md:mt-32">
            <div class="container">
                <div class="font-semibold breadcrumb">
                    <ul class="flex items-center gap-4 text-sm md:text-base">
                        <li><a href="index.php">Home > </a></li>
                        <li><a href="cart.php">Cart > </a></li>
                        <li><a href="payment-method.php" class="text-blue-Neru"> Payment Method > </a></li>
                    </ul>
                </div>
                <div class="grid grid-cols-5 gap-6 mt-6">
                    <div class="col-span-5 lg:col-span-3">
                        <div class="wrapper rounded-lg border-[1px] border-grey-neru">
                            <div class="p-4 text-white rounded-lg rounded-b-none head bg-blue-Neru">
                                <h6 class="font-semibold">Methode Pembayaran</h6>
                            </div>
                            <hr class="border-grey-neru" />
                            <div class="flex flex-col gap-6 p-4 bg-white rounded-lg rounded-t-none body">
                                <div class="flex flex-col gap-2">
                                    <div class="flex flex-col gap-4">
                                        <span class="flex justify-between">
                                            <label for="BCA" name="BCA" class="">
                                                <img src="img/BCA.png" class="md:w-[100%] w-[50%]" alt="" />
                                            </label>
                                            <input type="radio" id="BCA" name="paymentMethod"
                                                onchange="handleRadioChange(this)" class="w-4" />
                                        </span>

                                        <span class="flex justify-between">
                                            <label for="MANDIRI" name="MANDIRI" class="">
                                                <img src="img/MANDIRI.png" class="md:w-[100%] w-[50%]" alt="" />
                                            </label>
                                            <input type="radio" id="MANDIRI" name="paymentMethod"
                                                onchange="handleRadioChange(this)" class="w-4" />
                                        </span>
                                    </div>
                                </div>
                                <hr>
                                <div class="flex flex-col gap-2">
                                    <h6>Total Pembayaran</h6>
                                    <?php
                                    // Initialize total
                                    $total = 0;

                                    // Calculate subtotal and total
                                    if (!empty($showAddedItem)) {
                                        foreach ($showAddedItem as $item) {
                                            $subtotal = $item['product_price'] * $item["order_quantity"];
                                            $total += $subtotal;
                                        }
                                    }
                                    ?>
                                    <span class="flex items-center justify-between">

                                        <h6 class="font-semibold">Rp.<?= number_format($total, 0) ?></h6>
                                        <a
                                            class="flex items-center gap-1 text-sm font-semibold cursor-pointer md:text-base text-blue-Neru">
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <span class="flex items-center gap-2 mt-2 text-center md:gap-4">
                            <a href="paymentWaitingList.php"
                                class="relative group overflow-hidden p-3 transition-all ease-in-out duration-700 hover:text-white text-blue-Neru rounded-lg w-full border-[1px] font-semibold border-blue-Neru md:text-sm text-xs">Cek
                                Status Pembayaran
                                <div
                                    class="absolute inset-x-0 top-0 flex items-center justify-center w-full h-full text-white transition-all duration-200 ease-linear -translate-x-full rounded-md -z-10 bg-blue-Neru group-hover:translate-x-0">
                                </div>
                            </a>
                            <button id="checkoutToggle" type="submit" name="checkout"
                                class="flex items-center justify-center w-full gap-3 p-3 text-xs font-semibold text-white rounded-lg bg-blue-Neru md:text-sm">
                                Lihat Detail
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-file-description" width="20" height="20"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                    </path>
                                    <path d="M9 17h6"></path>
                                    <path d="M9 13h6"></path>
                                </svg>
                            </button>
                        </span>
                    </div>
                    <div class="col-span-5 lg:col-span-2">

                    </div>
                </div>
            </div>
        </section>
        <?php include "layout/modal/ModalDetailsOrder.php" ?>
        <?php include "layout/floatingButton.php" ?>
    </main>
    <?php include "layout/footer.php" ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="js/swiper.js"></script>
<script src="js/button.js"></script>
<script src="js/nav.js"></script>

<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<script src="js/floatingbtn.js"></script>
<script>

    const checkoutToggle = document.getElementById("checkoutToggle");
    const PaymentBox = document.getElementById("PaymentBox");
    const PaymentBoxParent = PaymentBox.parentNode;
    const closeBox = document.querySelectorAll(".closeBox");


    closeBox.forEach((Otherclosebox) => {
        Otherclosebox.addEventListener("click", () => {
            checkoutToggle.classList.remove("active");
            PaymentBox.classList.remove("box-Cart-active");
            PaymentBoxParent.classList.remove("box-parent-active");
            document.body.classList.remove("overflow-hidden");
        });
    });

    checkoutToggle.addEventListener("click", () => {
        checkoutToggle.classList.add("active");
        PaymentBox.classList.add("box-Cart-active");
        PaymentBoxParent.classList.add("box-parent-active");
        document.body.classList.add("overflow-hidden");
    });
</script>
<!-- Checkout Selection Payment End -->






</html>