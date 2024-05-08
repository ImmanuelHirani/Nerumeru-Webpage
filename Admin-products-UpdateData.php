<?php

require "function.php";

if (!isset($_GET['type']) || !in_array($_GET['type'], ["Bedding", "Toys", "Sanitize", "Pillow", "Trolly"])) {
  echo "<script>document.location.href = 'Admin-Products.php';</script>";
  // exit;
} else {
  $type = $_GET['type'];
}


$id = $_GET['product_id'];

$nerumeru = query("SELECT * FROM product WHERE product_id = $id")[0];

if (isset($_POST["submit"])) {
  if (updateProduct($_POST) > 0) {
    echo
    "<script>
        alert('Data berhasil di Ubah');
        document.location.href = 'Admin-Products.php';
    </script>";
  } else {
    echo
    "<script>
        alert('Data Gagal di Ubah');
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
                    <input type="hidden" name="product_id" value="<?= $nerumeru["product_id"] ?>">
                    <input type="hidden" name="gambarLama" value="<?= $nerumeru["product_img"] ?>">
                    <input type="hidden" name="product_img" value="<?= $nerumeru["product_img"] ?>">
                    <div class="w-full flex flex-col gap-4  bg-white-neru rounded-md border-2 p-3">
                      <img id="previewImg" src="img/<?= $nerumeru["product_img"] ?>" onerror="this.src='https://salonlfc.com/wp-content/uploads/2018/01/image-not-found-1-scaled-1150x647.png'" class="mx-auto" alt="">
                      <label for="">Product Img <span class="text-red-500 font-medium">(Note : 2 Type File input file & link img)</span> </label>
                      <input type="file" name="gambar" id="gambar" onchange="previewImage(event)">
                    </div>
                    <label for="">Product Type</label>
                    <input class="w-full p-2 outline-none border-2" value="<?= $nerumeru["product_type"] ?>" name="product_type" placeholder="Product Type" type="text" />
                    <?php if ($type === "Bedding") : ?>
                      <label for="">Product Categories</label>
                      <select class="w-full p-2 outline-none border-2" name="product_categories" id="status">
                        <optgroup label="Bedding Categories">
                          <option value="Neru One">Neru One</option>
                          <option value="Neru Two">Neru Two</option>
                        </optgroup>
                      </select>
                    <?php endif; ?>
                    <?php if ($type === "Toys") : ?>
                      <label for="">Product Categories</label>
                      <select class="w-full p-2 outline-none border-2" name="product_categories" id="status">
                        <optgroup label="<?= $type ?> Categories">
                          <option value="Neru Ring" disabled>Recently Categories - (<?= $nerumeru["product_categories"] ?>)</option>
                        </optgroup>
                        <option value="Neru Ring">Neru Ring</option>
                        <option value="Neru Stick">Neru Stick</option>
                        <option value="Neru Ball">Neru Ball</option>
                      </select>
                    <?php endif; ?>
                    <label for="">Product Name</label>
                    <input class="w-full p-2 outline-none border-2" value="<?= $nerumeru["product_name"] ?>" name="product_name" placeholder="Product Name" type="text" />
                  </div>
                  <div class="flex flex-col w-full gap-3">
                    <label for="">Product Stock</label>
                    <input class="w-full p-2 outline-none border-2" value="<?= $nerumeru["product_stock"] ?>" name="product_stock" placeholder="Product Stock" type="number" />
                    <label for="">Product Color</label>
                    <input class="w-full p-2 outline-none border-2" value="<?= $nerumeru["product_color"] ?>" name="product_color" placeholder="Product Color" type="text" />
                    <label for="">Product Price</label>
                    <input class="w-full p-2 outline-none border-2" value="<?= $nerumeru["product_price"] ?>" name="product_price" placeholder="Product Price" type="text" />
                    <label for="">Product Specification</label>
                    <textarea name="product_specification" class="p-2 outline-none border-2 text-start" id="" placeholder="Product Specification" cols="30" rows="10"><?= $nerumeru["product_specification"] ?></textarea>
                    <label for="">Product Weight</label>
                    <input class="w-full p-2 outline-none border-2" value="<?= $nerumeru["product_weight"] ?>" name="product_weight" placeholder="Product Weight" type="text" />
                    <label for="">Product Warranty</label>
                    <input class="w-full p-2 outline-none border-2" value="<?= $nerumeru["product_warranty"] ?>" name="product_warranty" placeholder="Product Warranty" type="text" />
                    <label for="">Product Rating</label>
                    <input class="w-full p-2 outline-none border-2" value="<?= $nerumeru["product_rating"] ?>" name="product_rating" placeholder="Product Rating" type="number" />
                    <select class="w-full p-2 outline-none border-2" name="status" id="status">
                      <option> <?= $nerumeru["status"] ?>
                        <?php if ($nerumeru["status"] === "1") : ?>
                          <?= "= Item Active" ?>
                        <?php else : ?>
                          <?= "= Item Non-Active" ?>
                        <?php endif; ?>
                      </option>
                      <optgroup label="Active">
                        <option value="1">1</option>
                      </optgroup>
                      <optgroup label="Non-Active">
                        <option value="0">0</option>
                      </optgroup>
                    </select>
                    <button type="submit" name="submit" class="bg-green-400 p-2 rounded-md text-white font-semibold w-fit self-end">Update Data</button>
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

    reader.onload = function() {
      const img = document.getElementById('previewImg');
      img.src = reader.result;
    }

    reader.readAsDataURL(input.files[0]);
  }
</script>

</html>