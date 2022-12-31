<form action="javascript:void(0)" id="dataDetail" method="POST">
    <script>
        $(document).ready(function() {
          $('.selectForm').select2();
      });
    </script>
    <div class="card-body">
        <div class="form-row">

        <div class="form-group form-group-default tanggalShow col-md-8">
            <label for="exampleFormControlSelect1" class="font-weight-bold">Tanggal</label>
            <input class="form-control" type="date" name="id_tanggal" id="id_tanggal" onChange="getJam()">
        </div>

        <div class="form-group form-group-default anakShow col-md-4">
            
            <label for="exampleFormControlSelect1">Layanan</label>
            <select class="form-control selectForm id_layanan" autocomplete="off" list="layanan" name="id_layanan" id="layanan" onChange="getKategori()">
            </select>
        </div>

        <div class="col-md-8">
            <div class="form-group form-group-default">
                <label for="exampleFormControlSelect1">Cari Orangtua</label>
                <select class="form-control selectForm id_orangtua" name="id_orangtua" id="id_orangtua" onChange="getAnak()">
                    <option value="">Pilih Data Orangtua</option>
                    <?php foreach($data as $datas) : ?>
                    <option value="<?= $datas['id_orangtua'] ?>"><?= $datas['nama_orangtua'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
    
            <!-- <div class="form-group form-group-default anakShow">
                <label for="exampleFormControlSelect1">Cari Anak</label>
                <select class="form-control selectForm id_anak" autocomplete="off" list="anak" name="id_anak" id="anak" onChange="getLayanan()">
    
                </select>
            </div> -->

            <div class="form-group form-group-default kategoriShow">
                
                <label for="exampleFormControlSelect1">Cari Anak</label>
                <select class="form-control selectForm id_anak" autocomplete="off" list="anak" name="id_anak" id="anak" onChange="getLayanan()">
                </select>
            </div>
        </div>
    

        <div class="col-md-4">
            <div class="form-group form-group-default produkShow">
                <label for="exampleFormControlSelect1">Produk</label>
                <select class="form-control selectForm id_produk" autocomplete="off" list="produk" name="id_produk" id="produk" onChange="getTanggal()">
                </select>
            </div>
    
            <div class="form-group form-group-default layananShow">
                <label for="exampleFormControlSelect1" >Kategori Anak</label>
                <select class="form-control selectForm id_kategori" autocomplete="off" list="kategori" name="id_kategori" id="kategori" onChange="getProduk()">
                </select>
            </div>
            <div class="form-group form-group-default jamShow">
                <label for="exampleFormControlSelect1">Jam Reservasi</label>
                <select class="form-control selectForm id_jam" autocomplete="off" list="jam" name="id_jam" id="jam" onChange="">
                </select>
            </div>
        </div>

        <div class="col-md-8 viewData" style="height: 200px; overflow: auto;">
        
        </div>

        <div class="form-group form-group-default col-md-4" style="height: 200px;   overflow: auto;">
            <div class="form-group form-group-default layananShow">
                <label for="exampleFormControlSelect1"> <span style="font-size: 16px; font-weight: bold;">List User Waiting</span> </label>
                <ul class="list-group">
                    <li class="list-group-item">Item 1</li>
                    <li class="list-group-item">Item 2</li>
                    <li class="list-group-item">Item 3</li>
                    <li class="list-group-item">Item 4</li>
                    <li class="list-group-item">Item 5</li>
                </ul>
            </div>
        </div>


        <button type="submit" class="btn btn-success buttonShow" style="width: 160px;" id="submitButton" onclick="submitForm()">Submit</button>

    </div>
    </div>
</form>
<script>
    function dataDetail(){
        $.ajax({
            url:"<?= base_url('admin/reservasi/cari/ortu') ?>",
            data: "data",
            dataType: "json",
            success: function (response){
                console.log(response.data);
                $('.viewData').html(response.data)
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);  
            }
        })
    }
</script>