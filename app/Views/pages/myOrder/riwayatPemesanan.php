<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<div class="px-[80px] py-[64px] flex flex-col items-start gap-[32px]">
  <!-- Start lihat antrian -->
  <div class="mt-[64px] flex flex-col items-start justify-between w-full">
    <div class="flex flex-row items-start justify-between gap-[40px]">
      <div class="flex flex-col gap-[40px] items-start">
        <div class="w-full">
          <h3 class="text-4xl font-bold">Riwayat Pemesanan</h3>
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
                      <option value="Laki-laki">Sudah Dipesan</option>
                      <option value="Perempuan">Expired</option>
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
          <div
            class="font-bold text-base text-pink-500 flex flex-row gap-[8px] items-center"
          >
            <img src="/icons/history.svg" alt="" />
            Riwayat pemesanan
          </div>
        </div>
        <!-- End Filter -->

        <div class="flex flex-col items-start gap-[32px] w-full">
          <!-- Start Cards Keranjang -->
          <div
            class="flex flex-row justify-between items-start pb-[32px] border-b-4 w-full"
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
                    <h3 class="font-bold text-xl">Precious Baby Massage</h3>
                  </div>
                  <div
                    class="flex flex-row items-center gap-[8px] border-b-4 pb-[16px]"
                  >
                    <img src="/icons/money.svg" alt="" />
                    <h3 class="font-bold text-lg text-pink-500">
                      Rp.130,000/40 menit
                    </h3>
                  </div>
                  <div class="grid grid-cols-2 gap-[10px]">
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">baby yoga</p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">blissful baby swim</p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">precious baby massage</p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">baby yoga</p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">blissful baby swim</p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">precious baby massage</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex flex-row items-stretch gap-[8px]">
              <a
                href="/my-order/detail-order"
                class="flex flex-row gap-[4px] border-2 items-center border-gray-400 hover:bg-gray-400 hover:text-white rounded-md text-sm px-[16px] py-[8px] text-center font-bold"
              >
                Sudah Dipesan
              </a>
            </div>
          </div>
          <!-- End Cards Keranjang -->
        </div>

        <div class="flex flex-col items-start gap-[32px] w-full">
          <!-- Start Cards Keranjang -->
          <div
            class="flex flex-row justify-between items-start pb-[32px] border-b-4 w-full"
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
                    <h3 class="font-bold text-xl">Precious Baby Massage</h3>
                  </div>
                  <div
                    class="flex flex-row items-center gap-[8px] border-b-4 pb-[16px]"
                  >
                    <img src="/icons/money.svg" alt="" />
                    <h3 class="font-bold text-lg text-pink-500">
                      Rp.130,000/40 menit
                    </h3>
                  </div>
                  <div class="grid grid-cols-2 gap-[10px]">
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">baby yoga</p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">blissful baby swim</p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">precious baby massage</p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">baby yoga</p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">blissful baby swim</p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">precious baby massage</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex flex-row items-stretch gap-[8px]">
              <a
                class="flex flex-row gap-[4px] border-2 items-center border-gray-400 hover:bg-gray-400 hover:text-white rounded-md text-sm px-[16px] py-[8px] text-center font-bold"
                href="/my-order/detail-order"
              >
              Expired
              </a>
            </div>
          </div>
          <!-- End Cards Keranjang -->
        </div>

        <div class="flex flex-col items-start gap-[32px] w-full">
          <!-- Start Cards Keranjang -->
          <div
            class="flex flex-row justify-between items-start pb-[32px] border-b-4 w-full"
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
                    <h3 class="font-bold text-xl">Precious Baby Massage</h3>
                  </div>
                  <div
                    class="flex flex-row items-center gap-[8px] border-b-4 pb-[16px]"
                  >
                    <img src="/icons/money.svg" alt="" />
                    <h3 class="font-bold text-lg text-pink-500">
                      Rp.130,000/40 menit
                    </h3>
                  </div>
                  <div class="grid grid-cols-2 gap-[10px]">
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">baby yoga</p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">blissful baby swim</p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">precious baby massage</p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">baby yoga</p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">blissful baby swim</p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs">precious baby massage</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex flex-row items-stretch gap-[8px]">
              <a
                class="flex flex-row gap-[4px] border-2 items-center border-gray-400 hover:bg-gray-400 hover:text-white rounded-md text-sm px-[16px] py-[8px] text-center font-bold"
                href="/my-order/detail-order"
              >
              Cancel
              </a>
            </div>
          </div>
          <!-- End Cards Keranjang -->
        </div>
      </div>
    </div>
  </div>
  <!-- End lihat antrian -->
</div>
<?= $this->endSection() ?>
