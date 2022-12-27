<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<div class="flex flex-col items-start gap-[32px] px-[24px] xl:px-[80px] py-[64px]">
  
  
  <div class="mt-[64px] flex flex-col items-start justify-between w-full">

    <!-- Start Timeline  -->
    <div class="flex justify-between items-center mt-[32px] gap-[16px]">
        <div class="flex flex-col md:flex-row items-center gap-[4px]">
          <img class="w-[20px] h-[20px]" src="/icons/checklist.png" alt="" />
          <div class="text-pink-500 xl:ml-2 font-semibold xl:text-base text-xs text-center xl:text-left">
            Order
          </div>
        </div>
        <h2 class="border-gray-400"></h2>
        <div class="flex flex-col md:flex-row items-center gap-[4px]">
          <img class="w-[20px] h-[20px]" src="/icons/nonCheck.png" alt="" />
          <div class="text-gray-400 xl:ml-2 font-semibold xl:text-base xl:text-left text-center text-xs">
            Payment
          </div>
        </div>
        <h2 class="border-gray-400"></h2>
        <div class="flex flex-col md:flex-row items-center gap-[4px]">
          <img class="w-[20px] h-[20px]" src="/icons/nonCheck.png" alt="" />
          <div class="text-gray-400 xl:ml-2 font-semibold xl:text-base xl:text-left text-center text-xs">
            Finish
          </div>
        </div>
      </div>
  <!-- End Timeline -->

    <div class="flex xl:flex-row flex-col items-start justify-between gap-[40px] mt-[32px]">
      <div class="xl:w-[748.344px]">
        <div class="w-full">
          <h3 class="xl:text-4xl text-2xl font-bold">Checkout</h3>
        </div>
        <div class="flex flex-col items-start gap-[32px] w-full">
          <!-- Start Select All -->
          <div
            class="flex flex-row justify-between items-center w-full pb-[24px] border-b-4 mt-[32px]">
            <div class="flex items-center">
            <div class="flex-col flex gap-[8px]">
              <h3 class="font-bold text-xl">
              Treatment address
              </h3>
              <div>
                <p>Pamper Me Bali (Renon)</p>
                <p>0812-3892-9999</p>
                <p class="text-zinc-500">Jl. Tukad Unda IV No.11, Panjer, Denpasar Selatan, Kota Denpasar, Bali 80234</p>
              </div>
            </div>
            </div>
          </div>
          <!-- End Select All -->

          <!-- Start Cards Keranjang -->
          <?php foreach($data as $data):?>
          <div
            class="flex flex-row justify-between items-start pb-[32px] border-b-4 w-full">
            <div class="flex xl:flex-row flex-col items-start justify-between gap-[40px] mt-[32px] w-full">
              <img
                class="w-[292.11px] h-[162.93px] object-cover rounded-md"
                src="<?= $data['link_gambar'] ?>"
                alt=""
              />
              <div class="flex flex-col items-start gap-[16px]">
                <div class="flex flex-col items-start gap-[16px]">
                  <h3 class="font-bold text-xl"><?php echo $data['nama_produk'] ?> | <?= $data['nama_cabang'] ?></h3>
                </div>
                <div
                  class="flex xl:flex-row xl:items-center gap-[8px] border-b-4 pb-[16px] flex-col items-start"
                >
                  <h3 class="font-bold text-lg text-pink-500">
                    <?php echo $data['nama_anak'] ?>
                  </h3>
                  <span class="hidden xl:block">
                    |
                  </span>
                  <div class="flex items-center gap-[8px]">
                    <img src="/icons/money.svg" alt="" />
                    <h3 class="font-bold text-lg text-pink-500">
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
          <?php endforeach; ?>
          <!-- End Cards Keranjang -->
        </div>
      </div>

      <!-- Start List Harga -->
      <div
        class="flex items-start gap-[10px] py-[40px] px-[24px] drop-shadow-xl bg-white rounded-md xl:w-max w-full"
      >
        <div class="flex flex-col items-start gap-[24px] xl:w-max w-full">
          <div
            class="flex flex-col items-start pb-[24px] gap-[24px] border-b-4 w-full"
          >
            <h4 class="font-bold font-bold text-xl">Order summary</h4>
            <ul class="space-y-1 max-w-md list-disc list-inside flex flex-col gap-[8px] xl:black">
              <?php 
                $total = 0;
                $id_reservasi = null;
                foreach($list as $data):
                  $id_reservasi = $data['id_reservasi'];
                  $total += $data['harga'];
                ?>
                <li class="flex xl:items-center xl:flex-row flex-col xl:gap-[48px] text-sm gap-[8px]">
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
              class="flex items-center flex-row justify-between px-[16px] py-[10px] w-full bg-pink-100 border-2 border-pink-500 rounded-lg text-pink-500 font-bold text-sm">
              <p>Total Orders</p>
              <p>Rp. <?php echo number_format($total , 0, ',', '.'); ?></p>
            </div>
            <form action="<?= base_url('user/checkout/metode-bayar/') ?>" method="post">
            <div class="flex flex-col items-start gap-[8px]">
              <div class="flex flex-row items-center gap-[8px]">
                <img src="/icons/discount.svg" alt="">
                <p class="text-pink-500 font-bold">Coupon</p>
              </div>
              <div class="flex xl:flex-row xl:items-stretch gap-[8px] w-full flex-col">
                <input type="text" name="diskon" placeholder="Example: PROMO10" class="w-full border px-5 rounded-lg xl:text-base text-sm p-[8px]">
              </div>
            </div>

            <button
              type="submit"
              class="flex flex-row gap-[8px] items-center justify-center text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-sm xl:px-[24px] xl:py-[12px] p-[8px] text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800 text-sm"
            >
              Checkout
                </button>
            </form>
          </div>
        </div>
      </div>
      <!-- End List Harga -->
    </div>
  </div>
  
</div>
<?= $this->endSection() ?>
