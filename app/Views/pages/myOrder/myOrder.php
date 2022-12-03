<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<div class="px-[80px] py-[64px] flex flex-col items-start gap-[32px]">
  <!-- Start lihat antrian -->
  <div class="mt-[64px] flex flex-col items-start justify-between w-full">
    <div class="flex flex-row items-start justify-between gap-[40px]">
      <div class="flex flex-col gap-[40px] items-start">
        <div class="w-full">
          <h3 class="text-4xl font-bold">My Order</h3>
        </div>

        <!-- Start Filter -->
        <div
          class="w-full p-[16px] flex flex-row items-center justify-between bg-white shadow-md rounded-md border"
        >
          <div>
            <!-- Start Kelamin -->
            <div class="flex flex-row justify-between flex-start w-[200px]">
              <div class="flex flex-row justify-between flex-start w-full">
                <div class="flex justify-center w-full">
                  <div class="flex items-center relative z-[2] w-full">
                    <select
                      required
                      name="jenis_kelamin"
                      class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-100"
                      aria-label="Default select example"
                    >
                      <option selected>Filter</option>
                      <option value="Laki-laki">Belum bayar</option>
                      <option value="Perempuan">Lunas</option>
                    </select>
                    <img
                      class="absolute right-[20px]"
                      src="/icons/down.svg"
                      alt=""
                    />
                  </div>
                </div>
              </div>
            </div>
            <!-- End Kelamin -->
          </div>
          <a
            href="<?= base_url('user/my-order/riwayat/') ?>"
            class="font-bold text-base text-pink-500 flex flex-row gap-[8px] items-center">
            <img src="/icons/history.svg" alt="" />
            Riwayat pemesanan
          </div>
          </a>
        <!-- End Filter -->
        <?php foreach($data as $datas): ?>
        <div class="flex flex-col items-start gap-[32px] w-full">
          <!-- Start Cards Keranjang -->
          <div
            class="flex flex-row justify-between items-screth  pb-[32px] border-b-4 w-full "
          >
            <div class="flex flex-row items-start gap-[24px]">
              <div class="flex flex-row items-start gap-[24px]">
                <img
                  class="w-[292.11px] h-[162.93px] object-cover rounded-md"
                  src="/images/keranjangProduct.png"
                  alt=""
                />
                <div class="flex flex-col items-start gap-[16px]">
                  <div class="flex flex-col items-start gap-[16px]">
                    <h3 class="font-bold text-xl"><?= $datas['transaction_time'] ?></h3>
                    <h3 class="font-bold text-xl">ID: <?= $datas['id_transaksi_pembayaran'] ?></h3>
                  </div>
                  <div
                    class="flex flex-row items-center gap-[8px] border-b-4 pb-[16px]"
                  >
                    <img src="/icons/money.svg" alt="" />
                    <h3 class="font-bold text-lg text-pink-500">
                    Rp. <?php echo number_format($datas['total_biaya'] , 0, ',', '.'); ?> / <?= $datas['metode_pembayaran'] ?><br>
                    <?= $datas['bank']?> : <?= $datas['va_number_cc'] ?>
                    </h3>
                  </div>
                  <div class="grid grid-cols-2 gap-[10px]">
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">Order ID : <?= $datas['order_id'] ?></p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">Bank : <?= $datas['bank'] ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex flex-col items-end justify-between">
              <div class="flex flex-row items-stretch gap-[8px]">
                <div
                  class="flex flex-row gap-[4px] items-center text-white <?php if($datas['status_pembayaran'] == "pending"){echo "bg-yellow-500";}else{echo "bg-green-500";}; ?> focus:ring-4 focus:ring-green-300 font-medium rounded-md text-sm px-[16px] py-[8px] text-center dark:focus:ring-green-600">
                  <svg
                    width="19"
                    height="19"
                    viewBox="0 0 19 19"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M9.5568 1.57422C5.21713 1.57422 1.68652 5.10483 1.68652 9.4445C1.68652 13.7842 5.21713 17.3148 9.5568 17.3148C13.8965 17.3148 17.4271 13.7842 17.4271 9.4445C17.4271 5.10483 13.8965 1.57422 9.5568 1.57422ZM9.5568 15.7407C6.08522 15.7407 3.26058 12.9161 3.26058 9.4445C3.26058 5.97292 6.08522 3.14827 9.5568 3.14827C13.0284 3.14827 15.853 5.97292 15.853 9.4445C15.853 12.9161 13.0284 15.7407 9.5568 15.7407Z"
                      fill="#ffffff"
                    />
                    <path
                      d="M7.98121 10.6939L6.17183 8.88764L5.06055 10.0021L7.98278 12.918L13.2606 7.6402L12.1477 6.52734L7.98121 10.6939Z"
                      fill="#ffffff"
                    />
                  </svg>
  
                  <span class="mt-[3px]"> <?= $datas['status_pembayaran'] ?> </span>
                </div>
                <a
                  href="<?= base_url('user/my-order/detail-order/'. $datas['id_reservasi']) ?>"
                  class="flex flex-row gap-[4px] border-2 items-center border-gray-400 hover:bg-gray-400 hover:text-white rounded-md text-sm px-[16px] py-[8px] text-center font-bold"
                >
                  Details
                </a>

                <a
                  href="<?= base_url('user/my-order/invoice/'. $datas['id_reservasi']) ?>"
                  class="flex flex-row gap-[4px] border-2 items-center border-gray-400 hover:bg-gray-400 hover:text-white rounded-md text-sm px-[16px] py-[8px] text-center font-bold"
                >
                  Receipt
                </a>
                
                <form action="<?= base_url('user/my-order/notification/'. $datas['order_id']) ?>" method="POST">
                  <button
                    type="submit"
                    class="flex flex-row gap-[4px] border-2 items-center border-gray-400 hover:bg-gray-400 hover:text-white rounded-md text-sm px-[16px] py-[8px] text-center font-bold"
                  >
                    Cek Notif
                  </button>
                </form>
              </div>
          <!-- <button
            class="flex flex-row gap-[4px] items-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-md text-sm px-[8px] py-[8px] text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
            type="button"
            data-modal-toggle="default-modal">
            <img src="/icons/cancel.svg" alt="" />
            Cancel Pesanan
          </button> -->

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
          <!-- End Cards Keranjang -->
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <!-- End lihat antrian -->
</div>
<?= $this->endSection() ?>
