<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<div class="px-[80px] py-[64px] flex flex-col items-start gap-[32px]">
  <div class="mt-[64px] flex flex-col items-start justify-between w-full">
    <!-- Start Timeline  -->
    <div class="flex justify-between items-center mt-[32px] gap-[16px]">
      <div class="flex">
        <img class="w-[20px] h-[20px]" src="/icons/checklist.png" alt="" />
        <div class="text-pink-500 ml-2 font-semibold text-base">Pesan</div>
      </div>
      <h2 class="border-pink-500"></h2>
      <div class="flex">
        <img class="w-[20px] h-[20px]" src="/icons/checklist.png" alt="" />
        <div class="text-pink-500 ml-2 font-semibold text-base">Bayar</div>
      </div>
      <h2 class="border-gray-400"></h2>
      <div class="flex">
        <img class="w-[20px] h-[20px]" src="/icons/nonCheck.png" alt="" />
        <div class="text-gray-400 ml-2 font-semibold text-base">Selesai</div>
      </div>
    </div>
    <!-- End Timeline -->

    <div class="w-full justify-center mt-[64px]">
      <div class="flex flex-col items-center gap-[64px]">
        <div class="flex flex-col items-center gap-[16px]">
          <h3 class="text-4xl font-bold">Selesaikan pembayaran dalam</h3>
          <h3 class="text-4xl font-bold text-pink-500">23:53:08</h3>
          <p class="text-zinc-500 text-base">Batas Akhir Pembayaran</p>
          <h3 class="font-bold text-xl">Senin, 24 Oktober 2022 08:52</h3>
        </div>

        <div
          class="flex flex-col items-start px-[40px] py-[64px] rounded-lg drop-shadow-lg bg-white w-[759px] gap-[24px] border"
        >
          <h3 class="text-xl font-bold">Silahkan Transfer ke</h3>
          <div
            class="flex flex-col items-start p-[32px] gap-[32px] bg-gray-50 rounded-lg w-full"
          >
            <div class="w-full">
              <p class="text-zinc-500">Transfer</p>
              <div
                class="flex flex-row justify-between items-center w-full pb-[8px] border-b-2"
              >
                <h3 class="font-bold">BCA Virtual Account</h3>
                <div class="flex flew-row items-center gap-[16px]">
                  <!-- Start Icon bank -->
                  <img src="/images/bca.png" alt="" />
                  <!-- End Icon bank -->

                  <img src="/icons/right.svg" alt="" />
                </div>
              </div>
            </div>
            <div class="w-full">
              <p class="text-zinc-500">Nomor Rekening</p>
              <div
                class="flex flex-row justify-between items-center w-full pb-[8px] border-b-2 mt-[8px]"
              >
                <h3 class="font-bold">52 6032 2488</h3>
              </div>
            </div>
            <div class="w-full">
              <p class="text-zinc-500">Pemilik Rekening</p>
              <div
                class="flex flex-row justify-between items-center w-full pb-[8px] border-b-2 mt-[8px]"
              >
                <h3 class="font-bold">Pamper bali</h3>
              </div>
            </div>
            <div class="w-full">
              <p class="text-zinc-500">Total Pembayaran</p>
              <div
                class="flex flex-row justify-between items-center w-full pb-[8px] border-b-2 mt-[8px]"
              >
                <h3 class="font-bold">Rp. 390,000</h3>
              </div>
            </div>
            <div class="w-full">
              <div class="flex items-center w-full flex-row gap-[8px]">
                <a
                  href="/checkout/metode"
                  class="border-2 border-pink-500 px-[16px] py-[10px] rounded-[8px] font-semibold text-base w-full text-center"
                >
                  Ganti Metode Pembayaran
                </a>
                <a
                  href=""
                  class="border-2 border-pink-500 text-center bg-pink-500 px-[16px] py-[10px] rounded-[8px] font-semibold text-white ml-2 text-base w-full"
                >
                  Lihat Daftar Pesanan
                </a>
              </div>
            </div>
          </div>
        </div>

        <div
          class="flex flex-col items-start px-[40px] py-[64px] rounded-lg drop-shadow-lg bg-white w-[759px] gap-[16px] border">
          <h3 class="text-xl font-bold">Cara Pembayaran</h3>
          <div class="flex flex-col items-start gap-[4px] w-full">
            <section class="w-full">
              <details class="mt-2 w-full">
                <summary
                  class="rounded-md py-2 px-4 w-full border-solid border-2 lg:text-base text-lg font-bold"
                >
                  ATM BCA
                </summary>
                <p
                  class="py-2 px-4 border-solid border-2 rounded-md mt-2 lg:text-base text-sm text-zinc-500"
                >
                  Laboris qui labore cillum culpa in sunt quis sint veniam.
                  Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis
                  minim velit nostrud pariatur culpa magna in aute.
                </p>
              </details>
            </section>
            <section class="w-full">
              <details class="mt-2 w-full">
                <summary
                  class="rounded-md py-2 px-4 w-full border-solid border-2 lg:text-base text-lg font-bold"
                >
                m-BCA (BCA mobile)
                </summary>
                <p
                  class="py-2 px-4 border-solid border-2 rounded-md mt-2 lg:text-base text-sm text-zinc-500"
                >
                  Laboris qui labore cillum culpa in sunt quis sint veniam.
                  Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis
                  minim velit nostrud pariatur culpa magna in aute.
                </p>
              </details>
            </section>
            <section class="w-full">
              <details class="mt-2 w-full">
                <summary
                  class="rounded-md py-2 px-4 w-full border-solid border-2 lg:text-base text-lg font-bold"
                >
                Internet Banking BCA
                </summary>
                <p
                  class="py-2 px-4 border-solid border-2 rounded-md mt-2 lg:text-base text-sm text-zinc-500"
                >
                  Laboris qui labore cillum culpa in sunt quis sint veniam.
                  Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis
                  minim velit nostrud pariatur culpa magna in aute.
                </p>
              </details>
            </section>
            <section class="w-full">
              <details class="mt-2 w-full">
                <summary
                  class="rounded-md py-2 px-4 w-full border-solid border-2 lg:text-base text-lg font-bold"
                >
                Kantor Bank BCA
                </summary>
                <p
                  class="py-2 px-4 border-solid border-2 rounded-md mt-2 lg:text-base text-sm text-zinc-500"
                >
                  Laboris qui labore cillum culpa in sunt quis sint veniam.
                  Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis
                  minim velit nostrud pariatur culpa magna in aute.
                </p>
              </details>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
