<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Master Data Orangtua</h4>
        <button
          class="btn btn-primary btn-round ml-auto"
          data-toggle="modal"
          data-target="#addRowModal"
        >
          <i class="fa fa-plus"></i>
          Tambah Data
        </button>
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
                <span class="fw-light"> Data Orangtua</span>
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url('admin/orangtua/tambah/') ?>" method="POST">
              <div class="modal-body">
                <p class="small">
                  Mohon isi semua kolom.
                </p>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Nama Orangtua</label>
                      <input
                        id="addName"
                        type="text"
                        name="nama_orangtua"
                        class="form-control"
                        placeholder="Masukkan Nama Orangtua"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Email</label>
                      <input
                        id="addPosition"
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Masukkan Email"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>No. Whatsapp</label>
                      <input
                        id="addOffice"
                        type="phone"
                        name="no_whatsapp"
                        class="form-control"
                        placeholder="Masukkan No. Whatsapp"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Password</label>
                      <input
                        id="addOffice"
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan Password"
                        required
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer no-bd">
                <button type="submit" class="btn btn-primary">
                  Tambah
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                  Batal
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table id="add-row" class="display table table-striped table-hover">
          <thead>
            <tr>
              <th>Nama Orangtua</th>
              <th>Email</th>
              <th>No. WA</th>
              <th>Tgl Daftar</th>
              <th>Status Aktif</th>
              <th>Foto</th>
              <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Nama Orangtua</th>
              <th>Email</th>
              <th>No. WA</th>
              <th>Tgl Daftar</th>
              <th>Status</th>
              <th>Foto</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach($data as $data) : ?>
            <tr>
              <td><?php echo $data['nama_orangtua'] ?></td>
              <td><?php echo $data['email'] ?></td>
              <td><?php echo $data['no_whatsapp'] ?></td>
              <td><?php echo $data['tgl_daftar'] ?></td>
              <td>
                <?php 
                if($data['status_aktif'] == 1){
                  echo "Aktif";
                }else if($data['status_aktif'] == 0){
                  echo "Nonaktif";
                };
                ?>
              </td>
              <td><?php echo $data['link_foto'] ?></td>
              <td>
                <div class="form-button-action">
                <a
                    href="<?= base_url('admin/anak/'. $data['id_reg']) ?>"
                    data-toggle="tooltip"
                    title=""
                    class="btn btn-link btn-warning btn-lg"
                    data-original-title="Lihat Anak"
                  >
                  <i class="fa fa-child"></i>
                  </a>
                  <a
                    href="<?= base_url('admin/orangtua/edit/'. $data['id_reg']) ?>"
                    data-toggle="tooltip"
                    title=""
                    class="btn btn-link btn-primary btn-lg"
                    data-original-title="Edit Task"
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
