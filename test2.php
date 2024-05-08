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
                    <span id="qty" class="flex gap-2">
                      <span id="decrement" class="cursor-pointer bg-blue-Neru w-10 text-white h-10 flex items-center justify-center rounded-sm lg:text-base text-sm">-</span>
                      <input id="quantity" name="quantity_item" type="number" class="current-page w-10 h-10 text-center py-1 bg-white shadow-lg md:text-2xl text-sm outline-none border-blue-Neru border-[1px]" min="0" max="5" value="1" />
                      <span id="increment" class="cursor-pointer bg-blue-Neru w-10 text-white h-10 flex items-center justify-center rounded-sm lg:text-base text-sm">+</span>
                    </span>
                    <button type="submit" name="submit" id="addToCart" class="bg-blue-Neru w-full rounded-sm py-2 md:px-4 px-2 text-white lg:text-base text-sm flex gap-4 items-center justify-center">Tambah Ke keranjang</button>
              </form>


              <section class="addToCartSuccesfull">
      <div id="SuccesAddtoCart" class="container fixed top-10 z-10 transition-all ease-in-out duration-500 invisible opacity-0 flex right-1/2 w-fit translate-x-1/2">
        <div class="p-3 bg-white border-[1px] text-black border-blue-Neru text-center w-96 rounded-md flex flex-col gap-3">
          <?php
          if (isset($_SESSION["product_id"])) {
            $id_product = $_SESSION["product_id"];
            $showAddedItem = query("SELECT * FROM product WHERE product_id = $id_product")[0];
          }
          ?>
          <h6><?= $showAddedItem["product_name"] ?></h6>
          <h6>Total Quantity : <?= $_SESSION["quantity_item"] ?></h6>
          <h6 class="text-green-500">Berhasil Di tambahkan</h6>
        </div>
      </div>
    </section>


      <!-- pb-14 -->
  <?php
  include "layout/navbar.php";

  // Check if product_id is set in the URL
  if (isset($_GET["product_id"])) {
    $product_id = $_GET["product_id"];

    // Check if the form is submitted and user_id is set in session
    if (isset($_POST['submit']) && isset($_SESSION['user_id'])) {
      // Assign product_id to session
      $_SESSION['product_id'] = $product_id;
      $_SESSION['quantity_item'] = $_POST['quantity_item'];
      // Assign quantity_item to session

      $_SESSION['success_code'] = "success";
    }
  }


  $product_details = query("SELECT * FROM product WHERE product_id = '$product_id' ")[0];
  $productMultiImg = query("SELECT * FROM other_product_img WHERE product_id = '$product_id' AND status_multiImg = '1' ")[0];
  $other_product = query("SELECT * FROM product WHERE status = 1; ");


  var_dump($_SESSION['product_id'] && $_SESSION["user_id"]);



  ?>