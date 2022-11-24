<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>
<div class="main-panel">
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
                        <a href="javascript:void(0)">Anak</a>
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
                            <div class="card-title">Edit Data Anak</div>
                        </div>
                        <form action="<?= base_url('admin/anak/edit/'. $id_anak) ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email">Nama Anak </label>
                                    <input type="text" class="form-control" id="nama_anak" placeholder="Masukkan Nama Anak" name="nama_anak" value="<?php echo $nama_anak ?>">
                                    <input type="hidden" class="form-control" id="id_ortu" placeholder="Masukkan Nama Anak" name="id_orangtua" value="<?php echo $id_orangtua ?>">
                                </div>
                                <div class="form-group">
                                    <label for="date">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" placeholder="Masukkan Tanggal Lahir" name="tgl_lahir" value="<?php echo $tanggal_lahir ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                                        <option value="Laki-laki" <?php if($jenis_kelamin == "Laki-laki"){ echo "selected";}; ?>>Laki-laki</option>
                                        <option value="Perempuan" <?php if($jenis_kelamin == "Perempuan"){ echo "selected";}; ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Status Aktif</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="status_aktif">
                                        <option value="1"<?php if($status_aktif == 1){ echo "selected";}; ?>>Aktif</option>
                                        <option value="0" <?php if($status_aktif == 0){ echo "selected";}; ?>>Nonaktif</option>
                                    </select>
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