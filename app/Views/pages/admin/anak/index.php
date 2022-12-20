<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Master Data Anak (<?php echo $ortu['nama_orangtua'] ?>)</h4>
        <button
          class="btn btn-primary btn-round ml-auto"
          data-toggle="modal"
          data-target="#addRowModal"
        >
          <i class="fa fa-plus"></i>
          Tambah Data Anak
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
                <span class="fw-light"> Data Anak</span>
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
            <form action="<?= base_url('admin/anak/tambah/') ?>" method="POST">
              <div class="modal-body">
                <p class="small">
                  Mohon isi semua kolom.
                </p>
                <div class="row">
                    <input
                        type="hidden"
                        name="id_orangtua"
                        value="<?php echo $ortu['id_orangtua'] ?>"
                        required
                      />
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Nama Anak</label>
                      <input
                        id="addName"
                        type="text"
                        name="nama_anak"
                        class="form-control"
                        placeholder="Masukkan Nama Anak"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Tanggal Lahir</label>
                      <input
                        id="addPosition"
                        type="date"
                        name="tgl_lahir"
                        class="form-control"
                        placeholder="Masukkan Tanggal Lahir"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
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
                <th>Nama Anak</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
                <th>Link Barcode</th>
                <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Nama Anak</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
                <th>Link Barcode</th>
                <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach($anak as $data) : ?>
            <tr>
              <td><?php echo $data['nama_anak'] ?></td>
              <td><?php echo $data['tanggal_lahir'] ?></td>
              <td><?php echo $data['jenis_kelamin'] ?></td>
              <td>
                <?php 
                if($data['status_aktif'] == 1){
                  echo "Aktif";
                }else if($data['status_aktif'] == 0){
                  echo "Nonaktif";
                };
                ?>
              </td>
              <td><?php echo $data['link_barcode'] ?></td>
              <td>
                <div class="form-button-action">
                  <a
                    href="<?= base_url('admin/anak/hadiah/'. $data['id_anak']) ?>"
                    data-toggle="tooltip"
                    title=""
                    class="btn btn-link btn-primary btn-lg"
                    data-original-title="Hadiah"
                  >
                    <i class="fa fa-gift"></i>
                  </a>
                  <a
                    href="<?= base_url('admin/anak/edit/'. $data['id_anak']) ?>"
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
