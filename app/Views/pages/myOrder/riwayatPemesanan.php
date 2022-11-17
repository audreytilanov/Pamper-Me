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
              <div
                class="flex flex-row gap-[4px] items-center text-white bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-md text-sm px-[16px] py-[8px] text-center dark:focus:ring-green-600"
              >
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

                <span class="mt-[3px]"> Sudah Lunas </span>
              </div>
              <a
                href="/my-order/lunas"
                class="flex flex-row gap-[4px] border-2 items-center border-gray-400 hover:bg-gray-400 hover:text-white rounded-md text-sm px-[16px] py-[8px] text-center font-bold"
              >
                Details
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
              <div
                class="flex flex-row gap-[4px] items-center text-white bg-yellow-400 focus:ring-4 focus:ring-yellow-300 font-medium rounded-md text-sm px-[16px] py-[8px] text-center dark:focus:ring-yellow-600"
              >
                <svg
                  width="20"
                  height="20"
                  viewBox="0 0 25 25"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12.5627 2.99512C7.04874 2.99512 2.56274 7.48112 2.56274 12.9951C2.56274 18.5091 7.04874 22.9951 12.5627 22.9951C18.0767 22.9951 22.5627 18.5091 22.5627 12.9951C22.5627 7.48112 18.0767 2.99512 12.5627 2.99512ZM12.5627 20.9951C8.15174 20.9951 4.56274 17.4061 4.56274 12.9951C4.56274 8.58412 8.15174 4.99512 12.5627 4.99512C16.9737 4.99512 20.5627 8.58412 20.5627 12.9951C20.5627 17.4061 16.9737 20.9951 12.5627 20.9951Z"
                    fill="#ffffff"
                  />
                  <path
                    d="M13.5627 7.99512H11.5627V13.4091L14.8557 16.7021L16.2697 15.2881L13.5627 12.5811V7.99512Z"
                    fill="#ffffff"
                  />
                </svg>
                <span class="mt-[3px]"> Pending </span>
              </div>
              <a
                class="flex flex-row gap-[4px] border-2 items-center border-gray-400 hover:bg-gray-400 hover:text-white rounded-md text-sm px-[16px] py-[8px] text-center font-bold"
                href="/checkout/detail"
              >
                Details
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
