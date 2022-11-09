<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start User Dashboard -->
<div class="px-[80px] py-[64px] flex flex-col items-center gap-[40px]">
    <div class="mt-[64px] flex flex-col items-center gap-[8px]">
        <h1 class="text-2xl text-pink-500 font-bold">Nama anak :</h1>
        <h1 class="font-bold text-5xl text-pink-500 font-bold">Frans Wahyu Virgawan</h1>
    </div>
    <img class="w-[300px] h-[300px]" src="/images/scanBarcode.png" alt="">
    <div class="flex flex-col items-center gap-[8px]">
        <h1 class="text-2xl text-pink-500 font-bold">Silahkan scan barcode ini</h1>
        <h1 class="text-2xl text-pink-500 font-bold">untuk melanjutkan layanan 😊</h1>
    </div>
</div>
<!-- End User Dashboard -->

<?= $this->endSection() ?>
