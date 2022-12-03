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
                        <a href="javascript:void(0)">Reservasi</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Reservasi</div>
                        </div>
                        <div class="card-body">
                        <form action="<?= base_url('admin/reservasi/cariOrtu') ?>" method="POST">
                            <div class="form-group form-group-default">
                                <div class="form-group form-group-default">
                                <label>Metode Reservasi</label>
                                <input
                                    id="addName"
                                    type="text"
                                    disabled
                                    value="offline"
                                    name="nama_produk"
                                    class="form-control"
                                    placeholder="Masukkan Nama Produk"
                                    required
                                />
                                </div>
                                <div class="form-group form-group-default">
                                <label>Tanggal</label>
                                <input
                                    id="addName"
                                    type="date"
                                    value="<?php echo date('Y-m-d'); ?>"
                                    disabled
                                    name="nama_produk"
                                    class="form-control"
                                    placeholder="Masukkan Nama Produk"
                                    required
                                />
                                </div>
                                <?php if(!empty($dataAnak)){ ?>
                                    <div class="form-group form-group-default">
                                    <label>Nama Orangtua</label>
                                    <input
                                        id="addName"
                                        type="text"
                                        value="<?php $dataOrtu['nama_orangtua'] ?>"
                                        disabled
                                        name="nama"
                                        class="form-control"
                                        required
                                    />
                                    </div>
                                <?php }else{ ?>
                                <label for="exampleDataList" class="form-label">Orangtua</label>
                                <input class="form-control" name="id_reg" list="datalistOptions" id="exampleDataList" placeholder="Cari orang tua...">
                                <datalist id="datalistOptions">
                                    <?php foreach($dataOrtu as $ortu): ?>
                                        <option value="<?= $ortu['id_reg'] ?>"><?= $ortu['nama_orangtua'] ?></option>
                                    <?php endforeach; ?>
                                </datalist>
                                <?php } ?>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                        </div>
                        
                        <form action="<?= base_url('admin/reservasi/tambah/') ?>" method="POST">
                            <div class="card-body">
                            <div class="form-group form-group-default">
                                <div class="form-group form-group-default">
                                <label>Metode Reservasi</label>
                                <input
                                    id="addName"
                                    type="text"
                                    disabled
                                    value="offline"
                                    name="nama_produk"
                                    class="form-control"
                                    placeholder="Masukkan Nama Produk"
                                    required
                                />
                                </div>
                                <div class="form-group form-group-default">
                                <label>Tanggal</label>
                                <input
                                    id="addName"
                                    type="date"
                                    value="<?php echo date('Y-m-d'); ?>"
                                    disabled
                                    name="nama_produk"
                                    class="form-control"
                                    placeholder="Masukkan Nama Produk"
                                    required
                                />
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button class="btn btn-danger">Cancel</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>