<?php

require "function.php";

if (!isset($_GET['type']) || !in_array($_GET['type'], ["Bedding", "Toys", "Sanitize", "Pillow", "Trolly"])) {
  echo "<script>document.location.href = 'Admin-Products.php';</script>";
  // exit;
} else {
  $type = $_GET['type'];
}

if (isset($_POST["submit"])) {
  if (insertProduct($_POST) > 0) {
    echo
    "<script>
        alert('Data berhasil di Tambahkan');
        document.location.href = 'Admin-Products.php';
    </script>";
  } else {
    echo
    "<script>
        alert('Data Gagal di Tambahkan');
        document.location.href = 'Admin-Products.php';
    </script>";
  }
}

?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/output.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <title>Nerumeru | Admin</title>
</head>

<body>
  <main class="my-0 flex overflow-hidden">
    <!-- Side Bar -->
    <?php include("layout/sidebar.admin.php"); ?>
    <!-- Side Bar end -->
    <section class="admin relative h-screen overflow-y-auto my-0 w-full">
      <div class="flex items-start justify-between">
        <!-- Main Menu -->
        <div class="flex flex-col gap-4 container">
          <?php include "layout/header-admin.php"; ?>
          <div class="w-full">
            <div class="container bg-white rounded-lg shadow-md h-fit flex flex-col gap-3 overflow-y-auto">
              <div class="WrapperBack mb-6 w-fit">
                <a href="Admin-Products.php" class="bg-blue-Neru w-fit text-white px-2 rounded-full py-2 cursor-pointer font-semibold text-base flex items-center gap-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" />
                  </svg>
                </a>
              </div>
              <form class="w-full" action="" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-6">
                  <div class="flex flex-col w-full gap-3">
                    <div class="w-full flex flex-col gap-4  bg-white-neru rounded-md border-2 p-3">
                      <img src="img/dog-pict.png" class=" mx-auto" alt="">
                      <label for="">Product Img <span class="text-red-500 font-medium">(Note : 2 Type File input file & link img)</span> </label>
                      <input required type="file" name="gambar" id="gambar">
                      <input class="w-full p-2 outline-none border-2" type="text" name="hero_img" />
                    </div>
                    <label for="">Product Type</label>
                    <input required class="w-full p-2 outline-none border-2" value="<?= $type ?>" name="product_type" placeholder="Product Type" readonly type="text" />
                    <label for="">Product Name</label>
                    <input required class="w-full p-2 outline-none border-2" name="product_name" placeholder="Product Name" type="text" />
                    <label for="">Product Stock</label>
                    <input required class="w-full p-2 outline-none border-2" name="product_stock" placeholder="Product Stock" type="number" />
                    <label for="">Product Color</label>
                    <input required class="w-full p-2 outline-none border-2" name="product_color" placeholder="Product Color" type="text" />
                  </div>
                  <div class="flex flex-col w-full gap-3">
                    <label for="">Product Price</label>
                    <input required class="w-full p-2 outline-none border-2" name="product_price" placeholder="Product Price" type="text" />
                    <label for="">Product Specification</label>
                    <textarea required class="p-2 outline-none border-2 text-start" name="product_specification" placeholder="Product Price" cols="30" rows="10"></textarea>
                    <label for="">Product Weight</label>
                    <input required class="w-full p-2 outline-none border-2" name="product_weight" placeholder="Product Weight" type="text" />
                    <label for="">Product Warranty</label>
                    <input required class="w-full p-2 outline-none border-2" name="product_warranty" placeholder="Product Warranty" type="text" />
                    <label for="">Product Rating</label>
                    <input required class="w-full p-2 outline-none border-2" name="product_rating" placeholder="Product Rating" type="Number" />
                    <label for="">Status Content</label>
                    <input required class="w-full p-2 outline-none border-2" name="status" value="0" readonly type="text" />
                    <button type="submit" name="submit" class="bg-green-400 p-2 rounded-md text-white font-semibold w-[25%] self-end">Tambah Data</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Main Menu End -->
      </div>
    </section>
  </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="js/swiper.js"></script>
<script src="js/button.js"></script>
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<script src="jsAdmin.js"></script>

</html>