<?php include "include/header.php" ?>
<?php 
session_start();
if(!isset($_SESSION['login'])) {
  header("location: login.php");
}
?>
<body style="font-family: comic neue;" class="font-extrabold justify-center flex">
  <div class="flex flex-col gap-4 bg-white items-stretch max-w-sm min-h-screen">
    <nav class="text-white border-b-2 left-0 border-black top-0 py-2 flex flex-col items-center w-full fixed bg-pink-500">
      <h1 class="text-xl">Ekonomi</h1>
      <p class="-mt-1 text-sm">01:45</p>
    </nav>
    <form class="mt-20 flex w-full items-start gap-4 flex-col">
      <div class="flex flex-col w-full items-start px-4">
        <h1>Lorem ipsum dolor sit amet.</h1>
        <div class="mt-5 flex flex-col gap-3">
          <div class="flex items-start gap-2">
            <input type="radio" name="opsi-1" class="mt-2" id="1-1">
            <label for="1-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, reprehenderit.</label>
          </div>
          <div class="flex items-start gap-2">
            <input type="radio" name="opsi-1" class="mt-2" id="1-2">
            <label for="1-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, reprehenderit.</label>
          </div>
          <div class="flex items-start gap-2">
            <input type="radio" name="opsi-1" class="mt-2" id="1-3">
            <label for="1-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, reprehenderit.</label>
          </div>
          <div class="flex items-start gap-2">
            <input type="radio" name="opsi-1" class="mt-2" id="1-4">
            <label for="1-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, reprehenderit.</label>
          </div>
        </div>
        <div class="border rounded-full w-full mt-4 border-black"></div>
      </div>
      <div class="flex flex-col w-full items-start px-4">
        <h1>Lorem ipsum dolor sit amet.</h1>
        <div class="mt-5 flex flex-col gap-3">
          <div class="flex items-start gap-2">
            <input type="radio" name="opsi-2" class="mt-2" id="2-1">
            <label for="2-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, reprehenderit.</label>
          </div>
          <div class="flex items-start gap-2">
            <input type="radio" name="opsi-2" class="mt-2" id="2-2">
            <label for="2-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, reprehenderit.</label>
          </div>
          <div class="flex items-start gap-2">
            <input type="radio" name="opsi-2" class="mt-2" id="2-3">
            <label for="2-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, reprehenderit.</label>
          </div>
          <div class="flex items-start gap-2">
            <input type="radio" name="opsi-2" class="mt-2" id="2-4">
            <label for="2-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, reprehenderit.</label>
          </div>
        </div>
        <div class="border rounded-full w-full mt-4 border-black"></div>
      </div>
      <div class="px-4 w-full">
        <button class="done rounded-lg bg-blue-500 border-2 border-black py-2 w-full">kirim jawaban</button>
      </div>
    </form>
  </div>
  <div class="font-extrabold cheat-wall fixed -z-30 bg-white/50 backdrop-blur-sm duration-300 top-0 left-0 h-screen w-full grid place-items-center">
    <div class="px-4 max-w-xs aspect-square bg-white w-full rounded-md flex flex-col items-center justify-center gap-2 border-2 border-black">
      <ion-icon name="alert" class="text-red-500 text-7xl "></ion-icon>
      <h1 class="text-xl text-center">indikasi melakukan kecurangan</h1>
      <p class="text-sm text-center">mohon maaf sebelumnya namun anda terindikasi melakukan kecurangan, silahkan minta pengawas untuk membuka soalmu kembali dan refres setelah dibuka oleh pengawas</p>
    </div>
  </div>
  <div class="font-extrabold fixed -z-30 bg-white/50 backdrop-blur-sm duration-300 top-0 left-0 h-screen w-full grid place-items-center">
    <div class="px-4 max-w-xs aspect-square bg-sky-300 w-full rounded-md flex flex-col items-center justify-center gap-2 border-2 border-black">
      <h1 class="text-2xl text-center">Selamat</h1>
      <p class="text-sm text-center">ujian anda telah selesai silahkan tunggu hasilnya di raport hehehe, have a nice day</p>
      <a href="" class="text-white bg-black rounded-lg w-full py-2 text-center">keluar</a>
    </div>
  </div>
  <div class="font-extrabold active-wall fixed -z-30 bg-white/50 backdrop-blur-sm duration-300 top-0 left-0 h-screen w-full grid place-items-center">
    <div class="px-4 max-w-xs aspect-square bg-yellow-500 w-full rounded-md flex flex-col items-center justify-center gap-2 border-2 border-black">
      <h1 class="text-xl text-center">Peringatan!</h1>
      <p class="text-sm">website ini sangat sensitive. aksi yang anda lakukan saat menyentuh bagian yang bukan berasal dari website akan dianggap sebagai usaha untuk melakukan kecurangan</p>
      <p class="text-sm text-xl w-full flex">
        contoh:
        <ul class="text-sm list-disc ml-4">
          <li>menekan tombol navigasi pada handphone (home, back, history)</li>
          <li>membuka pop up atau floating apps</li>
          <li>membuka tab baru</li>
        </ul>
      </p>
      <p class="text-sm">silahkan tunggu pengawas ruangan untuk membuka soal anda</p>
    </div>
  </div>
  <script>
    $(document).ready(function () {
      setInterval(() => {
        getPermission();
        cheatDetect();
      }, 300);
      $(".done").click(function (e) { 
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "system/reset-permission.php",
          data: $(this).serialize(),
          success: function (response) {
            location.href = response
          }
        });
      });
      function cheatDetect() {
        $("html").mouseleave(function () { 
          $.ajax({
            type: "POST",
            url: "system/cheat-detect.php",
            data: $(this).serialize(),
            success: function (response) {
              console.log(response);
              if(response == "cheat") {
                $(".cheat-wall").addClass(" z-30");
                $(".cheat-wall").removeClass(" -z-30");
              }
            }
          });
        })
      }
      function getPermission() {
        $.ajax({
          type: "POST",
          url: "system/check-permission.php",
          data: $(this).serialize(),
          success: function (response) {
            console.log(response);
            if(response == "not active") {
              $(".active-wall").addClass("z-30");
              $(".active-wall").removeClass("-z-30");
            }else if(response == "cheat") {
              $(".cheat-wall").addClass(" z-30");
              $(".cheat-wall").removeClass(" -z-30");
            }else if(response == "active") {
              $(".cheat-wall").addClass("-z-30");
              $(".cheat-wall").removeClass("z-30");
              $(".active-wall").addClass("-z-30");
              $(".active-wall").removeClass("z-30");
            }
          }
        });
      }
    });
  </script>
</body>
</html>