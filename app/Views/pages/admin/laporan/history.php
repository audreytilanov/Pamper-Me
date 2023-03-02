<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">History Reservasi</h4>
      </div>
    </div>
    <div class="card-body">
      <!-- Modal -->
      <div
        class="modal fade"
        id="addRowModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header no-bd">
              
            </div>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table border="0" cellspacing="5" cellpadding="5">
          <tbody>
            <tr>
              <td>Minimum date:</td>
              <td><input type="text" id="min" name="min"></td>
            </tr>
            <tr>
              <td>Maximum date:</td>
              <td><input type="text" id="max" name="max"></td>
            </tr>
          </tbody>
        </table>
        <table id="example" class="display table table-striped table-hover display nowrap" style="width:100%">
          <thead>
            <tr>
                <th>Nama Orangtua</th>
                <th>Nama Anak</th>
                <th>Kategori Anak</th>
                <th>Nama Produk</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Total Harga</th>
            </tr>
          </thead>
          <tbody>
          <?php $totalBiayaDetail = 0;?>
          <?php foreach($data as $data) : ?>
            <tr>
              <td><?php echo $data['nama_orangtua'] ?></td>
              <td><?php echo $data['nama_anak'] ?></td>
              <td><?php echo $data['nama_kategori'] ?></td>
              <td><?php echo $data['nama_produk'] ?> Menit</td>
              <td><?php echo date_format(new DateTime($data['transaction_time']),"j F, Y"); ?></td>
              <td><?php echo $data['jam'] ?></td>
              <td>Rp. <?php echo number_format($data['total_biaya'], 2, ',', '.'); ?></td>
            </tr>
            <?php $totalBiayaDetail = $totalBiayaDetail + $data['total_biaya']; ?>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
                <th>Nama Orangtua</th>
                <th>Nama Anak</th>
                <th>Kategori Anak</th>
                <th>Nama Produk</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Rp. <?php echo number_format($totalBiayaDetail, 2, ',', '.'); ?></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- End Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">History Berdasarkan Tanggal</h4>
      </div>
    </div>
    <div class="card-body">
      <!-- Modal -->
      <div
        class="modal fade"
        id="addRowModal2"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header no-bd">
              
            </div>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table id="add-row2" class="display table table-striped table-hover">
          <thead>
            <tr>
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Total Pesanan</th>
                <th>Total Harga</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $totalBiaya = 0;
          foreach($groupHistory as $groupHistories) : ?>
            <tr>
              <td><?php echo date_format(new DateTime($groupHistories['tanggal']),"l"); ?></td>
              <td><?php echo date_format(new DateTime($groupHistories['tanggal']),"j F, Y"); ?></td>
              <td><?php echo $groupHistories['sumTotalPesanan']; ?> Item</td>
              <td>Rp. <?php echo number_format($groupHistories['sumTotalBiaya'], 2, ',', '.'); ?></td>
            </tr>
            <?php $totalBiaya = $totalBiaya + $groupHistories['sumTotalBiaya']; ?>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Total Pesanan</th>
                <th>Rp. <?php echo number_format($totalBiaya, 2, ',', '.'); ?></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">History Berdasarkan Bulan</h4>
      </div>
    </div>
    <div class="card-body">
      <!-- Modal -->
      <div
        class="modal fade"
        id="addRowModal3"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header no-bd">
              
            </div>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table id="add-row3" class="display nowrap table table-striped table-hover">
          <thead>
            <tr>
                <th>Bulan</th>
                <th>Total Pesanan</th>
                <th>Total Harga</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $totalBiaya = 0;
          foreach($groupHistoryMonth as $groupHistoryMonth) : ?>
            <tr>
              <td><?php echo date_format(new DateTime($groupHistoryMonth['tanggal']),"F, Y"); ?></td>
              <td><?php echo $groupHistoryMonth['sumTotalPesanan']; ?> Item</td>
              <td>Rp. <?php echo number_format($groupHistoryMonth['sumTotalBiaya'], 2, ',', '.'); ?></td>
            </tr>
            <?php $totalBiaya = $totalBiaya + $groupHistoryMonth['sumTotalBiaya']; ?>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Rp. <?php echo number_format($totalBiaya, 2, ',', '.'); ?></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection() ?>
