<?php require "function.php" ?>
<header id="navCont" class="fixed inset-x-0 top-0 z-30 transition-all duration-300 ease-in-out bg-white">
  <nav class="container relative">
    <ul class="flex items-center font-semibold">
      <li>
        <a href="index.php">
          <img src="img/logoNerumeru.png" class="md:w-[70%] w-[45%]" alt="" />
        </a>
      </li>
      <div
        class="hidden text-sm transition-all duration-300 ease-in-out 3xl:text-lg 2xl:text-base ms-auto md:flex lg:gap-20 gap-9">
        <li>
          <a href="index.php" class="HomepageNav">Home</a>
        </li>
        <li>
          <span type="button" class="flex gap-2 pb-0 cursor-pointer dropdownNav ProductNav">Product
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 transition-all duration-300 ease-in-out 3xl:w-6"
              viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
              stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M6 9l6 6l6 -6"></path>
            </svg>
            <!-- Top-12 -->
            <ul
              class="absolute inset-x-0 invisible hidden pb-0 text-center text-white transition-all duration-200 ease-in-out translate-y-1/2 opacity-0 dropDownBox top-14 md:block">
              <li class="flex items-center w-full gap-4 px-4">
                <a href="bedding.php" class="bg-blue-Neru w-80 py-2.5 rounded-md cursor-pointer">Bedding</a>
                <a href="toys.php" class="bg-blue-Neru w-80 py-2.5 rounded-md cursor-pointer">Toys</a>
                <a href="sanitize.php" class="bg-blue-Neru w-80 py-2.5 rounded-md cursor-pointer">Sanitize</a>
                <a href="trolly.php" class="bg-blue-Neru w-80 py-2.5 rounded-md cursor-pointer">Trolly</a>
                <a href="pillow.php" class="bg-blue-Neru w-80 py-2.5 rounded-md cursor-pointer">Pillow</a>
              </li>
            </ul>
          </span>
        </li>
        <li>
          <a href="catalog.php" class="CatalogNav">Catalog</a>
        </li>
        <li>
          <a href="blog.php" class="BlogNav">Blog</a>
        </li>
      </div>
      <li class="flex items-center gap-6 ms-auto">
        <a href="cart.php" class="relative">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 rounded-full shadow-xl lg:w-11 md:w-9" viewBox="0 0 46 46"
            fill="none">
            <circle cx="23" cy="23" r="23" fill="white" />
            <path
              d="M11 12.7333C11 12.5388 11.0773 12.3523 11.2148 12.2148C11.3523 12.0773 11.5389 12 11.7334 12H13.9334C14.097 12 14.2559 12.0548 14.3848 12.1555C14.5137 12.2562 14.6052 12.3971 14.6448 12.5559L15.2388 14.9333H32.2673C32.375 14.9334 32.4813 14.9572 32.5788 15.0031C32.6762 15.0489 32.7624 15.1156 32.8311 15.1985C32.8999 15.2814 32.9495 15.3784 32.9765 15.4826C33.0036 15.5869 33.0073 15.6958 32.9875 15.8016L30.7874 27.5349C30.756 27.703 30.6668 27.8548 30.5353 27.964C30.4038 28.0733 30.2382 28.1332 30.0673 28.1333H16.8668C16.6959 28.1332 16.5303 28.0733 16.3988 27.964C16.2673 27.8548 16.1782 27.703 16.1467 27.5349L13.9481 15.8236L13.3614 13.4667H11.7334C11.5389 13.4667 11.3523 13.3894 11.2148 13.2519C11.0773 13.1144 11 12.9278 11 12.7333ZM15.5497 16.4L17.4755 26.6667H29.4586L31.3844 16.4H15.5497ZM18.3336 28.1333C17.5556 28.1333 16.8094 28.4424 16.2593 28.9925C15.7092 29.5426 15.4001 30.2887 15.4001 31.0667C15.4001 31.8446 15.7092 32.5907 16.2593 33.1408C16.8094 33.691 17.5556 34 18.3336 34C19.1116 34 19.8577 33.691 20.4078 33.1408C20.9579 32.5907 21.267 31.8446 21.267 31.0667C21.267 30.2887 20.9579 29.5426 20.4078 28.9925C19.8577 28.4424 19.1116 28.1333 18.3336 28.1333ZM28.6005 28.1333C27.8226 28.1333 27.0764 28.4424 26.5263 28.9925C25.9762 29.5426 25.6671 30.2887 25.6671 31.0667C25.6671 31.8446 25.9762 32.5907 26.5263 33.1408C27.0764 33.691 27.8226 34 28.6005 34C29.3785 34 30.1247 33.691 30.6748 33.1408C31.2249 32.5907 31.534 31.8446 31.534 31.0667C31.534 30.2887 31.2249 29.5426 30.6748 28.9925C30.1247 28.4424 29.3785 28.1333 28.6005 28.1333ZM18.3336 29.6C18.7226 29.6 19.0956 29.7545 19.3707 30.0296C19.6457 30.3046 19.8003 30.6777 19.8003 31.0667C19.8003 31.4557 19.6457 31.8287 19.3707 32.1038C19.0956 32.3788 18.7226 32.5333 18.3336 32.5333C17.9446 32.5333 17.5715 32.3788 17.2964 32.1038C17.0214 31.8287 16.8668 31.4557 16.8668 31.0667C16.8668 30.6777 17.0214 30.3046 17.2964 30.0296C17.5715 29.7545 17.9446 29.6 18.3336 29.6ZM28.6005 29.6C28.9895 29.6 29.3626 29.7545 29.6377 30.0296C29.9127 30.3046 30.0673 30.6777 30.0673 31.0667C30.0673 31.4557 29.9127 31.8287 29.6377 32.1038C29.3626 32.3788 28.9895 32.5333 28.6005 32.5333C28.2115 32.5333 27.8385 32.3788 27.5634 32.1038C27.2884 31.8287 27.1338 31.4557 27.1338 31.0667C27.1338 30.6777 27.2884 30.3046 27.5634 30.0296C27.8385 29.7545 28.2115 29.6 28.6005 29.6Z"
              fill="#42454A" />
          </svg>
          <?php if (isset($_SESSION["user_id"])): ?>
            <div id="quantity-item"
              class="absolute top-0 px-2 py-1 text-white rounded-full quantity-item-added -right-3 bg-blue-Neru">
              <p id="item-count" class="text-[9px]">0</p>
            </div>
          <?php endif; ?>

          <?php
          if (isset($_SESSION['user_id'])) {
            // Ambil user_id dari session
            $user_id = $_SESSION['user_id'];

            // Lakukan query untuk mengambil data pengguna menggunakan prepared statement
            $query = "SELECT * FROM user WHERE user_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            // Periksa apakah query berhasil
            if ($result->num_rows > 0) {
              // Ambil data pengguna
              $userData = $result->fetch_assoc();
              $result->free_result(); // Melepas hasil query
          
              // Periksa apakah user_username tidak kosong
              if (!empty($userData["user_username"])) {
                // jika Ada data pada user_username
                echo '<a href="Profile.php" class="px-12 py-2 text-xs text-white rounded-lg bg-blue-Neru lg:px-16 md:text-base lg:py-2 line-clamp-1">' . substr($userData["user_username"], 0, 8) . '</a>';
              } else {
                // jika user_username kosong, tampilkan default "Profile"
                echo '<a href="Profile.php" class="px-12 py-2 text-xs text-white rounded-lg bg-blue-Neru lg:px-16 md:text-base lg:py-2 line-clamp-1">Profile</a>';
              }
            } else {
              // jika tidak ada data yang sesuai dengan user_id
              echo "Tidak dapat menemukan informasi pengguna. Silakan periksa kembali atau hubungi administrator.";
            }
          } else {
            // Jika tidak ada session atau tidak ada user_id dalam session
            echo '<a href="login_Register.php" class="px-12 py-2 text-xs text-white rounded-lg bg-blue-Neru lg:px-16 md:text-base lg:py-2">Login</a>';
          }
          ?>
          <button id="navBurger" class="flex flex-col gap-1 md:hidden">
            <span
              class="w-[23px] h-1 rounded-full bg-black transition-all origin-top-right ease-in-out duration-300"></span>
            <span class="w-[23px] h-1 rounded-full bg-black transition-all ease-in-out duration-300"></span>
            <span
              class="w-[23px] h-1 rounded-full bg-black transition-all origin-bottom-right ease-in-out duration-300"></span>
          </button>
      </li>
    </ul>
  </nav>
  <div id="offCanvasSm"
    class="fixed left-0 w-full h-screen transition-transform duration-500 ease-in-out transform translate-x-full bg-white md:hidden top-16 -z-10">
    <div class="container nav-wrapper">
      <div
        class="absolute inset-0 h-full -translate-y-10 bg-center bg-no-repeat bg-contain bg-nav -z-10 bg-offcanvas opacity-10">
      </div>
      <ul class="flex flex-col gap-5 text-lg font-semibold transition-all duration-100 ease-in-out md:hidden -z-10">
        <li>
          <a href="index.php"
            class="tracking-widest uppercase hover:text-blue-Neru hover:underline hover:underline-offset-8">Home</a>
        </li>
        <!-- pb-40 -->
        <li class="relative transition-all duration-300 ease-in-out">
          <span
            class="flex items-center gap-2 tracking-widest uppercase dropdownNav hover:text-blue-Neru hover:underline hover:underline-offset-8">Product
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 transition-all duration-300 ease-in-out"
              viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
              stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M6 9l6 6l6 -6"></path>
            </svg>
          </span>
          <ul
            class="absolute flex flex-col invisible gap-3 text-base tracking-widest uppercase transition-all duration-100 ease-in-out opacity-0 dropDownBox top-10 left-5 -z-10">
            <li>
              <a href="bedding.php" class="hover:text-blue-Neru hover:underline hover:underline-offset-8">Bedding</a>
            </li>
            <li>
              <a href="toys.php" class="hover:text-blue-Neru hover:underline hover:underline-offset-8">Toys</a>
            </li>
            <li>
              <a href="" class="hover:text-blue-Neru hover:underline hover:underline-offset-8">Sanitize</a>
            </li>
            <li>
              <a href="" class="hover:text-blue-Neru hover:underline hover:underline-offset-8">Trolly</a>
            </li>
            <li>
              <a href="" class="hover:text-blue-Neru hover:underline hover:underline-offset-8">Pillow</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="catalog.php"
            class="tracking-widest uppercase hover:text-blue-Neru hover:underline hover:underline-offset-8">Catalog</a>
        </li>

        <li>
          <a href="blog.php"
            class="tracking-widest uppercase hover:text-blue-Neru hover:underline hover:underline-offset-8">Blog</a>
        </li>
      </ul>
    </div>
  </div>
</header>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    if (<?= isset($_SESSION["user_id"]) ? 'true' : 'false' ?>) {
      $.ajax({
        url: 'get_cart_count.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
          $('#item-count').text(response.count);
          $('#quantity-item').show(); // Show the count element after updating the count
        },
        error: function () {
          $('#item-count').text('0');
        }
      });
    }
  });
</script>