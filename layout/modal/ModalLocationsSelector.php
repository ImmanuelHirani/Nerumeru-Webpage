<div id="locationSelectorBox" class="hidden Locations-selections text-start fixed inset-0 flex justify-center items-center bg-black bg-opacity-20  z-50 text-black">
  <div class="wrapperLocationSelector 3xl:w-[48%] xl:w-[60%] lg:w-[70%] flex flex-col gap-3 w-[90%] max-h-screen lg:p-10 md:p-6 p-4 rounded-lg relative bg-white overflow-auto">
    <!-- Data Locations -->
    <?php if (empty($locations)) : ?>
      <div class="wrapper flex flex-col items-center  gap-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-x" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M14 19.5l-5 -2.5l-6 3v-13l6 -3l6 3l6 -3v9" />
          <path d="M9 4v13" />
          <path d="M15 7v6.5" />
          <path d="M22 22l-5 -5" />
          <path d="M17 22l5 -5" />
        </svg>
        <h6 class="lg:text-base md:text-sm text-xs font-medium text-center">Alamat Kosong / Lengkapi Alamat Terlebih Dahulu !</h6>
      </div>
    <?php else : ?>
      <?php foreach ($locations as $location) : ?>
        <?php if ($location["status"] == 1) : ?>
          <div class="user-informations bg-blue-Neru bg-opacity-5 border-blue-Neru flex flex-col gap-4 border-2 p-6 rounded-lg">
            <div class="flex md:flex-row flex-col justify-between items-center gap-4">
              <div class="wrapper xl:w-1/2 w-full flex flex-col gap-2">
                <span class="flex md:flex-row flex-col lg:items-center items-start gap-2">
                  <h6 class="font-semibold"><?= $location["user_username_location"] ?></h6>
                  <hr class="md:block hidden border-[1px] h-4 border-separate border-black" />
                  <h6 class="font-light">(<?= $location["user_phone_location"] ?>)</h6>
                </span>
                <h6 class="font-light lg:text-base text-sm"><?= $location["user_location"] ?></h6>
              </div>
              <div class="alamatTerpilih flex gap-2 items-center md:w-1/2 w-full md:justify-end justify-start mt-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 text-blue-Neru md:block hidden" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M5 12l5 5l10 -10" />
                </svg>
                <button class="bg-blue-Neru md:hidden block rounded-lg p-2 text-xs text-white font-medium w-full">Alamat Terpilih</button>
              </div>
            </div>
          </div>
        <?php else : ?>
          <div class="user-informations bg-white flex flex-col gap-4 border-2 p-6 rounded-lg">
            <div class="flex md:flex-row flex-col justify-between items-center gap-4">
              <div class="wrapper xl:w-1/2 w-full flex flex-col gap-2">
                <span class="flex md:flex-row flex-col lg:items-center items-start gap-2">
                  <h6 class="font-semibold"><?= $location["user_username_location"] ?></h6>
                  <hr class="md:block hidden border-[1px] h-4 border-separate border-black" />
                  <h6 class="font-light">(<?= $location["user_phone_location"] ?>)</h6>
                </span>
                <h6 class="font-light lg:text-base text-sm"><?= $location["user_location"] ?></h6>
              </div>
              <div class="flex gap-2 pilihAlamat items-center md:w-1/2 w-full md:justify-end justify-start mt-4">
                <a href="status.php?id_locationCart=<?= $location["id"] ?>&status=<?= $location["status"] ?>" class="md:bg-blue-Neru rounded-lg px-4 text-center justify-center py-2 lg:text-base text-sm flex gap-1 items-center text-black md:border-0 border-2 md:text-white md:w-fit w-full cursor-pointer">
                  <h6 class="md:text-sm text-xs">Pilih Alamat</h6>
                </a>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <?php include("layout/modal/ModalLocations.php") ?>
      <?php endforeach; ?>
    <?php endif; ?>
    <!-- Data Locations End -->
    <!-- Close Toggle -->
    <span id="closeBoxFeatUbahAlamatSelector" class="absolute bg-blue-Neru p-1 top-0 right-0 rounded-bl-lg ">
      <svg xmlns="http://www.w3.org/2000/svg" class="md:w-6 w-5 text-white cursor-pointer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M18 6l-12 12" />
        <path d="M6 6l12 12" />
      </svg>
    </span>
    <!-- Close Toggle End -->
  </div>
</div>