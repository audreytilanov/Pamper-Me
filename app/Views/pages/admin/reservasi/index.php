<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Master Data Reservasi</h4>
        <a
          class="btn btn-primary btn-round ml-auto"
          href="<?= url_to('admin.reservasi.tambah') ?>"
        >
          <i class="fa fa-plus"></i>
          Tambah Reservasi
        </a>
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
              <h5 class="modal-title">
                <span class="fw-mediumbold"> Tambah |</span>
                <span class="fw-light"> Data Reservasi</span>
              </h5>
              <button
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table id="add-row" class="display table table-striped table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
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
              <th>No</th>
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
          <?php
          $index = 0;
          foreach($data as $data) : 
          $index = $index+1;
          ?>
            <tr>
              <td><?php echo $index ?></td>
              <td><?php echo $data['nama_orangtua'] ?></td>
              <td><?php echo $data['tanggal'] ?></td>
              <td>
              <form action="<?= base_url('admin/reservasi/statusTamu/'. $data['id_reservasi']) ?>" method="POST">
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" name="status_tamu">
                            <option <?php if($data['status_service'] == 'booked'): ?> selected <?php endif; ?> value="booked">Booked</option>
                            <option <?php if($data['status_service'] == 'waiting'): ?> selected <?php endif; ?> value="waiting">Waiting</option>
                            <option <?php if($data['status_service'] == 'on_progress'): ?> selected <?php endif; ?> value="on_progress">On Progress</option>
                            <option <?php if($data['status_service'] == 'completed'): ?> selected <?php endif; ?> value="completed">Completed</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select <?php if(!empty($data['id_pegawai'])): ?> disabled <?php endif; ?> class="form-control" id="exampleFormControlSelect1" name="id_pegawai">
                          <?php foreach($ops as $dataOps): ?>
                            <option <?php if($data['id_pegawai'] == $dataOps['id_operator']): ?> selected disabled <?php endif; ?> value="<?= $dataOps['id_operator'] ?>"><?= $dataOps['nama'] ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <?php if($data['status_service'] != 'completed'): ?>
                    <button
                      type="submit"
                      data-toggle="tooltip"
                      title=""
                      class="btn btn-success"
                      data-original-title="Ganti Status"
                    >
                      Submit
                      <i class="fa fa-chevron-right"></i>
                    </button>
                    <?php endif; ?>
                  </form>
              </td>
              <td><?php echo $data['total_biaya'] ?></td>
              <td><?php echo $data['metode_pembayaran'] ?><br><?php echo $data['metode_reservasi'] ?></td>
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
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- End Tambah Services -->

<?= $this->endSection() ?>
