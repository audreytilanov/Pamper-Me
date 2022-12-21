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
                        <a href="javascript:void(0)">Hadiah</a>
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
                            <div class="card-title">Edit Data Hadiah</div>
                        </div>
                        <form action="<?= base_url('admin/hadiah/edit/'. $data['id_hadiah']) ?>" method="POST">
                            <div class="card-body">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                <label>Nama Hadiah</label>
                                <input
                                    id="addName"
                                    type="text"
                                    name="nama_hadiah"
                                    class="form-control"
                                    value="<?= $data['nama_hadiah'] ?>"
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
                                    value="<?= $data['stok'] ?>"
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
                                    value="<?= $data['catatan'] ?>"
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
                                    value="<?= $data['point_hadiah'] ?>"
                                    class="form-control"
                                    placeholder="Masukkan Point Hadiah"
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