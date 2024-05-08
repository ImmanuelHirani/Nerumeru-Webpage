<?php

require "function.php";

$userid = $_GET["user_id"];

$Users = query("SELECT * FROM user_locations INNER JOIN user ON user_locations.user_id = user.user_id WHERE user_locations.user_id = $userid");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/output.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css" rel="stylesheet" />
    <title>hero | Admin - Homepage</title>
</head>

<body>
    <main class="my-0">
        <section class="admin relative h-screen overflow-hidden my-0">
            <div class="flex items-start justify-between">
                <!-- Side Bar -->
                <?php include("layout/sidebar.admin.php"); ?>
                <!-- Side Bar end -->
                <!-- Main Menu -->
                <div class="flex flex-col gap-4 container">
                    <?php include "layout/header-admin.php"; ?>
                    <div class="max-h-screen w-full overflow-y-auto">
                        <div id="UserData" class="container BoxTableData bg-white rounded-lg shadow-md 3xl:h-fit 2xl:h-fit overflow-y-auto mt-4">
                            <a href="Admin-Customer.php" class="flex items-center gap-3 mb-3">
                                <Span class="bg-blue-Neru w-10 h-10  flex items-center justify-center rounded-full text-white text-xl">
                                    < </Span>
                            </a>
                            <table id="myTable2" class="myTableDisplay text-basepy-6 display table hover order-column row-border stripe">
                                <thead>
                                    <tr class="bg-blue-Neru text-white">
                                        <th class="border-[1px] border-black-neru border-opacity-30">ID</th>
                                        <th class="border-[1px] border-black-neru border-opacity-30">Username Reciver</th>
                                        <th class="border-[1px] border-black-neru border-opacity-30">Phone Number Reciver</th>
                                        <th class="border-[1px] border-black-neru border-opacity-30">Locations Reciver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Users as $user) : ?>
                                        <tr class="text-start">
                                            <td class="w-14"><?= $user["user_id"] ?></td>
                                            <td class="w-72"><?= $user["user_username_location"] ?></td>
                                            <td class="w-60"><?= $user["user_phone_location"] ?></td>
                                            <td class="w-[50%]">
                                                <h6 class="text-base text-justify"><?= $user["user_location"] ?></h6>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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
<script src="js/admin.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js"></script>
<script src="js/table.js"></script>
<script>
    const ButtonTogglerActive = document.querySelectorAll(".ButtonTogglerActive");
    const BoxTableData = document.querySelectorAll(".BoxTableData");

    // Fungsi untuk menyimpan status toggler yang aktif ke dalam localStorage
    function saveActiveButton(activeIndex) {
        localStorage.setItem("activeButtonIndex", activeIndex);
    }

    // Mendapatkan jumlah total item
    const totalItems = ButtonTogglerActive.length;

    // Memeriksa apakah ada status toggler yang sebelumnya aktif di localStorage
    let savedActiveButtonIndex = localStorage.getItem("activeButtonIndex");
    savedActiveButtonIndex = savedActiveButtonIndex !== null ? parseInt(savedActiveButtonIndex) : null;

    // Memeriksa apakah indeks yang tersimpan valid
    if (savedActiveButtonIndex !== null && savedActiveButtonIndex >= 0 && savedActiveButtonIndex < totalItems) {
        ButtonTogglerActive[savedActiveButtonIndex].classList.add("ButtonAdminMenuActive");
        if (BoxTableData[savedActiveButtonIndex]) {
            BoxTableData[savedActiveButtonIndex].classList.add("Active-BoxTable"); // Aktifkan data yang sesuai
        }
    } else {
        // Jika tidak ada status toggler yang disimpan sebelumnya atau indeks tidak valid, maka item pertama akan dianggap aktif
        ButtonTogglerActive[0].classList.add("ButtonAdminMenuActive");
        saveActiveButton(0); // Menyimpan status toggler yang aktif ke dalam localStorage
        if (BoxTableData[0]) {
            BoxTableData[0].classList.add("Active-BoxTable"); // Aktifkan data pertama
        }
    }

    ButtonTogglerActive.forEach((OtherButton, index) => {
        OtherButton.addEventListener("click", () => {
            ButtonTogglerActive.forEach((button) => {
                if (button !== OtherButton) {
                    button.classList.remove("ButtonAdminMenuActive");
                }
            });
            BoxTableData.forEach((box, boxIndex) => {
                if (index === boxIndex && box) {
                    box.classList.add("Active-BoxTable");
                } else if (box) {
                    box.classList.remove("Active-BoxTable");
                }
            });
            OtherButton.classList.add("ButtonAdminMenuActive");
            saveActiveButton(index);
        });
    });
</script>

</html>