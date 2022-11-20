<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start lihat antrian -->
<div class="xl:px-[80px] px-[25px] py-[64px] flex flex-col items-center gap-[40px]">
  <div class="mt-[64px] flex flex-col items-start gap-[40px] w-full">
    <div class="w-full text-center">
      <h3 class="xl:text-5xl text-2xl font-bold">Lihat Antrian</h3>
    </div>
    <!-- Start Tanggal  -->
    <form class="w-full flex flex-col gap-[24px] items-start" action="<?= base_url('user/lihat-antrian/cari') ?>" method="GET">
    <div class="flex flex-start flex-col gap-[16px]">
      <h3 class="text-2xl font-bold">Pilih Tanggal</h3>
      <div class="flex flex-row items-stretch gap-[24px]">
        <!-- Start Tanggal -->
        <div class="flex flex-row justify-center items-end gap-[40px]">
          <div class="flex flex-col justify-between flex-start">
            <div class="flex justify-center">
              <div class="flex items-center relative z-[2]">
                <div class="antialiased">
                  <div
                    x-data="app()"
                    x-init="[initDate(), getNoOfDays()]"
                    x-cloak
                  >
                    <div class="w-[250px]">
                      <div class="relative">
                        <input type="hidden" name="date" x-ref="date" />
                        <div class="flex items-center w-full justify-between">
                          <input
                            required
                            type="date"
                            name="tanggal"
                            value="<?php echo date('2022-11-17'); ?>"
                          />
                        </div>
                      </div>
                    </div>
                  </div>

                  <script>
                    const MONTH_NAMES = [
                      "January",
                      "February",
                      "March",
                      "April",
                      "May",
                      "June",
                      "July",
                      "August",
                      "September",
                      "October",
                      "November",
                      "December",
                    ];
                    const DAYS = [
                      "Sun",
                      "Mon",
                      "Tue",
                      "Wed",
                      "Thu",
                      "Fri",
                      "Sat",
                    ];

                    function app() {
                      return {
                        showDatepicker: false,
                        datepickerValue: "",

                        month: "",
                        year: "",
                        no_of_days: [],
                        blankdays: [],
                        days: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],

                        initDate() {
                          let today = new Date();
                          this.month = today.getMonth();
                          this.year = today.getFullYear();
                          this.datepickerValue = new Date(
                            this.year,
                            this.month,
                            today.getDate()
                          ).toDateString();
                        },

                        isToday(date) {
                          const today = new Date();
                          const d = new Date(this.year, this.month, date);

                          return today.toDateString() === d.toDateString()
                            ? true
                            : false;
                        },

                        getDateValue(date) {
                          let selectedDate = new Date(
                            this.year,
                            this.month,
                            date
                          );
                          this.datepickerValue = selectedDate.toDateString();

                          this.$refs.date.value =
                            selectedDate.getFullYear() +
                            "-" +
                            ("0" + selectedDate.getMonth()).slice(-2) +
                            "-" +
                            ("0" + selectedDate.getDate()).slice(-2);

                          console.log(this.$refs.date.value);

                          this.showDatepicker = false;
                        },

                        getNoOfDays() {
                          let daysInMonth = new Date(
                            this.year,
                            this.month + 1,
                            0
                          ).getDate();

                          // find where to start calendar day of week
                          let dayOfWeek = new Date(
                            this.year,
                            this.month
                          ).getDay();
                          let blankdaysArray = [];
                          for (var i = 1; i <= dayOfWeek; i++) {
                            blankdaysArray.push(i);
                          }

                          let daysArray = [];
                          for (var i = 1; i <= daysInMonth; i++) {
                            daysArray.push(i);
                          }

                          this.blankdays = blankdaysArray;
                          this.no_of_days = daysArray;
                        },
                      };
                    }
                  </script>
                </div>
                <!-- <img class="absolute right-0" src="/icons/down.svg" alt="" /> -->
              </div>
            </div>
          </div>
        </div>
        <!-- End Tanggal -->
      </div>
    </div>
    <!-- End Tanggal -->

    <!-- Start Cabang -->
    <div class="flex items-start flex-col gap-[16px]">
      <h3 class="xl:text-2xl font-bold text-xl">Cabang / Lokasi</h3>

      <ul class="flex flex-row items-start gap-[8px] flex-wrap">
      <?php foreach($cabangData as $cabang): ?>

        <li class="relative">
          <input
            class="sr-only peer"
            type="radio"
            <?php if($cabang['id_cabang'] == 1): ?>
              checked
            <?php endif; ?>
            value="<?php echo $cabang['id_cabang'] ?>"
            name="cabang"
            id="test<?php echo $cabang['id_cabang'] ?>"
          />
          <label
            class="flex py-2 px-4 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-pink-500 peer-checked:ring-2 peer-checked:border-transparent"
            for="test<?php echo $cabang['id_cabang'] ?>"
            ><?php echo $cabang['nama_cabang'] ?></label
          >
        </li>
      <?php endforeach; ?>
      </ul>
    </div>
    <!-- End Cabang -->
    <!-- Start Services -->
    <div class="flex items-start flex-col gap-[16px]">
      <h3 class="xl:text-2xl font-bold text-xl">Layanan</h3>

      <ul class="flex flex-row items-start gap-[8px] flex-wrap">
      <?php foreach($data as $layanan): ?>

        <li class="relative">
          <input
            class="sr-only peer"
            type="radio"
            value="<?php echo $layanan['id_kategori_layanan'] ?>"
            <?php if($layanan['id_kategori_layanan'] == 1): ?>
              checked
            <?php endif; ?>
            name="layanan"
            id="layanan<?php echo $layanan['id_kategori_layanan'] ?>"
          />
          <label
            class="flex py-2 px-4 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-pink-500 peer-checked:ring-2 peer-checked:border-transparent"
            for="layanan<?php echo $layanan['id_kategori_layanan'] ?>"
            ><?php echo $layanan['nama_kategori'] ?></label
          >
        </li>
      <?php endforeach; ?>
      </ul>
    </div>
    <!-- End Services -->

    <div class="w-full justify-center flex">
     <!-- Start Cari -->
     <button
        class="text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-sm xl:px-[128px] w-full py-3 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800"
        type="submit">
        Cari Data
      </button>
      <!-- End Cari -->
    </div>
  </div>
  </form>
    <!-- Start Cards -->
    <div class="pt-[24px] grid xl:grid-cols-4 gap-[24px]">
    <?php if (session()->getFlashdata('jadwal') !== NULL) : ?>
    <?php foreach(session()->getFlashdata('jadwal') as $data) :?>    
    <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
      <img class="rounded-t-xl" src="/images/legBaby.png" alt="" />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm"><?php echo $data['nama_produk'] ?> | <?php echo $data['nama_cabang'] ?></h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          <?php echo $data['jam']?> | <?php echo $data['tanggal']?>
        </h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          <?php echo $data['harga']?> / <?php echo $data['durasi']; ?> Menit
        </h3>
        <form action="<?= base_url('user/lihat-antrian/tambah/') ?>" method="POST">
        <input type="hidden" value="<?php echo $data['id_jadwal_produk'] ?>" name="id_jadwal">
        <input type="hidden" value="<?php echo $data['id_produk'] ?>" name="id_produk">
        <input type="hidden" value="<?php echo $data['harga'] ?>" name="harga">
        <div class="flex justify-center">
            <div class="w-[200px] flex items-center relative z-[2]">
              <select
                class="px-2 form-select appearance-none block w-full py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-b-[2px] border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-pink-500 focus:outline-none"
                aria-label="Default select example"
                name="anak"
              >
                <option selected>Silahkan pilih Anak</option>
                <?php foreach(session()->getFlashdata('anak') as $anaks) :?>

                <option value="<?php echo $anaks['id_anak']; ?>"><?php echo $anaks['nama_anak']; ?></option>
                <?php endforeach; ?>
              </select>
              <img
                class="absolute right-0 z-[3]"
                src="/icons/down.svg"
                alt=""
              />
            </div>
          </div>
        <button
          class="mt-[24px] flex flex-row gap-[8px] items-center text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-sm px-[24px] py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800"
          type="submit"
        >
          + Keranjang
        </button>
        </form>
      </div>
    </div>
  <?php endforeach; endif;?>
  </div>
  <!-- End Cards -->
</div>
<!-- End lihat antrian -->

<?= $this->endSection() ?>
