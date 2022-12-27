<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">History Hadiah Anak</h4>
        
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
                <th>Tanggal Penukaran</th>
                <th>Qty</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Nama Anak</th>
                <th>Hadiah</th>
                <th>Point</th>
                <th>Tanggal Penukaran</th>
                <th>Qty</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach($data as $dataHadiah) : ?>
            <tr>
              <td><?php echo $dataHadiah['nama_anak'] ?></td>
              <td><?php echo $dataHadiah['nama_hadiah'] ?></td>
              <td><?php echo $dataHadiah['point'] ?></td>
              <td><?php echo $dataHadiah['tanggal_penukaran'] ?></td>
              <td><?php echo $dataHadiah['qty_hadiah'] ?></td>
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
