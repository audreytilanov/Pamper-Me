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
          <h3 class="text-4xl font-bold">Pilih Metode pembayaran</h3>
        </div>
        <div class="flex flex-col items-start p-[32px] gap-[10px] bg-white rounded-md drop-shadow-lg">
            <div class="flex flex-col items-start pb-[24px] gap-[16px] border-b-2">
                <h3 class="font-bold text-2xl">Virtual Account</h3>
                <p>Anda bisa membayar dengan transfer melalui ATM, Internet Banking & Mobile Banking.</p>
            </div>

            <!-- Start VA -->
            <a href="/checkout/metode" class="w-full">
              <div class="flex flex-row justify-between items-center w-full pb-[8px] border-b-2 text-zinc-500 hover:text-zinc-900">
                  <h3 class="font-bold">BCA Virtual Account</h3>
                  <div class="flex flew-row items-center gap-[16px]">
  
                    <!-- Start Icon bank -->
                    <img src="/images/bca.png" alt="">
                    <!-- End Icon bank -->
  
                    <img src="/icons/right.svg" alt="">
                  </div>
              </div>
            </a>
            <!-- End VA -->

            <!-- Start VA -->
            <a href="/checkout/metode" class="w-full">
              <div class="flex flex-row justify-between items-center w-full pb-[8px] border-b-2 text-zinc-500 hover:text-zinc-900">
                  <h3 class="font-bold">Mandiri Virtual Account</h3>
                  <div class="flex flew-row items-center gap-[16px]">
  
                    <!-- Start Icon bank -->
                    <img src="/images/mandiri.png" alt="">
                    <!-- End Icon bank -->
  
                    <img src="/icons/right.svg" alt="">
                  </div>
              </div>
            </a>
            <!-- End VA -->

            <!-- Start VA -->
            <a href="/checkout/metode" class="w-full">
              <div class="flex flex-row justify-between items-center w-full pb-[8px] border-b-2 text-zinc-500 hover:text-zinc-900">
                  <h3 class="font-bold">BNI Virtual Account</h3>
                  <div class="flex flew-row items-center gap-[16px]">
  
                    <!-- Start Icon bank -->
                    <img src="/images/bni.png" alt="">
                    <!-- End Icon bank -->
  
                    <img src="/icons/right.svg" alt="">
                  </div>
              </div>
            </a>
            <!-- End VA -->

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
