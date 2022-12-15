<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<div class="flex flex-col items-start gap-[32px] px-[24px] xl:px-[80px] py-[64px]">
  
  <div class="mt-[64px] flex flex-col items-start justify-between w-full">

    <!-- Start Timeline  -->
    <div class="flex justify-between items-center mt-[32px] gap-[16px]">
      <div class="flex flex-col md:flex-row items-center gap-[4px]">
        <img class="w-[20px] h-[20px]" src="/icons/checklist.png" alt="" />
        <div class="text-pink-500 xl:ml-2 font-semibold xl:text-base text-xs text-center xl:text-left">
          Pesan
        </div>
      </div>
      <h2 class="border-pink-500"></h2>
      <div class="flex flex-col md:flex-row items-center gap-[4px]">
        <img class="w-[20px] h-[20px]" src="/icons/checklist.png" alt="" />
        <div class="text-pink-500 xl:ml-2 font-semibold xl:text-base text-xs text-center xl:text-left">
          Bayar
        </div>
      </div>
      <h2 class="border-gray-400"></h2>
      <div class="flex flex-col md:flex-row items-center gap-[4px]">
        <img class="w-[20px] h-[20px]" src="/icons/nonCheck.png" alt="" />
        <div class="text-gray-400 xl:ml-2 font-semibold xl:text-base text-xs text-center xl:text-left">
          Selesai
        </div>
      </div>
    </div>
  <!-- End Timeline -->

    <div class="flex xl:flex-row flex-col items-start justify-between gap-[40px] mt-[32px] w-full xl:w-max">
      <div class="xl:w-[748.344px] flex flex-col items-start gap-[40px]">
        <div class="w-full">
          <h3 class="xl:text-4xl text-2xl font-bold">Pilih Metode pembayaran</h3>
        </div>
        <div class="flex flex-col items-start p-[32px] gap-[10px] bg-white rounded-md drop-shadow-lg">
            <div class="flex flex-col items-start pb-[24px] gap-[16px] border-b-2">
                <h3 class="font-bold text-2xl">Virtual Account</h3>
                <p class="text-sm xl:text-base">Anda bisa membayar dengan transfer melalui ATM, Internet Banking & Mobile Banking.</p>
            </div>

            <!-- Start VA -->
            <button id="pay-button" class="w-full">
              <div class="flex xl:flex-row flex-col justify-between xl:items-center w-full pb-[8px] border-b-2 text-zinc-500 hover:text-zinc-900">
                  <h3 class="font-bold text-sm xl:text-base">Bayar Sekarang !</h3>
                  <div class="flex flew-row items-center gap-[16px] justify-between xl:justify-start">
  
                    <!-- Start Icon bank -->
                    <!-- <img src="/images/bca.png" alt=""> -->
                    <!-- End Icon bank -->
  
                    <img src="/icons/right.svg" alt="">
                  </div>
              </div>
            </button>
            <!-- End VA -->
        </div>
        <!-- <pre><div>JSON result will appear here after payment:<br></div></pre>  -->
        

      </div>
      <!-- Start List Harga -->
      <div
        class="flex items-start gap-[10px] py-[40px] px-[24px] drop-shadow-xl bg-white rounded-md xl:w-max w-full">
        <div class="flex flex-col items-start gap-[24px] w-full">
          <?php 
          $total = 0;
          $id_reservasi = null;
          foreach($list as $data):
            $id_reservasi = $data['id_reservasi'];
            $total += $data['harga'];
          ?>
          <?php endforeach; ?>
            
          <div class="flex flex-col items-start gap-[12px] w-full">
            <h4 class="font-bold font-bold text-xl">Detail Harga</h4>
            <div class="w-full flex flex-col gap-[16px]">
            <div
                class="flex items-center flex-row justify-between px-[16px] py-[10px] w-full bg-pink-100 border-2 border-pink-500 rounded-lg text-pink-500 font-bold text-sm"
            >
                <p>Order Total</p>
                <p>Rp. <?php echo number_format($total , 0, ',', '.'); ?></p>
            </div>
            <div
                class="flex items-center flex-row justify-between px-[16px] py-[10px] w-full bg-pink-100 border-2 border-pink-500 rounded-lg text-pink-500 font-bold text-sm"
            >
                <p>Diskon</p>
                <p>Rp. <?php echo number_format($data['nominal_diskon'] , 0, ',', '.'); ?></p>
            </div>
            
            </div>
          </div>
          
        </div>
      </div>
      <!-- End List Harga -->
      
    </div>
  </div>
</div>
<form action="<?= base_url('user/checkout/setPayment/') ?>" method="post" id="formPayment">
  <input class="form-control" name="id_reservasi" type="hidden" id="id_reservasi" value="<?php echo $reservasi['id_reservasi'] ?>">
  <input class="form-control" name="total_biaya" type="hidden" id="total_biaya" value="">
  <input class="form-control" name="subtotal_biaya" type="hidden" id="subtotal_biaya" value="<?php echo $total ?>">
  <input class="form-control" name="metode_pembayaran" type="hidden" id="metode_pembayaran" value="">
  <input class="form-control" name="status_pembayaran" type="hidden" id="status_pembayaran" value="">
  <input class="form-control" name="id_transaksi_pembayaran" type="hidden" id="id_transaksi_pembayaran" value="">
  <input class="form-control" name="order_id" type="hidden" id="order_id" value="">
  <input class="form-control" name="pdf_url" type="hidden" id="pdf_url" value="">
  <input class="form-control" name="transaction_time" type="hidden" id="transaction_time" value="">
  <input class="form-control" name="va_number_cc" type="hidden" id="va_number_cc" value="">
  <input class="form-control" name="bank" type="hidden" id="bank" value="">
</form>
<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-4QnmmMaHcwiYjWcx"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script type="text/javascript">
  document.getElementById('pay-button').onclick = function(){
    // SnapToken acquired from previous step
    snap.pay('<?=$snap?>', {
      // Optional
      onSuccess: function(result){
        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        let dataResult = JSON.stringify(result, null, 2);
        let dataObj = JSON.parse(dataResult);
        document.getElementById("total_biaya").value = dataObj.gross_amount;
        document.getElementById("metode_pembayaran").value = dataObj.payment_type;
        document.getElementById("status_pembayaran").value = dataObj.transaction_status;
        document.getElementById("id_transaksi_pembayaran").value = dataObj.transaction_id;
        document.getElementById("order_id").value = dataObj.order_id;
        document.getElementById("pdf_url").value = dataObj.pdf_url;
        document.getElementById("transaction_time").value = dataObj.transaction_time;
        if(dataObj.payment_type == "credit_card"){
          document.getElementById("va_number_cc").value = dataObj.masked_card;
          document.getElementById("bank").value = dataObj.bank;
        }else{
          document.getElementById("va_number_cc").value = dataObj[0].va_number;
          document.getElementById("bank").value = dataObj[0].bank;
        }
        document.getElementById("formPayment").submit();
      },
      // Optional
      onPending: function(result){
        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        let dataResult = JSON.stringify(result, null, 2);
        let dataObj = JSON.parse(dataResult);
        document.getElementById("total_biaya").value = dataObj.gross_amount;
        document.getElementById("metode_pembayaran").value = dataObj.payment_type;
        document.getElementById("status_pembayaran").value = dataObj.transaction_status;
        document.getElementById("id_transaksi_pembayaran").value = dataObj.transaction_id;
        document.getElementById("order_id").value = dataObj.order_id;
        document.getElementById("pdf_url").value = dataObj.pdf_url;
        document.getElementById("transaction_time").value = dataObj.transaction_time;
        console.log(dataObj.va_numbers[0].va_number);
        if(dataObj.payment_type == "credit_card"){
          document.getElementById("va_number_cc").value = dataObj.masked_card;
          document.getElementById("bank").value = dataObj.bank;
        }else{
          document.getElementById("va_number_cc").value = dataObj.va_numbers[0].va_number;
          document.getElementById("bank").value = dataObj.va_numbers[0].bank;
        }
        document.getElementById("formPayment").submit();
      },
      // Optional
      onError: function(result){
        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
      }
    });
  };
</script>
<script>
  // $('#pay-button').click(function(e){
  //   $.ajax({
  //     type: "POST",
  //     url: "test.html",
  //     data: {
  //       ''
  //     }, 
  //     dataType : "json",
  //     success: function(response){
  //       if(response.error){
  //         console.log(response.error);
  //       }else{
          
  //       }
  //     }
  //   });
  // });
  
</script>
<?= $this->endSection() ?>
