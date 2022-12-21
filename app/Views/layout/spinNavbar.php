<!-- Navbar Start -->
<header class="bg-[#ffffff] fixed w-full z-40 shadow-md">
  <div class="relative z-20 px-3 xl:px-[80px] xl:px-[80px] py-[16px]">
    <nav class="lg:flex lg:items-center lg:justify-between">
      <div class="flex justify-between items-center">
        <a href="/"><img class="w-[140px]" src="/images/logo.png" alt=""></a>
        <span class="text-3xl cursor-pointer mx-2 lg:hidden block">
          <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
        </span>
      </div>
    </nav>
  </div>
</header>
<!-- Navbar End -->

<script
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
  integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  function Menu(e) {
    let list = document.querySelector("ul");
    e.name === "menu"
      ? ((e.name = "close"),
        list.classList.add("top-[80px]"),
        list.classList.add("opacity-100"))
      : ((e.name = "menu"),
        list.classList.remove("top-[80px]"),
        list.classList.remove("opacity-100"));
  }
</script>
