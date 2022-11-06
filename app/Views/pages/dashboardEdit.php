<?= $this->extend('layout/pageLayoutLogin') ?>

<?= $this->section('content') ?>

<!-- Start User Dashboard -->
<div class="px-[80px] py-[64px]">
  <div class="grid grid-cols-2 gap-[24px]">
    <div class="flex flex-col items-start gap-[32px]">
      <div class="flex flex-col items-start gap-[8px]">
        <h1 class="font-bold text-5xl mt-[50px]">Edit Akun</h1>
        <p class="text-base ml-[4px]">
          Di sini kamu bisa mengatur detail akunmu.
        </p>
      </div>
      <div
        class="p-[40px] border border-zinc-900 w-full flex flex-col items-start gap-[32px] rounded-lg"
      >
        <div class="flex flex-col items-start gap-[8px]">
          <div class="flex flex-row gap-[24px] items-center">
            <img
              class="w-[190px] h-[190px] object-cover rounded-lg"
              src="/images/dashboardLogo.png"
              alt=""
            />
            <div class="flex flex-col items-start gap-[8px]">
              <h1 class="text-2xl font-semibold">Kurt Cobain</h1>
              <div class="flex flex-row items-center gap-[16px]">
                <img class="" src="/icons/maps.svg" alt="" />
                <p>Kab. Badung, Bali</p>
              </div>
            </div>
          </div>
          <div class="flex flex-row justify-start gap-[8px]">
            <label
              class="flex flex-row gap-[8px] items-center text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-800 cursor-pointer"
              type="button"
            >
              <img src="/icons/image.svg" alt="" />
              <span class="text-base leading-normal text-white"
                >Ganti Gambar</span
              >
              <input type="file" class="hidden" />
            </label>
            <button
              class="flex flex-row gap-[8px] items-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
              type="button"
              data-modal-toggle="default-modal"
            >
              <img src="/icons/trash.svg" alt="" />
              Remove Image
            </button>

            <!-- Start Modal -->
            <div
              id="default-modal"
              data-modal-show="true"
              aria-hidden="true"
              class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center"
            >
              <div
                class="relative w-full max-w-2xl px-4 h-full md:h-auto flex justify-center"
              >
                <!-- Modal content -->
                <div class="bg-white rounded-lg shadow relative w-[400px]">
                  <!-- Modal header -->
                  <div class="flex items-start justify-between p-5 rounded-t">
                    <button
                      type="button"
                      class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                      data-modal-toggle="default-modal"
                    >
                      <svg
                        class="w-5 h-5"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"
                        ></path>
                      </svg>
                    </button>
                  </div>

                  <!-- Modal body -->
                  <div class="flex justify-center items-center">
                    <img src="/icons/warning.svg" alt="" />
                  </div>
                  <div class="p-6 space-y-6">
                    <h3
                      class="text-gray-900 text-xl lg:text-2xl font-semibold text-center"
                    >
                      Apakah benar anda ingin menghapus Foto Profile Anda?
                    </h3>
                  </div>

                  <!-- Modal footer -->
                  <div
                    class="flex space-x-2 items-center justify-center p-6 rounded-b dark:border-gray-600"
                  >
                    <button
                      data-modal-toggle="default-modal"
                      type="button"
                      class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                    >
                      Iya, benar
                    </button>
                    <button
                      data-modal-toggle="default-modal"
                      type="button"
                      class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600"
                    >
                      Tidak, batal
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Modal -->
          </div>
        </div>
        <div class="flex flex-row items-start w-full items-center">
          <h3 class="w-full text-xl">Nama orang tua :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-xl"
          >
            Kurt Cobain
          </div>
        </div>
        <div class="flex flex-row items-start w-full items-center">
          <h3 class="w-full text-xl">Alamat :</h3>
          <div
            class="flex flex-row items-center gap-[16px] py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-xl"
          >
            <img class="" src="/icons/maps.svg" alt="" />
            <p>Kab. Badung, Bali</p>
          </div>
        </div>
        <div class="flex flex-row items-start w-full items-center">
          <h3 class="w-full text-xl">Email :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-xl"
          >
            kurt@gmail.com
          </div>
        </div>
        <div class="flex flex-row items-start w-full items-center">
          <h3 class="w-full text-xl">No WA :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-xl"
          >
            0819219212929
          </div>
        </div>
        <div class="flex flex-row items-start w-full items-center">
          <h3 class="w-full text-xl">Ubah password :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-xl"
          >
            *********
          </div>
        </div>
        <a
          href="<?= url_to('user.register') ?>"
          class="border-2 border-pink-500 bg-pink-500 px-[40px] py-[8px] rounded-[8px] font-semibold text-white text-lg"
        >
          Simpan Data Diri
        </a>
      </div>
    </div>
  </div>
</div>
<!-- End User Dashboard -->

<script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>

<?= $this->endSection() ?>
