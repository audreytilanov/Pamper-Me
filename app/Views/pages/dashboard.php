<?= $this->extend('layout/pageLayoutLogin') ?>

<?= $this->section('content') ?>

<!-- Start User Dashboard -->
<div class="px-[80px] py-[64px]">
  <div class="grid grid-cols-2 gap-[24px]">
    <div class="flex flex-col items-start gap-[32px]">
      <div class="flex flex-col items-start gap-[8px]">
        <h1 class="font-bold text-5xl mt-[50px]">Detail Akun</h1>
        <p class="text-base ml-[4px]">
          Di sini kamu bisa mengatur detail akunmu.
        </p>
      </div>
      <div
        class="p-[40px] border border-zinc-900 w-full flex flex-col items-start gap-[32px] rounded-lg"
      >
        <div class="flex flex-col items-start gap-[40px]">
          <div class="flex flex-row gap-[24px] items-center">
            <img
              class="w-[190px] h-[190px] object-cover rounded-lg"
              src="/images/dashboardLogo.png"
              alt=""
            />
            <div class="flex flex-col items-start gap-[8px]">
              <h1 class="text-2xl font-semibold">Kurt Cobain</h1>
              <div class="flex flex-row items-center gap-[16px]">
                <img class="" src="/icons/maps.svg" alt="" />
                <p>Kab. Badung, Bali</p>
              </div>
            </div>
          </div>
        </div>
        <div class="flex flex-row items-start w-full items-center">
          <h3 class="w-full text-base">Nama orang tua :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >
            Kurt Cobain
          </div>
        </div>
        <div class="flex flex-row items-start w-full items-center">
          <h3 class="w-full text-base">Alamat :</h3>
          <div
            class="flex flex-row items-center gap-[16px] py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >
            <img class="" src="/icons/maps.svg" alt="" />
            <p>Kab. Badung, Bali</p>
          </div>
        </div>
        <div class="flex flex-row items-start w-full items-center">
          <h3 class="w-full text-base">Email :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >
            kurt@gmail.com
          </div>
        </div>
        <div class="flex flex-row items-start w-full items-center">
          <h3 class="w-full text-base">No WA :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >
            0819219212929
          </div>
        </div>
        <div class="flex flex-row items-start w-full items-center">
          <h3 class="w-full text-base">Ubah password :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >
            *********
          </div>
        </div>
        <a
          href="/dashboard/edit"
          class="border-2 border-pink-500 bg-pink-500 px-[40px] py-[8px] rounded-[8px] font-semibold text-white text-base"
        >
          Edit Data Diri
        </a>
      </div>
    </div>
  </div>
</div>
<!-- End User Dashboard -->

<?= $this->endSection() ?>
