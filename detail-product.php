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
        <div class="font-semibold breadcrumb">
          <ul class="flex gap-4 text-sm md:text-base">
            <li><a href="index.php">Home ></a></li>
            <li><a href="<?= $product_details["product_type"] ?>.php"><?= $product_details["product_type"] ?> ></a></li>
            <li><a href="" class="text-blue-Neru">Detail Product </a></li>
          </ul>
        </div>
        <div class="grid w-full grid-cols-12 gap-6 mt-5 item">
          <div id="Product_img" class="col-span-12 left-content 2xl:col-span-4 md:col-span-6">
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="img/<?= $product_details["product_img"] ?>"
                    class="w-full 3xl:h-[480px] 2xl:h-[400px] xl:h-[480px] lg:h-[430px] md:h-[300px] h-[300px] object-contain bg-white shadow-md"
                    alt="" />
                </div>
                <?php
                for ($i = 1; $i <= 3; $i++) {
                  $image_key = "product_img_$i";
                  $img_src = isset($multiImage[$image_key]) ? "img/{$multiImage[$image_key]}" : "img/Onerror/onigiri 3.jpg";
                  ?>
                  <div class="swiper-slide">
                    <img src="<?= $img_src ?>"
                      class="w-full 3xl:h-[480px] 2xl:h-[400px] xl:h-[480px] lg:h-[430px] md:h-[300px] h-[300px] object-contain bg-white shadow-md"
                      alt="" />
                  </div>
                <?php } ?>
              </div>
              <div thumbsSlider="" class="mt-2 swiper mySwiper">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img src="img/<?= $product_details["product_img"] ?>"
                      class="cursor-pointer w-full object-contain 3xl:h-[120px] xl:h-[100px] h-[75px] shadow-md  bg-white"
                      alt="" />
                  </div>
                  <?php
                  for ($i = 1; $i <= 3; $i++) {
                    $image_key = "product_img_$i";
                    $img_src = isset($multiImage[$image_key]) ? "img/{$multiImage[$image_key]}" : "img/Onerror/onigiri 3.jpg";
                    ?>
                    <div class="swiper-slide">
                      <img src="<?= $img_src ?>"
                        class="cursor-pointer w-full object-contain 3xl:h-[120px] xl:h-[100px] h-[75px] shadow-md  bg-white"
                        alt="" />
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div id="Product_details" class="col-span-12 right-content 2xl:col-span-5 md:col-span-6">
            <div class="flex flex-col gap-4 wrapper">
              <h2 class="text-lg font-bold lg:text-2xl md:text-xl"><?= $product_details["product_name"] ?></h2>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-16 lg:w-28 md:w-20" viewBox="0 0 96 17" fill="none">
                <path
                  d="M8.72727 0L11.0357 5.20317L17.0274 5.6535L12.4623 9.31956L13.857 14.8011L8.72727 11.8636L3.59751 14.8011L4.99222 9.31956L0.427143 5.6535L6.41888 5.20317L8.72727 0Z"
                  fill="#FE8B75" />
                <path
                  d="M28.364 0L30.6724 5.20317L36.6641 5.6535L32.0991 9.31956L33.4938 14.8011L28.364 11.8636L23.2342 14.8011L24.6289 9.31956L20.0639 5.6535L26.0556 5.20317L28.364 0Z"
                  fill="#FE8B75" />
                <path
                  d="M47.9997 0L50.3081 5.20317L56.2999 5.6535L51.7348 9.31956L53.1295 14.8011L47.9997 11.8636L42.87 14.8011L44.2647 9.31956L39.6996 5.6535L45.6913 5.20317L47.9997 0Z"
                  fill="#FE8B75" />
                <path
                  d="M67.6363 0L69.9447 5.20317L75.9365 5.6535L71.3714 9.31956L72.7661 14.8011L67.6363 11.8636L62.5066 14.8011L63.9013 9.31956L59.3362 5.6535L65.3279 5.20317L67.6363 0Z"
                  fill="#FE8B75" />
                <path
                  d="M87.2732 0L89.5816 5.20317L95.5733 5.6535L91.0082 9.31956L92.4029 14.8011L87.2732 11.8636L82.1434 14.8011L83.5381 9.31956L78.973 5.6535L84.9648 5.20317L87.2732 0Z"
                  fill="#FE8B75" />
              </svg>
              <h6>Rp.<?= number_format($product_details["product_price"], 0, ',', ',') ?></h6>
              <h6 class="flex gap-3">Weight <span><?= $product_details["product_weight"] ?></span></h6>
            </div>
            <div class="flex flex-col gap-0.5">
              <div class="mt-5 accordion-wrapper">
                <div
                  class="relative flex items-center justify-between px-4 py-3 text-white cursor-pointer accordion-header bg-blue-Neru lg:py-4">
                  <h3 class="text-sm font-medium lg:text-base">PRODUCT SPECIFICATIONS</h3>
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 icon icon-tabler icon-tabler-caret-down md:w-7"
                    viewBox="0 0 24 24" fill="white">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 10l6 6l6 -6h-12"></path>
                  </svg>
                </div>
                <div class="bg-white shadow-sm accordion-body">
                  <div class="p-4 content-wrapper">
                    <span class="text-sm md:text-base">
                      <?= $product_details["product_specification"] ?>
                    </span>
                  </div>
                </div>
              </div>
              <div class="accordion-wrapper">
                <div
                  class="relative flex items-center justify-between px-4 py-3 text-white cursor-pointer accordion-header bg-blue-Neru lg:py-4">
                  <h3 class="text-sm font-medium lg:text-base">WARRANTY</h3>
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 icon icon-tabler icon-tabler-caret-down md:w-7"
                    viewBox="0 0 24 24" fill="white">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 10l6 6l6 -6h-12"></path>
                  </svg>
                </div>
                <div class="bg-white shadow-sm accordion-body">
                  <div class="p-4 content-wrapper">
                    <span class="text-sm md:text-base">
                      <?= $product_details["product_warranty"] ?>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="hidden h-full col-span-3 2xl:block end-content" id="note_product">
            <?php
            $product_id = $_GET["product_id"];

            if (isset($_POST["AddToCart"])) {
              // Check if the user is logged in
              if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];

                // Retrieve the product ID from the form
                $product_id = $_POST['product_id'];

                // Check if the product is already in the cart for the current user
                $existingCartItem = query("SELECT * FROM order_cart WHERE user_id = $user_id AND product_id = $product_id AND cart_status != 1 ");

                if ($existingCartItem) {
                  // Product already exists in the cart
                  echo "<script>alert('Item sudah ditambahkan sebelumnya.');</script>";
                } else {
                  // Product doesn't exist in the cart, proceed to add it
                  if (addtoCart($_POST) > 0) {
                    $_SESSION['success_code'] = "success";
                  }
                }
              } else {
                // User is not logged in, cannot add to cart
                echo "<script>alert('Anda harus login terlebih dahulu.');</script>";
              }
            }
            $success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : "";
            unset($_SESSION['success_message']);
            ?>

            <form action="" class="sticky top-28" method="POST">
              <input type="hidden" name="product_id" value="<?= $product_id ?>">
              <?php if (isset($_SESSION['user_id'])): ?>
                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
              <?php endif; ?>
              <input type="hidden" name="product_price" value="<?= $product_details['product_price'] ?>">
              <div
                class="p-3 bg-white border-[1px]  text-black border-blue-Neru text-center 3xl:w-full 2xl:w-fit rounded-md flex flex-col gap-3">
                <h6 class="self-start font-semibold">Atur Catatan & Jumlah </h6>
                <textarea
                  class="p-2 outline-none border-[1px] border-blue-Neru border-opacity-50 rounded-lg text-start resize-none"
                  name="order_note"
                  placeholder="Contoh : Warna Pink , Ukuran XXL Berikan Note Pada Happy birthday hiro ,  Dll..."
                  cols="30" rows="5"></textarea>
                <div class="quantity flex md:gap-3  justify-between gap-1.5">
                  <?php if (!isset($_SESSION["user_id"])): ?>
                    <span id="qty" class="flex gap-2">
                      <button disabled id="decrement"
                        class="flex items-center justify-center w-10 h-10 text-sm text-white bg-opacity-50 rounded-sm bg-blue-Neru lg:text-base">-</button>
                      <input disabled id="quantity" type="number"
                        class="current-page w-10 h-10 bg-opacity-50 text-opacity-50 text-center py-1 bg-white shadow-lg md:text-2xl text-sm outline-none border-blue-Neru border-[1px]"
                        min="0" max="5" value="1" />
                      <button disabled id="increment"
                        class="flex items-center justify-center w-10 h-10 text-sm text-white bg-opacity-50 rounded-sm bg-blue-Neru lg:text-base">+</button>
                    </span>
                    <h6 class="flex gap-2.5 items-center font-semibold lg:text-base md:text-sm text-[11px]">Stock
                      <span
                        class="stock bg-blue-Neru md:px-3 px-2.5 py-0.5 rounded-md text-white lg:text-base md:text-sm text-[11px]">
                        <?= $product_details["product_stock"] ?>
                      </span>
                    </h6>
                  <?php else: ?>
                    <span id="qty" class="flex gap-2">
                      <span id="decrement"
                        class="flex items-center justify-center w-10 h-10 text-sm text-white rounded-sm cursor-pointer bg-blue-Neru lg:text-base">-</span>
                      <input id="quantity" name="order_quantity" type="number"
                        class="current-page w-10 h-10 text-center py-1 bg-white shadow-lg md:text-2xl text-sm outline-none border-blue-Neru border-[1px]"
                        min="1" max="5" value="1" />
                      <span id="increment"
                        class="flex items-center justify-center w-10 h-10 text-sm text-white rounded-sm cursor-pointer bg-blue-Neru lg:text-base">+</span>
                    </span>
                    <h6 class="flex gap-2.5 items-center font-semibold lg:text-base md:text-sm text-[11px]">Stock
                      <span
                        class="stock bg-blue-Neru md:px-3 px-2.5 py-0.5 rounded-md text-white lg:text-base md:text-sm text-[11px]">
                        <?= $product_details["product_stock"] ?>
                      </span>
                    </h6>
                  <?php endif; ?>
                </div>
                <?php if (!isset($_SESSION["user_id"])): ?>
                  <button disabled type="submit" name="AddToCart" id="addToCart"
                    class="flex items-center justify-center w-full gap-4 px-2 py-2 text-sm text-white bg-opacity-50 rounded-sm bg-blue-Neru md:px-4 lg:text-base">+
                    keranjang</button>
                <?php else: ?>
                  <button type="submit" name="AddToCart" id="addToCart"
                    class="flex items-center justify-center w-full gap-4 px-2 py-2 text-sm text-white rounded-sm bg-blue-Neru md:px-4 lg:text-base">+
                    keranjang</button>
                <?php endif; ?>
                <?php if (!isset($_SESSION["user_id"])): ?>
                  <button disabled type="submit"
                    class="border-[1px]   transition-all ease-in-out duration-300 border-blue-Neru text-blue-Neru font-semibold w-full rounded-sm py-2 md:px-4 px-2  lg:text-base text-sm flex gap-4 items-center justify-center">Beli
                    Sekarang</button>
                <?php else: ?>
                  <button type="submit"
                    class="border-[1px] hover:bg-blue-Neru hover:text-white transition-all ease-in-out duration-300 border-blue-Neru text-blue-Neru font-semibold w-full rounded-sm py-2 md:px-4 px-2  lg:text-base text-sm flex gap-4 items-center justify-center">Beli
                    Sekarang</button>
                <?php endif; ?>
                <span class="flex justify-between ">
                  <h6 class="text-sm font-semibold md:text-base">Subtotal : </h6>
                  <h6 id="subtotal" class="text-sm font-semibold md:text-base">Rp.
                    <?= number_format($product_details["product_price"], 0, ',', ',') ?>
                  </h6>
                </span>
              </div>

            </form>
          </div>
        </div>
      </div>
    </section>
    <section class="product-review">
      <div class="container">
        <div class="title flex gap-2.5 flex-col lg:items-start items-center">
          <h3 class="text-xl font-extrabold 3xl:text-3xl 2xl:text-2xl md:text-2xl">PRODUCT REVIEW</h3>
          <hr class="3xl:w-20 2xl:w-16 md:w-14 w-10 md:border-8 border-[5px] border-blue-Neru rounded-sm" />
        </div>
        <div
          class="Wrap mt-9 flex flex-col gap-4 xl:max-h-[540px] md:max-h-[400px] max-h-[200px] md:pr-10 overflow-y-auto">
          <?php for ($i = 1; $i <= 5; $i++): ?>
            <div class="flex flex-col gap-4 box-review">
              <span class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 lg:w-28 md:w-20" viewBox="0 0 96 17" fill="none">
                  <path
                    d="M8.72727 0L11.0357 5.20317L17.0274 5.6535L12.4623 9.31956L13.857 14.8011L8.72727 11.8636L3.59751 14.8011L4.99222 9.31956L0.427143 5.6535L6.41888 5.20317L8.72727 0Z"
                    fill="#FE8B75" />
                  <path
                    d="M28.364 0L30.6724 5.20317L36.6641 5.6535L32.0991 9.31956L33.4938 14.8011L28.364 11.8636L23.2342 14.8011L24.6289 9.31956L20.0639 5.6535L26.0556 5.20317L28.364 0Z"
                    fill="#FE8B75" />
                  <path
                    d="M47.9997 0L50.3081 5.20317L56.2999 5.6535L51.7348 9.31956L53.1295 14.8011L47.9997 11.8636L42.87 14.8011L44.2647 9.31956L39.6996 5.6535L45.6913 5.20317L47.9997 0Z"
                    fill="#FE8B75" />
                  <path
                    d="M67.6363 0L69.9447 5.20317L75.9365 5.6535L71.3714 9.31956L72.7661 14.8011L67.6363 11.8636L62.5066 14.8011L63.9013 9.31956L59.3362 5.6535L65.3279 5.20317L67.6363 0Z"
                    fill="#FE8B75" />
                  <path
                    d="M87.2732 0L89.5816 5.20317L95.5733 5.6535L91.0082 9.31956L92.4029 14.8011L87.2732 11.8636L82.1434 14.8011L83.5381 9.31956L78.973 5.6535L84.9648 5.20317L87.2732 0Z"
                    fill="#FE8B75" />
                </svg>
                <h6 class="text-sm text-gray-400">2 month Ago</h6>
              </span>
              <div class="flex flex-col gap-4 wrap-user">
                <span class="flex items-center gap-3">
                  <img class="object-cover w-10 h-10 rounded-full"
                    src="https://asset.kompas.com/crops/3QcbIRoKn11P2lvzr4Ec5C26CGE=/0x0:0x0/750x500/data/photo/buku/61e6a27535e52.jpg"
                    alt="">
                  <h6 class="font-semibold">Immanuel Christian Hirani</h6>
                </span>
                <h6 class="text-justify">
                  I recently bought the [Product Name] and am very impressed. The product arrived in a sleek, protective
                  package with clear instructions, making unboxing enjoyable. Its elegant, modern design fits any setting,
                  and the durable, high-quality materials ensure long-lasting use. The ergonomic design provides comfort,
                  and the attention to detail is evident.
                </h6>
              </div>
              <hr class="border-[1.5px] border-gray-200">
            </div>
          <?php endfor; ?>
        </div>
      </div>
    </section>
    <section class="relative other-product">
      <div class="container">
        <div class="title flex gap-2.5 flex-col lg:items-start items-center">
          <h3 class="text-xl font-extrabold 3xl:text-3xl 2xl:text-2xl md:text-2xl">OTHER PRODUCTS</h3>
          <hr class="3xl:w-20 2xl:w-16 md:w-14 w-10 md:border-8 border-[5px] border-blue-Neru rounded-sm" />
        </div>
        <div class="my-10 swiper">
          <div class="otherProduct-Content">
            <div class="swiper-wrapper">
              <?php foreach ($other_product as $product_recommend): ?>
                <!-- Item -->
                <div
                  class="flex flex-col w-full gap-3 transition-all duration-300 ease-in-out bg-white rounded-md shadow-lg h-fit card-wrapper swiper-slide">
                  <img src="img/<?= $product_recommend['product_img'] ?>"
                    onclick="window.location.href ='detail-product.php?product_id=<?= $product_recommend['product_id'] ?>';"
                    class="3xl:h-[370px] 2xl:h-[308px] md:h-[265px] rounded-b-none h-[170px] object-contain  cursor-pointer rounded-md w-full"
                    alt="" />
                  <div
                    class="card-body md:py-3 lg:h-40 md:h-36 h-[120px] py-2 3xl:px-6 2xl:px-4 xl:px-3 md:px-3.5 px-1.5 flex flex-col md:gap-2 gap-1">
                    <h6 class="font-medium flex flex-col lg:text-lg md:text-base text-[11px] line-clamp-2">
                      <?= $product_recommend['product_name'] ?>
                    </h6>
                    <span class="flex items-center justify-between">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-16 lg:w-28 md:w-20" viewBox="0 0 96 17"
                        fill="none">
                        <path
                          d="M8.72727 0L11.0357 5.20317L17.0274 5.6535L12.4623 9.31956L13.857 14.8011L8.72727 11.8636L3.59751 14.8011L4.99222 9.31956L0.427143 5.6535L6.41888 5.20317L8.72727 0Z"
                          fill="#FE8B75" />
                        <path
                          d="M28.364 0L30.6724 5.20317L36.6641 5.6535L32.0991 9.31956L33.4938 14.8011L28.364 11.8636L23.2342 14.8011L24.6289 9.31956L20.0639 5.6535L26.0556 5.20317L28.364 0Z"
                          fill="#FE8B75" />
                        <path
                          d="M47.9997 0L50.3081 5.20317L56.2999 5.6535L51.7348 9.31956L53.1295 14.8011L47.9997 11.8636L42.87 14.8011L44.2647 9.31956L39.6996 5.6535L45.6913 5.20317L47.9997 0Z"
                          fill="#FE8B75" />
                        <path
                          d="M67.6363 0L69.9447 5.20317L75.9365 5.6535L71.3714 9.31956L72.7661 14.8011L67.6363 11.8636L62.5066 14.8011L63.9013 9.31956L59.3362 5.6535L65.3279 5.20317L67.6363 0Z"
                          fill="#FE8B75" />
                        <path
                          d="M87.2732 0L89.5816 5.20317L95.5733 5.6535L91.0082 9.31956L92.4029 14.8011L87.2732 11.8636L82.1434 14.8011L83.5381 9.31956L78.973 5.6535L84.9648 5.20317L87.2732 0Z"
                          fill="#FE8B75" />
                      </svg>
                      <h6 class="flex gap-2.5 items-center font-semibold lg:text-base md:text-sm text-[11px]">
                        Stock
                        <span
                          class="stock bg-blue-Neru md:px-3 px-2.5 py-0.5 rounded-md text-white lg:text-base md:text-sm text-[11px]"><?= $product_recommend['product_stock'] ?></span>
                      </h6>
                    </span>
                    <h6 class="flex justify-between items-center mt-2 font-medium lg:text-lg md:text-sm text-[11px]">
                      <span>Rp.<?= number_format($product_recommend['product_price'], 0, ',', ',') ?></span>
                      <span class="relative">
                        <a class="cursor-pointer group">
                          <svg xmlns="http://www.w3.org/2000/svg"
                            class="shareToggle bg-blue-Neru p-1.5 transition-all ease-in-out duration-300 rounded-full lg:w-7 md:w-6 w-[22px] text-white"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            <path d="M8.7 10.7l6.6 -3.4"></path>
                            <path d="M8.7 13.3l6.6 3.4"></path>
                          </svg>
                        </a>
                        <a href="copylink.html">
                          <svg xmlns="http://www.w3.org/2000/svg"
                            class="waShare absolute top-0 lg:w-7 md:w-6 w-[22px] bg-blue-Neru rounded-full transition-all ease-in-out duration-300 -z-10 text-white p-1.5 left-0"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                            <path
                              d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1">
                            </path>
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
      <div class="absolute z-10 flex gap-4 translate-x-1/2 swiper-custom-nav lg:-bottom-10 -bottom-5 right-1/2">
        <svg id="prev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42 42"
          class="relative w-10 text-white transition-all duration-300 ease-in-out md:w-12 opacity-30 hover:opacity-100"
          fill="none">
          <rect x="0.5" y="0.5" width="41" height="41" rx="20.5" stroke="#42454A" />
          <path d="M28 21H14M14 21L18 17M14 21L18 25" stroke="#42454A" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <svg id="next" xmlns="http://www.w3.org/2000/svg"
          class="relative w-10 text-white transition-all duration-300 ease-in-out md:w-12 opacity-30 hover:opacity-100"
          viewBox="0 0 42 42" fill="none">
          <rect x="41.5" y="41.5" width="41" height="41" rx="20.5" transform="rotate(-180 41.5 41.5)"
            stroke="#42454A" />
          <path d="M14 21L28 21M28 21L24 25M28 21L24 17" stroke="#42454A" stroke-linecap="round"
            stroke-linejoin="round" />
        </svg>
      </div>
    </section>
    <section class="insta">
      <div class="container">
        <div class="title flex gap-2.5 flex-col lg:items-start items-center mb-10">
          <h3 class="text-xl font-extrabold 3xl:text-3xl 2xl:text-2xl md:text-2xl">instagram</h3>
          <hr class="3xl:w-20 2xl:w-16 md:w-14 w-10 md:border-8 border-[5px] border-blue-Neru rounded-sm" />
        </div>
        <div class="elfsight-app-74d2d199-22bd-44a0-8d1b-865bf0233c05" data-elfsight-app-lazy></div>
      </div>
    </section>
    <?php include "layout/floatingButton.php" ?>
    <section class="addToCartSuccesfull">
      <div id="SuccesAddtoCart"
        class="container fixed z-10 flex invisible transition-all duration-500 ease-in-out translate-x-1/2 opacity-0 top-10 right-1/2 w-fit">
        <div
          class="p-3 bg-white border-[1px] text-black border-blue-Neru text-center w-96 h-24 justify-center items-center rounded-md flex flex-col gap-3">
          <h6 class="text-blue-Neru">Product Berhasil Ditambahkan</h6>
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
  document.addEventListener('DOMContentLoaded', (event) => {
    const SuccesAddtoCartBox = document.getElementById("SuccesAddtoCart");

    // Check if the success code is set in the session
    <?php if (isset($_SESSION['success_code']) && $_SESSION['success_code'] === "success") { ?>
      SuccesAddtoCartBox.classList.add("BoxSuccesActiveCart");
      // Remove the success code from the session
      <?php unset($_SESSION['success_code']); ?>
      // Hide the success box after 2 seconds
      setTimeout(() => {
        SuccesAddtoCartBox.classList.remove("BoxSuccesActiveCart");
      }, 2000);
    <?php } ?>
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get the input element and the decrement and increment buttons
    var quantityInput = document.getElementById("quantity");
    var decrementButton = document.getElementById("decrement");
    var incrementButton = document.getElementById("increment");
    var subtotalElement = document.getElementById("subtotal");

    // Add click event listeners to the decrement and increment buttons
    decrementButton.addEventListener("click", function () {
      decrementQuantity();
      updateSubtotal();
    });

    incrementButton.addEventListener("click", function () {
      incrementQuantity();
      updateSubtotal();
    });

    // Function to decrement the quantity
    function decrementQuantity() {
      var currentValue = parseInt(quantityInput.value);
      if (currentValue > 1) {
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

    // Function to update the subtotal
    function updateSubtotal() {
      const productPrice = <?= $product_details["product_price"] ?>;
      const quantity = parseInt(quantityInput.value);
      const subtotal = productPrice * quantity;
      subtotalElement.textContent = 'Rp. ' + subtotal.toLocaleString('id-ID');
    }
  });
</script>





</html>