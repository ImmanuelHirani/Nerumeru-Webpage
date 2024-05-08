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
                    // Inisialisasi array untuk menyimpan transaksi
                    if (!isset($_SESSION['cart'])) {
                      $_SESSION['cart'] = array();
                    }

                    // Cek apakah form telah disubmit dan pengguna telah masuk
                    if (isset($_POST['submit']) && isset($_SESSION['user_id'])) {
                      // Anda perlu mengatur ini dari form Anda
                      $product_id = $_GET['product_id'];

                      // Query untuk mendapatkan informasi produk
                      $showAddedItem = query("SELECT * FROM product WHERE product_id = $product_id");

                      // Pastikan produk ditemukan
                      if ($showAddedItem) {
                        $product = $showAddedItem[0];

                        // Mendapatkan informasi produk dari hasil query
                        $product_name = $product['product_name'];
                        $product_price = $product['product_price'];
                        $product_quantity = $_POST['quantity_item'];

                        // Menghitung subtotal
                        $product_subtotal = $product_price * $product_quantity;

                        // Menambahkan informasi produk ke dalam array transaksi
                        $transaction_info = array(
                          'product_id' => $product_id,
                          'product_name' => $product_name,
                          'product_price' => $product_price,
                          'product_quantity' => $product_quantity,
                          'product_subtotal' => $product_subtotal
                        );

                        // Menambahkan transaksi ke keranjang
                        $_SESSION['cart'][] = $transaction_info;

                        // Pesan sukses
                        $_SESSION['success_code'] = "success";
                      } else {
                        // Pesan error jika produk tidak ditemukan
                        $_SESSION['error_message'] = "Produk tidak ditemukan.";
                      }
                    }

           
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