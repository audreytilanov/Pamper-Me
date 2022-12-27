<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<div class="px-[80px] py-[64px] flex flex-col items-start gap-[32px]">
  <!-- Start lihat antrian -->
  <div class="mt-[64px] flex flex-col items-start justify-between w-full">
    <div class="flex flex-row items-start justify-between gap-[40px]">
      <div class="flex flex-col gap-[40px] items-start">

        <!-- Start Alamat  -->
        <div class="flex flex-col flex start py-[32px] px-[40px] gap-[32px] bg-white shadow-lg rounded-lg border">
                <div class="flex flex-col items-start pb-[24px] gap-[24px] border-b-2">
                    <h4 class="text-xl font-bold">Reservation Details</h4>
                    
                    <div class="flex flex-col gap-[4px] items-start">
                        <p class="">Pamper Me Bali</p>
                        <p class="">ID : <?= $dataRes['id_transaksi_pembayaran'] ?></p>
                        <p class="">Order ID : <?= $dataRes['order_id'] ?></p>
                        <p>Rp. <?php echo number_format($dataRes['total_biaya'] , 0, ',', '.'); ?></p>
                        <p><?= $dataRes['metode_pembayaran'] ?> / <?= $dataRes['bank'] ?> / <?= $dataRes['va_number_cc'] ?></p>
                        <p class=""><?= $dataRes['transaction_time'] ?></p>
                        <p class=""> Status Pembayaran : <?= $dataRes['status_pembayaran'] ?></p>
                        <p class=""><a href="<?= $dataRes['pdf_url'] ?>">Download PDF</a></p>
                    </div>
                </div>
                <?php foreach($data as $datas): ?>
                <div class="flex flex-row items-start gap-[24px]">
                  <img
                    class="w-[292.11px] h-[162.93px] object-cover rounded-md"
                    src="/images/keranjangProduct.png"
                    alt=""
                  />
                  <div class="flex flex-col items-start gap-[16px]">
                    <div class="flex flex-col items-start gap-[16px]">
                      <h3 class="font-bold text-xl"><?= $datas['nama_produk'] ?> (<?= $datas['nama_cabang'] ?>)</h3>
                      <h3 class="font-bold text-xl"><?= $datas['nama_anak'] ?></h3>
                      <?php if($datas['time_scan'] == null && $dataRes['status_pembayaran'] == "settlement"): ?>
                      <a
                        href="<?= base_url('user/scan-barcode/'. $datas['qr_code']) ?>"
                        class="flex flex-row gap-[4px] border-2 items-center border-gray-400 hover:bg-gray-400 hover:text-white rounded-md text-sm px-[16px] py-[8px] text-center font-bold"
                      >
                        Scan Barcode
                      </a>
                      <?php elseif($datas['time_scan'] != null && $dataRes['status_pembayaran'] == "settlement"): ?>
                        <a
                        href="javascript:void(0)"
                        class="flex flex-row gap-[4px] border-2 items-center border-green-400 hover:bg-green-400 hover:text-white rounded-md text-sm px-[16px] py-[8px] text-center font-bold"
                      >
                        Barcode Telah di Scan
                      </a>
                      <?php endif; ?>
                    </div>
                    <div
                      class="flex flex-row items-center gap-[8px] border-b-4 pb-[16px]"
                    >
                      <img src="/icons/money.svg" alt="" />
                      <h3 class="font-bold text-lg text-pink-500">
                      Rp. <?php echo number_format($datas['harga'] , 0, ',', '.'); ?> / <?= $datas['durasi'] ?> Menit
                      </h3>
                    </div>
                    <div class="grid grid-cols-2 gap-[10px]">
                      <div class="flex flex-row items-center gap-[4px]">
                        <img src="/icons/checkBox.svg" alt="" />
                        <p class="text-xs"><?= $datas['nama_kategori'] ?></p>
                      </div>
                      <div class="flex flex-row items-center gap-[4px]">
                        <img src="/icons/checkBox.svg" alt="" />
                        <p class="text-xs"><?= $datas['jam'] ?></p>
                      </div>
                      <div class="flex flex-row items-center gap-[4px]">
                        <img src="/icons/checkBox.svg" alt="" />
                        <p class="text-xs"><?= $datas['tanggal'] ?></p>
                      </div>
                      <div class="flex flex-row items-center gap-[4px]">
                        <img src="/icons/checkBox.svg" alt="" />
                        <p class="text-xs"><?= $datas['jenis_kelamin'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
        </div>
        <!-- End Alamat -->

      </div>
    </div>
  </div>
  <!-- End lihat antrian -->
</div>
<?= $this->endSection() ?>
