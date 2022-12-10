<form action="javascript:void(0)" id="dataDetail" method="POST">
    <script>
        $(document).ready(function() {
          $('.selectForm').select2();
      });
    </script>
    <div class="card-body">
        <div class="form-row">

        <div class="form-group form-group-default col-md-3">
            <label for="exampleFormControlSelect1">Cari Orangtua</label>
            <select class="form-control selectForm id_orangtua" name="id_orangtua" id="id_orangtua" onChange="getAnak()">
                <option value="">Pilih Data Orangtua</option>
                <?php foreach($data as $datas) : ?>
                <option value="<?= $datas['id_orangtua'] ?>"><?= $datas['nama_orangtua'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group form-group-default anakShow col-md-3" style="display: none;">
            <label for="exampleFormControlSelect1">Cari Anak</label>
            <select class="form-control selectForm id_anak" autocomplete="off" list="anak" name="id_anak" id="anak" onChange="getLayanan()">

            </select>
        </div>

        <div class="form-group form-group-default layananShow col-md-3" style="display: none;">
            <label for="exampleFormControlSelect1">Layanan</label>
            <select class="form-control selectForm id_layanan" autocomplete="off" list="layanan" name="id_layanan" id="layanan" onChange="getKategori()">
            </select>
        </div>
        
        <div class="form-group form-group-default kategoriShow col-md-3" style="display: none;">
            <label for="exampleFormControlSelect1">Kategori Anak</label>
            <select class="form-control selectForm id_kategori" autocomplete="off" list="kategori" name="id_kategori" id="kategori" onChange="getProduk()">
                
            </select>
        </div>

        <div class="form-group form-group-default produkShow col-md-3" style="display: none;">
            <label for="exampleFormControlSelect1">Produk</label>
            <select class="form-control selectForm id_produk" autocomplete="off" list="produk" name="id_produk" id="produk" onChange="getTanggal()">

            </select>
        </div>

        <div class="form-group form-group-default tanggalShow col-md-3" style="display: none;">
            <label for="exampleFormControlSelect1">Tanggal</label>
            <input class="form-control" type="date" name="id_tanggal" id="id_tanggal" onChange="getJam()">
        </div>

        <div class="form-group form-group-default jamShow col-md-3" style="display: none;">
            <label for="exampleFormControlSelect1">Jam Reservasi</label>
            <select class="form-control selectForm id_jam" autocomplete="off" list="jam" name="id_jam" id="jam" onChange="">
            </select>
        </div>
        <button type="submit" class="btn btn-success buttonShow" style="display: none;" id="submitButton" onclick="submitForm()">Submit</button>
    </div>
    </div>
</form>