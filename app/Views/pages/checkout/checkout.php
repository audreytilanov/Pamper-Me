<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<div class="px-[80px] py-[64px] flex flex-col items-start gap-[32px]">
  
  
  <div class="mt-[64px] flex flex-col items-start justify-between w-full">

    <!-- Start Timeline  -->
    <div class="flex justify-between items-center mt-[32px] gap-[16px]">
        <div class="flex">
          <img class="w-[20px] h-[20px]" src="/icons/checklist.png" alt="" />
          <div class="text-pink-500 ml-2 font-semibold text-base">
            Pesan
          </div>
        </div>
        <h2 class="border-gray-400"></h2>
        <div class="flex">
          <img class="w-[20px] h-[20px]" src="/icons/nonCheck.png" alt="" />
          <div class="text-gray-400 ml-2 font-semibold text-base">
            Bayar
          </div>
        </div>
        <h2 class="border-gray-400"></h2>
        <div class="flex">
          <img class="w-[20px] h-[20px]" src="/icons/nonCheck.png" alt="" />
          <div class="text-gray-400 ml-2 font-semibold text-base">
            Selesai
          </div>
        </div>
      </div>
  <!-- End Timeline -->

    <div class="flex flex-row items-start justify-between gap-[40px] mt-[40px]">
      <div class="w-[748.344px]">
        <div class="w-full">
          <h3 class="text-4xl font-bold">Checkout</h3>
        </div>
        <div class="flex flex-col items-start gap-[32px] w-full">
          <!-- Start Select All -->
          <div
            class="flex flex-row justify-between items-center w-full pb-[24px] border-b-4 mt-[32px]">
            <div class="flex items-center">
            <div class="flex-col flex gap-[8px]">
              <h3 class="font-bold text-xl">
                Alamat treatment
              </h3>
              <div>
                <p>Pamper Me Bali (Renon)</p>
                <p>0812-3892-9999</p>
                <p class="text-zinc-500">Jl. Tukad Unda IV No.11, Panjer, Denpasar Selatan, Kota Denpasar, Bali 80234</p>
              </div>
            </div>
            </div>
          </div>
          <!-- End Select All -->

          <!-- Start Cards Keranjang -->
          <div
            class="flex flex-row justify-between items-start pb-[32px] border-b-4 w-full">
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
          </div>
          <div
            class="flex flex-row justify-between items-start pb-[32px] border-b-4 w-full">
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
          </div>
          <div
            class="flex flex-row justify-between items-start pb-[32px] border-b-4 w-full">
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
          </div>
          <!-- End Cards Keranjang -->
        </div>
      </div>

      <!-- Start List Harga -->
      <div
        class="flex items-start gap-[10px] py-[40px] px-[24px] drop-shadow-xl bg-white rounded-md"
      >
        <div class="flex flex-col items-start gap-[24px]">
          <div
            class="flex flex-col items-start pb-[24px] gap-[24px] border-b-4"
          >
            <h4 class="font-bold font-bold text-xl">Ringkasan pesanan</h4>
            <ul class="space-y-1 max-w-md list-disc list-inside">
              <li class="flex items-center flex-row gap-[48px] text-sm">
                <div class="flex flex-row items-center gap-[16px]">
                  <img src="/icons/circle.svg" alt="" />
                  <p>Precious Baby Massage</p>
                </div>
                <p>Rp. 130,000</p>
              </li>
              <li class="flex items-center flex-row gap-[48px] text-sm">
                <div class="flex flex-row items-center gap-[16px]">
                  <img src="/icons/circle.svg" alt="" />
                  <p>Precious Baby Massage</p>
                </div>
                <p>Rp. 130,000</p>
              </li>
              <li class="flex items-center flex-row gap-[48px] text-sm">
                <div class="flex flex-row items-center gap-[16px]">
                  <img src="/icons/circle.svg" alt="" />
                  <p>Precious Baby Massage</p>
                </div>
                <p>Rp. 130,000</p>
              </li>
            </ul>
          </div>
          <div class="w-full flex flex-col gap-[16px]">
            <div
              class="flex items-center flex-row justify-between px-[16px] py-[10px] w-full bg-pink-100 border-2 border-pink-500 rounded-lg text-pink-500 font-bold text-sm"
            >
              <p>Order Total</p>
              <p>Rp. 390,000</p>
            </div>

            <a
              href="/checkout/metode-bayar"
              class="flex flex-row gap-[8px] items-center justify-center text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-sm px-[16px] py-[12px] text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800 w-full text-sm"
            >
              Checkout
            </a>
          </div>
        </div>
      </div>
      <!-- End List Harga -->
    </div>
  </div>
  
</div>
<?= $this->endSection() ?>
