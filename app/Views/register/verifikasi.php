<?= $this->extend('layoutRegister/pageLayout') ?>

<?= $this->section('content') ?>

<div class="xl:grid xl:gap-4 xl:grid-cols-2">
  <div class="xl:px-[80px] px-[24px] w-full">

    <!-- Start Navbar & Logo -->
    <div class="pt-[32px]">
      <a href="/"><img src="/images/logo.png" alt="" /></a>
      <div class="gap-[16px] flex items-center flex-row mt-[32px]">
        <div class="flex flex-col md:flex-row items-center gap-[4px]">
          <img class="w-[20px] h-[20px]" src="/icons/checklist.png" alt="" />
          <div class="text-pink-500 xl:ml-2 font-semibold xl:text-base text-xs text-center xl:text-left">
            Daftar akun
          </div>
        </div>
        <h2 class="border-gray-400"></h2>
        <div class="flex flex-col md:flex-row items-center gap-[4px]">
          <img class="w-[20px] h-[20px]" src="/icons/checklist.png" alt="" />
          <div class="text-pink-500 xl:ml-2 font-semibold xl:text-base xl:text-left text-center text-xs">
            Verifikasi
          </div>
        </div>
        <h2 class="border-gray-400"></h2>
        <div class="flex flex-col md:flex-row items-center gap-[4px]">
          <img class="w-[20px] h-[20px]" src="/icons/nonCheck.png" alt="" />
          <div class="text-gray-400 xl:ml-2 font-semibold xl:text-base xl:text-left text-center text-xs">
            Masuk Akun
          </div>
        </div>
      </div>
    </div>
    <!-- End Navbar & Logo -->

    <!-- Start Forms -->
    <div class="pt-[32px] h-full">
      <form class="flex flex-col items-start xl:gap-[80px] gap-[32px]">
        <div class="w-full flex justify-end">
          <img class="" src="/images/star.png" alt="">
        </div>
        <h1 class="font-bold sm:text-3xl text-2xl text-center md:px-[24px] lg:px-[160px] xl:p-[0px]">Silahkan cek WhatsApp anda untuk memverifikasi akun</h1>
        <img src="/images/rainbow.png" alt="">
      </form>
    </div>
    <!-- End Forms  -->
  </div>
  <div>
    <img class="h-screen fixed hidden xl:block" src="/images/baby.png" alt="" />
  </div>
</div>

<?= $this->endSection() ?>
