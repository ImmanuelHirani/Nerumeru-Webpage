<?php

require "function.php";

$id = $_GET["recommend_id"];

$recommend = query("SELECT * FROM recommendsection WHERE recommend_id = $id")[0];

if (isset($_POST["submit"])) {
    if (updateProductRecom($_POST) > 0) {
        echo
        "<script>
        alert('Data berhasil di Ubah');
        document.location.href = 'Admin-Homepage.php';
    </script>";
    } else {
        echo
        "<script>
        alert('Data Gagal di Ubah');
        document.location.href = 'Admin-Homepage.php';
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
    <title>recommend | Admin</title>
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
                    <div class=" w-full">
                        <div class="container bg-white rounded-lg shadow-md h-fit flex flex-col gap-3 overflow-y-auto">
                            <div class="WrapperBack mb-6 w-fit">
                                <a href="Admin-Homepage.php" class="bg-blue-Neru w-fit text-white px-2 rounded-full py-2 cursor-pointer font-semibold text-base flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M15 6l-6 6l6 6" />
                                    </svg>
                                </a>
                            </div>
                            <form class="w-full" action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="recommend_id" value="<?= $recommend["recommend_id"] ?>">
                                <input type="hidden" name="gambarLama" value="<?= $recommend["recommend_img"] ?>">
                                <input type="hidden" name="recommend_img" value="<?= $recommend["recommend_img"] ?>">
                                <div class="grid grid-cols-2 gap-6">
                                    <div class="flex flex-col w-full gap-3">
                                        <div class="w-full flex flex-col gap-4  bg-white-neru rounded-md border-2 p-3">
                                            <img id="previewImg" src="img/<?= $recommend["recommend_img"] ?>" class="mx-auto w-fit" alt="">
                                            <div class="flex flex-col gap-2.5 ">
                                                <input type="file" name="gambar" onchange="previewImage(event)" value="<?= isset($recommend["recommend_img"]) ? $recommend["recommend_img"] : '' ?>" id="gambar" /><?php if (isset($recommend["recommend_img"])) : ?>
                                                    <h6>File Terkini : <?= $recommend["recommend_img"] ?></h6>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-full gap-3">
                                        <label for="">Title 1</label>
                                        <input required class="w-full p-2 outline-none border-2" name="recommend_title" placeholder="recommend's Delightful Pets" value="<?= $recommend["recommend_title"] ?>" type="text" />
                                        <label for="">Status Content</label>
                                        <select class="w-full p-2 outline-none border-2" name="status" id="status">
                                            <option> <?= $recommend["status"] ?>
                                                <?php if ($recommend["status"] === "1") : ?>
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
                                        <label for="">Recommend Target link</label>
                                        <input required class="w-full p-2 outline-none border-2" name="recommend_targetLink" value="<?= $recommend["recommend_targetLink"] ?>" type="text" />
                                        <button type="submit" name="submit" class="bg-green-400 p-2 rounded-md text-white font-semibold w-[25%] self-end">Update Data</button>
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