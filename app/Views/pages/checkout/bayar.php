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
        <h2 class="border-pink-500"></h2>
        <div class="flex">
          <img class="w-[20px] h-[20px]" src="/icons/checklist.png" alt="" />
          <div class="text-pink-500 ml-2 font-semibold text-base">
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
      <div class="w-[748.344px] flex flex-col items-start gap-[40px]">
        <div class="w-full">

          <!-- Start Nama Bank -->
          <h3 class="text-3xl font-bold">Bank BCA</h3>
          <!-- End Nama Bank -->

        </div>
        <div class="flex flex-col items-end p-[32px] gap-[24px] bg-white rounded-md drop-shadow-lg w-full">
            <div class="flex flex-row items-center justify-between w-full">

                <!-- Start Logo Bank -->
                <img src="/images/bcabig.png" alt="">
                <!-- End Logo Bank -->
                
                <!-- Start Logo Bank -->
                <img class="" src="/images/garansi.png" alt="">
                <!-- End Logo Bank -->

            </div>

            <div class="flex flex-col items-start gap-[8px] pb-[24px] border-b-2 w-full">
              <h4 class="font-bold text-2xl">Informasi Penting :</h4>
              <p class="text-zinc-500">Metode pembayaran ini tidak mendukung SKN/LLG/Kliring/SKBNI.</p>
            </div>

            <div class="w-full">
              <p>Dengan menekan tombol, Anda telah menyetujui <br>
                <a href="" class="text-blue-500">Syarat & Ketentuan</a>  dan <a href="" class="text-blue-500">Kebijakan Privasi</a>  pampermebali.com</p>
            </div>

            <a
              href="/checkout/detail"
              class="flex flex-row gap-[8px] items-center justify-center text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-base px-[80px] py-[12px] text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800"
            >
              Bayar
            </a>

        </div>


      </div>

      <!-- Start List Harga -->
      <div
        class="flex items-start gap-[10px] py-[40px] px-[24px] drop-shadow-xl bg-white rounded-md">
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
          <div class="flex flex-col items-start gap-[12px] w-full">
            <h4 class="font-bold font-bold text-xl">Detail Harga</h4>
            <div class="w-full flex flex-col gap-[16px]">
            <div
                class="flex items-center flex-row justify-between px-[16px] py-[10px] w-full bg-pink-100 border-2 border-pink-500 rounded-lg text-pink-500 font-bold text-sm"
            >
                <p>Order Total</p>
                <p>Rp. 390,000</p>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End List Harga -->
    </div>
  </div>
  
</div>
<?= $this->endSection() ?>
