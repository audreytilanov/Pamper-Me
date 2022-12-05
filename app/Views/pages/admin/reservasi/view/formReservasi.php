<form action="javascript:void(0)" id="dataDetail" method="POST">
    <div class="card-body">
        <div class="form-group form-group-default">
            <label for="exampleFormControlSelect1">Cari Orangtua</label>
            <input class="form-control" autocomplete="off" list="orangtua" name="id_orangtua" id="id_orangtua" onChange="getAnak()">
            <datalist id="orangtua">
                <?php foreach($data as $datas) : ?>
                <option value="<?= $datas['id_orangtua'] ?>"><?= $datas['nama_orangtua'] ?></option>
                <?php endforeach; ?>
            </datalist>
        </div>

        <div class="form-group form-group-default anakShow" style="display: none;">
            <label for="exampleFormControlSelect1">Cari Anak</label>
            <input class="form-control" autocomplete="off" list="anak" name="id_anak" id="id_anak" onChange="getLayanan()">
            <datalist id="anak">
                <!-- Option AJAX -->
            </datalist>
        </div>

        <div class="form-group form-group-default layananShow" style="display: none;">
            <label for="exampleFormControlSelect1">Layanan</label>
            <input class="form-control" autocomplete="off" list="layanan" name="id_layanan" id="id_layanan" onChange="getKategori()">
            <datalist id="layanan">
                <!-- Option AJAX -->
            </datalist>
        </div>
        
        <div class="form-group form-group-default kategoriShow" style="display: none;">
            <label for="exampleFormControlSelect1">Kategori Anak</label>
            <input class="form-control" autocomplete="off" list="kategori" name="id_kategori" id="id_kategori" onChange="getProduk()">
            <datalist id="kategori">
                <!-- Option AJAX -->
            </datalist>
        </div>

        <div class="form-group form-group-default produkShow" style="display: none;">
            <label for="exampleFormControlSelect1">Produk</label>
            <input class="form-control" autocomplete="off" list="produk" name="id_produk" id="id_produk" onChange="getTanggal()">
            <datalist id="produk">
                <!-- Option AJAX -->
            </datalist>
        </div>

        <div class="form-group form-group-default tanggalShow" style="display: none;">
            <label for="exampleFormControlSelect1">Tanggal</label>
            <input class="form-control" type="date" name="id_tanggal" id="id_tanggal" onChange="getJam()">
        </div>

        <div class="form-group form-group-default jamShow" style="display: none;">
            <label for="exampleFormControlSelect1">Jam Reservasi</label>
            <input class="form-control" autocomplete="off" list="jam" name="id_jam" id="id_jam" onChange="">
            <datalist id="jam">
                <!-- Option AJAX -->
            </datalist>
        </div>
        <button type="submit" class="btn btn-success" id="submitButton" onclick="submitForm()">Submit</button>
    </div>
</form>