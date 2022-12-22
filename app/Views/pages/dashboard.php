<?= $this->extend('layout/pageLayoutLogin') ?>

<?= $this->section('content') ?>
<?php $session = session() ?>

<!-- Start User Dashboard -->
<div class="px-[24px] xl:px-[80px] py-[64px]">
  <div class="grid xl:grid-cols-2 gap-[24px]">
    <div class="flex flex-col items-start gap-[32px]">
      <div class="flex flex-col items-start gap-[8px]">
        <h1 class="font-bold xl:text-5xl xl:mt-[50px] mt-[40px] text-2xl">Detail Akun</h1>
        <p class="text-base ml-[4px]">
          Di sini kamu bisa mengatur detail akunmu.
        </p>
      </div>
      <div
        class="xl:p-[40px] p-[16px] border border-zinc-900 w-full flex flex-col items-start gap-[32px] rounded-lg"
      >
        <div class="flex flex-col items-start gap-[40px]">
          <div class="xl:flex flex-row gap-[24px] items-center">
          <?php if(empty($link_foto)){ ?>
          <img
            class="w-[190px] h-[190px] object-cover rounded-lg"
            src="/images/dashboardLogo.png"
            alt=""
          />
          <?php }else{ ?>
            <img
            class="w-[190px] h-[190px] object-cover rounded-lg"
            src="/images/<?= $link_foto?>"
            alt=""
          />
          <?php } ?>
            <div class="flex flex-col items-start gap-[8px]">
              <h1 class="xl:text-2xl text-xl font-semibold mt-[8px] xl:mt-[0px]"><?= $nama_orangtua; ?></h1>
              <div class="flex flex-row items-center gap-[16px]">
                <img class="" src="/icons/maps.svg" alt="" />
                <p>Kab. Badung, Bali</p>
              </div>
            </div>
          </div>
        </div>
        <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
          <h3 class="w-full text-base">Nama orang tua :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >
            <?= $nama_orangtua; ?>
          </div>
        </div>
        <!-- <div class="flex flex-row items-start w-full items-center">
          <h3 class="w-full text-base">Alamat :</h3>
          <div
            class="flex flex-row items-center gap-[16px] py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >
            <img class="" src="/icons/maps.svg" alt="" />
            <p>Kab. Badung, Bali</p>
          </div>
        </div> -->
        <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
          <h3 class="w-full text-base">Email :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >
          <?= $email; ?>
          </div>
        </div>
        <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
          <h3 class="w-full text-base">No Whatsapp :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >
          <?= $no_whatsapp; ?>
          </div>
        </div>
        <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
          <h3 class="w-full text-base">Ubah password :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >
            *********
          </div>
        </div>
        <a
          href="<?= url_to('user.dashboard.edit') ?>"
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
