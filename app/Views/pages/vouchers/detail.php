<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<div class="px-[80px] py-[64px] flex flex-col items-start gap-[32px]">
  <div class="mt-[64px] flex flex-col items-start justify-between w-full">
    <div class="flex flex-row gap-[40px] items-start">
      <!-- Start Left -->
      <div class="w-full flex flex-col items-start gap-[40px] w-[780px]">
        <h3 class="text-4xl font-bold">Detail Voucher</h3>
        <div class="flex flex-col items-start gap-[32px]">
          <div class="p-[32px] drop-shadow-md border bg-white rounded-xl">
            <img
              class="rounded-xl w-full object-cover"
              src="/images/legVoucher.png"
              alt=""
            />
          </div>
          <div class="p-[32px] drop-shadow-md border bg-white rounded-xl">
            <div class="flex flex-col items-start gap-[16px]">
              <h3 class="text-xl font-bold">Promo Precious Baby Massage</h3>
              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s, when an unknown printer took a galley
                of type and scrambled it to make a type specimen book. It has
                survived not only five centuries, but also the leap into
                electronic typesetting, remaining essentially unchanged. It was
                popularised in the 1960s with the release of Letraset sheets
                containing Lorem Ipsum passages, and more recently with desktop
                publishing software like Aldus PageMaker including versions of
                Lorem Ipsum.
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- End Left -->

      <!-- Strat Right -->
      <div
        class="px-[24px] py-[40px] drop-shadow-md border bg-white rounded-xl flex-col gap-[24px] items-start w-[320px]" 
      >
        <div class="flex flex-col gap-[24px] items-start">
          <div
            class="flex flex-col items-start pb-[24px] border-b-2 gap-[16px] w-full">
            <h3 class="text-xl font-bold">Info Promo</h3>
            <div class="flex items-start flex-row gap-[8px]">
              <img src="/icons/time.svg" alt="" />
              <div class="flex flex-col items-start text-sm">
                <p>Periode Promo</p>
                <p>31 Okt - 6 Nov 2022</p>
              </div>
            </div>
            <div class="flex items-start flex-row gap-[8px]">
              <div>
                <svg
                  width="26"
                  height="27"
                  viewBox="0 0 26 27"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M22.7657 4.86914H3.3492C3.06311 4.86914 2.78874 4.98279 2.58645 5.18508C2.38416 5.38738 2.27051 5.66175 2.27051 5.94784V21.0496C2.27051 21.3356 2.38416 21.61 2.58645 21.8123C2.78874 22.0146 3.06311 22.1283 3.3492 22.1283H22.7657C23.0518 22.1283 23.3262 22.0146 23.5285 21.8123C23.7308 21.61 23.8444 21.3356 23.8444 21.0496V5.94784C23.8444 5.66175 23.7308 5.38738 23.5285 5.18508C23.3262 4.98279 23.0518 4.86914 22.7657 4.86914ZM21.687 16.7348C20.8287 16.7348 20.0056 17.0757 19.3988 17.6826C18.7919 18.2895 18.4509 19.1126 18.4509 19.9709H7.66398C7.66398 19.1126 7.32304 18.2895 6.71615 17.6826C6.10927 17.0757 5.28616 16.7348 4.4279 16.7348V10.2626C5.28616 10.2626 6.10927 9.92167 6.71615 9.31479C7.32304 8.7079 7.66398 7.88479 7.66398 7.02653H18.4509C18.4509 7.88479 18.7919 8.7079 19.3988 9.31479C20.0056 9.92167 20.8287 10.2626 21.687 10.2626V16.7348Z"
                    fill="#71717a"
                  />
                  <path
                    d="M13.056 9.18359C10.6764 9.18359 8.74121 11.1188 8.74121 13.4984C8.74121 15.878 10.6764 17.8132 13.056 17.8132C15.4356 17.8132 17.3708 15.878 17.3708 13.4984C17.3708 11.1188 15.4356 9.18359 13.056 9.18359ZM13.056 15.6558C11.8662 15.6558 10.8986 14.6882 10.8986 13.4984C10.8986 12.3086 11.8662 11.341 13.056 11.341C14.2458 11.341 15.2134 12.3086 15.2134 13.4984C15.2134 14.6882 14.2458 15.6558 13.056 15.6558Z"
                    fill="#71717a"
                  />
                </svg>
              </div>
              <div class="flex flex-col items-start text-sm">
                <p>Minimum Transaksi</p>
                <p>Rp 500.000,-</p>
              </div>
            </div>
          </div>

          <div
            class="flex flex-col items-start pb-[24px] border-b-2 gap-[16px] w-full">
            <div class="flex flex-row gap-[8px] items-start">
              <img src="/icons/discount.svg" alt="">
              <h3 class="text-base font-bold text-pink-500">Kode Kupon</h3>
            </div>
            <div class="flex px-[16px] py-[10px] justify-center text-pink-500 bg-pink-100 border-pink-500 rounded-lg border w-full">
              PROMO1010
            </div>
          </div>

          <a
            href="/"
            class="text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-sm px-[64px] py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800 w-full">
            Cari
          </a>
        </div>
      </div>
      <!-- ENd Right -->
    </div>
  </div>
</div>
<?= $this->endSection() ?>
