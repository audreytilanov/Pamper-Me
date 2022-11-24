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
                        <a href="javascript:void(0)">Orangtua</a>
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
                            <div class="card-title">Edit Data Orangtua</div>
                        </div>
                        <form action="<?= base_url('admin/orangtua/edit/'. $id_reg) ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="email" class="form-control" id="email" placeholder="Masukkan Email" name="email" value="<?php echo $email ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="nama_orangtua">Nama Orangtua </label>
                                    <input type="text" class="form-control" id="nama_orangtua" placeholder="Masukkan Nama Orangtua" name="nama_orangtua" value="<?php echo $nama_orangtua ?>">
                                </div>
                                <div class="form-group">
                                    <label for="no_whatsapp">No. Whatsapp </label>
                                    <input type="number" class="form-control" id="no_whatsapp" placeholder="Masukkan Nomor Whatsapp" name="no_whatsapp" value="<?php echo $no_whatsapp ?>">
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