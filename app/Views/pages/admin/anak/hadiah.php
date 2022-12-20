<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Penukaran Hadiah (<?php echo $total ?>)</h4>
        
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="add-row" class="display table table-striped table-hover">
          <thead>
            <tr>
                <th>Nama Hadiah</th>
                <th>Stok</th>
                <th>Point Hadiah</th>
                <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Nama Hadiah</th>
                <th>Stok</th>
                <th>Point Hadiah</th>
                <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach($dataHadiah as $dataHadiah) : ?>
            <tr>
              <td><?php echo $dataHadiah['nama_hadiah'] ?></td>
              <td><?php echo $dataHadiah['stok'] ?></td>
              <td><?php echo $dataHadiah['point_hadiah'] ?></td>
              <td>
                <div class="form-button-action">
                  <form action="<?= base_url('admin/anak/hadiahTukar/'. $id_anak) ?>" method="post">
                  <input type="hidden" name="id_hadiah" value="<?= $dataHadiah['id_hadiah'] ?>">
                    <button
                      type="submit"
                      data-toggle="tooltip"
                      title=""
                      class="btn btn-link btn-primary btn-lg"
                      data-original-title="Tukar Hadiah"
                    >
                      <i class="fa fa-gift"></i>
                    </button>
                  </form>
                  <!-- <button
                    type="button"
                    data-toggle="tooltip"
                    title=""
                    class="btn btn-link btn-danger"
                    data-original-title="Remove"
                  >
                    <i class="fa fa-times"></i>
                  </button> -->
                </div>
              </td>
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
