<div class="">
    <h4 class="font-bold text-2xl">History Poin</h4>
    <div class="py-4 inline-block min-w-full">
      <div class="">
        <table class="min-w-full text-center">
          <thead class="border-b bg-pink-500">
            <tr>
              <th scope="col" class="text-sm font-medium text-white xl:px-6 xl:py-4 p-2">
                ID Reservasi
              </th>
              <th scope="col" class="text-sm font-medium text-white xl:px-6 xl:py-4 p-2">
                ID Anak
              </th>
              <th scope="col" class="text-sm font-medium text-white xl:px-6 xl:py-4 p-2">
                Poin Masuk
              </th>
              <th scope="col" class="text-sm font-medium text-white xl:px-6 xl:py-4 p-2">
                Poin Keluar
              </th>
            </tr>
          </thead class="border-b">
          <tbody>
            <?php
            $totalPoinMasuk=0;
            $totalPoinKeluar = 0;
            $totalPoinAkhir = 0;
            foreach($data as $data): ?>
            <tr class="bg-white border-b">
              <td class="xl:px-6 xl:py-4 p-2 whitespace-nowrap text-sm font-medium text-gray-900">
                <?= $data['no_receipt'] ?>
            </td>
              <td class="text-sm text-gray-900 font-light xl:px-6 xl:py-4 p-2 whitespace-nowrap">
                <?= $data['nama_anak'] ?>
              </td>
              <td class="text-sm text-gray-900 font-light xl:px-6 xl:py-4 p-2 whitespace-nowrap">
                <?= $data['point_masuk'] ?>
              </td>
              <td class="text-sm text-gray-900 font-light xl:px-6 xl:py-4 p-2 whitespace-nowrap">
                <?= $data['point_keluar'] ?>
              </td>
            </tr>
            <?php 
            $totalPoinMasuk += (int)$data['point_masuk'];
            $totalPoinKeluar += (int)$data['point_keluar'];
            $totalPoinAkhir = $totalPoinMasuk - $totalPoinKeluar;
            endforeach; ?>
            <tr class="bg-white border-b">
              
              <td class="text-sm text-gray-900 font-light xl:px-6 xl:py-4 p-2 whitespace-nowrap" colspan="3">
                Total Poin Anak
              </td>
              <td class="text-sm text-gray-900 font-light xl:px-6 xl:py-4 p-2 whitespace-nowrap">
                <?= $totalPoinAkhir ?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>