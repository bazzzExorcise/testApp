<?php include "../include/header.php"; ?>
<?php 
session_start();
if(!isset($_SESSION['login'])) {
  header("location: ../login.php");
}
?>
<body style="font-family: comic neue;" class="font-extrabold justify-center flex">
  <div class="relative w-full flex flex-col items-center max-w-sm max-h-screen overflow-auto">
    <div class="w-full px-4 flex flex-col pt-2 gap-4">
      <div>
        <h1 class="-mb-2 font-extrabold text-3xl">Ruangan Ujian</h1>
      </div>
      <div class="content flex flex-col gap-2">
        <div class="w-full button-room cursor-pointer group pt-4 rounded-lg border-b-4 border-2 border-black bg-cyan-400">
          <h1 class="font-extrabold px-4 text-3xl">Masuk Ruangan</h1>
          <p class="text-sm flex gap-1 px-4 pb-4 items-center group">masukan ruangan yang anda tuju<ion-icon class="duration-300 group-hover:translate-x-2" name="arrow-round-forward"></ion-icon></p>
          <button class="bg-black w-full py-2 text-white text-center">masuk kedalam ruangan ujian</button>
        </div>
      </div>
      <div>
        <h1 class="mt-4 -mb-2 font-extrabold text-3xl">Buat Soal</h1>
      </div>
      <div class="content flex flex-col gap-2">
        <div class="w-full text-white p-4 group rounded-lg border-b-4 border-2 border-black flex flex-col items-center bg-orange-500">
          <h1 class="font-extrabold text-3xl">Kimia</h1>
          <p class="text-sm flex gap-1 items-center group">soal untuk kelas 12 MIPA</p>
          <div class="flex gap-2 items-stretch mt-2">
            <button class="bg-cyan-400 px-3 border-2 border-black py-1 rounded-md text-black">lihat nilai</button>
            <button class="px-3 border-2 border-black py-1 rounded-md bg-black">edit soal</button>
          </div>
        </div>
        <button class="w-full bg-yellow-500 border-2 soal-button border-black border-b-4 py-2 rounded-lg">tambah soal</button>
        <a href="../system/logout.php" class="bg-black">logout</a>
      </div>
    </div>
  </div>
  <div class="font-extrabold add-soal opacity-0 -z-30 fixed bg-white/50 backdrop-blur-sm duration-500 top-0 left-0 h-screen w-full grid place-items-center">
    <div class="p-4 max-w-xs bg-sky-300 w-full rounded-md flex flex-col items-center justify-center gap-2 border-2 border-black">
      <div class="w-full flex justify-end soal-button"><ion-icon name="close"></ion-icon></div>
      <h1 class="text-2xl text-center">Edit Data ruangan</h1>
      <form class="update-data w-full flex flex-col gap-2" action="../system/add-soal.php" method="post">
        <div class="w-full update-box"></div>
        <input type="text" name="name" class="start border-2 border-black input-update rounded-lg py-2 px-3 placeholder:text-black" placeholder="nama ruangan" id="">
        <input type="text" name="kelas" class="start border-2 border-black input-update rounded-lg py-2 px-3 placeholder:text-black" placeholder="kelas" id="">
        <button type="submit" class="bg-green-400 rounded-lg w-full py-2 text-center border-2 border-black">Buat</button>
      </form>
    </div>
  </div>
  <div class="font-extrabold enter-room opacity-0 -z-30 fixed bg-white/50 backdrop-blur-sm duration-500 top-0 left-0 h-screen w-full grid place-items-center">
    <div class="p-4 max-w-xs bg-sky-300 w-full rounded-md flex flex-col items-center justify-center gap-2 border-2 border-black">
      <div class="w-full flex justify-end button-room"><ion-icon name="close"></ion-icon></div>
      <h1 class="text-2xl text-center">Masuk Ruangan</h1>
      <div class="w-full content"></div>
      <form class="enter w-full flex flex-col gap-2" action="../system/enter-room.php" method="post">
        <div class="w-full update-box"></div>
        <select name="name" class="start border-2 border-black input-update rounded-lg py-2 px-3 placeholder:text-black" placeholder="nama ruangan" id="select">
          
        </select>
        <button type="submit" class="bg-green-400 rounded-lg w-full py-2 text-center border-2 border-black">Masuk ruangan</button>
      </form>
    </div>
  </div>

  <script>
    $(document).ready(function () {
      getRoom()
      $(".enter").submit(function (e) { 
        e.preventDefault();
        $.ajax({
          type: $(this).attr("method"),
          url: $(this).attr("action"),
          data: $(this).serialize(),
          success: function (response) {
            console.log(response);
            location.href = response
            /* if(response == "success") {
              $(".content").html(`<h1 class="w-full bg-green-400 text-center py-1">${response}, mohon tunggu</h1>`);
            }else{
              $(".content").html(`<h1 class="w-full bg-red-500 text-center py-1">${response}</h1>`);
            } */
          }
        });
      });
    });

    $(".soal-button").click(function (e) { 
      e.preventDefault();
      $(".add-soal").toggleClass("opacity-0 -z-30 z-30");
    });
    function getRoom() {
      $.get("../system/ruangan-select.php", function(data) {
        $("#select").html(data);
      })
    }
    $(".button-room").click(function (e) { 
      e.preventDefault();
      $(".enter-room").toggleClass("opacity-0 -z-30 z-30");
    });
  </script>
</body>
</html>