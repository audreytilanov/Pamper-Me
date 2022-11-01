<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div>
    <img class="h-screen w-full object-cover" src="/images/babyBanner.png" alt="">
</div>

<div class="px-[80px] py-[64px]">
    <h1 class="font-bold text-[40px]">
        Layanan Treatment
    </h1>
    <div class="pt-[24px]">
        <h1 class="font-bold text-[14px]">
            Cabang / Lokasi :
        </h1>
        <div class="flex items-center justify-between w-[280px] pt-[10px]">
            <button 
              class="bg-pink-500 hover:bg-pink-700 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
              type="button"
            >
              <a href="/register/verifikasi">
                Gianyar
              </a>
            </button>
            <button 
              class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
              type="button"
            >
              <a href="/register/verifikasi">
                Renon
              </a>
            </button>
            <button 
              class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
              type="button"
            >
              <a href="/register/verifikasi">
                Jimbaran
              </a>
            </button>
          </div>
    </div>
    <div class="pt-[24px]">
        <h1 class="font-bold text-[14px]">
            Services
        </h1>
        <div class="flex items-center justify-between w-[280px] pt-[10px]">
            <button 
              class="bg-pink-500 hover:bg-pink-700 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
              type="button"
            >
              <a href="/register/verifikasi">
              Spa
              </a>
            </button>
            <button 
              class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
              type="button"
            >
              <a href="/register/verifikasi">
              Play Ground
              </a>
            </button>
            <button 
              class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
              type="button"
            >
              <a href="/register/verifikasi">
                Salon
              </a>
            </button>
          </div>
    </div>
    <div class="pt-[24px]">
        <h1 class="font-bold text-[14px]">
            Kategori
        </h1>
        <div class="flex items-center justify-between w-[450px] pt-[10px]">
            <button 
              class="bg-pink-500 hover:bg-pink-700 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
              type="button"
            >
              <a href="/register/verifikasi">
              Baby
              </a>
            </button>
            <button 
              class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
              type="button"
            >
              <a href="/register/verifikasi">
              Toddler
              </a>
            </button>
            <button 
              class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
              type="button"
            >
              <a href="/register/verifikasi">
              Children
              </a>
            </button>
            <button 
              class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
              type="button"
            >
              <a href="/register/verifikasi">
              Toddler
              </a>
            </button>
            <button 
              class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
              type="button"
            >
              <a href="/register/verifikasi">
              Kids
              </a>
            </button>
          </div>
    </div>
</div>

<?= $this->endSection() ?>
