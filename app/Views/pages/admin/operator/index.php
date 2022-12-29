<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Master Data Operator</h4>
        <button
          class="btn btn-primary btn-round ml-auto"
          data-toggle="modal"
          data-target="#addRowModal"
        >
          <i class="fa fa-plus"></i>
          Tambah Data Operator
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
                <span class="fw-light"> Data Operator</span>
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
            <form action="<?= base_url('admin/operator/tambah/') ?>" method="POST">
              <div class="modal-body">
                <p class="small">
                  Mohon isi semua kolom.
                </p>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Nama Operator</label>
                      <input
                        id="addName"
                        type="text"
                        name="nama"
                        class="form-control"
                        placeholder="Masukkan Nama Operator"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Email</label>
                      <input
                        id="addName"
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Masukkan Email Operator"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Password</label>
                      <input
                        id="addName"
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan Password"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="exampleFormControlSelect1">Tipe Akses</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="tipe_akses">
                            <option value="1">Admin</option>
                            <option value="2">Kasir</option>
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
                <th>Nama Operator</th>
                <th>Email</th>
                <th>Tipe Akses</th>
                <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Nama Operator</th>
                <th>Email</th>
                <th>Tipe Akses</th>
                <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach($data as $data) : ?>
            <tr>
              <td><?php echo $data['nama'] ?></td>
              <td><?php echo $data['email'] ?></td>
              <td>
                <?php 
                if($data['tipe_akses'] == 1){
                  echo "Admin";
                }else if($data['tipe_akses'] == 2){
                  echo "Kasir";
                };
                ?>
              </td>
              <td>
                <div class="form-button-action">
                  <a
                    href="<?= base_url('admin/operator/edit/'. $data['id_operator']) ?>"
                    data-toggle="tooltip"
                    title=""
                    class="btn btn-link btn-primary btn-lg"
                    data-original-title="Edit Operator"
                  >
                    <i class="fa fa-edit"></i>
                  </a>
                  <form action="<?= base_url('admin/operator/delete/'. $data['id_operator']) ?>" method="POST">
                    <input type="hidden" value="<?= $data['id_operator'] ?>" name="id_produk">
                    <button
                      type="submit"
                      data-toggle="tooltip"
                      title=""
                      class="btn btn-link btn-danger"
                      data-original-title="Remove"
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
