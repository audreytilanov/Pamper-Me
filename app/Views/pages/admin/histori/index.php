<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Data History</h4>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="add-row" class="display table table-striped table-hover">
          <thead>
            <tr>
                <th>Nama Anak</th>
                <th>Hadiah</th>
                <th>Point</th>
                <th>Tanggal</th>
                <th>Operator</th>
                <th>Qty Hadiah</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Nama Anak</th>
                <th>Hadiah</th>
                <th>Point</th>
                <th>Tanggal</th>
                <th>Operator</th>
                <th>Qty Hadiah</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach($data as $data) : ?>
            <tr>
              <td><?php echo $data['nama_anak'] ?></td>
              <td><?php echo $data['nama_hadiah'] ?></td>
              <td><?php echo $data['point'] ?></td>
              <td><?php echo $data['tanggal_penukaran'] ?></td>
              <td><?php echo $data['nama'] ?></td>
              <td><?php echo $data['qty_hadiah'] ?></td>
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
