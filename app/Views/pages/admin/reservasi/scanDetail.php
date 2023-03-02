<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Master Data Reservasi</h4>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="add-row" class="display table table-striped table-hover">
          <thead>
            <tr>
              <th>Mama</th>
              <th>Tanggal</th>
              <th style="width: 30%">Status Tamu</th>
              <th>Total Biaya</th>
              <th>Metode Pembayaran</th>
              <th>Status Pembayaran</th>
              <th>Status Reservasi</th>
              <th>ID Order</th>
              <th>Bank</th>
              <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Status Tamu</th>
              <th>Total Biaya</th>
              <th>Metode Pembayaran</th>
              <th>Status Pembayaran</th>
              <th>Status Reservasi</th>
              <th>ID Order</th>
              <th>Bank</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            <tr>
              <td><?php echo $data['nama_orangtua'] ?></td>
              <td><?php echo $data['tanggal'] ?></td>
              <td><?php echo $data['status_service'] ?></td>
              <td><?php echo $data['total_biaya'] ?></td>
              <td><?php echo $data['metode_pembayaran'] ?> Menit</td>
              <td><?php echo $data['status_pembayaran'] ?></td>
              <td><?php echo $data['status'] ?></td>
              <td><?php echo $data['order_id'] ?></td>
              <td><?php echo $data['bank'] ?></td>
              <td>
                <div class="form-button-action">
                  <a
                    href="<?= base_url('admin/reservasi/detail/'. $data['id_reservasi']) ?>"
                    data-toggle="tooltip"
                    title=""
                    class="btn btn-link btn-primary btn-lg"
                    data-original-title="Detail Reservasi"
                  >
                    <i class="fa fa-edit"></i>
                  </a>
                  <!-- <button
                    type="button"
                    data-toggle="tooltip"
                    title=""
                    class="btn btn-link btn-danger"
                    data-original-title="Remove"
                  >
                    <i class="fa fa-times"></i>
                  </button> -->
                  <a
                    href="<?= base_url('admin/my-order/invoice/'. $data['id_reservasi']) ?>"
                    data-toggle="tooltip"
                    title=""
                    class="btn btn-link btn-primary btn-lg"
                    data-original-title="Cetak Receipt"
                  >
                  <i class="fa fa-print"></i>
                  </a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- End Tambah Services -->

<?= $this->endSection() ?>
