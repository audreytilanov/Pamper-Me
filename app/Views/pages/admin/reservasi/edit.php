<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>
<div class="main-panel" style="height: auto!important;">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Forms</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)">Produk</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Page</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Data Produk</div>
                        </div>
                        <form action="<?= base_url('admin/produk/edit/'. $data['id_produk']) ?>" method="POST">
                            <div class="card-body">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlSelect1">Kategori Layanan</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="id_kategori_layanan">
                                    <?php foreach($dataKategori as $datas) : ?>
                                    <option <?php if($data['id_kategori_layanan'] == $datas['id_kategori_layanan']){ echo "selected";}; ?> value="<?= $datas['id_kategori_layanan'] ?>"><?= $datas['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                                <div class="form-group form-group-default">
                                <label>Nama Produk</label>
                                <input
                                    id="addName"
                                    type="text"
                                    value="<?= $data['nama_produk'] ?>"
                                    name="nama_produk"
                                    class="form-control"
                                    placeholder="Masukkan Nama Produk"
                                    required
                                />
                                </div>
                                <div class="form-group form-group-default">
                                <label>Deskripsi Produk</label>
                                <textarea name="deskripsi_produk" id="deskripsi_produk" cols="30" rows="10" class="form-control"><?= $data['deskripsi_produk'] ?></textarea>
                                </div>
                            </div>
                                <div class="form-group form-group-default">
                                <label>Durasi (Menit)</label>
                                <input
                                    id="addPosition"
                                    type="number"
                                    name="durasi"
                                    value="<?= $data['durasi'] ?>"
                                    class="form-control"
                                    placeholder="Masukkan Durasi (Menit)"
                                    required
                                />
                                </div>
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlSelect1">Cabang</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="id_cabang">
                                    <?php foreach($dataCabang as $cabang) : ?>
                                    <option <?php if($data['id_cabang'] == $cabang['id_cabang']){ echo "selected";}; ?> value="<?= $cabang['id_cabang'] ?>"><?= $cabang['nama_cabang'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                                <div class="form-group form-group-default">
                                <label>Harga</label>
                                <input
                                    id="addOffice"
                                    type="number"
                                    name="harga"
                                    value="<?= $data['harga'] ?>"
                                    class="form-control"
                                    placeholder="Masukkan Harga"
                                    required
                                />
                                </div>
                                <div class="form-group form-group-default">
                                <label>Link Gambar</label>
                                <input
                                    id="addOffice"
                                    type="text"
                                    name="link_gambar"
                                    value="<?= $data['link_gambar'] ?>"
                                    class="form-control"
                                    placeholder="Masukkan Link Gambar"
                                    required
                                />
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
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Status Aktif</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="status_aktif">
                                        <option value="1"<?php if($data['status_aktif'] == 1){ echo "selected";}; ?>>Aktif</option>
                                        <option value="0" <?php if($data['status_aktif'] == 0){ echo "selected";}; ?>>Nonaktif</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button class="btn btn-danger">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>