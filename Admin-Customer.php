<?php

require "function.php";

$Users = query("SELECT * FROM user");





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
        <?php include("sidebar.admin.php"); ?>
        <!-- Side Bar end -->
        <!-- Main Menu -->
        <div class="flex flex-col gap-4 container">
          <header class="flex items-center bg-white rounded-lg justify-between w-full h-20 px-5">
            <div class="header-wrapper w-full flex items-center justify-between">
              <span class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-gray-500" viewBox="0 0 15 15" fill="none">
                  <path d="M13.1249 13.125L10.4062 10.4062M11.875 6.875C11.875 9.63642 9.63642 11.875 6.875 11.875C4.11358 11.875 1.875 9.63642 1.875 6.875C1.875 4.11358 4.11358 1.875 6.875 1.875C9.63642 1.875 11.875 4.11358 11.875 6.875Z" stroke="#2762BE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <input id="searchAdminNavbar" type="search" class="bg-white-neru px-3 rounded-md  outline-none py-1 w-[224px] pl-9 xl:text-base md:text-sm text-xs" placeholder="Search" />
              </span>
              <div id="notifications" class="relative cursor-pointer">
                <div class="badge absolute -right-2 -top-2 bg-white-neru rounded-full flex items-center justify-center p-1">
                  <h6 class="text-xs text-blue-Neru font-semibold">12</h6>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 17 20" fill="none">
                  <path d="M13.5 6.66699C13.5 5.34091 12.9732 4.06914 12.0355 3.13146C11.0979 2.19378 9.82608 1.66699 8.5 1.66699C7.17392 1.66699 5.90215 2.19378 4.96447 3.13146C4.02678 4.06914 3.5 5.34091 3.5 6.66699C3.5 12.5003 1 14.167 1 14.167H16C16 14.167 13.5 12.5003 13.5 6.66699Z" stroke="#2762BE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M9.94193 17.5C9.79542 17.7526 9.58513 17.9622 9.33212 18.1079C9.0791 18.2537 8.79224 18.3304 8.50026 18.3304C8.20828 18.3304 7.92142 18.2537 7.6684 18.1079C7.41539 17.9622 7.2051 17.7526 7.05859 17.5" stroke="#2762BE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="notifBox invisible absolute border-[2px] border-grey-neru rounded-md backdrop-blur-md w-52 p-5 h-40 right-0 top-5 opacity-0 transition-all ease-in-out duration-300"></div>
              </div>
            </div>
          </header>
          <div class="max-h-screen w-full overflow-y-auto">
            <div id="UserData" class="container BoxTableData bg-white rounded-lg shadow-md 3xl:h-fit 2xl:h-fit overflow-y-auto mt-4">
              <table id="myTable2" class="myTableDisplay 3xl:text-lg text-sm py-6 display nowrap table hover order-column row-border stripe">
                <thead>
                  <tr class="bg-blue-Neru text-white">
                    <th class="border-[1px] border-black-neru border-opacity-30">ID</th>
                    <th class="border-[1px] border-black-neru border-opacity-30">Img</th>
                    <th class="border-[1px] border-black-neru border-opacity-30">Username</th>
                    <th class="border-[1px] border-black-neru border-opacity-30">Email</th>
                    <th class="border-[1px] border-black-neru border-opacity-30">Locations</th>
                    <th class="border-[1px] border-black-neru border-opacity-30">Changes Details </th>
                    <th class="border-[1px] border-black-neru border-opacity-30">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($Users as $user) : ?>
                    <tr class="text-center">
                      <td class="w-14"><?= $user["user_id"] ?></td>
                      <td class="w-32"><img src="img/<?= $user["user_img"] ?>" class="w-[60%] object-contain mx-auto" alt="" /></td>
                      <td class="w-28"><?= $user["user_username"] ?></td>
                      <td class="w-28"><?= $user["user_email"] ?></td>
                      <td class="w-28">
                        <a href="Admin-userLocations.php?user_id=<?= $user["user_id"]  ?>" type="submit" class="flex items-center justify-center w-fit gap-2 px-4 bg-blue-Neru py-2 text-sm rounded-lg text-white" name="submit_location">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5" />
                            <path d="M9 4v13" />
                            <path d="M15 7v5.5" />
                            <path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" />
                            <path d="M19 18v.01" />
                          </svg>
                          Lokasi
                        </a>
                      </td>
                      <td class="w-28">
                        <button data-target="#userInfo<?= $user["user_id"] ?>" class="flex gap-2 items-center cursor-pointer DateDetailToggler bg-blue-Neru py-2 px-4  text-sm rounded-lg text-white">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-time" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" />
                            <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                            <path d="M15 3v4" />
                            <path d="M7 3v4" />
                            <path d="M3 11h16" />
                            <path d="M18 16.496v1.504l1 1" />
                          </svg>
                          Date
                        </button>
                      </td>
                      <td class="w-28">
                        <span class="flex items-center gap-2 justify-center">
                          <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="hapus.php?user_id=<?= $user["user_id"] ?>" class="HapusDataToggler text-white bg-red-500 px-2 py-1 rounded-full text-2xl cursor-pointer "><i class="ti ti-trash"></i></a>
                        </span>
                      </td>
                    </tr>
                    <?php include("layout/modal/ModalCustomers.php") ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- <form action="hapus.php" method="get">
              <div id="TrashNotifications" class="gap-4 translate-x-1/2 right-[40%] z-20 fixed invisible top-0 w-96 flex flex-col justify-center items-center border-2 border-blue-Neru rounded-lg backdrop-blur-lg h-32">
                <h6>Yakin Ingin Hapus Data?</h6>
                <input type="hidden" name="hero_id" value="<?= $neru["hero_id"] ?>">
                <div class="wrap flex gap-2">
                  <button id="ApporveDelete" type="submit" class="bg-red-400 py-2 rounded-md px-6 text-white font-semibold">Hapus</button>
                  <button id="CancelDelete" type="reset" class="bg-blue-Neru text-white py-2 rounded-md px-6 font-semibold">Tidak</button>
                </div>
              </div>
            </form> -->
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