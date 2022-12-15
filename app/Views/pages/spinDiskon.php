<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start lihat antrian -->
<div class="xl:w-[980px] px-[25px] py-[64px] flex flex-col items-center mx-auto">
  <div class="mt-[64px] flex flex-col items-center w-full">
    <div class="w-full text-center">
      <h3 class="xl:text-5xl text-2xl font-bold">Spin Hadiah</h3>
    </div>
    <div class="container flex flex-col gap-[24px] items-center">
      <div class="row relative">
      <div class="rotate-180 flex justify-center mb-[8px]">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 22h-24l12-20z"/></svg>
    </div>
        <div class="col-xs-12" align="center">
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
    <!-- end container -->
    <br>
    </div>
  </div>
</div>
<!-- End lihat antrian -->

<script language="JavaScript">
  function create_spinner() {
    color_data = ['#fedf30', '#fdb441', '#fd6930', '#eb5454', '#bf9dd3', '#29b8cd', "#00f2a6", "#f67"];
    label_data = ['Divyesh', 'Roshni', 'Rency', 'Reem', 'Ditya', 'Feny', 'Greny', 'Ronil'];
    var color = color_data;
    var label = label_data;
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
    color_data = ['#fedf30', '#fdb441', '#fd6930', '#eb5454', '#bf9dd3', '#29b8cd', "#00f2a6", "#f67"];
    label_data = ['Divyesh', 'Roshni', 'Rency', 'Reem', 'Earem', 'Feny', 'Greny', 'Ronil'];
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
      return swal({
        title: "Wow!!!!",
        text: "It's " + label[ai] + " turn",
        type: "success",
        confirmButtonText: "OK",
        closeOnConfirm: false
      });
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
