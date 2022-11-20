<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>
<script type="text/javascript">
  <?php if(!empty(session()->getFlashdata('jadwal'))){
  ?>
      $('#default-modal').modal('show');
  <?php
  }
  ?>
</script>
<!-- Start image baby -->

<div>
  <img
    class="h-screen w-full object-cover"
    src="/images/babyBanner.png"
    alt=""
  />

  <!-- Start Menu Select -->
  <div class="flex justify-center w-full p-[24px] xl:p-[0px]">
    <div
      class="flex justify-center xl:items-end items-start xl:flex-row flex-col xl:p-[24px] py-[24px] xl:absolute bottom-[50px] bg-white gap-[32px] rounded-lg w-full xl:w-max"
    >
      <!-- <form action="<?= base_url('/cari') ?>" method="get"> -->
      <?= csrf_field(); ?>

      <!-- Start Services -->
      <div class="flex flex-row justify-center items-end gap-[40px] w-full">
        <div class="flex flex-col justify-between flex-start xl:h-[90px] h-[65px] w-full">
          <h1 class="text-lg font-bold">Service</h1>
          <div class="flex justify-center">
            <div class="xl:w-[200px] flex items-center relative w-full">
              <select
                class="px-2 form-select appearance-none block w-full py-1.5 xl:text-base text-xs font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-b-[2px] border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-pink-500 focus:outline-none"
                aria-label="Default select example"
                name="kategori_layanan"
              >
                <option selected>Silahkan pilih layanan</option>
                <?php foreach($data as $data) :?>

                <option value="<?php echo $data['id_kategori_layanan']; ?>">
                  <?php echo $data['nama_kategori']; ?>
                </option>
                <?php endforeach; ?>
              </select>
              <img class="absolute right-0" src="/icons/down.svg" alt="" />
            </div>
          </div>
        </div>
      </div>
      <!-- End Services -->

      <!-- Start Services -->
      <div class="flex flex-row justify-center items-end gap-[40px] w-full">
        <div class="flex flex-col justify-between flex-start xl:h-[90px] h-[65px] w-full">
          <h1 class="text-lg font-bold">Cabang</h1>
          <div class="flex justify-center">
            <div class="xl:w-[200px] flex items-center relative w-full">
              <select
                class="px-2 form-select appearance-none block w-full py-1.5 xl:text-base text-xs font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-b-[2px] border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-pink-500 focus:outline-none"
                aria-label="Default select example"
                name="cabang"
              >
                <option selected>Silahkan pilih Cabang</option>
                <?php foreach($cabangData as $data) :?>

                <option value="<?php echo $data['id_cabang']; ?>">
                  <?php echo $data['nama_cabang']; ?>
                </option>

                <?php endforeach; ?>
              </select>
              <img class="absolute right-0" src="/icons/down.svg" alt="" />
            </div>
          </div>
        </div>
      </div>
      <!-- End Services -->

      <!-- Start Tanggal -->
      <div class="flex flex-col justify-between flex-start xl:h-[90px] h-[65px] w-full">
        <h1 class="text-lg font-bold">Tanggal :</h1>
        <div
          class="flex justify-start w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        >
          <div class="antialiased w-full">
            <div class="w-full">
              <div class="relative">
                <input type="hidden" name="date" x-ref="date" />
                <div class="flex items-center w-full justify-between">
                  <input
                    class="px-2 form-select appearance-none block w-full py-1.5 xl:text-base text-xs font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-b-[2px] border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-pink-500 focus:outline-none"
                    type="date"
                    name="tanggal"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Tanggal -->

      <!-- Start Jam -->
      <!-- <div class="flex flex-row justify-center items-end gap-[40px]">
        <div class="flex flex-col justify-between flex-start h-[90px]">
          <h1 class="text-lg font-bold">Waktu</h1>
          <div class="flex justify-center">
            <div class="flex items-center relative z-[2]">
              <select
                name=""
                id=""
                class="form-select appearance-none block py-1.5 xl:text-base text-xs font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-b-[2px] border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-pink-500 focus:outline-none px-2"
              >
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="02">03</option>
              </select>
              <span class="px-2 border-b-[2px] py-1.5 border-gray-300">:</span>
              <select
                name=""
                id=""
                class="form-select appearance-none block py-1.5 xl:text-base text-xs font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-b-[2px] border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-pink-500 focus:outline-none px-2"
              >
                <option value="00">00</option>
                <option value="01">01</option>
              </select>
              <select
                name=""
                id=""
                class="form-select appearance-none block py-1.5 xl:text-base text-xs font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-b-[2px] border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-pink-500 focus:outline-none px-2 w-[70px]"
              >
                <option value="AM">AM</option>
                <option value="PM">PM</option>
              </select>
              <img class="absolute right-0" src="/icons/time.svg" alt="" />
            </div>
          </div>
        </div>
      </div> -->
      <!-- End Jam -->

      <!-- Start Cari -->
      <?php /*if(empty(session()->getFlashdata('jadwal'))):*/ ?>
      <button
        class="modal-open text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-sm px-[64px] py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800 w-full xl:w-max"
      >
        Cari
      </button>
      <?php //else:// ?>
      <!-- <button
        class="flex flex-row gap-[8px] items-center text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-sm px-[64px] py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800"
        data-modal-toggle="default-modal"
        type="cari"
      >
      Cari
      </button> -->
      <?php //endif// ?>
      <!-- End Cari -->
      <!-- </form> -->
      <!-- Start Modal -->
      <?php //if (session()->getFlashdata('jadwal') !== NULL) :// ?>

      <!--Modal-->
      <div
        class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center py-[100px]"
      >
        <div
          class="modal-overlay absolute w-full h-full bg-black opacity-50"
        ></div>

        <div
          class="modal-container fixed z-[4] overflow-y-auto xl:px-[160px] px-[24px] py-[100px] h-full w-full">
          <!-- Add margin if you want to see grey behind the modal-->
          <div class="bg-white rounded-lg">
            <div class="modal-content container mx-auto h-auto text-left p-4">
              <!--Title-->
              <div class="flex flex-row justify-end">
                <div
                  class="modal-close cursor-pointer flex flex-col items-center mt-4 mr-4 text-black text-sm z-[4]"
                >
                  <svg
                    class="fill-current text-black"
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="18"
                    viewBox="0 0 18 18"
                  >
                    <path
                      d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                    ></path>
                  </svg>
                </div>
              </div>
  
              <!--Body-->
              <div class="xl:p-6 space-y-6 xl:mt-[opx] mt-[24px]">
                <h3
                  class="text-gray-900 xl:text-base text-xs lg:text-2xl font-bold text-center"
                >
                  Silahkan Pilih Layanan
                </h3>
  
                <!-- start form  -->
                <div class="flex flex-col gap-[40px] items-start">
                  <div
                    class="flex flex-col gap-[40px] items-start w-full border-b-4 pb-[40px]"
                  >
                    <!-- Start Kelamin -->
                    <div class="flex flex-col flex-start xl:w-[40%] w-full gap-[8px]">
                      <div class="flex justify-center w-full">
                        <div class="flex items-start flex-col w-full gap-[8px]">
                          <h3 class="font-bold xl:text-2xl">Pilih nama anak :</h3>
                          <div
                            class="w-full relative z-[2] flex items-center flex-row"
                          >
                            <select
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              aria-label="Default select example"
                            >
                              <option selected>Pilih Nama Anak</option>
                              <option value="1">Jack Hermanson</option>
                              <option value="2">Khamzat</option>
                            </select>
                            <img
                              class="absolute right-[20px] z-[2]"
                              src="/icons/down.svg"
                              alt=""
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Kelamin -->
  
                    <!-- Keranjang -->
                    <div class="flex flex-col flex-start gap-[8px]">
                      <div class="bg-white rounded-xl shadow-lg">
                        <img
                          class="rounded-t-xl"
                          src="/images/legBaby.png"
                          alt=""
                        />
                        <div class="py-[16px] px-[24px]">
                          <h3 class="font-bold text-sm">Precious Baby Massage</h3>
                          <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
                            Rp.130,000/40 menit
                          </h3>
                          <button
                            class="mt-[24px] flex flex-row gap-[8px] items-center text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-sm px-[24px] py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800"
                            type="button"
                          >
                            + Keranjang
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- Keranjang -->
  
                    <!-- Start Tanggal  -->
                    <div class="flex flex-col flex-start gap-[8px]">
                      <h1 class="text-xl font-bold">Tanggal :</h1>
                      <div
                        class="flex flex-col items-center gap-[4px] px-[16px] py-[8px] bg-pink-500 text-white rounded-md"
                      >
                        <h3
                          class="flex flex-start flex-row px-[24px] py-[10px] bg-pink-600 font-bold rounded-md"
                        >
                          Okt
                        </h3>
                        <h3>Hari ini</h3>
                        <h3>18</h3>
                      </div>
                    </div>
                    <!-- End Tanggal -->
  
                    <!-- Start Layanan  -->
                    <div class="flex flex-col flex-start gap-[8px]">
                      <h1 class="text-xl font-bold">Blissful Baby Swim :</h1>
                      <ul class="flex flex-row items-start gap-[8px]">
                        <li class="relative">
                          <input
                            class="sr-only peer"
                            type="radio"
                            value="no"
                            name="answer"
                            id="test0"
                          />
                          <label
                            class="flex py-2 px-4 bg-red-500 text-white border border-gray-300 rounded-lg xl:text-base text-xs text-xs"
                            for="test0"
                            >12:00 - 13:00</label
                          >
                        </li>
                        <li class="relative">
                          <input
                            class="sr-only peer"
                            type="radio"
                            value="no"
                            name="answer"
                            id="test1"
                          />
                          <label
                            class="flex py-2 px-4 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-pink-500 peer-checked:ring-2 peer-checked:border-transparent xl:text-base text-xs text-xs"
                            for="test1"
                            >12:00 - 13:00</label
                          >
                        </li>
  
                        <li class="relative">
                          <input
                            class="sr-only peer"
                            type="radio"
                            value="no"
                            name="answer"
                            id="test2"
                          />
                          <label
                            class="flex py-2 px-4 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-pink-500 peer-checked:ring-2 peer-checked:border-transparent xl:text-base text-xs text-xs"
                            for="test2"
                            >12:00 - 13:00</label
                          >
                        </li>
                      </ul>
                    </div>
                    <!-- End Layanan -->
                  </div>
  
                  <!-- Start Cards -->
                  <div>
                    <h3 class="text-gray-900 xl:text-base text-xs lg:text-2xl font-bold">
                      Silahkan Pilih Layanan
                    </h3>
                    <?php //foreach(session()->getFlashdata('jadwal') as $data):?>
                    <form action="" method="POST">
                      <div class="pt-[16px] grid xl:grid-cols-3 gap-[24px]">
                        <div class="flex flex-col flex-start gap-[8px]">
                          <div class="bg-white rounded-xl shadow-lg">
                            <img
                              class="rounded-t-xl"
                              src="/images/legBaby.png"
                              alt=""
                            />
                            <div class="py-[16px] px-[24px]">
                              <h3 class="font-bold text-sm">
                                Precious Baby Massage
                              </h3>
                              <h3
                                class="font-bold text-sm text-pink-500 mt-[24px]"
                              >
                                Rp.130,000/40 menit
                              </h3>
                              <button
                                class="mt-[24px] flex flex-row gap-[8px] items-center text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-sm px-[24px] py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800"
                                type="button"
                              >
                                + Keranjang
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <?php //endforeach; ?>
                  </div>
                  <!-- End Cards -->
                </div>
                <!-- End Form -->
              </div>
  
            </div>
          </div>
        </div>
      </div>
      <!-- End Modal -->
      <?php //endif;// ?>
      <!-- End cari -->
    </div>
  </div>
  <!-- End Menu Select -->
</div>
<!-- End image baby -->

<div class="xl:px-[80px] xl:py-[64px] p-[24px]">
  <!-- Start Cards -->
  <div class="pt-[24px] grid xl:grid-cols-4 gap-[24px]">
    <div class="bg-white rounded-xl shadow-lg">
      <img
        class="rounded-t-xl h-[164px] w-full object-cover"
        src="/images/legBaby.png"
        alt=""
      />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg">
      <img
        class="rounded-t-xl h-[164px] w-full object-cover"
        src="/images/legBaby.png"
        alt=""
      />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg">
      <img
        class="rounded-t-xl h-[164px] w-full object-cover"
        src="/images/legBaby.png"
        alt=""
      />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg">
      <img
        class="rounded-t-xl h-[164px] w-full object-cover"
        src="/images/legBaby.png"
        alt=""
      />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg">
      <img
        class="rounded-t-xl h-[164px] w-full object-cover"
        src="/images/legBaby.png"
        alt=""
      />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg">
      <img
        class="rounded-t-xl h-[164px] w-full object-cover"
        src="/images/legBaby.png"
        alt=""
      />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg">
      <img
        class="rounded-t-xl h-[164px] w-full object-cover"
        src="/images/legBaby.png"
        alt=""
      />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg">
      <img
        class="rounded-t-xl h-[164px] w-full object-cover"
        src="/images/legBaby.png"
        alt=""
      />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
  </div>
  <!-- End Cards -->

  <script>
    var openmodal = document.querySelectorAll(".modal-open");
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener("click", function (event) {
        event.preventDefault();
        toggleModal();
      });
    }

    const overlay = document.querySelector(".modal-overlay");
    overlay.addEventListener("click", toggleModal);

    var closemodal = document.querySelectorAll(".modal-close");
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener("click", toggleModal);
    }

    document.onkeydown = function (evt) {
      evt = evt || window.event;
      var isEscape = false;
      if ("key" in evt) {
        isEscape = evt.key === "Escape" || evt.key === "Esc";
      } else {
        isEscape = evt.keyCode === 27;
      }
      if (isEscape && document.body.classList.contains("modal-active")) {
        toggleModal();
      }
    };

    function toggleModal() {
      const body = document.querySelector("body");
      const modal = document.querySelector(".modal");
      modal.classList.toggle("opacity-0");
      modal.classList.toggle("pointer-events-none");
      body.classList.toggle("modal-active");
    }
  </script>
</div>

<?= $this->endSection() ?>
