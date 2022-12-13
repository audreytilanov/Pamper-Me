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
                            <div class="card-title">Edit Data Operator</div>
                        </div>
                        <form action="<?= base_url('admin/operator/edit/'. $data['id_operator']) ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Operator </label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Operator" name="nama" value="<?php echo $data['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="email" class="form-control" id="email" placeholder="Masukkan Email Operator" name="email" value="<?php echo $data['email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password </label>
                                    <input type="password" class="form-control" id="email" placeholder="Masukkan Password Operator" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Tipe Akses</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="tipe_akses">
                                        <option value="1"<?php if($data['tipe_akses'] == 1){ echo "selected";}; ?>>Admin</option>
                                        <option value="0" <?php if($data['tipe_akses'] == 0){ echo "selected";}; ?>>Pegawai</option>
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