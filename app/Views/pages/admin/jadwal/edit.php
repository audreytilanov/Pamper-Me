<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Jadwal</h4>
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
                        <a href="javascript:void(0)">Jadwal Detail</a>
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
                            <div class="card-title">Edit Data Jadwal</div>
                        </div>
                        <form action="<?= base_url('admin/jadwal/edit/'. $id_jadwal_produk) ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                <label>Jam</label>
                                <input
                                    id="addName"
                                    type="time"
                                    min="09:00" 
                                    max="18:00"
                                    name="jam"
                                    value="<?php echo $jam ?>"
                                    class="form-control"
                                    placeholder="Masukkan Jam"
                                    required
                                />
                                <small id="emailHelp" class="form-text text-muted">AM = Pagi . PM = Malam</small>
                                <input
                                    id="addName"
                                    type="hidden"
                                    name="id_produk"
                                    value="<?php echo $id_produk ?>"
                                    class="form-control"
                                    required
                                />
                                </div>
                                <div class="form-group">
                                    <label for="date">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" placeholder="Masukkan Tanggal" name="tanggal" value="<?php echo $tanggal ?>">
                                </div>
                                <div class="form-group">
                                    <label for="ketersediaan">Ketersediaan</label>
                                    <input type="number" class="form-control" id="ketersediaan" placeholder="Masukkan Ketersediaan" name="ketersediaan" value="<?php echo $ketersediaan ?>">
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