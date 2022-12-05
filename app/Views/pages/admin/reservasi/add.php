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
                                
                                
                                <?php } ?>
                            </div>
                            <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                        </form>
                        </div>
                        
                        <form action="<?= base_url('admin/reservasi/produktambah/') ?>" method="get">
                            <div class="card-body">
                            <div class="form-group form-group-default">
                                
                                <div class="form-group form-group-default">
                                <label for="exampleDataList" class="form-label">Orangtua</label>
                                <input class="form-control" name="id_reg" list="datalistOptions" id="exampleDataList" placeholder="Cari orang tua...">
                                <datalist id="datalistOptions">
                                    <?php foreach($dataOrtu as $ortu): ?>
                                        <option value="<?= $ortu['id_reg'] ?>"><?= $ortu['nama_orangtua'] ?></option>
                                    <?php endforeach; ?>
                                </datalist>
                                </div>

                                <div class="form-group form-group-default">
                                <label for="exampleDataList" class="form-label">Produk</label>
                                <input class="form-control" name="id_produk" list="datalistOptions2" id="exampleDataList" placeholder="Cari Produk...">
                                <datalist id="datalistOptions2">
                                    <?php foreach($dataProduk as $produk): ?>
                                        <option value="<?= $produk['id_produk'] ?>"><?= $produk['nama_produk'] ?></option>
                                    <?php endforeach; ?>
                                </datalist>
                                </div>

                                <div class="form-group form-group-default">
                                <label for="exampleDataList" class="form-label">Layanan</label>
                                <input class="form-control" name="id_layanan" list="datalistOptions4" id="exampleDataList" placeholder="Cari layanan untuk...">
                                <datalist id="datalistOptions4">
                                    <?php foreach($dataLayanan as $layanan): ?>
                                        <option value="<?= $layanan['id_kategori_layanan'] ?>"><?= $layanan['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </datalist>
                                </div>

                                <div class="form-group form-group-default">
                                <label for="exampleDataList" class="form-label">Cabang</label>
                                <input class="form-control" name="id_cabang" list="datalistOptions3" id="exampleDataList" placeholder="Cari Cabang...">
                                <datalist id="datalistOptions3">
                                    <?php foreach($dataCabang as $produk): ?>
                                        <option value="<?= $produk['id_cabang'] ?>"><?= $produk['nama_cabang'] ?></option>
                                    <?php endforeach; ?>
                                </datalist>
                                </div>
                                <div class="form-group form-group-default">
                                <label>Tanggal Reservasi</label>
                                <input
                                    id="addName"
                                    type="date"
                                    value="<?php echo date('Y-m-d'); ?>"
                                    name="tanggal"
                                    class="form-control"
                                    placeholder="Masukkan Tanggal"
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
<div class="table-responsive">
    <table id="add-row" class="display table table-striped table-hover">
        <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Durasi</th>
            <th>Cabang</th>
            <th style="width: 10%">Action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Nama Produk</th>
            <th>Durasi</th>
            <th>Cabang</th>
        </tr>
        </tfoot>
        <tbody>
            <?php if(!empty($dataProduks)) {?>
            <tr>
                <td>
                    <?= $dataProduks['nama_produk'] ?>
                </td>
                <td>
                    <?= $tanggal ?>
                </td>
            </tr>

            <?php }?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script>
    function dataPelanggan(){
        $.ajax({
            url:"<?= site_url('pelanggan/get') ?>",
            data: "json",
            dataType: "dataType",
            success: function (response){
                $('.viewdata').html(response.data)
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);  
            }
        })
    }

$(document).ready(function(){
    dataPelanggan();
})
</script>

<?= $this->endSection() ?>