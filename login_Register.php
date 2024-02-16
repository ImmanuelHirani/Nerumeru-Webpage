<?php


require("function.php");

if (isset($_POST["submitRegis"])) {
  if (registerAccount($_POST) > 0) {
    echo
    "<script>
        alert('Registrasi Berhasil !');
      </script>";
  } else {
    echo
    "<script>
        alert('Registrasi Gagal');
      </script>";
  }
}



// Pastikan koneksi ke database sudah dibuat sebelumnya
if (isset($_POST['submitLogin'])) {
  $user_identifier = $_POST["user_identifier"]; // This can be either email or username
  $user_password = $_POST["user_password"];

  // Gunakan parameterized queries
  $stmt = $conn->prepare("SELECT * FROM user WHERE user_email = ? OR user_phone = ?");
  $stmt->bind_param("ss", $user_identifier, $user_identifier);
  $stmt->execute();
  $result = $stmt->get_result();

  // Mengecek Email atau Username
  if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    // Cek password
    if (password_verify($user_password, $row["user_password"])) {
      session_start();
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['user_username'] = $row['user_username'];
      header("Location: index.php");
      exit;
    } else {
      $error = "Kata Sandi Salah";
    }
  } else {
    $error = "Email/No Tlpn salah";
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
  <title>Nerumeru | Login</title>
</head>
<body>
  <main class="my-0 bg-forest bg-no-repeat bg-cover">
    <section class="my-0 login_Register h-screen w-full flex justify-center items-center">
      <div class="fixed inset-0 bg-blue-Neru bg-opacity-25"></div>
      <div class="container w-fit relative z-50">
        <div class="form-wrapper">
          <div class="overflow-hidden relative mx-auto flex flex-col gap-3 items-center text-white justify-center px-16 rounded-lg w-[539px] h-[582px] backdrop-blur-2xl">
            <div id="BoxLogin" class="w-full flex flex-col gap-9 items-center text-white">
              <h3 class="font-semibold">Login</h3>
              <?php if (isset($error)) : ?>
                <p><?php echo $error; ?></p>
              <?php endif; ?>
              <form action="" method="post" class="w-full font-semibold mt-6 flex flex-col">
                <span class="flex flex-col gap-8">
                  <div class="flex w-full relative">
                    <input type="text" required name="user_identifier" placeholder="Email / No Tlpn" class="inputLogin xl:text-base md:text-base text-sm w-full py-3 outline-none bg-transparent border-b-2 border-white" />
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon absolute right-0 bottom-1/2 translate-y-1/2 icon-tabler icon-tabler-mail" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                      <path d="M3 7l9 6l9 -6" />
                    </svg>
                  </div>
                  <div class="flex w-full relative">
                    <input type="password" required name="user_password" id="passwordInputLogin" placeholder="Password" class="inputLogin xl:text-base md:text-base text-sm w-full py-3 outline-none bg-transparent border-b-2 border-white" />
                    <svg id="togglePasswordLogin" xmlns="http://www.w3.org/2000/svg" class="icon absolute right-0 bottom-1/2 translate-y-1/2 icon-tabler icon-tabler-eye-off cursor-pointer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                      <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                      <path d="M3 3l18 18" />
                    </svg>
                  </div>
                </span>
                <span class="flex justify-between mt-6">
                  <div class="flex gap-1 items-center" id="RememberMe">
                    <input type="checkbox" class="" />
                    <span>
                      <h6>Remember me</h6>
                    </span>
                  </div>
                  <a href="#" class="text-white">
                    <h6>Forget Password ?</h6>
                  </a>
                </span>
                <button name="submitLogin" type="submit" class="w-full bg-blue-Neru p-3 text-white rounded-lg mt-6">
                  <h6>Login</h6>
                </button>
                <h6 class="text-center mt-6">
                  Don't Have Account ? <span class=""><a class="text-blue-Neru cursor-pointer" id="RegisBox">Register</a></span>
                </h6>
              </form>
            </div>
            <div id="BoxRegister" class="absolute z-10 transition-all ease-in-out duration-500 invisible -translate-y-full bg-blue-Neru h-full bottom-0 rounded-t-lg justify-center px-16 inset-x-0 w-full flex flex-col gap-9 items-center text-white">
              <h3 class="font-semibold">Register</h3>
              <form action="" method="post" class="w-full font-semibold mt-6 flex flex-col">
                <span class="flex flex-col gap-8">
                  <div class="flex w-full relative">
                    <input type="text" required name="user_email" placeholder="Email" class="inputLogin xl:text-base md:text-base text-sm w-full py-3 outline-none bg-transparent border-b-2 border-white" />
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon absolute right-0 bottom-1/2 translate-y-1/2 icon-tabler icon-tabler-mail" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                      <path d="M3 7l9 6l9 -6" />
                    </svg>
                  </div>
                  <div class="flex w-full relative">
                    <input type="text" required name="user_phone" placeholder="No Tlpn" class="inputLogin xl:text-base md:text-base text-sm w-full py-3 outline-none bg-transparent border-b-2 border-white" />
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon absolute right-0 bottom-1/2 translate-y-1/2 icon-tabler icon-tabler-phone-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                      <path d="M15 6h6m-3 -3v6" />
                    </svg>
                  </div>
                  <div class="flex w-full relative">
                    <input type="password" required name="user_password" id="passwordInputRegis" placeholder="Password" class="inputLogin xl:text-base md:text-base text-sm w-full py-3 outline-none bg-transparent border-b-2 border-white" />
                    <svg id="togglePasswordRegis" xmlns="http://www.w3.org/2000/svg" class="icon absolute right-0 bottom-1/2 translate-y-1/2 icon-tabler icon-tabler-eye-off cursor-pointer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                      <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                      <path d="M3 3l18 18" />
                    </svg>
                  </div>
                </span>
                <button type="submit" class="w-full bg-white p-3 text-black rounded-lg mt-6" name="submitRegis">
                  <h6>Register</h6>
                </button>
                <h6 class="text-center mt-6">
                  Already Have Account ? <span class=""><a class="text-white cursor-pointer" id="LoginBox">Login</a></span>
                </h6>
              </form>
            </div>
            <div class="close z-20 bg-blue-Neru rounded-bl-2xl p-2 text-white absolute top-0 right-0">
              <a href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M18 6l-12 12" />
                  <path d="M6 6l12 12" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>
<script src="js/login.js"></script>

</html>