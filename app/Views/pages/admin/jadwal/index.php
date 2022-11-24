<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Master Data Jadwal</h4>
      </div>
    </div>
    <div class="card-body">

      <div class="table-responsive">
        <table id="add-row" class="display table table-striped table-hover">
          <thead>
            <tr>
              <th>Nama Produk</th>
              <th>Deskripsi Produk</th>
              <th>Durasi (Menit)</th>
              <th>Nama Cabang</th>
              <th>Kategori Layanan</th>
              <th>Harga</th>
              <th>Link Gambar</th>
              <th>Status Aktif</th>
              <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Nama Produk</th>
              <th>Deskripsi Produk</th>
              <th>Durasi (Menit)</th>
              <th>Nama Cabang</th>
              <th>Kategori Layanan</th>
              <th>Harga</th>
              <th>Link Gambar</th>
              <th>Status Aktif</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach($produk as $data) : ?>
            <tr>
              <td><?php echo $data['nama_produk'] ?></td>
              <td><?php echo $data['deskripsi_produk'] ?></td>
              <td><?php echo $data['durasi'] ?> Menit</td>
              <td><?php echo $data['nama_cabang'] ?></td>
              <td><?php echo $data['nama_kategori'] ?></td>
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
                    href="<?= base_url('admin/jadwal/detail/'. $data['id_produk']) ?>"
                    data-toggle="tooltip"
                    title=""
                    class="btn btn-link btn-success btn-lg"
                    data-original-title="Lihat Jadwal"
                  >
                  <i class="fa fa-calendar"></i>
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
