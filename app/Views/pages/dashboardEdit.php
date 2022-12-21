<?= $this->extend('layout/pageLayoutLogin') ?>

<?= $this->section('content') ?>
<?php $session = session() ?>

<!-- Start User Dashboard -->
<div class="px-[24px] xl:px-[80px] py-[64px]">
  <div class="grid xl:grid-cols-2 gap-[24px]">
    <div class="flex flex-col items-start gap-[32px]">
      <div class="flex flex-col items-start gap-[8px]">
        <h1 class="font-bold xl:text-5xl xl:mt-[50px] mt-[40px] text-2xl">Edit Akun</h1>
        <p class="text-base ml-[4px]">
          Di sini kamu bisa mengatur detail akunmu.
        </p>
      </div>
      <div
        class="xl:p-[40px] p-[16px] border border-zinc-900 w-full flex flex-col items-start gap-[32px] rounded-lg"
      >
        <div class="flex flex-col items-start gap-[8px]">
          <div class="xl:flex flex-row gap-[24px] items-center">
            
            <?php if(empty($link_foto)){ ?>
              <img
              class="w-[190px] h-[190px] object-cover rounded-lg"
              id="ajaxImgUpload" 
              alt="Preview Image" 
              src="https://via.placeholder.com/300"
            />
            <?php }else{ ?>
              <img
              class="w-[190px] h-[190px] object-cover rounded-lg"
              src="/ortu/<?= $link_foto?>"
              id="ajaxImgUpload" 
              alt="Preview Image" 
            />
            <?php } ?>
            <div class="flex flex-col items-start gap-[8px]">
              <h1 class="text-2xl font-semibold"><?= $nama_orangtua; ?></h1>
              <div class="flex flex-row items-center gap-[16px]">
                <img class="" src="/icons/maps.svg" alt="" />
                <p>Kab. Badung, Bali</p>
              </div>
            </div>
          </div>
          <form class="w-full flex flex-col gap-[24px] items-start" action="<?= base_url('user/dashboard/edit/'. $session->get('user_id')) ?>" method="POST"
          enctype="multipart/form-data">
        <?= csrf_field(); ?>
          <div class="flex flex-row justify-start gap-[8px]">
            <label
              class="flex flex-row gap-[4px] items-center text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-[8px] py-[8px] text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-800 cursor-pointer"
              type="button"
            >
              <div class="hidden xl:block">
                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M7.87402 11.375C8.70245 11.375 9.37402 10.7034 9.37402 9.875C9.37402 9.04657 8.70245 8.375 7.87402 8.375C7.0456 8.375 6.37402 9.04657 6.37402 9.875C6.37402 10.7034 7.0456 11.375 7.87402 11.375Z" fill="#ffffff"/>
                  <path d="M10.874 14.375L9.37402 12.375L6.37402 16.375H18.374L13.874 10.375L10.874 14.375Z" fill="#ffffff"/>
                  <path d="M20.374 4.375H4.37402C3.27102 4.375 2.37402 5.272 2.37402 6.375V18.375C2.37402 19.478 3.27102 20.375 4.37402 20.375H20.374C21.477 20.375 22.374 19.478 22.374 18.375V6.375C22.374 5.272 21.477 4.375 20.374 4.375ZM4.37402 18.375V6.375H20.374L20.376 18.375H4.37402V18.375Z" fill="#ffffff"/>
                </svg>
              </div>
              <span class="md:text-sm leading-normal text-white text-xs"
                >Ganti Gambar</span>
                
              <input type="file" name="link_foto" class="hidden" id="finput" onchange="onFileUpload(this);" name="image" accept="image/*"/>
              </label>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
              <script>
                  function onFileUpload(input, id) {
                      id = id || '#ajaxImgUpload';
                      if (input.files && input.files[0]) {
                          var reader = new FileReader();
                          reader.onload = function (e) {
                              $(id).attr('src', e.target.result).width(300)
                          };
                          reader.readAsDataURL(input.files[0]);
                      }
                  }
              </script>

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
            <h3 class="w-full text-base">Nama orang tua :</h3>
            <div class="w-full">
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="namaOrangTua"
                type="text"
                name="nama_orangtua"
                value="<?= $nama_orangtua ?>"
              />
            </div>
          </div>
          <!-- <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
            <h3 class="w-full text-base">Alamat :</h3>
            <div class="w-full">
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="namaOrangTua"
                type="text"
                name="email"
                value="Kab. Badung, Bali"
              />
            </div>
          </div> -->
          <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
            <h3 class="w-full text-base">Email :</h3>
            <div class="w-full">
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="namaOrangTua"
                type="email"
                name="email"
                value="<?= $email ?>"
              />
            </div>
          </div>
          <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
            <h3 class="w-full text-base">No WA :</h3>
            <div class="w-full">
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="namaOrangTua"
                type="number"
                name="no_whatsapp"
                value="<?= $no_whatsapp ?>"
              />
            </div>
          </div>
          <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
            <h3 class="w-full text-base">Password :</h3>
            <div class="w-full">
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="namaOrangTua"
                type="password"
                name="password"
                required
              />
            </div>
          </div>
          <!-- <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
            <h3 class="w-full text-base">Ubah password :</h3>
            <div class="w-full">
              <div class="py-2" x-data="{ show: true }">
                <div class="relative">
                  <input
                    placeholder=""
                    :type="show ? 'password' : 'text'"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="password"
                  />
                  <div
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5"
                  >
                    <svg
                      class="h-6 text-gray-700"
                      fill="none"
                      @click="show = !show"
                      :class="{'hidden': !show, 'block':show }"
                      xmlns="http://www.w3.org/2000/svg"
                      viewbox="0 0 576 512"
                    >
                      <path
                        fill="currentColor"
                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"
                      ></path>
                    </svg>

                    <svg
                      class="h-6 text-gray-700"
                      fill="none"
                      @click="show = !show"
                      :class="{'block': !show, 'hidden':show }"
                      xmlns="http://www.w3.org/2000/svg"
                      viewbox="0 0 640 512"
                    >
                      <path
                        fill="currentColor"
                        d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"
                      ></path>
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <button
          type="submit"
            class="border-2 border-pink-500 bg-pink-500 px-[40px] py-[8px] rounded-[8px] font-semibold text-white text-base"
          >
            Simpan Data Diri
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End User Dashboard -->

<?= $this->endSection() ?>
