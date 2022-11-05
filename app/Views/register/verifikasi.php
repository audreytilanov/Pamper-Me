<?= $this->extend('layoutRegister/pageLayout') ?>

<?= $this->section('content') ?>

<div class="grid gap-4 grid-cols-2">
  <div class="px-[80px]">

    <!-- Start Navbar & Logo -->
    <div class="pt-[32px]">
      <a href="/"><img src="/images/logo.png" alt="" /></a>
      <div class="w-[480px] flex justify-between items-center mt-[32px]">
        <div class="flex">
          <img class="w-[20px] h-[20px]" src="/icons/checklist.png" alt="" />
          <div class="text-pink-500 ml-2 font-semibold text-base">
            Daftar akun
          </div>
        </div>
        <h2 class="border-gray-400"></h2>
        <div class="flex">
          <img class="w-[20px] h-[20px]" src="/icons/nonCheck.png" alt="" />
          <div class="text-gray-400 ml-2 font-semibold text-base">
            Verifikasi
          </div>
        </div>
        <h2 class="border-gray-400"></h2>
        <div class="flex">
          <img class="w-[20px] h-[20px]" src="/icons/nonCheck.png" alt="" />
          <div class="text-gray-400 ml-2 font-semibold text-base">
            Masuk Akun
          </div>
        </div>
      </div>
    </div>
    <!-- End Navbar & Logo -->

    <!-- Start Forms -->
    <div class="pt-[32px]">
      <form class="relative">
        <img class="absolute right-0 top-0" src="/images/star.png" alt="">
        <h1 class="font-bold text-3xl text-center py-[100px]">Silahkan cek WhatsApp anda untuk memverifikasi akun</h1>
        <img src="/images/rainbow.png" alt="">
      </form>
    </div>
    <!-- End Forms  -->
  </div>
  <div>
    <img class="h-screen fixed" src="/images/baby.png" alt="" />
  </div>
</div>

<?= $this->endSection() ?>
