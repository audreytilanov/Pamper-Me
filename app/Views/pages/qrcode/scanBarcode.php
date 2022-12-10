<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start User Dashboard -->
<div class="px-[80px] py-[64px] flex flex-col items-center gap-[40px]">
    <div class="mt-[64px] flex flex-col items-center gap-[8px]">
        <h1 class="text-2xl text-pink-500 font-bold">Nama anak :</h1>
        <h1 class="font-bold text-5xl text-pink-500 font-bold"><?= $data['nama_anak'] ?></h1>
        <h3 class="font-bold text-2xl text-pink-500 font-bold"><?= $data['nama_produk'] ?></h3>
        <h3 class="font-bold text-2xl text-pink-500 font-bold">Jam :<?= $data['jam'] ?> (<?= $data['durasi'] ?> Menit)</h3>
    </div>
    <img class="w-[300px] h-[300px]" src="<?= $dataUri ?>">
    <div class="flex flex-col items-center gap-[8px]">
        <h1 class="text-2xl text-pink-500 font-bold">Silahkan tunjukkan barcode ini kepada pegawai</h1>
        <h1 class="text-2xl text-pink-500 font-bold">Note : Jangan di scan jika layanan belum dilakukan</h1>
    </div>
</div>
<!-- End User Dashboard -->

<?= $this->endSection() ?>
