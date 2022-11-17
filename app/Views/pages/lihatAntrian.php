<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start lihat antrian -->
<div class="px-[80px] py-[64px] flex flex-col items-center gap-[40px]">
  <div class="mt-[64px] flex flex-col items-start gap-[40px] px-[80px] w-full">
    <div class="w-full text-center">
      <h3 class="text-5xl font-bold">Lihat Antrian</h3>
    </div>
    <!-- Start Tanggal  -->
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
                        <div class="flex items-center">
                          <input
                            type="text"
                            readonly
                            x-model="datepickerValue"
                            @click="showDatepicker = !showDatepicker"
                            @keydown.escape="showDatepicker = false"
                            class="form-select appearance-none block w-full py-1.5 text-base font-normal text-gray-700 bg-clip-padding bg-no-repeat border-b-[2px] border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-pink-500 focus:outline-none"
                            aria-label="Default select example"
                            placeholder="Select date"
                          />

                          <div class="absolute right-0">
                            <svg
                              class="h-6 w-6 text-gray-400"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                              />
                            </svg>
                          </div>
                        </div>

                        <!-- <div x-text="no_of_days.length"></div>
                            <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                            <div x-text="new Date(year, month).getDay()"></div> -->

                        <div
                          class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0"
                          style="width: 17rem"
                          x-show.transition="showDatepicker"
                          @click.away="showDatepicker = false"
                        >
                          <div class="flex justify-between items-center mb-2">
                            <div>
                              <span
                                x-text="MONTH_NAMES[month]"
                                class="text-lg font-bold text-gray-800"
                              ></span>
                              <span
                                x-text="year"
                                class="ml-1 text-lg text-gray-600 font-normal"
                              ></span>
                            </div>
                            <div>
                              <button
                                type="button"
                                class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                :disabled="month == 0 ? true : false"
                                @click="month--; getNoOfDays()"
                              >
                                <svg
                                  class="h-6 w-6 text-gray-500 inline-flex"
                                  fill="none"
                                  viewBox="0 0 24 24"
                                  stroke="currentColor"
                                >
                                  <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 19l-7-7 7-7"
                                  />
                                </svg>
                              </button>
                              <button
                                type="button"
                                class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                :disabled="month == 11 ? true : false"
                                @click="month++; getNoOfDays()"
                              >
                                <svg
                                  class="h-6 w-6 text-gray-500 inline-flex"
                                  fill="none"
                                  viewBox="0 0 24 24"
                                  stroke="currentColor"
                                >
                                  <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                  />
                                </svg>
                              </button>
                            </div>
                          </div>

                          <div class="flex flex-wrap mb-3 -mx-1">
                            <template x-for="(day, index) in DAYS" :key="index">
                              <div style="width: 14.26%" class="px-1">
                                <div
                                  x-text="day"
                                  class="text-gray-800 font-medium text-center text-xs"
                                ></div>
                              </div>
                            </template>
                          </div>

                          <div class="flex flex-wrap -mx-1">
                            <template x-for="blankday in blankdays">
                              <div
                                style="width: 14.28%"
                                class="text-center border p-1 border-transparent text-sm"
                              ></div>
                            </template>
                            <template
                              x-for="(date, dateIndex) in no_of_days"
                              :key="dateIndex"
                            >
                              <div style="width: 14.28%" class="px-1 mb-1">
                                <div
                                  @click="getDateValue(date)"
                                  x-text="date"
                                  class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                  :class="{'bg-pink-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-pink-200': isToday(date) == false }"
                                ></div>
                              </div>
                            </template>
                          </div>
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
      <h3 class="text-2xl font-bold">Cabang / Lokasi</h3>

      <div class="flex flex-row items-start gap-[16px]">
        <button
          class="flex flex-row gap-[8px] items-center text-white bg-pink-700 font-bold hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-sm px-[24px] py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800"
          type="button"
        >
          Renon
        </button>
        <button
          class="flex flex-row gap-[8px] items-center bg-gray-700 hover:bg-gray-400 font-bold focus:ring-4 focus:ring-gray-300 font-semibold rounded-lg text-sm px-[24px] py-2.5 text-center dark:bg-gray-300 dark:hover:bg-gray-400 dark:focus:ring-gray-400"
          type="button"
        >
          Jimbaran
        </button>
        <button
          class="flex flex-row gap-[8px] items-center bg-gray-700 hover:bg-gray-400 font-bold focus:ring-4 focus:ring-gray-300 font-semibold rounded-lg text-sm px-[24px] py-2.5 text-center dark:bg-gray-300 dark:hover:bg-gray-400 dark:focus:ring-gray-400"
          type="button"
        >
          Gianyar
        </button>
      </div>
    </div>
    <!-- End Cabang -->

    <!-- Start Services -->
    <div class="flex items-start flex-col gap-[16px]">
      <h3 class="text-2xl font-bold">Services</h3>

      <div class="flex flex-row items-start gap-[16px]">
        <button
          class="flex flex-row gap-[8px] items-center text-white bg-pink-700 font-bold hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-sm px-[24px] py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800"
          type="button"
        >
          Spa
        </button>
        <button
          class="flex flex-row gap-[8px] items-center bg-gray-700 hover:bg-gray-400 font-bold focus:ring-4 focus:ring-gray-300 font-semibold rounded-lg text-sm px-[24px] py-2.5 text-center dark:bg-gray-300 dark:hover:bg-gray-400 dark:focus:ring-gray-400"
          type="button"
        >
          Play Ground
        </button>
        <button
          class="flex flex-row gap-[8px] items-center bg-gray-700 hover:bg-gray-400 font-bold focus:ring-4 focus:ring-gray-300 font-semibold rounded-lg text-sm px-[24px] py-2.5 text-center dark:bg-gray-300 dark:hover:bg-gray-400 dark:focus:ring-gray-400"
          type="button"
        >
          Salon
        </button>
      </div>
    </div>
    <!-- End Services -->

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
            class="flex py-2 px-4 bg-red-500 text-white border border-gray-300 rounded-lg"
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
            class="flex py-2 px-4 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-pink-500 peer-checked:ring-2 peer-checked:border-transparent"
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
            class="flex py-2 px-4 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-pink-500 peer-checked:ring-2 peer-checked:border-transparent"
            for="test2"
            >12:00 - 13:00</label
          >
        </li>
      </ul>
    </div>
    <!-- End Layanan -->

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
            class="flex py-2 px-4 bg-red-500 text-white border border-gray-300 rounded-lg"
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
            class="flex py-2 px-4 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-pink-500 peer-checked:ring-2 peer-checked:border-transparent"
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
            class="flex py-2 px-4 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-pink-500 peer-checked:ring-2 peer-checked:border-transparent"
            for="test2"
            >12:00 - 13:00</label
          >
        </li>
      </ul>
    </div>
    <!-- End Layanan -->

    <div class="w-full justify-center flex">
     <!-- Start Cari -->
     <button
        class="flex flex-row gap-[8px] items-center text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-sm px-[128px] py-3 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800"
        type="button">
        Cari Data
      </button>
      <!-- End Cari -->
    </div>

    
  </div>

    <!-- Start Cards -->
    <div class="pt-[24px] grid grid-cols-4 gap-[24px]">
    <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
      <img class="rounded-t-xl" src="/images/legBaby.png" alt="" />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
    <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
      <img class="rounded-t-xl" src="/images/legBaby.png" alt="" />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
    <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
      <img class="rounded-t-xl" src="/images/legBaby.png" alt="" />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
    <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
      <img class="rounded-t-xl" src="/images/legBaby.png" alt="" />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
    <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
      <img class="rounded-t-xl" src="/images/legBaby.png" alt="" />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
    <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
      <img class="rounded-t-xl" src="/images/legBaby.png" alt="" />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
    <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
      <img class="rounded-t-xl" src="/images/legBaby.png" alt="" />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
    <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
      <img class="rounded-t-xl" src="/images/legBaby.png" alt="" />
      <div class="py-[16px] px-[24px]">
        <h3 class="font-bold text-sm">Precious Baby Massage</h3>
        <h3 class="font-bold text-sm text-pink-500 mt-[24px]">
          Rp.130,000/40 menit
        </h3>
      </div>
    </div>
  </div>
  <!-- End Cards -->
</div>
<!-- End lihat antrian -->

<?= $this->endSection() ?>
