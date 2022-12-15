<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>
<div class="main-panel" style="height:auto!important;">
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
                        <a href="javascript:void(0)">Operator</a>
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
                            <div class="card-title">Edit Data Diskon</div>
                        </div>
                        <form action="<?= base_url('admin/diskon/edit/'. $data['id_diskon']) ?>" method="POST">
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                    <label>Kode Diskon</label>
                                    <input
                                        id="addName"
                                        type="text"
                                        name="kode_diskon"
                                        class="form-control"
                                        placeholder="Masukkan Kode Diskon"
                                        value="<?= $data['kode_diskon'] ?>"
                                        required
                                    />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="addName" cols="30" rows="10" required><?= $data['deskripsi'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label for="exampleFormControlSelect1">Tipe Diskon</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="tipe_diskon">
                                            <option value="1"<?php if($data['tipe_diskon'] == 1){ echo "selected";}; ?>>Ribuan Rupiah (Rp.10000)</option>
                                            <option value="2"<?php if($data['tipe_diskon'] == 2){ echo "selected";}; ?>>Persenan (10%)</option>
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
                                        value="<?= $data['nominal'] ?>"
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
                                        value="<?= $data['tanggal_mulai'] ?>"
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
                                        value="<?= $data['tanggal_berakhir'] ?>"
                                        required
                                    />
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
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