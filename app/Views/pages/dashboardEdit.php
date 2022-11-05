<?= $this->extend('layout/pageLayoutLogin') ?>

<?= $this->section('content') ?>

<!-- Start User Dashboard -->
    <div class="px-[80px] py-[64px]">
    
    <div class="grid grid-cols-2 gap-[24px]">
        <div class="flex flex-col items-start gap-[32px]">
            <div class="flex flex-col items-start gap-[8px]">
                <h1 class="font-bold text-5xl mt-[50px]">Edit Akun</h1>
                <p class="text-base ml-[4px]">Di sini kamu bisa mengatur detail akunmu.</p>
            </div>
            <div class="p-[40px] border border-zinc-900 w-full flex flex-col items-start gap-[32px] rounded-lg">
                <div class="flex flex-col items-start gap-[8px]">
                    <img class="w-[190px] h-[190px] object-cover rounded-lg" src="/images/dashboardLogo.png" alt="">
                    <div>
                        <label class="flex flex-row gap-[8px] items-center px-[8px] py-[8px] bg-white text-blue rounded-md tracking-wide bg-yellow-400 cursor-pointer">
                            <img src="/icons/image.svg" alt="">
                            <span class="text-base leading-normal text-white">Ganti Gambar</span>
                            <input type='file' class="hidden" />
                        </label>
                        
                    </div>
                    <div class="flex flex-col items-start gap-[8px]">
                        <h1 class="text-2xl font-semibold">Kurt Cobain</h1>
                        <div class="flex flex-row items-center gap-[16px]">
                            <img class="" src="/icons/maps.svg" alt="">
                            <p>Kab. Badung, Bali</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-start w-full items-center">
                    <h3 class="w-full text-xl">Nama orang tua :</h3>
                    <div class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-xl">Kurt Cobain</div>
                </div>
                <div class="flex flex-row items-start w-full items-center">
                    <h3 class="w-full text-xl">Alamat :</h3>
                    <div class="flex flex-row items-center gap-[16px] py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-xl">
                        <img class="" src="/icons/maps.svg" alt="">
                        <p>Kab. Badung, Bali</p>
                    </div>
                </div>
                <div class="flex flex-row items-start w-full items-center">
                    <h3 class="w-full text-xl">Email :</h3>
                    <div class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-xl">kurt@gmail.com</div>
                </div>
                <div class="flex flex-row items-start w-full items-center">
                    <h3 class="w-full text-xl">No WA :</h3>
                    <div class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-xl">0819219212929</div>
                </div>
                <div class="flex flex-row items-start w-full items-center">
                    <h3 class="w-full text-xl">Ubah password :</h3>
                    <div class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-xl">*********</div>
                </div>
                <a href="<?= url_to('user.register') ?>" class="border-2 border-pink-500  bg-pink-500 px-[40px] py-[8px] rounded-[8px] font-semibold text-white text-lg">
                    Edit Data Diri
                </a>
            </div>
        </div>
    </div>

    </div>
<!-- End User Dashboard -->

<?= $this->endSection() ?>