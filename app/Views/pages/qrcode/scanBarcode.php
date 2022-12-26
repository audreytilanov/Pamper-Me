<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start User Dashboard -->
<div class="xl:px-[80px] px-[24px] py-[64px] flex flex-col items-center md:gap-[24px] gap-[16px] bg-pattern">
    <div class="mt-[64px] flex flex-col items-center gap-[8px] bg-white shadow-md px-[32px] py-[24px] rounded-md">
        <h1 class="md:text-xl text-base text-pink-500 font-bold">Child name:</h1>
        <h1 class="font-bold text-5xl text-pink-500 font-bold"><?= $data['nama_anak'] ?></h1>
    </div>
    <img class="w-[300px] xl:h-[300px] object-contain shadow-md p-[16px] rounded-md bg-white" src="<?= $dataUri ?>">
    <div class="flex flex-col items-center gap-[8px] text-center md:text-start bg-white shadow-md px-[16px] py-[8px] rounded-md">
        <h1 class="md:text-xl text-base text-pink-500 font-bold">Please show this barcode to the employee</h1>
        <h1 class="md:text-xl text-base text-pink-500 font-bold">Note: Do not scan if the service has not been performed</h1>
    </div>
</div>
<!-- End User Dashboard -->

<?= $this->endSection() ?>
