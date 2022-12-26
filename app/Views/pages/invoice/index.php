<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<div>
  <div class="xl:w-min px-[25px] py-[64px] flex flex-col items-center gap-[40px] mx-auto">
    <div class="mt-[64px] flex flex-col items-end w-full gap-[40px]">
      <button id="download-button" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Download Struk
      </button>
      <div id="invoice">
        <div class="">
          <div class="w-[720px]">
            <div class="flex justify-between p-4 gap-[24px]">
              <div class="flex justify-between items-center w-full">
                <a href="/"
                  ><img class="w-[140px]" src="/images/logo.png" alt=""
                /></a>
              </div>
              <div class="border-l-2 border-pink-200"></div>
              <div class="flex flex-col items-center p-2 w-full">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-6 h-6 text-pink-500"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"
                  />
                </svg>
                <span class="text-sm"> www.pamperme.com </span>
              </div>
            </div>
            <div class="w-full h-0.5 bg-pink-500"></div>
            <div class="flex flex-row justify-between">
              <div class="flex flex-col gap-[16px] p-4">
                <div>
                  <h6 class="font-bold">
                    Tanggal Order :
                    <span class="text-sm font-medium"> <?= $dataRes['tanggal'] ?></span>
                  </h6>
                  <h6 class="font-bold">
                    Order ID : <span class="text-sm font-medium"> <?= $dataRes['order_id'] ?></span>
                  </h6>
                  <h6 class="font-bold">
                    Receipt ID : <span class="text-sm font-medium"> <?= $dataRes['no_receipt'] ?></span>
                  </h6>
                </div>
                <div class="w-40">
                  <address class="text-sm">
                    <span class="font-bold"> Ditagih ke : </span>
                    <?= $dataOrtu['nama_orangtua'] ?>: <?= $dataOrtu['no_whatsapp'] ?><br>
                  </address>
                </div>
              </div>
              <div class="flex flex-col gap-[16px] p-4">
              <a href="/"><img class="w-[140px]" src="/images/logo.png" alt=""></a>
              <div class="flex flex-col text-sm gap-[8px]">
                <p>baligroupbooking.com</p>
                <p>081292191929</p>
              </div>
              </div>
              <div class="p-4">
              <button
                    type="submit"
                    class="flex flex-row gap-[4px] border-2 items-center border-gray-400 bg-gray-400 text-white rounded-md text-sm px-[16px] py-[8px] text-center font-bold"
                  >
                  Pending
                  </button>
              </div>
            </div>
            <div class="flex justify-center p-4 w-full text-center">
              <div class="border-b border-gray-200 shadow w-full">
                <table class="w-full">
                  <thead class="bg-gray-50 w-full">
                    <tr>
                      <th class="px-4 py-2 text-xs text-gray-500">#</th>
                      <th class="px-4 py-2 text-xs text-gray-500">Nama Anak</th>
                      <th class="px-4 py-2 text-xs text-gray-500">
                        Nama Produk
                      </th>
                      <th class="px-4 py-2 text-xs text-gray-500">Lokasi</th>
                      <th class="px-4 py-2 text-xs text-gray-500">Qty</th>
                      <th class="px-4 py-2 text-xs text-gray-500 text-end">Harga</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <?php 
                    $total = 0;
                    $loop = 0;
                    foreach($data as $datas): 
                      $total += $datas['harga'];
                      $loop = $loop+1;
                    ?>
                    <tr class="whitespace-nowrap">
                      <td class="px-6 py-4 text-sm text-gray-500"><?= $loop ?></td>
                      <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                          <?= $datas['nama_anak'] ?>
                        </div>
                      </td>
                      <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                          <?= $datas['nama_produk'] ?>
                        </div>
                      </td>
                      <td class="px-6 py-4">
                        <div class="text-sm text-gray-500"><?= $datas['nama_cabang'] ?></div>
                      </td>
                      <td class="px-6 py-4">
                        <div class="text-sm text-gray-500">1</div>
                      </td>
                      <td class="px-6 py-4 text-sm text-gray-500 text-end">Rp. <?= number_format($datas['harga'] , 0, ',', '.'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <!-- <tr>
                        <th colspan="3"></th>
                        <td class="text-sm font-bold px-6 py-2"><b>Tax Rate</b></td>
                        <td class="text-sm font-bold px-6 py-2"><b>$1.50%</b></td>
                    </tr> -->
                    <!--end tr-->
                    <tr class="text-white bg-gray-800">
                        <th colspan="3"></th>
                        <td class="text-sm font-bold px-6 py-2"><b>Total</b></td>
                        <td colspan="2" class="text-sm font-bold px-6 py-2 text-end"><b>Rp. <?= number_format($total , 0, ',', '.'); ?></b></td>
                    </tr>
                    <!--end tr-->
                  </tbody>
                </table>
              </div>
            </div>
            <div class="flex justify-between p-4 gap-[64px]">
              <div>
                <h3 class="text-xl">Terms And Condition :</h3>
                <ul class="text-xs list-disc list-inside">
                  <li>
                    In publishing and graphic design, Lorem ipsum is a placeholder
                    text commonly used to demonstrate the visual form of a
                    document or a typeface without relying on meaningful content.
                    Lorem ipsum may be used as a placeholder before final copy is
                    available.
                  </li>
                  <li>
                    In publishing and graphic design, Lorem ipsum is a placeholder
                    text commonly used to demonstrate the visual form of a
                    document or a typeface without relying on meaningful content.
                    Lorem ipsum may be used as a placeholder before final copy is
                    available.
                  </li>
                  <li>
                    In publishing and graphic design, Lorem ipsum is a placeholder
                    text commonly used to demonstrate the visual form of a
                    document or a typeface without relying on meaningful content.
                    Lorem ipsum may be used as a placeholder before final copy is
                    available.
                  </li>
                </ul>
              </div>
            </div>
            <div class="w-full h-0.5 bg-pink-500"></div>
  
            <div class="p-4">
              <div class="flex items-center justify-center">
                Terimakasih Sudah menggunakan layanan kami.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const button = document.getElementById("download-button");

    function generatePDF() {
      // Choose the element that your content will be rendered to.
      const element = document.getElementById("invoice");
      // Choose the element and save the PDF for your user.
      html2pdf().from(element).save();
    }

    button.addEventListener("click", generatePDF);
  </script>

  <div class="xl:px-[80px] xl:py-[64px] p-[24px]">
    <!-- Start Cards -->
    <div class="pt-[24px] grid xl:grid-cols-4 gap-[24px]">
      <?php 
  if(!empty(session()->getFlashdata('group'))):
      foreach(session()->getFlashdata('group') as $data) :?>
      <div class="w-full bg-white rounded-xl shadow-lg">
        <img
          class="rounded-t-xl"
          src="<?php echo $data['link_gambar']?>"
          alt=""
        />
        <div class="py-[16px] px-[24px]">
          <h3 class="font-bold text-sm"><?php echo $data['nama_produk'] ?></h3>
          <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
            <p><?php echo $data['deskripsi_produk'] ?></p>
            <p>
              Rp.
              <?php echo number_format($data['harga'] , 0, ',', '.'); ?>
              /
              <?php echo $data['durasi'] ?>
              Menit
            </p>
          </h3>
          <button
            class="flex flex-row gap-[8px] items-center text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-sm px-[64px] py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800"
            type="submit"
            data-modal-toggle="default-modal<?php echo $data['id_produk'] ?>"
          >
            Detail Produk
          </button>
        </div>
      </div>
      <?php 
      endforeach;
      endif;
      ?>
    </div>
    <!-- End Cards -->
  </div>
</div>

<?= $this->endSection() ?>
