<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Master Data Diskon</h4>
        <button
          class="btn btn-primary btn-round ml-auto"
          data-toggle="modal"
          data-target="#addRowModal"
        >
          <i class="fa fa-plus"></i>
          Tambah Data Diskon
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
                <span class="fw-light"> Data Diskon</span>
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
            <form action="<?= base_url('admin/diskon/tambah/') ?>" method="POST">
              <div class="modal-body">
                <p class="small">
                  Mohon isi semua kolom.
                </p>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Kode Diskon</label>
                      <input
                        id="addName"
                        type="text"
                        name="kode_diskon"
                        class="form-control"
                        placeholder="Masukkan Kode Diskon"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Deskripsi</label>
                      <textarea name="deskripsi" class="form-control" id="addName" cols="30" rows="10" required></textarea>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="exampleFormControlSelect1">Tipe Diskon</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="tipe_diskon">
                            <option value="1">Ribuan Rupiah (Rp.10000)</option>
                            <option value="2">Persenan (10%)</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Nominal</label>
                      <input
                        id="addName"
                        type="number"
                        name="nominal"
                        class="form-control"
                        placeholder="Masukkan Nominal"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Tanggal Mulai</label>
                      <input
                        id="addName"
                        type="date"
                        name="tanggal_mulai"
                        class="form-control"
                        placeholder="Masukkan Tanggal Mulai"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Tanggal Berakhir</label>
                      <input
                        id="addName"
                        type="date"
                        name="tanggal_berakhir"
                        class="form-control"
                        placeholder="Masukkan Tanggal Berakhir"
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
                <th>Kode Diskon</th>
                <th>Deskripsi</th>
                <th>Tipe Diskon</th>
                <th>Nominal</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Berakhir</th>
                <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Kode Diskon</th>
                <th>Deskripsi</th>
                <th>Tipe Diskon</th>
                <th>Nominal</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Berakhir</th>
                <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach($data as $data) : ?>
            <tr>
              <td><?php echo $data['kode_diskon'] ?></td>
              <td><?php echo $data['deskripsi'] ?></td>
              <td>
                <?php 
                if($data['tipe_diskon'] == 1){
                  echo "Ribuan Rupiah";
                }else if($data['tipe_diskon'] == 2){
                  echo "Persenan";
                };
                ?>
              </td>
              <td><?php echo $data['nominal'] ?></td>
              <td><?php echo $data['tanggal_mulai'] ?></td>
              <td><?php echo $data['tanggal_berakhir'] ?></td>
             
              <td>
                <div class="form-button-action">
                  <a
                    href="<?= base_url('admin/diskon/edit/'. $data['id_diskon']) ?>"
                    data-toggle="tooltip"
                    title=""
                    class="btn btn-link btn-primary btn-lg"
                    data-original-title="Edit Diskon"
                  >
                    <i class="fa fa-edit"></i>
                  </a>
                  <form action="<?= base_url('admin/diskon/delete/'. $data['id_diskon']) ?>" method="POST">
                    <input type="hidden" value="<?= $data['id_diskon'] ?>" name="id_diskon">
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
