<?= $this->extend('layout/pageLayoutLogin') ?>

<?= $this->section('content') ?>

<!-- Start User Dashboard -->
<div class="px-[24px] xl:px-[80px] py-[64px]">
  <div class="grid xl:grid-cols-2 gap-[24px]">
    <div class="flex flex-col items-start gap-[32px]">
      <div class="flex flex-col items-start gap-[8px]">
        <h1 class="font-bold xl:text-5xl xl:mt-[50px] mt-[40px] text-2xl">Edit Data Diri Anak</h1>
        <p class="text-base ml-[4px]">
          Halaman ini dapat mengedit data diri dari anak.
        </p>
      </div>
      <div
        class="xl:p-[40px] p-[16px] border border-zinc-900 w-full flex flex-col items-start gap-[32px] rounded-lg"
      >
        <div class="flex flex-col items-start gap-[8px]">
          <div class="flex flex-row gap-[24px] items-center">
          <?php if(empty($link_foto)){ ?>
            <img
              class="w-[190px] h-[190px] object-cover rounded-lg"
              src="/images/dashboardLogo.png"
              alt=""
            />
            <?php }else{ ?>
              <img
              class="w-[190px] h-[190px] object-cover rounded-lg"
              src="/images/<?= $link_foto?>"
              alt=""
            />
          <?php } ?>
          </div>
          <form
          class="w-full flex flex-col gap-[24px] items-start"
          action="<?= base_url('user/data-anak/edit/'. $id_anak) ?>"
          method="POST"
          enctype="multipart/form-data"
        >
        <?= csrf_field(); ?>
          <div class="flex flex-row justify-start gap-[8px]">
            <label
              class="flex flex-row gap-[4px] items-center text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-md text-sm px-[8px] py-[8px] text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-800 cursor-pointer"
              type="button"
            >
              <img class="hidden xl:block" src="/icons/image.svg" alt="" />
              <span class="xl:text-sm text-xs leading-normal text-zinc-900 font-semibold"
                >Edit Gambar</span
              >
              <input type="file" name="link_foto" class="hidden" />
            </label>
            <!-- Start Modal -->
            <div
              id="default-modal"
              data-modal-show="fasle"
              aria-hidden="fasle"
              class="hidden overflow-x-hidden overflow-y-auto z-50 fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center"
            >
              <div
                class="relative w-full max-w-2xl px-4 h-full md:h-auto flex justify-center"
              >
                <!-- Modal content -->
                <div class="bg-white rounded-lg shadow relative w-[500px]">
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
                      class="text-gray-900 text-base lg:text-2xl font-semibold text-center"
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
        
          <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
            <h3 class="w-full text-base">Nama Anak :</h3>
            <div class="w-full">
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="namaOrangTua"
                type="text"
                name="nama_anak"
                value="<?= $nama_anak ?>"
                placeholder="Input nama anak"
              />
            </div>
          </div>

          <!-- Start Tanggal -->
          <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
            <h1 class="w-full text-base">Tanggal Lahir :</h1>
            <div
              class="flex justify-start shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            >
              <div class="flex items-center relative z-[2] w-full py-2 px-3">
                <div class="antialiased w-full">
                  
                    <div class="w-full">
                      <div class="relative">
                        <input type="hidden" name="date" x-ref="date" />
                        <div class="flex items-center w-full justify-between">
                          <input
                            required
                            type="date"
                            name="tanggal_lahir"
                            value="<?= $tanggal_lahir ?>"
                          />
                        </div>
                      </div>
                    </div>
                </div>
                <!-- <img class="absolute right-0" src="/icons/down.svg" alt="" /> -->
              </div>
            </div>
          </div>
          <!-- End Tanggal -->

          <!-- Start Kelamin -->
          <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
            <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
              <h1 class="text-base w-full">Kelamin :</h1>
              <div class="flex justify-center w-full">
                <div class="flex items-center relative z-[2] w-full">
                  <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    aria-label="Default select example"
                    name="jenis_kelamin"
                  >
                    <option selected>Pilih Kelamin Anak</option>
                    <option value="Laki-laki" <?php if($jenis_kelamin == "Laki-laki"): ?>selected<?php endif; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if($jenis_kelamin == "Perempuan"): ?>selected<?php endif; ?>>Perempuan</option>
                  </select>
                  <img class="absolute right-[20px]" src="/icons/down.svg" alt="" />
                </div>
              </div>
            </div>
          </div>
          <!-- End Kelamin -->

          <input
            type="submit" value="Edit Data Anak"
            class="border-2 border-pink-500 bg-pink-500 px-[40px] py-[8px] rounded-[8px] font-semibold text-white text-base"
          >
          </a>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End User Dashboard -->

<?= $this->endSection() ?>
