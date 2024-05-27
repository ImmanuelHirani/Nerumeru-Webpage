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
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <title>Nerumeru | Admin</title>
</head>

<body>
  <main class="flex my-0 overflow-hidden">
    <!-- Side Bar -->
    <?php include ("layout/sidebar.admin.php"); ?>
    <!-- Side Bar end -->
    <section class="relative w-full h-screen my-0 overflow-y-auto admin">
      <div class="flex items-start justify-between">
        <!-- Main Menu -->
        <div class="container flex flex-col gap-4">
          <?php include "layout/header-admin.php"; ?>
          <div class="w-full">
            <div class="container flex flex-col gap-3 overflow-y-auto bg-white rounded-lg shadow-md h-fit">
              <div class="mb-6 WrapperBack w-fit">
                <a href="Admin-Products.php"
                  class="flex items-center gap-3 px-2 py-2 text-base font-semibold text-white rounded-full cursor-pointer bg-blue-Neru w-fit">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" />
                  </svg>
                </a>
              </div>
              <form class="w-full" action="" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-6">
                  <div class="flex flex-col w-full gap-3">
                    <div class="flex flex-col w-full gap-4 p-3 border-2 rounded-md bg-white-neru">
                      <img id="previewImg" src="img/"
                        onerror="this.src='https://salonlfc.com/wp-content/uploads/2018/01/image-not-found-1-scaled-1150x647.png'"
                        class="mx-auto" alt="">
                      <label for="">Product Img <span class="font-medium text-red-500">(Note : 2 Type File input file &
                          link img)</span> </label>
                      <input required type="file" name="gambar" id="gambar" onchange="previewImage(event)">
                    </div>
                    <label for="">Product Type</label>
                    <input required class="w-full p-2 border-2 outline-none" value="<?= $type ?>" name="product_type"
                      placeholder="Product Type" readonly type="text" />
                    <?php if ($type === "Bedding"): ?>
                      <label for="">Product Categories</label>
                      <select class="w-full p-2 border-2 outline-none" name="product_categories" id="status">
                        <optgroup label="Bedding Categories">
                          <option value="Neru One">Neru One</option>
                          <option value="Neru Two">Neru Two</option>
                        </optgroup>
                      </select>
                    <?php endif; ?>
                    <?php if ($type === "Toys"): ?>
                      <label for="">Product Categories</label>
                      <select class="w-full p-2 border-2 outline-none" name="product_categories" id="status">
                        <optgroup label="<?= $type ?> Categories">
                          <option value="Neru Ring">Neru Ring</option>
                          <option value="Neru Stick">Neru Stick</option>
                          <option value="Neru Ball">Neru Ball</option>
                        </optgroup>
                      </select>
                    <?php endif; ?>
                    <label for="">Product Name</label>
                    <input required class="w-full p-2 border-2 outline-none" name="product_name"
                      placeholder="Product Name" type="text" />
                  </div>
                  <div class="flex flex-col w-full gap-3">
                    <label for="">Product Stock</label>
                    <input required class="w-full p-2 border-2 outline-none" name="product_stock"
                      placeholder="Product Stock" type="number" pattern="\d*" />
                    <?php if ($type === "Bedding"): ?>
                      <label for="">Product Color</label>
                      <input required class="w-full p-2 border-2 outline-none" name="product_color"
                        placeholder="Product Color" type="text" />
                    <?php endif; ?>
                    <?php if ($type === "Toys"): ?>
                      <label for="">Product Color</label>
                      <input required class="w-full p-2 border-2 outline-none" name="product_color"
                        placeholder="Product Color" type="text" />
                    <?php endif; ?>
                    <?php if ($type === "Pillow"): ?>
                      <label for="">Product Color</label>
                      <input required class="w-full p-2 border-2 outline-none" name="product_color"
                        placeholder="Product Color" type="text" />
                    <?php endif; ?>
                    <?php if ($type === "Trolly"): ?>
                      <label for="">Product Color</label>
                      <input required class="w-full p-2 border-2 outline-none" name="product_color"
                        placeholder="Product Color" type="text" />
                    <?php endif; ?>
                    <label for="">Product Price</label>
                    <input required class="w-full p-2 border-2 outline-none" name="product_price"
                      placeholder="Product Price" type="number" />
                    <label for="">Product Specification</label>
                    <textarea required class="p-2 border-2 outline-none text-start" name="product_specification"
                      placeholder="Product Price" cols="30" rows="10"></textarea>
                    <label for="">Product Weight</label>
                    <input required class="w-full p-2 border-2 outline-none" name="product_weight"
                      placeholder="Product Weight" type="text" />
                    <label for="">Product Warranty</label>
                    <input required class="w-full p-2 border-2 outline-none" name="product_warranty"
                      placeholder="Product Warranty" type="text" />
                    <label for="">Product Rating</label>
                    <input required class="w-full p-2 border-2 outline-none" name="product_rating"
                      placeholder="Product Rating" type="Number" />
                    <label for="">Status Content</label>
                    <input required class="w-full p-2 border-2 outline-none" name="status" value="0" readonly
                      type="number" />
                    <button type="submit" name="submit"
                      class="bg-green-400 p-2 rounded-md text-white font-semibold w-[25%] self-end">Tambah Data</button>
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
<script>
  function previewImage(event) {
    const input = event.target;
    const reader = new FileReader();

    reader.onload = function () {
      const img = document.getElementById('previewImg');
      img.src = reader.result;
    }

    reader.readAsDataURL(input.files[0]);
  }
</script>

</html>