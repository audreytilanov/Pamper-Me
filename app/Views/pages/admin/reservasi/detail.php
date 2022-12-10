<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Master Detail Reservasi</h4>
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
        <table id="add-row" class="display table table-striped table-hover">
          <thead>
            <tr>
                <th>Nama Orangtua</th>
                <th>Nama Anak</th>
                <th>Kategori Anak</th>
                <th>Nama Produk</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>QrCode Time</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Nama Orangtua</th>
                <th>Nama Anak</th>
                <th>Kategori Anak</th>
                <th>Nama Produk</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>QrCode Time</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach($data as $data) : ?>
            <tr>
              <td><?php echo $data['nama_orangtua'] ?></td>
              <td><?php echo $data['nama_anak'] ?></td>
              <td><?php echo $data['nama_kategori'] ?></td>
              <td><?php echo $data['nama_produk'] ?> Menit</td>
              <td><?php echo $data['tanggal'] ?></td>
              <td><?php echo $data['jam'] ?></td>
              <td><?php echo $data['time_scan'] ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- End Tambah Services -->

<?= $this->endSection() ?>
