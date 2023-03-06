<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="/css/kasir.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
	<style>

		body {
			background-color: #F6F6F7;
		}

		.select2-container--default .select2-selection--single {
		height: 50px;
		padding: 10px;
		border-color: #e2e8f0;
		border-radius: 0.375rem;
		}
		.select2-selection__arrow {
		display: none;
		}
    </style>
</head>
<body>

<!-- Navbar Start -->
<header class="bg-[#ffffff] fixed w-full z-40 shadow-md">
  <div class="relative z-20 px-3 lg:px-[80px] lg:px-[80px] py-[16px]">
    <nav class="md:flex md:items-center md:justify-between">
      <div class="flex justify-between items-center">
        <a href="/"><img class="w-[140px]" src="/images/logo.png" alt=""></a>
      </div>
      <ul class="md:flex bg-[#ffffff] md:items-center z-[-1] md:z-auto md:static absolute w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
		<li>
			<div id="user-profile">
				<button class="flex items-center gap-[8px]" onclick="showProfileDetails()">
					<img src="/img/kasir.svg" alt="User Profile Picture"> 
					<h3>Kasir</h3>
				</button>
				<div id="profile-details" class="absolute py-[8px] px-[16px] bg-white shadow mt-[10px]">
					<div class="flex flex-col items-start gap-[8px]">
						<a href="">Kembali</a>
						<a href="">Log out</a>
					</div>
				</div>
			</div>
		</li>
      </ul>
    </nav>
  </div>
</header>
<!-- Navbar End -->

<form action="" class="xl:px-[80px] xl:py-[120px] p-[24px] flex flex-col gap-[40px]">
	
	<!-- Section Nama -->
	<div class="flex gap-[24px]">
		<!-- Nama Orang Tua  -->
		<div class="p-[32px] bg-white shadow w-full rounded-md flex flex-col gap-[16px]">
			<h2 class="font-semiBold text-3xl">Cari nama orang tua</h2>
			<div class="">
				<select class="namaOrangTua block w-full appearance-none border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="namaOrangTua">
					<option value="joko anwar">joko anwar</option>
					<option value="abdul shomad">abdul shomad</option>
					<option value="surya mahesa">surya mahesa</option>
					<option value="joko kusuma">joko kusuma</option>
					<option value="bambang saputra">bambang saputra</option>
				</select>
			</div>
		</div>
		<!-- Nama Anak -->
		<div class="p-[32px] bg-white shadow w-full flex flex-col gap-[16px]">
			<h2 class="font-semiBold text-3xl">Cari nama anak</h2>
			<div class="">
				<select class="namaAnak block w-full appearance-none border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="namaAnak">
					<option value="erlangga">erlangga</option>
					<option value="alexandre">alexandre</option>
					<option value="sokrates">sokrates</option>
					<option value="neymar">neymar</option>
				</select>
			</div>
		</div>
	</div>	
	<!-- Section Layanan dan Cabang -->
	<div class="flex gap-[24px]">
		<!-- Cabang -->
		<div class="p-[32px] bg-white shadow w-full">
			<div class="flex flex-col gap-[16px]">
				<h2 class="font-semiBold text-3xl">Cabang</h2>
				<div class="flex flex-row justify-between">
					<div>
						<input type="radio" id="renon" name="cabang" />
						<label for="renon">
						<img class='w-[138px] rounded-md h-[138px] object-cover' src="img/examples/product1.jpg" alt="">
						<p class="text-center">Renon</p>
						</label>
					</div>
					<div>
						<input type="radio" id="jimbaran" name="cabang" />
						<label for="jimbaran">
						<img class='w-[138px] rounded-md h-[138px] object-cover' src="img/examples/product1.jpg" alt="">
						<p class="text-center">Jimbaran</p>
						</label>
					</div>
					<div>
						<input type="radio" id="gianyar" name="cabang" />
						<label for="gianyar">
						<img class='w-[138px] rounded-md h-[138px] object-cover' src="img/examples/product1.jpg" alt="">
						<p class="text-center">Gianyar</p>
						</label>
					</div>
				</div>
			</div>
		</div>
		<!-- Layanan  -->
		<div class="p-[32px] bg-white shadow w-full rounded-md">
			<div class="flex flex-col gap-[16px]">
				<h2 class="font-semiBold text-3xl">Layanan</h2>
				<div class="flex flex-row justify-between">
				<div>
					<input type="radio" id="spa" name="layanan" />
					<label for="spa">
					<img class='w-[138px] rounded-md h-[138px] object-cover' src="img/examples/product1.jpg" alt="">
					<p class="text-center">SPA</p>
					</label>
				</div>
				<div>
					<input type="radio" id="playground" name="layanan" />
					<label for="playground">
					<img class='w-[138px] rounded-md h-[138px] object-cover' src="img/examples/product1.jpg" alt="">
					<p class="text-center">Playground</p>
					</label>
				</div>
				<div>
					<input type="radio" id="salon" name="layanan" />
					<label for="salon">
					<img class='w-[138px] rounded-md h-[138px] object-cover' src="img/examples/product1.jpg" alt="">
					<p class="text-center">Salon</p>
					</label>
				</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Section Layanan Spa -->
	<div class="hidden" id="spa-main">
		<div id="spa-content" class="hidden">
		<!-- Layanan Spa -->
		<div class="p-[32px] bg-white shadow w-full rounded-md">
			<div class="flex flex-col gap-[16px]">
				<h2 class="font-semiBold text-3xl">Kategori Anak</h2>
				<div class="flex flex-row justify-between gap-[24px]">
					<div class="w-full">
						<input type="radio" id="baby" name="spa" />
						<label for="baby">
						<img class='w-full rounded-md h-[226px] object-cover' src="images/baby.jpg" alt="">
						<p class="text-center">Baby</p>
						</label>
					</div>
					<div class="w-full">
						<input type="radio" id="toodler" name="spa" />
						<label for="toodler">
						<img class='w-full rounded-md h-[226px] object-cover' src="images/baby.jpg" alt="">
						<p class="text-center">toodler</p>
						</label>
					</div>
					<div class="w-full">
						<input type="radio" id="childreen" name="spa" />
						<label for="childreen">
						<img class='w-full rounded-md h-[226px] object-cover' src="images/baby.jpg" alt="">
						<p class="text-center">childreen</p>
						</label>
					</div>
					<div class="w-full">
						<input type="radio" id="kids" name="spa" />
						<label for="kids">
						<img class='w-full rounded-md h-[226px] object-cover' src="images/baby.jpg" alt="">
						<p class="text-center">kids</p>
						</label>
					</div>
				</div>
			</div>
		</div>
		</div>
		<div id="playground-content" class="hidden">
		<!-- playground -->
		</div>
		<div id="salon-content" class="hidden">
		<!-- salon -->
		</div>
	</div>
	
	<!-- Section Layanan Sub Spa -->
	<div id="baby-main" class="hidden">
		<div id="baby-content" class="hidden">
			<!-- Baby -->
			<div class="p-[32px] bg-white shadow w-full rounded-md">
				<div class="flex flex-col gap-[16px]">
					<h2 class="font-semiBold text-3xl">Product</h2>
					<div class="flex flex-row justify-between gap-[24px]">
						<div class="w-full">
							<input type="radio" id="blissfulBabySwim" name="baby" />
							<label for="blissfulBabySwim">
							<img class='w-full rounded-md h-[226px] object-cover' src="images/baby.jpg" alt="">
							<p class="text-center">Blissful Baby Swim</p>
							</label>
						</div>
						<div class="w-full">
							<input type="radio" id="bubblyBabyBath" name="baby" />
							<label for="bubblyBabyBath">
							<img class='w-full rounded-md h-[226px] object-cover' src="images/baby.jpg" alt="">
							<p class="text-center">Bubbly Baby Bath</p>
							</label>
						</div>
						<div class="w-full">
							<input type="radio" id="preciousBabyMassage" name="baby" />
							<label for="preciousBabyMassage">
							<img class='w-full rounded-md h-[226px] object-cover' src="images/baby.jpg" alt="">
							<p class="text-center">Precious Baby Massage</p>
							</label>
						</div>
						<div class="w-full">
							<input type="radio" id="preciousBabyHappyTummyMassage" name="baby" />
							<label for="preciousBabyHappyTummyMassage">
							<img class='w-full rounded-md h-[226px] object-cover' src="images/baby.jpg" alt="">
							<p class="text-center">Precious Baby Happy Tummy Massage</p>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="toodler-content" class="hidden">
			<!-- toodler -->
		</div>
		<div id="childreen-content" class="hidden">
			<!-- childreen -->
		</div>
		<div id="kids-content" class="hidden">
			<!-- kids -->
		</div>
	</div>

	<!-- Section Jam Reservasi -->
	<div class="flex gap-[24px]">
		<!-- Jam  -->
		<div class="p-[32px] bg-white shadow w-full rounded-md flex flex-col gap-[16px]">
			<h2 class="font-semiBold text-3xl">Jam Reservasi</h2>
			<div class="">
				<select class="jamReservasi block w-full appearance-none border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="jamReservasi">
					<option value="joko anwar">10:00 AM</option>
					<option value="abdul shomad">11:00 AM</option>
					<option value="surya mahesa">12:00 AM</option>
					<option value="joko kusuma">13:00 PM</option>
					<option value="bambang saputra">14:00 PM</option>
				</select>
			</div>
		</div>
	</div>

	<!-- Submit Form -->
	<div class="flex gap-[24px]">
		<div class="py-[32px] w-full rounded-md flex flex-col gap-[16px] items-end border-t-2">
			<button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="py-[16px] w-[344px] bg-[#EC4899] rounded-lg text-white" type="button">
				Toggle modal
			</button>
		</div>
	</div>

</form>


<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-fit h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
					Checkout
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
				<img src="images/baby.jpg" class="object-cover w-[400px] h-[200px] rounded" alt="">
				<div class="flex flex-col gap-[24px]">
					<div class="flex flex-row justify-between text-base">
						<p>Orang Tua</p>
						<p class="text-pink-500">joko anwar</p>
					</div>
					<div class="flex flex-row justify-between text-base">
						<p>Nama anak</p>
						<p class="text-pink-500">alex anwar</p>
					</div>
					<div class="flex flex-row justify-between text-base">
						<p>Layanan</p>
						<p class="text-pink-500">Spa</p>
					</div>
					<div class="flex flex-row justify-between text-base">
						<p>Cabang</p>
						<p class="text-pink-500">Renon</p>
					</div>
				</div>
            </div>
            <!-- Modal footer -->
            <div class="p-6 border-t border-gray-200 rounded-b flex flex-col gap-[16px]">
				<div class="flex flex-row justify-between text-lg">
					<p>Total</p>
					<p class="text-pink-500">IDR 100.000</p>
				</div>
				<select class="metodePembayaran block w-full appearance-none border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="metodePembayaran">
					<option value="joko anwar">Cash</option>
					<option value="abdul shomad">Transfer</option>
				</select>
                <button data-modal-hide="defaultModal" type="button" class="w-full text-white bg-pink-500 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5">Bayar</button>
            </div>
        </div>
    </div>
</div>




	
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>

const spaMain = document.querySelector('#spa-main');
const babyMain = document.querySelector('#baby-main');

// Radio Layanan
const spaRadio = document.querySelector('#spa');
const playgroundRadio = document.querySelector('#playground');
const salonRadio = document.querySelector('#salon');
const spaContent = document.querySelector('#spa-content');
const playgroundContent = document.querySelector('#playground-content');
const salonContent = document.querySelector('#salon-content');

// Radio Layanan Spa
const babyRadio = document.querySelector('#baby');
const toodlerRadio = document.querySelector('#toodler');
const childreenRadio = document.querySelector('#childreen');
const kidsRadio = document.querySelector('#kids');
const babyContent = document.querySelector('#baby-content');
const toodlerContent = document.querySelector('#toodler-content');
const childreenContent = document.querySelector('#childreen-content');
const kidsContent = document.querySelector('#kids-content');

spaRadio.addEventListener('click', () => {
	showAllContentLayanan()
	hideAllContentLayanan();
	if (spaContent.classList.contains("show")) {
		spaContent.classList.remove("show");
	} else {
		spaContent.classList.add("show");
	}
	spaContent.classList.remove('hidden');
});

playgroundRadio.addEventListener('click', () => {
	showAllContentLayanan()
	hideAllContentLayanan();
	hideAllContentSpa();
	playgroundContent.classList.remove('hidden');
});

salonRadio.addEventListener('click', () => {
	showAllContentLayanan()
	hideAllContentLayanan();
	hideAllContentSpa();
	salonContent.classList.remove('hidden');
});

function showAllContentLayanan(){
	spaMain.classList.remove('hidden');
}

function hideAllContentLayanan() {
	spaContent.classList.add('hidden');
	spaContent.classList.remove('show');
	playgroundContent.classList.add('hidden');
	salonContent.classList.add('hidden');
}

// Spa
babyRadio.addEventListener('click', () => {
	hideAllContentSpa();
	showAllContentBaby()
	babyContent.classList.remove('hidden');
});

toodlerRadio.addEventListener('click', () => {
	hideAllContentSpa();
	showAllContentBaby()
	toodlerContent.classList.remove('hidden');
});

childreenRadio.addEventListener('click', () => {
	hideAllContentSpa();
	showAllContentBaby()
	childreenContent.classList.remove('hidden');
});

kidsRadio.addEventListener('click', () => {
	hideAllContentSpa();
	showAllContentBaby()
	kidsContent.classList.remove('hidden');
});

function showAllContentBaby() {
	babyMain.classList.remove('hidden');
}

function hideAllContentSpa() {
	babyContent.classList.add('hidden');
	toodlerContent.classList.add('hidden');
	childreenContent.classList.add('hidden');
	kidsContent.classList.add('hidden');
}

$(document).ready(function() {
	$('.namaOrangTua').select2({
		placeholder: 'Pilih nama orang tua',
		allowClear: true
	});
	$('.jamReservasi').select2({
		placeholder: 'Pilih Jam',
		allowClear: true
	});
	$('.metodePembayaran').select2({
		placeholder: 'Metode Pembayaran',
		allowClear: true
	});
	$('.namaAnak').select2({
		placeholder: 'Pilih nama anak',
		allowClear: true
	});
});
function showProfileDetails() {
  var x = document.getElementById("profile-details");
  if (x.classList.contains("show")) {
    x.classList.remove("show");
  } else {
    x.classList.add("show");
  }
}

</script>
</body>
</html>