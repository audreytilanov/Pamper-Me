<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Master Data Produk</h4>
        <button
          class="btn btn-primary btn-round ml-auto"
          data-toggle="modal"
          data-target="#addRowModal"
        >
          <i class="fa fa-plus"></i>
          Tambah Produk
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
                <span class="fw-light"> Data Produk</span>
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
            <form action="<?= base_url('admin/produk/tambah/') ?>" method="POST">
              <div class="modal-body">
                <p class="small">
                  Mohon isi semua kolom.
                </p>
                <div class="row">
                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                      <label for="exampleFormControlSelect1">Kategori Layanan</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="id_kategori_layanan">
                        <?php foreach($dataKategori as $datas) : ?>
                          <option value="<?= $datas['id_kategori_layanan'] ?>"><?= $datas['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Nama Produk</label>
                      <input
                        id="addName"
                        type="text"
                        name="nama_produk"
                        class="form-control"
                        placeholder="Masukkan Nama Produk"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Deskripsi Produk</label>
                      <textarea name="deskripsi_produk" id="deskripsi_produk" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Durasi (Menit)</label>
                      <input
                        id="addPosition"
                        type="number"
                        name="durasi"
                        class="form-control"
                        placeholder="Masukkan Durasi (Menit)"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                  <div class="form-group form-group-default">
                      <label for="exampleFormControlSelect1">Cabang</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="id_cabang">
                        <?php foreach($dataCabang as $cabang) : ?>
                          <option value="<?= $cabang['id_cabang'] ?>"><?= $cabang['nama_cabang'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Harga</label>
                      <input
                        id="addOffice"
                        type="number"
                        name="harga"
                        class="form-control"
                        placeholder="Masukkan Harga"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Link Gambar</label>
                      <input
                        id="addName"
                        type="text"
                        name="link_gambar"
                        class="form-control"
                        placeholder="Masukkan Link Gambar"
                        required
                      />
                    </div>
                  </div>
                  <!-- <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Gambar</label>
                      <input
                        id="addOffice"
                        type="file"
                        name="gambar"
                        class="form-control"
                        placeholder="Masukkan Image"
                        required
                      />
                    </div>
                  </div> -->
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
              <th>Kategori Layanan</th>
              <th>Nama Produk</th>
              <th>Deskripsi</th>
              <th>Durasi</th>
              <th>Cabang</th>
              <th>Harga</th>
              <th>Link Gambar</th>
              <th>Status</th>
              <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Kategori Layanan</th>
              <th>Nama Produk</th>
              <th>Deskripsi</th>
              <th>Durasi</th>
              <th>Cabang</th>
              <th>Harga</th>
              <th>Link Gambar</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach($data as $data) : ?>
            <tr>
              <td><?php echo $data['nama_kategori'] ?></td>
              <td><?php echo $data['nama_produk'] ?></td>
              <td><?php echo $data['deskripsi_produk'] ?></td>
              <td><?php echo $data['durasi'] ?> Menit</td>
              <td><?php echo $data['nama_cabang'] ?></td>
              <td><?php echo $data['harga'] ?></td>
              <td><?php echo $data['link_gambar'] ?></td>
              <td>
                <?php 
                if($data['status_aktif'] == 1){
                  echo "Aktif";
                }else if($data['status_aktif'] == 0){
                  echo "Nonaktif";
                };
                ?>
              </td>
              <td>
                <div class="form-button-action">
                  <a
                    href="<?= base_url('admin/produk/edit/'. $data['id_produk']) ?>"
                    data-toggle="tooltip"
                    title=""
                    class="btn btn-link btn-primary btn-lg"
                    data-original-title="Edit Task"
                  >
                    <i class="fa fa-edit"></i>
                  </a>
                  <button
                    type="button"
                    data-toggle="tooltip"
                    title=""
                    class="btn btn-link btn-danger"
                    data-original-title="Remove"
                  >
                    <i class="fa fa-times"></i>
                  </button>
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
