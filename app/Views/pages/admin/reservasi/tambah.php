<?= $this->extend('layoutAdmin/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start Tambah Services -->
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Tambah Reservasi</div>
        </div>
        <div class="formReservasi">

        </div>
    </div>
</div>
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Detail Reservasi</h4>
      </div>
    </div>
    <div class="card-body">
        <p class="card-text viewData">
        </p>
        <button class="btn btn-success" id="selesaiTransaksi" onclick="selesaiTransaksi()">Transaksi Selesai</button>
        
    </div>
  </div>
</div>
<!-- End Tambah Services -->

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script>
    function dataDetail(){
        $.ajax({
            url:"<?= base_url('admin/reservasi/cari/ortu') ?>",
            data: "data",
            dataType: "json",
            success: function (response){
                $('.viewData').html(response.data)
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);  
            }
        })
    }

    function inputOrangtua(){
        $.ajax({
            url:"<?= base_url('admin/reservasi/cari/ortuInput') ?>",
            data: "data",
            dataType: "json",
            success: function (response){
                $('.formReservasi').html(response.data)
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);  
            }
        })
    }

    function getAnak(){
        var orangtua = $('#id_orangtua').val();
        $.ajax({
            url: "<?= base_url('admin/reservasi/cari/anakInput') ?>",
            type: 'post',
            data: {orangtua:orangtua},
            dataType: 'json',
            success:function(response){
                $('.anakShow').css('display', 'block')
                var len = response.length;
                $("#anak").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id_anak'];
                    var name = response[i]['nama_anak'];
                    
                    $("#anak").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    }

    function getLayanan(){
        $.ajax({
            url: "<?= base_url('admin/reservasi/cari/layananInput') ?>",
            type: 'post',
            dataType: 'json',
            success:function(response){
                var len = response.length;
                $('.layananShow').css('display', 'block')
                $("#layanan").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id_layanan'];
                    var name = response[i]['nama_layanan'];
                    
                    $("#layanan").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    }

    function getKategori(){
        var layanan = $('#id_layanan').val();
        $.ajax({
            url: "<?= base_url('admin/reservasi/cari/kategoriInput') ?>",
            type: 'post',
            data: {layanan:layanan},
            dataType: 'json',
            success:function(response){
                $('.kategoriShow').css('display', 'block')
                var len = response.length;
                $("#kategori").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id_kategori_layanan'];
                    var name = response[i]['nama_kategori'];
                    $("#kategori").append("<option value='"+id+"'>"+name+"</option>");
                }
            }
        });
    }

    function getProduk(){
        var kategori = $('#id_kategori').val();
        $.ajax({
            url: "<?= base_url('admin/reservasi/cari/produkInput') ?>",
            type: 'post',
            data: {kategori:kategori},
            dataType: 'json',
            success:function(response){
                $('.produkShow').css('display', 'block')
                var len = response.length;
                $("#produk").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id_produk'];
                    var name = response[i]['nama_produk'];
                    $("#produk").append("<option value='"+id+"'>"+name+"</option>");
                }
            }
        });
    }

    function getTanggal(){
        $('.tanggalShow').css('display', 'block')
    }

    function getJam(){
        var produk = $('#id_produk').val();
        var tanggal = $('#id_tanggal').val();
        $.ajax({
            url: "<?= base_url('admin/reservasi/cari/jamInput') ?>",
            type: 'post',
            data: {produk:produk, tanggal:tanggal},
            dataType: 'json',
            success:function(response){
                $('.jamShow').css('display', 'block')
                $('.tanggalShow').css('display', 'block')
                var len = response.length;
                $("#jam").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id_jadwal_produk'];
                    var name = response[i]['jam'];
                    $("#jam").append("<option value='"+id+"'>"+name+"</option>");
                }
            }
        });
    }

    function submitForm(){
        var formData = {
            id_anak: $("#id_anak").val(),
            id_jam: $("#id_jam").val(),
            id_produk: $("#id_produk").val(),
        };

        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/reservasi/simpanSementara') ?>",
            data: formData,
            dataType: "json",
            encode: true,
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);  
            }
        }).done(function (data) {
            console.log(data);
        });
        event.preventDefault();
        dataDetail();
    }

    function hapusReservasi(id){
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/reservasi/hapusDetail') ?>",
            data: {id:id},
            dataType: "json",
            encode: true,
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);  
            }
        }).done(function (data) {
            console.log(data);
        });
        event.preventDefault();
        dataDetail();
    }
    
    function selesaiTransaksi(){
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/reservasi/selesai') ?>",
            dataType: "json",
            encode: true,
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);  
            }
        })
        event.preventDefault();
        dataDetail();
    }
    

$(document).ready(function(){
    
    dataDetail();
    inputOrangtua();
})
</script>

<?= $this->endSection() ?>
