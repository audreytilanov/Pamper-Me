<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Master Data Hadiah</h4>
        <button
          class="btn btn-primary btn-round ml-auto"
          data-toggle="modal"
          data-target="#addRowModal"
        >
          <i class="fa fa-plus"></i>
          Tambah Hadiah
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
                <span class="fw-light"> Data Hadiah</span>
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
            <form action="<?= base_url('admin/hadiah/tambah/') ?>" method="POST">
              <div class="modal-body">
                <p class="small">
                  Mohon isi semua kolom.
                </p>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Nama Hadiah</label>
                      <input
                        id="addName"
                        type="text"
                        name="nama_hadiah"
                        class="form-control"
                        placeholder="Masukkan Nama Hadiah"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Stok</label>
                      <input
                        id="addName"
                        type="number"
                        name="stok"
                        class="form-control"
                        placeholder="Masukkan Stok"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Catatan</label>
                      <input
                        id="addName"
                        type="text"
                        name="catatan"
                        class="form-control"
                        placeholder="Masukkan Catatan"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Point Hadiah</label>
                      <input
                        id="addName"
                        type="number"
                        name="point_hadiah"
                        class="form-control"
                        placeholder="Masukkan Point Hadiah"
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
                <th>Nama Hadiah</th>
                <th>Stok</th>
                <th>Catatan</th>
                <th>Point Hadiah</th>
                <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Nama Hadiah</th>
                <th>Stok</th>
                <th>Catatan</th>
                <th>Point Hadiah</th>
                <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach($data as $data) : ?>
            <tr>
              <td><?php echo $data['nama_hadiah'] ?></td>
              <td><?php echo $data['stok'] ?></td>
              <td><?php echo $data['catatan'] ?></td>
              <td><?php echo $data['point_hadiah'] ?></td>
              <td>
                <div class="form-button-action">
                  <a
                    href="<?= base_url('admin/hadiah/edit/'. $data['id_hadiah']) ?>"
                    data-toggle="tooltip"
                    title=""
                    class="btn btn-link btn-primary btn-lg"
                    data-original-title="Edit Hadiah"
                  >
                    <i class="fa fa-edit"></i>
                  </a>
                  <form action="<?= base_url('admin/hadiah/delete/'. $data['id_hadiah']) ?>" method="POST">
                    <input type="hidden" value="<?= $data['id_hadiah'] ?>" name="id_hadiah">
                    <button
                      type="submit"
                      data-toggle="tooltip"
                      title=""
                      class="btn btn-link btn-danger"
                      data-original-title="Remove Hadiah"
                    >
                      <i class="fa fa-times"></i>
                    </button>
                  </form>
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
