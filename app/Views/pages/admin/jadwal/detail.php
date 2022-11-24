<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Master Data Detail Jadwal (<b><?php echo $produk['nama_produk'] ?></b>)</h4>
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
                <span class="fw-light"> Data Jadwal</span>
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
            <form action="<?= base_url('admin/jadwal/tambah/') ?>" method="POST">
              <div class="modal-body">
                <p class="small">
                  Mohon isi semua kolom.
                </p>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Jam</label>
                      <input
                        id="addName"
                        type="time"
                        min="09:00" 
                        max="18:00"
                        name="jam"
                        class="form-control"
                        placeholder="Masukkan Jam"
                        required
                      />
										  <small id="emailHelp" class="form-text text-muted">AM = Pagi . PM = Malam</small>

                      <input
                        id="addName"
                        type="hidden"
                        name="id_produk"
                        value="<?php echo $produk['id_produk'] ?>"
                        class="form-control"
                        placeholder="Masukkan Jam"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Ketersediaan</label>
                      <input
                        id="addPosition"
                        type="number"
                        name="ketersediaan"
                        class="form-control"
                        placeholder="Masukkan Jumlah Ketersediaan Slot Jadwal"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Tanggal Awal</label>
                      <input
                        id="addPosition"
                        type="date"
                        name="tanggal_awal"
                        class="form-control"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Sampai Dengan Tanggal</label>
                      <input
                        id="addPosition"
                        type="date"
                        name="tanggal_akhir"
                        class="form-control"
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
              <th>Nama Produk</th>
              <th>Jam</th>
              <th>Ketersediaan</th>
              <th>Durasi</th>
              <th>Tanggal</th>
              <th>Status Aktif</th>
              <th>Harga</th>
              <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Nama Produk</th>
              <th>Jam</th>
              <th>Ketersediaan</th>
              <th>Durasi</th>
              <th>Tanggal</th>
              <th>Status Aktif</th>
              <th>Harga</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach($data as $data) : ?>
            <tr>
              <td><?php echo $data['nama_produk'] ?></td>
              <td><?php echo $data['jam'] ?></td>
              <td><?php echo $data['ketersediaan'] ?></td>
              <td><?php echo $data['durasi'] ?> Menit</td>
              <td><?php echo $data['tanggal'] ?></td>
              <td>
                <?php 
                if($data['status_aktif'] == 1){
                  echo "Aktif";
                }else if($data['status_aktif'] == 0){
                  echo "Nonaktif";
                };
                ?>
              </td>
              <td><?php echo $data['harga'] ?></td>
              <td>
                <div class="form-button-action">
                  <a
                    href="<?= base_url('admin/jadwal/edit/'. $data['id_jadwal_produk']) ?>"
                    data-toggle="tooltip"
                    title=""
                    class="btn btn-link btn-primary btn-lg"
                    data-original-title="Edit Jadwal"
                  >
                    <i class="fa fa-edit"></i>
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
