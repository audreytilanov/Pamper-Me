<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<div class="flex flex-col items-start gap-[32px] px-[24px] xl:px-[80px] py-[64px]">

  <!-- Start lihat antrian -->
  <div class="mt-[64px] flex flex-col items-start justify-between w-full">
    <div class="flex flex-row gap-[4px]">
    <img src="/icons/left.svg" alt="">
  <a href="/" class="text-pink-500 font-bold">Kembali Ke Menu Pencarian</a>
    </div>
  
    <div class="flex xl:flex-row flex-col items-start justify-between gap-[40px] mt-[32px] w-full">
      <div class="xl:w-[80%] w-full">
        <div class="w-full">
          <h3 class="xl:text-4xl text-2xl font-bold">List keranjang kamu</h3>
        </div>
        <div class="flex flex-col items-start gap-[32px] w-full">
          <!-- Start Select All -->
          <div
            class="flex flex-row justify-between items-center w-full pb-[24px] border-b-4 mt-[32px]"
          >
            <div class="flex items-center">
              <!-- <input
                id="default-checkbox"
                type="checkbox"
                value=""
                class="accent-pink-500 w-4 h-4 text-pink-600 bg-gray-100 rounded border-gray-300 focus:ring-pink-500 dark:focus:ring-pink-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
              />
              <label for="default-checkbox" class="ml-2 text-base font-semibold"
                >Pilih Semua</label
              > -->
            </div>
            <!-- <button
              class="flex flex-row gap-[4px] items-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-md text-sm px-[8px] py-[8px] text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
              type="button"
              data-modal-toggle="default-modal"
            >
              <img src="/icons/trash.svg" alt="" />
              Hapus
            </button> -->
          </div>
          <!-- End Select All -->

          <!-- Start Cards Keranjang -->
          <?php foreach($data as $data):?>
          <div
            class="flex md:flex-row flex-col justify-between items-end md:items-start pb-[32px] border-b-4 w-full gap-[24px]">
            <div class="flex flex-row items-start gap-[24px] w-full md:w-max">
              <div class="flex items-center">
                <input
                  id="default-checkbox"
                  type="checkbox"
                  value=""
                  class="accent-pink-500 w-4 h-4 text-pink-600 bg-gray-100 rounded border-gray-300 focus:ring-pink-500 dark:focus:ring-pink-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                />
              </div>
              <div class="flex xl:flex-row items-start gap-[24px] flex-col">
                <img
                  class="w-[292.11px] h-[162.93px] object-cover rounded-md"
                  src="<?php echo $data['link_gambar'] ?>"
                  alt=""
                />
                <!-- sa -->
                <div class="flex flex-col items-start gap-[16px]">
                  <div class="flex flex-col items-start gap-[16px]">
                    <h3 class="font-bold text-xl"><?php echo $data['nama_produk'] ?> | <?php echo $data['nama_cabang'] ?></h3>
                  </div>
                  <div
                    class="flex xl:flex-row xl:items-center gap-[8px] border-b-4 pb-[16px] flex-col items-start"
                  >
                    <h3 class="font-bold xl:text-lg text-sm text-pink-500">
                      <?php echo $data['nama_anak'] ?>
                    </h3>
                    <span class="hidden xl:block">
                      |
                    </span>
                    <div class="flex items-center gap-[8px]">
                      <img src="/icons/money.svg" alt="" />
                      <h3 class="font-bold xl:text-lg text-sm text-pink-500">
                        Rp. <?php echo number_format($data['harga'] , 0, ',', '.'); ?> / <?php echo $data['durasi'] ?> Menit
                      </h3>
                    </div>
                  </div>
                  <div class="grid grid-cols-2 gap-[10px]">
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs"><?php echo $data['nama_kategori'] ?></p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs"><?php echo $data['jam'] ?></p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs"><?php echo $data['tanggal'] ?></p>
                    </div>
                    <div class="flex flex-row items-center gap-[4px]">
                      <img src="/icons/checkBox.svg" alt="" />
                      <p class="text-xs"><?php echo $data['jenis_kelamin'] ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <form action="<?= base_url('user/keranjang/delete/'. $data['id']) ?>" method="POST">
              <?= csrf_field(); ?>

                <button
                  class="flex flex-row gap-[4px] items-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-md text-sm px-[8px] py-[8px] text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 post_delete_btn"
                  type="submit"
                >
                  <img src="/icons/trash.svg" alt="" />
                  Hapus
                </button>
              </form>
            </div>
          </div>
          <?php endforeach; ?>
          <!-- End Cards Keranjang -->
        </div>
      </div>

      <!-- Start List Harga -->
      <div
        class="flex items-start gap-[10px] py-[40px] px-[24px] drop-shadow-xl bg-white rounded-md xl:w-[400px] w-full"
      >
        <div class="flex flex-col items-start gap-[24px] w-full">
          <div
            class="flex flex-col items-start pb-[24px] gap-[24px] border-b-4 w-full"
          >
            <h4 class="font-bold font-bold text-xl">Ringkasan pesanan</h4>
            <ul class="space-y-1 max-w-md list-disc list-inside w-full">
              <?php 
                $total = 0;
                $id_reservasi = null;
                foreach($list as $data):
                  $id_reservasi = $data['id_reservasi'];
                  $total += $data['harga'];
                ?>
                <li class="flex items-center flex-row text-sm justify-between">
                  <div class="flex flex-row items-center gap-[16px]">
                    <img src="/icons/circle.svg" alt="" />
                    <p><?php echo $data['nama_produk']; ?></p>
                  </div>
                  <p>Rp. <?php echo number_format($data['harga'] , 0, ',', '.'); ?></p>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="w-full flex flex-col gap-[16px]">
            <div
              class="flex items-center flex-row justify-between px-[16px] py-[10px] w-full bg-pink-100 border-2 border-pink-500 rounded-lg text-pink-500 font-bold text-sm"
            >
              <p>Order Total</p>
              <p>Rp. <?php echo number_format($total , 0, ',', '.'); ?></p>
            </div>
            <form action="<?= base_url('user/keranjang/checkout/'. $id_reservasi) ?>" method="POST">
              <button
              class="flex flex-row gap-[8px] items-center justify-center text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-sm px-[16px] py-[12px] text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800 w-full text-sm"
               type="submit">Checkout</button>
            </form>
          </div>
        </div>
      </div>
      <!-- End List Harga -->
    </div>
  </div>
  <!-- End lihat antrian -->
</div>
<?= $this->endSection() ?>
