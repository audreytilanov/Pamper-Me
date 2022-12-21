<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<div class="px-[24px] xl:px-[80px] py-[64px]">
  <div class="flex flex-col items-start gap-[24px]">
    <div class="flex flex-col items-start gap-[8px]">
      <h1 class="font-bold xl:text-5xl xl:mt-[50px] mt-[40px] text-2xl">Spin Hadiah</h1>
      <p class="text-base ml-[4px]">
        Halaman ini dapat melakukan spin hadiah.
      </p>
    </div>
  </div>
  <div class="grid xl:grid-cols-2 gap-[24px] items-start mt-[40px]">
    <div class="xl:p-[40px] p-[16px] border border-zinc-900 w-full flex flex-col items-start gap-[32px] rounded-lg">
      <div class="flex flex-col items-start gap-[8px]">
        <div class="flex flex-row gap-[24px] items-center">
          <img
            class="w-[190px] h-[190px] object-cover rounded-lg"
            src="/images/baby.jpg"
            alt=""
          />
        </div>
        </div>
          <div class="w-full flex flex-col gap-[24px] items-start">
            <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
            <h3 class="w-full text-base">Nama anak :</h3>
            <div class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base">
            <?= $data['nama_anak'] ?>
          </div>
        </div>

        <!-- Start Tanggal -->
        <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
          <h3 class="w-full text-base">Tanggal Lahir :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >        
            <?= $data['tanggal_lahir'] ?>
          </div>
        </div>
        <!-- End Tanggal -->

        <!-- Start Kelamin -->
        <div class="flex xl:flex-row flex-col items-start w-full items-center gap-[8px]">
          <h3 class="w-full text-base">Kelamin :</h3>
          <div
            class="py-[10px] px-[16px] rounded bg-gray-100 w-full rounded-md font-bold text-base"
          >
          <?= $data['jenis_kelamin'] ?>

          </div>
        </div>
        <!-- End Kelamin -->
      </div>
    </div>
    <div>
    <div class="flex flex-col viewData">
      
    </div>
    <div class="">
    <h4 class="font-bold text-2xl">Penukaran Hadiah | T</h4>
    <div class="py-4 inline-block min-w-full">
      <div class="">
        <table class="min-w-full text-center">
          <thead class="border-b bg-pink-500">
            <tr>
              <th scope="col" class="text-sm font-medium text-white xl:px-6 xl:py-4 p-2">
                Nama Hadiah
              </th>
              <th scope="col" class="text-sm font-medium text-white xl:px-6 xl:py-4 p-2">
                Point Penukaran
              </th>
            </tr>
          </thead class="border-b">
          <tbody>
            <?php foreach($hadiah as $dataHadiah): ?>
            <tr class="bg-white border-b">
              <td class="xl:px-6 xl:py-4 p-2 whitespace-nowrap text-sm font-medium text-gray-900">
                <?= $dataHadiah['nama_hadiah'] ?>
            </td>
              <td class="text-sm text-gray-900 font-light xl:px-6 xl:py-4 p-2 whitespace-nowrap">
                <?= $dataHadiah['point_hadiah'] ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php if(!empty($res)){ ?>
      <div class="flex flex-col gap-[16px] items-center">
        <h4 class="text-2xl font-bold">Spin Hadiah</h4>
        <div class="row relative">
        <div class="rotate-180 flex justify-center mb-[8px] absolute w-full">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 22h-24l12-20z"/></svg>
        </div>
          <div class="col-xs-12 mt-[16px]" align="center">
            <div id="wheel">
              <canvas id="canvas" width="260" height="260"></canvas>
            </div>
          </div>
        </div>
        <!--  end row -->
        <div class="flex gap-[8px] flex-row justify-center">
          <div>
            <button type="button" class="flex flex-row gap-[8px] items-center text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-base px-[24px] py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800" onclick="spin()">Spin Now!</button>
          </div>
          <div>
            <button type="button" id="stop" class="flex flex-row gap-[8px] items-center text-white border border-pink-700 text-pink-700 hover:bg-pink-700 hover:text-white focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-base px-[24px] py-2.5 text-center dark:focus:ring-pink-800" onclick="stops()">Stop Now!</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<script language="JavaScript">
  $(document).ready(function(){
    dataDetail();
  })
  function dataDetail(){
    var anak = <?php echo json_encode($data['id_anak']); ?>;
    // console.log(anak);
        $.ajax({
            url:"<?= base_url('user/poinDetail') ?>",
            data: {anak:anak},
            dataType: "json",
            success: function (response){
                $('.viewData').html(response.data)
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);  
            }
        })
    }
  function create_spinner() {
    color_data = ['#fedf30', '#fdb441', '#fd6930', '#eb5454', '#bf9dd3', '#29b8cd', "#00f2a6", "#f67", '#fdb441'];
    label_data = <?php echo json_encode($spin); ?>;
    var color = color_data;
    var label = label_data;
    // console.log(label);
    var slices = color.length;
    var sliceDeg = 360 / slices;
    var deg = rand(0, 360);
    var speed = 10;
    var slowDownRand = 0;
    var ctx = canvas.getContext('2d');
    var width = canvas.width; // size
    var center = width / 2; // center
    ctx.clearRect(0, 0, width, width);
    for (var i = 0; i < slices; i++) {
      ctx.beginPath();
      ctx.fillStyle = color[i];
      ctx.moveTo(center, center);
      ctx.arc(center, center, width / 2, deg2rad(deg), deg2rad(deg + sliceDeg));
      ctx.lineTo(center, center);
      ctx.fill();
      var drawText_deg = deg + sliceDeg / 2;
      ctx.save();
      ctx.translate(center, center);
      ctx.rotate(deg2rad(drawText_deg));
      ctx.textAlign = "right";
      ctx.fillStyle = "#fff";
      ctx.font = 'bold 15px sans-serif';
      ctx.fillText(label[i], 100, 5);
      ctx.restore();
      deg += sliceDeg;
    }
  }
  create_spinner();
  var deg = rand(0, 360);
  var speed = 10;
  var ctx = canvas.getContext('2d');
  var width = canvas.width; // size
  var center = width / 2; // center
  var isStopped = false;
  var lock = false;
  var slowDownRand = 0;

  function spin() {
    color_data = ['#fedf30', '#fdb441', '#fd6930', '#eb5454', '#bf9dd3', '#29b8cd', "#00f2a6", "#f67", '#fdb441'];
    label_data = <?php echo json_encode($spin); ?>;
    var color = color_data;
    var label = label_data;
    var slices = color.length;
    var sliceDeg = 360 / slices;
    deg += speed;
    deg %= 360;
    // Increment speed
    if (!isStopped && speed < 3) {
      speed = speed + 1 * 0.1;
    }
    // Decrement Speed
    if (isStopped) {
      if (!lock) {
        lock = true;
        slowDownRand = rand(0.994, 0.998);
      }
      speed = speed > 0.2 ? speed *= slowDownRand : 0;
    }
    // Stopped!
    if (lock && !speed) {
      var ai = Math.floor(((360 - deg - 90) % 360) / sliceDeg); // deg 2 Array Index
      ai = (slices + ai) % slices; // Fix negative index
      //return alert("You got:\n"+ label[ai] ); // Get Array Item from end Degree
      var poin = label[ai];
      var anak = <?php echo json_encode($data); ?>;
      console.log(anak);
      var status = null;
      $.ajax({
          url: "<?= base_url('user/postSpin') ?>",
          type: 'post',
          data: {poin:poin, anak:anak},
          dataType: 'json',
          success:function(response){
            showAlert(response);

          }
      });
      // var status = response;
      console.log(status);

      dataDetail();
      
      return location.reload();
    }
    function showAlert(response){
      if(response == 0){
        return swal({
          title: "Gagal",
          text: "Anda tidak dapat melakukan spin",
          type: "error",
          confirmButtonText: "OK",
          // closeOnConfirm: false
        });
      }else{
        return swal({
          title: "Wow!!!!",
          text: "Anda mendapatkan " + label[ai] + " poin",
          type: "success",
          confirmButtonText: "OK",
          // closeOnConfirm: false
        });

      }

          
        
    }

    ctx.clearRect(0, 0, width, width);
    for (var i = 0; i < slices; i++) {
      ctx.beginPath();
      ctx.fillStyle = color[i];
      ctx.moveTo(center, center);
      ctx.arc(center, center, width / 2, deg2rad(deg), deg2rad(deg + sliceDeg));
      ctx.lineTo(center, center);
      ctx.fill();
      var drawText_deg = deg + sliceDeg / 2;
      ctx.save();
      ctx.translate(center, center);
      ctx.rotate(deg2rad(drawText_deg));
      ctx.textAlign = "right";
      ctx.fillStyle = "#fff";
      ctx.font = 'bold 15px sans-serif';
      ctx.fillText(label[i], 100, 5);
      ctx.restore();
      deg += sliceDeg;
    }
    window.requestAnimationFrame(spin);
  }

  function stops() {
    isStopped = true;
  }

  function deg2rad(deg) {
    return deg * Math.PI / 180;
  }

  function rand(min, max) {
    return Math.random() * (max - min) + min;
  }
</script>

<?= $this->endSection() ?>
