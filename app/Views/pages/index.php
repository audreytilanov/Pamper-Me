<?= $this->extend('layout/pageLayout') ?>

<?= $this->section('content') ?>

<!-- Start image baby -->

<div>
  <img
    class="h-screen w-full object-cover"
    src="/images/babyBanner.png"
    alt=""
  />

  <!-- Start Menu Select -->
  <div class="flex justify-center">
    <div
      class="flex justify-center items-end flex-row p-[24px] absolute bottom-[50px] bg-white gap-[32px] rounded-lg"
    >
      <!-- Start Services -->
      <div class="flex flex-row justify-center items-end gap-[40px]">
        <div class="flex flex-col justify-between flex-start h-[90px]">
          <h1 class="text-lg font-bold">Service</h1>
          <div class="flex justify-center">
            <div class="w-[200px] flex items-center relative z-[2]">
              <select
                class="px-2 form-select appearance-none block w-full py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-b-[2px] border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-pink-500 focus:outline-none"
                aria-label="Default select example"
              >
                <option selected>Silahkan pilih layanan</option>
                <option value="1">Play Ground</option>
                <option value="2">Spa</option>
                <option value="3">Salon</option>
              </select>
              <img
                class="absolute right-0 z-[3]"
                src="/icons/down.svg"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
      <!-- End Services -->

      <!-- Start Services -->
      <div class="flex flex-row justify-center items-end gap-[40px]">
        <div class="flex flex-col justify-between flex-start h-[90px]">
          <h1 class="text-lg font-bold">Cabang</h1>
          <div class="flex justify-center">
            <div class="w-[200px] flex items-center relative z-[2]">
              <select
                class="px-2 form-select appearance-none block w-full py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-b-[2px] border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-pink-500 focus:outline-none"
                aria-label="Default select example"
              >
                <option selected>Silahkan pilih layanan</option>
                <option value="1">Gianyar</option>
                <option value="2">Renon</option>
                <option value="3">Jimbaran</option>
              </select>
              <img
                class="absolute right-0 z-[3]"
                src="/icons/down.svg"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
      <!-- End Services -->

      <!-- Start Tanggal -->
      <div class="flex flex-row justify-center items-end gap-[40px]">
        <div class="flex flex-col justify-between flex-start h-[90px]">
          <h1 class="text-lg font-bold">Tanggal</h1>
          <div class="flex justify-center">
            <div class="flex items-center relative z-[2]">
              <div class="antialiased">
                <div
                  x-data="app()"
                  x-init="[initDate(), getNoOfDays()]"
                  x-cloak
                >
                  <div class="w-[200px]">
                    <div class="relative">
                      <input type="hidden" name="date" x-ref="date" />
                      <div class="flex items-center">
                        <input
                          type="text"
                          readonly
                          x-model="datepickerValue"
                          @click="showDatepicker = !showDatepicker"
                          @keydown.escape="showDatepicker = false"
                          class="form-select appearance-none block w-full py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-b-[2px] border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-pink-500 focus:outline-none"
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

      <!-- Start Jam -->
      <div class="flex flex-row justify-center items-end gap-[40px]">
        <div class="flex flex-col justify-between flex-start h-[90px]">
          <h1 class="text-lg font-bold">Waktu</h1>
          <div class="flex justify-center">
            <div class="flex items-center relative z-[2]">
              <select
                name=""
                id=""
                class="form-select appearance-none block py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-b-[2px] border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-pink-500 focus:outline-none px-2"
              >
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="02">03</option>
              </select>
              <span class="px-2 border-b-[2px] py-1.5 border-gray-300">:</span>
              <select
                name=""
                id=""
                class="form-select appearance-none block py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-b-[2px] border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-pink-500 focus:outline-none px-2"
              >
                <option value="00">00</option>
                <option value="01">01</option>
              </select>
              <select
                name=""
                id=""
                class="form-select appearance-none block py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-b-[2px] border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-pink-500 focus:outline-none px-2 w-[70px]"
              >
                <option value="AM">AM</option>
                <option value="PM">PM</option>
              </select>
              <img class="absolute right-0" src="/icons/time.svg" alt="" />
            </div>
          </div>
        </div>
      </div>
      <!-- End Jam -->

      <!-- Start Cari -->
      <button
        class="flex flex-row gap-[8px] items-center text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-semibold rounded-lg text-sm px-[64px] py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800"
        type="button"
        data-modal-toggle="default-modal"
      >
        Cari
      </button>
      <!-- End Cari -->

      <!-- Start Modal -->
      <div
        id="default-modal"
        data-modal-show="fasle"
        aria-hidden="fasle"
        class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center"
      >
        <div class="relative h-full md:h-auto flex justify-center">
          <!-- Modal content -->
          <div class="bg-white rounded-lg shadow relative w-full top-[600px]">
            <!-- Modal header -->
            <div class="flex items-start justify-between px-5 pt-5 rounded-t">
              <button
                type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="default-modal"
              >
                <svg
                  class="w-5 h-5"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </button>
            </div>

            <!-- Modal body -->
            <div class="p-6 space-y-6">
              <h3
                class="text-gray-900 text-base lg:text-2xl font-bold text-center"
              >
                Silahkan Pilih Layanan
              </h3>

              <!-- start form  -->
              <div class="flex flex-col gap-[40px] items-start">
                <div
                  class="flex flex-col gap-[40px] items-start w-full border-b-4 pb-[40px]">
                  <!-- Start Kelamin -->
                  <div class="flex flex-col flex-start w-[40%] gap-[8px]">
                    <div class="flex justify-center w-full">
                      <div class="flex items-start flex-col w-full gap-[8px]"> 
                        <h3 class="font-bold text-2xl">Pilih nama anak :</h3>
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
                    <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
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
                </div>

                <!-- Start Cards -->
                <div>
                  <h3 class="text-gray-900 text-base lg:text-2xl font-bold">
                    Silahkan Pilih Layanan
                  </h3>
                  <div class="pt-[16px] grid grid-cols-3 gap-[24px]">
                    <div class="flex flex-col flex-start gap-[8px]">
                      <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
                        <img
                          class="rounded-t-xl"
                          src="/images/legBaby.png"
                          alt=""
                        />
                        <div class="py-[16px] px-[24px]">
                          <h3 class="font-bold text-sm">
                            Precious Baby Massage
                          </h3>
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
                    <div class="flex flex-col flex-start gap-[8px]">
                      <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
                        <img
                          class="rounded-t-xl"
                          src="/images/legBaby.png"
                          alt=""
                        />
                        <div class="py-[16px] px-[24px]">
                          <h3 class="font-bold text-sm">
                            Precious Baby Massage
                          </h3>
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
                    <div class="flex flex-col flex-start gap-[8px]">
                      <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
                        <img
                          class="rounded-t-xl"
                          src="/images/legBaby.png"
                          alt=""
                        />
                        <div class="py-[16px] px-[24px]">
                          <h3 class="font-bold text-sm">
                            Precious Baby Massage
                          </h3>
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
                    <div class="flex flex-col flex-start gap-[8px]">
                      <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
                        <img
                          class="rounded-t-xl"
                          src="/images/legBaby.png"
                          alt=""
                        />
                        <div class="py-[16px] px-[24px]">
                          <h3 class="font-bold text-sm">
                            Precious Baby Massage
                          </h3>
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
                    <div class="flex flex-col flex-start gap-[8px]">
                      <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
                        <img
                          class="rounded-t-xl"
                          src="/images/legBaby.png"
                          alt=""
                        />
                        <div class="py-[16px] px-[24px]">
                          <h3 class="font-bold text-sm">
                            Precious Baby Massage
                          </h3>
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
                    <div class="flex flex-col flex-start gap-[8px]">
                      <div class="w-[292.11px] bg-white rounded-xl shadow-lg">
                        <img
                          class="rounded-t-xl"
                          src="/images/legBaby.png"
                          alt=""
                        />
                        <div class="py-[16px] px-[24px]">
                          <h3 class="font-bold text-sm">
                            Precious Baby Massage
                          </h3>
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
                  </div>
                </div>
                <!-- End Cards -->
              </div>
              <!-- End Form -->
            </div>

            <!-- Modal footer -->
            <div
              class="flex space-x-2 items-center justify-center p-6 rounded-b dark:border-gray-600"
            ></div>
          </div>
        </div>
      </div>
      <!-- End Modal -->
      <!-- End cari -->
    </div>
  </div>
  <!-- End Menu Select -->
</div>
<!-- End image baby -->

<div class="px-[80px] py-[64px]">
  <!-- Start Kategori -->
  <div>
    <!-- Start Layanan -->
    <h1 class="font-bold text-[40px]">Layanan Treatment</h1>
    <div class="pt-[24px]">
      <h1 class="font-bold text-[14px]">Cabang / Lokasi :</h1>
      <div class="flex items-center justify-between w-[280px] pt-[10px]">
        <button
          class="bg-pink-500 hover:bg-pink-700 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
          type="button"
        >
          <a href="/register/verifikasi"> Gianyar </a>
        </button>
        <button
          class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
          type="button"
        >
          <a href="/register/verifikasi"> Renon </a>
        </button>
        <button
          class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
          type="button"
        >
          <a href="/register/verifikasi"> Jimbaran </a>
        </button>
      </div>
    </div>
    <!-- End Layanan -->

    <!-- Start Services -->
    <div class="pt-[24px]">
      <h1 class="font-bold text-[14px]">Services</h1>
      <div class="flex items-center justify-between w-[280px] pt-[10px]">
        <button
          class="bg-pink-500 hover:bg-pink-700 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
          type="button"
        >
          <a href="/register/verifikasi"> Spa </a>
        </button>
        <button
          class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
          type="button"
        >
          <a href="/register/verifikasi"> Play Ground </a>
        </button>
        <button
          class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
          type="button"
        >
          <a href="/register/verifikasi"> Salon </a>
        </button>
      </div>
    </div>
    <!-- End Services -->

    <!-- Start Kategori -->
    <div class="pt-[24px]">
      <h1 class="font-bold text-[14px]">Kategori</h1>
      <div class="flex items-center justify-between w-[450px] pt-[10px]">
        <button
          class="bg-pink-500 hover:bg-pink-700 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
          type="button"
        >
          <a href="/register/verifikasi"> Baby </a>
        </button>
        <button
          class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
          type="button"
        >
          <a href="/register/verifikasi"> Toddler </a>
        </button>
        <button
          class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
          type="button"
        >
          <a href="/register/verifikasi"> Children </a>
        </button>
        <button
          class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
          type="button"
        >
          <a href="/register/verifikasi"> Toddler </a>
        </button>
        <button
          class="bg-pink-300 hover:bg-pink-500 text-white font-semibold px-[16px] py-[6px] rounded-[8px] focus:outline-none focus:shadow-outline"
          type="button"
        >
          <a href="/register/verifikasi"> Kids </a>
        </button>
      </div>
    </div>
    <!-- End Start Kategori -->
  </div>
  <!-- End Kategori -->

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

<?= $this->endSection() ?>
