<?= $this->extend('layout/pageLayoutLogin') ?>

<?= $this->section('content') ?>

<!-- Start User Dashboard -->
<div class="px-[24px] xl:px-[80px] py-[64px]">
  <div class="flex flex-col items-start gap-[24px]">
    <div class="flex flex-col items-start gap-[8px]">
      <h1 class="font-bold xl:text-5xl xl:mt-[50px] mt-[40px] text-2xl">Tambah Data Diri Anak</h1>
      <p class="text-base ml-[4px]">
        Halaman ini dapat menambahkan data diri dari anak.
      </p>
    </div>
    <a
      href="<?= url_to('user.anak.add') ?>"
      class="border-2 border-pink-500 bg-pink-500 px-[40px] py-[8px] rounded-[8px] font-semibold text-white text-base"
    >
      + Tambah Data Anak
    </a>
  </div>

  <!-- Start All Cards -->

  <div class="grid xl:grid-cols-2 gap-[24px] items-end mt-[40px]">
  <?php foreach($data as $data) :
    ?>
    <div
      class="xl:p-[40px] p-[16px] border border-zinc-900 w-full flex flex-col items-start gap-[32px] rounded-lg"
    >
      <div class="flex flex-col items-start gap-[8px]">
        <div class="flex flex-row gap-[24px] items-center">
          <img
            class="w-[190px] h-[190px] object-cover rounded-lg"
            src="/images/baby.jpg"
            alt=""
          />
        </div>
        <div class="flex flex-row justify-start gap-[8px]">
          <a
            class="flex flex-row gap-[4px] items-center text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-md text-sm px-[8px] py-[8px] text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-800 cursor-pointer"
            href="<?= base_url('user/data-anak/edit/'. $data['id_anak']) ?>"
          >
            <img class="hidden xl:block" src="/icons/edit.svg" alt="" />
            <span class="xl:text-sm text-xs leading-normal text-zinc-900 font-semibold"
              >Edit Data Anak</span
            >
          </a>
          <button
            class="flex flex-row gap-[4px] items-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-md xl:text-sm text-xs px-[8px] py-[8px] text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
            type="button"
            data-modal-toggle="default-modal">
            <img class="hidden xl:block" src="/icons/trash.svg" alt="" />
            Hapus Data Anak
          </button>

          <!-- Start Modal -->
          <div
            id="default-modal"
            data-modal-show="fasle"
            aria-hidden="fasle"
            class="hidden overflow-x-hidden overflow-y-auto z-50 fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
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
                    Apakah benar anda ingin menghapus Data Anak Anda?
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
      <form
        class="w-full flex flex-col gap-[24px] items-start"
        action=""
        method="POST"
      >
        <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
          <h3 class="w-full text-base">Nama anak :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >
            <?php echo $data['nama_anak'] ?>
          </div>
        </div>

        <!-- Start Tanggal -->
        <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
          <h3 class="w-full text-base">Tanggal Lahir :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >
            <?php echo $data['tanggal_lahir'] ?>
          </div>
        </div>
        <!-- End Tanggal -->

        <!-- Start Kelamin -->
        <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
          <h3 class="w-full text-base">Kelamin :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >
            <?php echo $data['jenis_kelamin'] ?>
          </div>
        </div>
        <!-- End Kelamin -->
        <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
          <h3 class="w-full text-base">QR Code :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >
            <?php
              if(!empty($data['link_barcode'])){
                // echo $data['link_barcode'];
                ?>
                <a
                  class="flex flex-row gap-[4px] items-center text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-md text-sm px-[8px] py-[8px] text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-800 cursor-pointer"
                  href="<?= base_url('user/data-anak/scan-barcode/'. $data['link_barcode']) ?>"
                >
                  <span class="xl:text-sm text-xs leading-normal text-zinc-900 font-bold"
                    >Lihat QrCode</span
                  >
                </a>
                <?php
              }else{
                echo "Pesan Layanan Terlebih Dahulu.";
              } 
            ?>
          </div>
        </div>
      </form>
    </div>
    <?php
      endforeach;

    ?>
  </div>
  <!-- End All Cards -->
</div>
<!-- End User Dashboard -->

<?= $this->endSection() ?>
