<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/output.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/css/magnify.css" />
  <title>Nerumeru | Details Product</title>
</head>

<body>
  <!-- pb-14 -->
  <?php
  include "layout/navbar.php";

  $product_id = $_GET["product_id"];

  $product_details = query("SELECT * FROM product WHERE product_id = '$product_id' ")[0];
  $productMultiImg = query("SELECT * FROM other_product_img WHERE product_id = '$product_id' AND status_multiImg = '1' ");

  if ($productMultiImg && count($productMultiImg) > 0) {
    // Jika ada baris yang dikembalikan oleh kueri
    $multiImage = $productMultiImg[0];
    // Lakukan sesuatu dengan $firstImage
  } else {
    // Jika tidak ada baris yang dikembalikan oleh kueri
    // Tidak ada gambar multi
  }


  $other_product = query("SELECT * FROM product WHERE status = 1; ");




  ?>
  <main>
    <section class="product-details md:mt-32">
      <div class="container">
        <div class="breadcrumb font-semibold">
          <ul class="flex gap-4">
            <li><a href="index.php">Home ></a></li>
            <li><a href="<?= $product_details["product_type"] ?>.php"><?= $product_details["product_type"] ?> ></a></li>
            <li><a href="" class="text-blue-Neru">Detail Product </a></li>
          </ul>
        </div>
        <div class="item mt-5 grid md:grid-cols-7 gap-10 grid-cols-1">
          <div class="left-content md:col-span-3 col-span-4">
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="img/<?= $product_details["product_img"] ?>" class="w-full 3xl:h-[650px] 2xl:h-[530px] xl:h-[480px] lg:h-[430px] md:h-[300px] h-[300px] object-contain bg-white shadow-md" alt="" />
                </div>
                <?php
                for ($i = 1; $i <= 3; $i++) {
                  $image_key = "product_img_$i";
                  $img_src = isset($multiImage[$image_key]) ? "img/{$multiImage[$image_key]}" : "img/Onerror/onigiri 3.jpg";
                ?>
                  <div class="swiper-slide">
                    <img src="<?= $img_src ?>" class="w-full 3xl:h-[650px] 2xl:h-[530px] xl:h-[480px] lg:h-[430px] md:h-[300px] h-[300px] object-contain bg-white shadow-md" alt="" />
                  </div>
                <?php } ?>
              </div>
              <div thumbsSlider="" class="swiper mySwiper mt-2">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img src="img/<?= $product_details["product_img"] ?>" class="cursor-pointer w-full object-contain 3xl:h-[160px] 2xl:h-[130px] xl:h-[120px] h-[75px] shadow-md  bg-white" alt="" />
                  </div>
                  <?php
                  for ($i = 1; $i <= 3; $i++) {
                    $image_key = "product_img_$i";
                    $img_src = isset($multiImage[$image_key]) ? "img/{$multiImage[$image_key]}" : "img/Onerror/onigiri 3.jpg";
                  ?>
                    <div class="swiper-slide">
                      <img src="<?= $img_src ?>" class="cursor-pointer w-full object-contain 3xl:h-[160px] 2xl:h-[130px] xl:h-[120px] h-[75px] shadow-md  bg-white" alt="" />
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>

          </div>
          <div class="right-content col-span-4">
            <div class="wrapper flex flex-col gap-4">
              <h2 class="font-bold lg:text-2xl md:text-xl text-lg"><?= $product_details["product_name"] ?></h2>
              <svg xmlns="http://www.w3.org/2000/svg" class="lg:w-28 md:w-20 w-16" viewBox="0 0 96 17" fill="none">
                <path d="M8.72727 0L11.0357 5.20317L17.0274 5.6535L12.4623 9.31956L13.857 14.8011L8.72727 11.8636L3.59751 14.8011L4.99222 9.31956L0.427143 5.6535L6.41888 5.20317L8.72727 0Z" fill="#FE8B75" />
                <path d="M28.364 0L30.6724 5.20317L36.6641 5.6535L32.0991 9.31956L33.4938 14.8011L28.364 11.8636L23.2342 14.8011L24.6289 9.31956L20.0639 5.6535L26.0556 5.20317L28.364 0Z" fill="#FE8B75" />
                <path d="M47.9997 0L50.3081 5.20317L56.2999 5.6535L51.7348 9.31956L53.1295 14.8011L47.9997 11.8636L42.87 14.8011L44.2647 9.31956L39.6996 5.6535L45.6913 5.20317L47.9997 0Z" fill="#FE8B75" />
                <path d="M67.6363 0L69.9447 5.20317L75.9365 5.6535L71.3714 9.31956L72.7661 14.8011L67.6363 11.8636L62.5066 14.8011L63.9013 9.31956L59.3362 5.6535L65.3279 5.20317L67.6363 0Z" fill="#FE8B75" />
                <path d="M87.2732 0L89.5816 5.20317L95.5733 5.6535L91.0082 9.31956L92.4029 14.8011L87.2732 11.8636L82.1434 14.8011L83.5381 9.31956L78.973 5.6535L84.9648 5.20317L87.2732 0Z" fill="#FE8B75" />
              </svg>
              <h6>Rp.<?= number_format($product_details["product_price"], 0, ',', ',') ?></h6>
              <h6 class="flex gap-2.5 items-center font-semibold lg:text-base md:text-sm text-[11px]">Stock <span class="stock bg-blue-Neru md:px-3 px-2.5 py-0.5 rounded-md text-white lg:text-base md:text-sm text-[11px]"><?= $product_details["product_stock"] ?></span></h6>
              <h6 class="flex gap-3">Weight <span><?= $product_details["product_weight"] ?></span></h6>
              <form action="" method="POST">
                <div class="quantity flex md:gap-3 gap-1.5">
                  <?php if (!isset($_SESSION["user_id"])) : ?>
                    <span id="qty" class="flex gap-2">
                      <button disabled id="decrement" class="bg-blue-Neru bg-opacity-50 w-10 text-white h-10 flex items-center justify-center rounded-sm lg:text-base text-sm">-</button>
                      <input disabled id="quantity" type="number" class="current-page w-10 h-10 bg-opacity-50 text-opacity-50 text-center py-1 bg-white shadow-lg md:text-2xl text-sm outline-none border-blue-Neru border-[1px]" min="0" max="5" value="1" />
                      <button disabled id="increment" class="bg-blue-Neru bg-opacity-50 w-10 text-white h-10 flex items-center justify-center rounded-sm lg:text-base text-sm">+</button>
                    </span>
                    <button id="addToCart" disabled class="bg-blue-Neru bg-opacity-50 w-full rounded-sm py-2 md:px-4 px-2 text-white lg:text-base text-sm flex gap-4 items-center justify-center">Tambah Ke keranjang</button>
                  <?php else : ?>
                    <?php


                    // Initialize array to store transactions
                    if (!isset($_SESSION['cart'])) {
                      $_SESSION['cart'] = array();
                    }

                    // Check if form has been submitted and user is logged in
                    if (isset($_POST['submit']) && isset($_SESSION['user_id'])) {
                      // You need to set this from your form
                      $product_id = $_GET['product_id'];

                      // Query to get product information
                      $showAddedItem = query("SELECT * FROM product WHERE product_id = $product_id");

                      // Ensure product is found
                      if ($showAddedItem) {
                        $product = $showAddedItem[0];

                        // Get product information from query result
                        $product_name = $product['product_name'];
                        $product_price = $product['product_price'];
                        $product_quantity = $_POST['quantity_item'];

                        // Check if product is already in the cart
                        $product_exists = false;
                        foreach ($_SESSION['cart'] as &$item) {
                          if ($item['product_id'] == $product_id) {
                            $product_exists = true;
                            // Set product quantity to the new value
                            $item['product_quantity'] = $product_quantity;
                            // Recalculate subtotal
                            $item['product_subtotal'] = $product_price * $product_quantity;
                            // Success message
                            $_SESSION['success_code'] = "success";
                            break;
                          }
                        }

                        // If product is not in the cart, add it
                        if (!$product_exists) {
                          // Check if product quantity exceeds 5
                          if ($product_quantity <= 5) {
                            // Calculate subtotal
                            $product_subtotal = $product_price * $product_quantity;

                            // Add product information to transaction array
                            $transaction_info = array(
                              'product_id' => $product_id,
                              'product_name' => $product_name,
                              'product_price' => $product_price,
                              'product_quantity' => $product_quantity,
                              'product_subtotal' => $product_subtotal
                            );

                            // Add transaction to cart
                            $_SESSION['cart'][] = $transaction_info;

                            // Success message
                            $_SESSION['success_code'] = "success";
                          } else {
                            // Error message if product quantity exceeds 5
                            echo "<script>alert('Anda tidak dapat menambahkan lebih dari 5 produk dalam satu kali transaksi.');</script>";
                          }
                        }
                      } else {
                        // Error message if product is not found
                        $_SESSION['error_message'] = "Produk tidak ditemukan.";
                      }
                    }

                    // Display array contents
                    var_dump($_SESSION['cart']);
                    ?>


                    <span id="qty" class="flex gap-2">
                      <span id="decrement" class="cursor-pointer bg-blue-Neru w-10 text-white h-10 flex items-center justify-center rounded-sm lg:text-base text-sm">-</span>
                      <input id="quantity" name="quantity_item" type="number" class="current-page w-10 h-10 text-center py-1 bg-white shadow-lg md:text-2xl text-sm outline-none border-blue-Neru border-[1px]" min="0" max="5" value="1" />
                      <span id="increment" class="cursor-pointer bg-blue-Neru w-10 text-white h-10 flex items-center justify-center rounded-sm lg:text-base text-sm">+</span>
                    </span>
                    <button type="submit" name="submit" id="addToCart" class="bg-blue-Neru w-full rounded-sm py-2 md:px-4 px-2 text-white lg:text-base text-sm flex gap-4 items-center justify-center">Tambah Ke keranjang</button>
              </form>
            <?php endif; ?>
            </div>
          </div>
          <div class="flex flex-col gap-0.5">
            <div class="accordion-wrapper mt-5">
              <div class="accordion-header cursor-pointer flex justify-between items-center bg-blue-Neru text-white px-4 lg:py-4 py-3 relative">
                <h3 class="font-medium lg:text-lg text-sm">PRODUCT SPECIFICATIONS</h3>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-caret-down md:w-7 w-4" viewBox="0 0 24 24" fill="white">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M6 10l6 6l6 -6h-12"></path>
                </svg>
              </div>
              <div class="accordion-body bg-white shadow-sm">
                <div class="content-wrapper p-4">
                  <span class="md:text-base text-sm">
                    <?= $product_details["product_specification"] ?>
                  </span>
                </div>
              </div>
            </div>
            <div class="accordion-wrapper">
              <div class="accordion-header cursor-pointer flex justify-between items-center bg-blue-Neru text-white px-4 lg:py-4 py-3 relative">
                <h3 class="font-medium lg:text-lg text-sm">WARRANTY</h3>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-caret-down md:w-7 w-4" viewBox="0 0 24 24" fill="white">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M6 10l6 6l6 -6h-12"></path>
                </svg>
              </div>
              <div class="accordion-body bg-white shadow-sm">
                <div class="content-wrapper p-4">
                  <span class="md:text-base text-sm"> <?= $product_details["product_warranty"] ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="other-product relative">
      <div class="container">
        <div class="title flex gap-2.5 flex-col lg:items-start items-center">
          <h3 class="font-extrabold 3xl:text-3xl 2xl:text-2xl md:text-2xl text-xl">OTHER PRODUCTS</h3>
          <hr class="3xl:w-20 2xl:w-16 md:w-14 w-10 md:border-8 border-[5px] border-blue-Neru rounded-sm" />
        </div>
        <div class="swiper my-10">
          <div class="otherProduct-Content">
            <div class="swiper-wrapper">
              <?php foreach ($other_product as $product_recommend) : ?>
                <!-- Item -->
                <div class="h-fit card-wrapper shadow-lg swiper-slide flex flex-col w-full gap-3 bg-white rounded-md transition-all ease-in-out duration-300">
                  <img src="img/<?= $product_recommend['product_img'] ?>" onclick="window.location.href ='detail-product.php?product_id=<?= $product_recommend['product_id'] ?>';" class="3xl:h-[370px] 2xl:h-[308px] md:h-[265px] rounded-b-none h-[170px] object-contain  cursor-pointer rounded-md w-full" alt="" />
                  <div class="card-body md:py-3 lg:h-40 md:h-36 h-[120px] py-2 3xl:px-6 2xl:px-4 xl:px-3 md:px-3.5 px-1.5 flex flex-col md:gap-2 gap-1">
                    <h6 class="font-medium flex flex-col lg:text-lg md:text-base text-[11px] line-clamp-2"><?= $product_recommend['product_name'] ?></h6>
                    <span class="flex justify-between items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="lg:w-28 md:w-20 w-16" viewBox="0 0 96 17" fill="none">
                        <path d="M8.72727 0L11.0357 5.20317L17.0274 5.6535L12.4623 9.31956L13.857 14.8011L8.72727 11.8636L3.59751 14.8011L4.99222 9.31956L0.427143 5.6535L6.41888 5.20317L8.72727 0Z" fill="#FE8B75" />
                        <path d="M28.364 0L30.6724 5.20317L36.6641 5.6535L32.0991 9.31956L33.4938 14.8011L28.364 11.8636L23.2342 14.8011L24.6289 9.31956L20.0639 5.6535L26.0556 5.20317L28.364 0Z" fill="#FE8B75" />
                        <path d="M47.9997 0L50.3081 5.20317L56.2999 5.6535L51.7348 9.31956L53.1295 14.8011L47.9997 11.8636L42.87 14.8011L44.2647 9.31956L39.6996 5.6535L45.6913 5.20317L47.9997 0Z" fill="#FE8B75" />
                        <path d="M67.6363 0L69.9447 5.20317L75.9365 5.6535L71.3714 9.31956L72.7661 14.8011L67.6363 11.8636L62.5066 14.8011L63.9013 9.31956L59.3362 5.6535L65.3279 5.20317L67.6363 0Z" fill="#FE8B75" />
                        <path d="M87.2732 0L89.5816 5.20317L95.5733 5.6535L91.0082 9.31956L92.4029 14.8011L87.2732 11.8636L82.1434 14.8011L83.5381 9.31956L78.973 5.6535L84.9648 5.20317L87.2732 0Z" fill="#FE8B75" />
                      </svg>
                      <h6 class="flex gap-2.5 items-center font-semibold lg:text-base md:text-sm text-[11px]">
                        Stock
                        <span class="stock bg-blue-Neru md:px-3 px-2.5 py-0.5 rounded-md text-white lg:text-base md:text-sm text-[11px]"><?= $product_recommend['product_stock'] ?></span>
                      </h6>
                    </span>
                    <h6 class="flex justify-between items-center mt-2 font-medium lg:text-lg md:text-sm text-[11px]">
                      <span>Rp.<?= number_format($product_recommend['product_price'], 0, ',', ',') ?></span>
                      <span class="relative">
                        <a class="cursor-pointer group">
                          <svg xmlns="http://www.w3.org/2000/svg" class="shareToggle bg-blue-Neru p-1.5 transition-all ease-in-out duration-300 rounded-full lg:w-7 md:w-6 w-[22px] text-white" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            <path d="M8.7 10.7l6.6 -3.4"></path>
                            <path d="M8.7 13.3l6.6 3.4"></path>
                          </svg>
                        </a>
                        <a href="copylink.html">
                          <svg xmlns="http://www.w3.org/2000/svg" class="waShare absolute top-0 lg:w-7 md:w-6 w-[22px] bg-blue-Neru rounded-full transition-all ease-in-out duration-300 -z-10 text-white p-1.5 left-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                            <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1"></path>
                          </svg>
                        </a>
                      </span>
                    </h6>
                  </div>
                </div>
                <!-- Item End -->
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-custom-nav absolute lg:-bottom-10 -bottom-5 right-1/2 translate-x-1/2 z-10 flex gap-4">
        <svg id="prev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42 42" class="md:w-12 w-10 transition-all ease-in-out duration-300 relative text-white opacity-30 hover:opacity-100" fill="none">
          <rect x="0.5" y="0.5" width="41" height="41" rx="20.5" stroke="#42454A" />
          <path d="M28 21H14M14 21L18 17M14 21L18 25" stroke="#42454A" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <svg id="next" xmlns="http://www.w3.org/2000/svg" class="md:w-12 w-10 text-white opacity-30 transition-all ease-in-out duration-300 hover:opacity-100 relative" viewBox="0 0 42 42" fill="none">
          <rect x="41.5" y="41.5" width="41" height="41" rx="20.5" transform="rotate(-180 41.5 41.5)" stroke="#42454A" />
          <path d="M14 21L28 21M28 21L24 25M28 21L24 17" stroke="#42454A" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
    </section>
    <section class="insta">
      <div class="container">
        <div class="title flex gap-2.5 flex-col lg:items-start items-center mb-10">
          <h3 class="font-extrabold 3xl:text-3xl 2xl:text-2xl md:text-2xl text-xl">instagram</h3>
          <hr class="3xl:w-20 2xl:w-16 md:w-14 w-10 md:border-8 border-[5px] border-blue-Neru rounded-sm" />
        </div>
        <div class="elfsight-app-74d2d199-22bd-44a0-8d1b-865bf0233c05" data-elfsight-app-lazy></div>
      </div>
    </section>
    <?php include "layout/floatingButton.php" ?>
    <section class="addToCartSuccesfull">
      <div id="SuccesAddtoCart" class="container fixed top-10 z-10 transition-all ease-in-out duration-500 invisible opacity-0 flex right-1/2 w-fit translate-x-1/2">
        <div class="p-3 bg-white border-[1px] text-black border-blue-Neru text-center w-96 rounded-md flex flex-col gap-3">
          <?php
          if (isset($_SESSION["cart"])) {
            // Ambil data terakhir dari keranjang
            $lastTransaction = end($_SESSION["cart"]);
            // Menampilkan informasi produk terakhir yang ditambahkan
            $product_name = $lastTransaction["product_name"];
            $product_quantity = $lastTransaction["product_quantity"];
          ?>
            <h6><?= $product_name ?></h6>
            <h6>Total Quantity : <?= $product_quantity ?></h6>
            <h6 class="text-green-500">Berhasil Ditambahkan</h6>
          <?php } ?>
        </div>

      </div>
    </section>
  </main>
  <?php include "layout/footer.php" ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="js/swiper.js"></script>
<script src="js/button.js"></script>
<script src="js/share.js"></script>
<script src="js/nav.js"></script>
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<script src="js/accordion.js"></script>
<script src="js/floatingbtn.js"></script>
<script>
  const addToCartToggler = document.getElementById("addToCart");
  const SuccesAddtoCartBox = document.getElementById("SuccesAddtoCart");

  // Periksa apakah $_SESSION['success_code'] diatur, jika ya, tampilkan kotak sukses
  <?php if (isset($_SESSION['success_code']) && $_SESSION['success_code'] === "success") { ?>
    SuccesAddtoCartBox.classList.add("BoxSuccesActiveCart");
    // Hapus $_SESSION['success_code'] setelah kotak sukses ditampilkan
    <?php unset($_SESSION['success_code']); ?>
    // Hapus kotak sukses setelah 2 detik
    setTimeout(() => {
      SuccesAddtoCartBox.classList.remove("BoxSuccesActiveCart");
    }, 2000);
  <?php } ?>
</script>

<script>
  // Get the input element and the decrement and increment buttons
  var quantityInput = document.getElementById("quantity");
  var decrementButton = document.getElementById("decrement");
  var incrementButton = document.getElementById("increment");

  // Add click event listeners to the decrement and increment buttons
  decrementButton.addEventListener("click", function() {
    decrementQuantity();
  });

  incrementButton.addEventListener("click", function() {
    incrementQuantity();
  });

  // Function to decrement the quantity
  function decrementQuantity() {
    var currentValue = parseInt(quantityInput.value);
    if (currentValue > 0) {
      quantityInput.value = currentValue - 1;
    }
  }

  // Function to increment the quantity
  function incrementQuantity() {
    var currentValue = parseInt(quantityInput.value);
    var maxValue = parseInt(quantityInput.getAttribute("max"));
    if (currentValue < maxValue) {
      quantityInput.value = currentValue + 1;
    }
  }
</script>




</html>