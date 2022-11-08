<?= $this->extend('layout/pageLayoutLogin') ?>

<?= $this->section('content') ?>

<!-- Start User Dashboard -->
<div class="px-[80px] py-[64px]">
  <div class="grid grid-cols-2 gap-[24px]">
    <div class="flex flex-col items-start gap-[32px]">
      <div class="flex flex-col items-start gap-[8px]">
        <h1 class="font-bold text-4xl mt-[50px]">Tambah Data Diri Anak</h1>
        <p class="text-base ml-[4px]">
          Halaman ini dapat menambahkan data diri dari anak.
        </p>
      </div>
      <div
        class="p-[40px] border border-zinc-900 w-full flex flex-col items-start gap-[32px] rounded-lg"
      >
        <div class="flex flex-col items-start gap-[8px]">
          <div class="flex flex-row gap-[24px] items-center">
            <img
              class="w-[190px] h-[190px] object-cover rounded-lg"
              src="/images/baby.jpg"
              alt=""
            />
          </div>
          <div class="flex flex-row justify-start gap-[8px]">
            <label
              class="flex flex-row gap-[4px] items-center text-white bg-blue-400 hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-[8px] py-[8px] text-center dark:bg-blue-400 dark:hover:bg-blue-500 dark:focus:ring-blue-800 cursor-pointer"
              type="button"
            >
              <img src="/icons/image.svg" alt="" />
              <span class="text-sm leading-normal text-zinc-900 font-semibold"
                >Tambah Gambar</span
              >
              <input type="file" class="hidden" />
            </label>
            <button
              class="flex flex-row gap-[4px] items-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-[8px] py-[8px] text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
              type="button"
              data-modal-toggle="default-modal"
            >
              <img src="/icons/trash.svg" alt="" />
              Remove Image
            </button>

            <!-- Start Modal -->
            <div
              id="default-modal"
              data-modal-show="fasle"
              aria-hidden="fasle"
              class="hidden overflow-x-hidden overflow-y-auto z-50 fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center"
            >
              <div
                class="relative w-full max-w-2xl px-4 h-full md:h-auto flex justify-center"
              >
                <!-- Modal content -->
                <div class="bg-white rounded-lg shadow relative w-[500px]">
                  <!-- Modal header -->
                  <div class="flex items-start justify-between p-5 rounded-t">
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
                  <div class="flex justify-center items-center">
                    <img src="/icons/warning.svg" alt="" />
                  </div>
                  <div class="p-6 space-y-6">
                    <h3
                      class="text-gray-900 text-base lg:text-2xl font-semibold text-center"
                    >
                      Apakah benar anda ingin menghapus Foto Profile Anda?
                    </h3>
                  </div>

                  <!-- Modal footer -->
                  <div
                    class="flex space-x-2 items-center justify-center p-6 rounded-b dark:border-gray-600"
                  >
                    <button
                      data-modal-toggle="default-modal"
                      type="button"
                      class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                    >
                      Iya, benar
                    </button>
                    <button
                      data-modal-toggle="default-modal"
                      type="button"
                      class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600"
                    >
                      Tidak, batal
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Modal -->
          </div>
        </div>
        <form
          class="w-full flex flex-col gap-[24px] items-start"
          action=""
          method="POST"
        >
          <div class="flex flex-row items-start w-full items-center">
            <h3 class="w-full text-base">Nama Anak :</h3>
            <div class="w-full">
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="namaOrangTua"
                type="text"
                name="nama_orangtua"
                value=""
                placeholder="Input nama anak"
              />
            </div>
          </div>

          <!-- Start Tanggal -->
          <div class="flex flex-row justify-between flex-start w-full">
            <h1 class="w-full text-base">Tanggal Lahir :</h1>
            <div
              class="flex justify-start shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            >
              <div class="flex items-center relative z-[2] w-full py-2 px-3">
                <div class="antialiased w-full">
                  <div
                    x-data="app()"
                    x-init="[initDate(), getNoOfDays()]"
                    x-cloak
                  >
                    <div class="w-full">
                      <div class="relative">
                        <input type="hidden" name="date" x-ref="date" />
                        <div class="flex items-center w-full justify-between">
                          <input
                            type="text"
                            readonly
                            x-model="datepickerValue"
                            @click="showDatepicker = !showDatepicker"
                            @keydown.escape="showDatepicker = false"
                            class="form-select appearance-none block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-pink-500 focus:outline-none leading-tight focus:outline-none focus:shadow-outline"
                            aria-label="Default select example"
                            placeholder="Select date"
                          />

                          <div class="absolute right-2">
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
          <!-- End Tanggal -->

          <!-- Start Kelamin -->
          <div class="flex flex-row justify-between flex-start w-full">
            <div class="flex flex-row justify-between flex-start w-full">
              <h1 class="text-base w-full">Kelamin :</h1>
              <div class="flex justify-center w-full">
                <div class="flex items-center relative z-[2] w-full">
                  <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    aria-label="Default select example"
                  >
                    <option selected>Pilih Kelamin Anak</option>
                    <option value="1">Laki-laki</option>
                    <option value="2">Perempuan</option>
                  </select>
                  <img class="absolute right-[20px]" src="/icons/down.svg" alt="" />
                </div>
              </div>
            </div>
          </div>
          <!-- End Kelamin -->

          <a
            href="/data-anak"
            class="border-2 border-pink-500 bg-pink-500 px-[40px] py-[8px] rounded-[8px] font-semibold text-white text-base"
          >
            Tambah Data Anak
          </a>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End User Dashboard -->

<?= $this->endSection() ?>
