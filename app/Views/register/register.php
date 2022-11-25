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
          <img class="w-[20px] h-[20px]" src="/icons/nonCheck.png" alt="" />
          <div class="text-gray-400 xl:ml-2 font-semibold xl:text-base xl:text-left text-center text-xs">
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
    <div class="pt-[32px]">
      <form method="post" action="<?= base_url('/register/save') ?>">
      <?= csrf_field(); ?>
        <h1 class="font-bold text-3xl">Daftar Pamper Me</h1>
        <div class="py-[32px]">
          <div class="mb-4">
            <label
              class="block text-gray-700 text-sm font-bold mb-2"
              for="namaOrangTua"
            >
              Nama Orang Tua
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="namaOrangTua"
              type="text"
              placeholder="Masukkan nama orang tua"
              name="nama_orangtua"
            />
          </div>
          <div class="mb-4">
            <label
              class="block text-gray-700 text-sm font-bold mb-2"
              for="email"
            >
              Email
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="email"
              type="text"
              placeholder="Masukkan email"
              name="email"
            />
          </div>
          <div class="mb-4">
            <label
              class="block text-gray-700 text-sm font-bold mb-2"
              for="wa"
            >
              Nomor Whatsapp
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="wa"
              type="text"
              placeholder="Masukkan nomor WA"
              name="no_whatsapp"
            />
          </div>
          <div class="mb-4">
            <label
              class="block text-gray-700 text-sm font-bold mb-2"
              for="password"
            >
              Password
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="password"
              type="password"
              placeholder="Masukkan Password"
              name="password"
            />
          </div>
          <div class="flex items-center justify-between">
            <button
              class="w-full bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              type="submit"
            >
                Membuat Akun
            </button>
          </div>
          <div class="flex justify-center mt-4 text-gray-400">
            Sudah punya akun? <span> <a href="login" class="text-blue-500 font-semibold ml-[4px]"> Masuk</a> </span> 
          </div>
        </div>
      </form>
    </div>
    <!-- End Forms  -->
  </div>
  <div class="hidden xl:block">
    <img class="h-screen fixed" src="/images/baby.png" alt="" />
  </div>
</div>

<?= $this->endSection() ?>
