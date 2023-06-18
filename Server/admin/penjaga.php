<?php include "../system/conn.php" ?>
<?php include "../include/header.php" ?>
<?php
session_start();
if(!isset($_SESSION['login'])) {
  header("location: ../login.php");
}
$row = mysqli_query($conn, "SELECT * FROM account WHERE status = 'penjaga'");
?>
<body class="flex justify-center">
<div class="relative w-full flex flex-col items-center max-w-sm max-h-screen overflow-auto">
  <div class="w-full p-4">
    <div class="w-full py-2 mb-2 border-b-2 border-black flex items-center justify-between">
      <div class="flex gap-4">
        <a class="hover:font-extrabold duration-500" href="index.php">Peserta</a>
        <a class="hover:font-extrabold duration-500" href="penjaga.php">Penjaga</a>
        <a class="hover:font-extrabold duration-500" href="ruangan.php">Ruangan</a>
      </div>
      <div>
      <a class="font-extrabold py-1 px-3 bg-red-500 border-2 border-black rounded-lg duration-500" href="../system/logout.php">Log Out</a>
      </div>
    </div>
    <h1 class="text-xl font-extrabold">Daftar Penjaga</h1>
    <p>daftar penjaga ujian</p>
    <form action="../system/search-penjaga.php" class="relative mt-2 w-full overflow-hidden rounded-lg border-2 border-black bg-yellow-400">
      <input type="text" class="search font-extrabold lowercase focus:outline-none w-full bg-transparent px-3 py-2 placeholder:font-extrabold placeholder:text-black" placeholder="cari penjaga" name="search" />
    </form>
    <button class="w-full button-pop rounded-lg border-2 border-black bg-green-400 px-3 py-2 font-extrabold">Tambah Penjaga</button>
    <div class="mt-2 flex w-full flex-col content gap-2">
    </div>
  </div>
</div>
  <div class="font-extrabold add-wall opacity-0 -z-30 fixed bg-white/50 backdrop-blur-sm duration-500 top-0 left-0 h-screen w-full grid place-items-center">
    <div class="p-4 max-w-xs bg-sky-300 w-full rounded-md flex flex-col items-center justify-center gap-2 border-2 border-black">
      <div class="w-full flex justify-end button-pop"><ion-icon name="close"></ion-icon></div>
      <h1 class="text-2xl text-center">Tambah Penjaga</h1>
      <form class="add-data w-full flex flex-col gap-2" action="../system/add-penjaga.php" method="post">
        <div class="w-full alert-box"></div>
        <input type="text" name="nama" class="start border-2 border-black input-add rounded-lg py-2 px-3 placeholder:text-black" placeholder="nama penjaga" id="">
        <input type="text" name="password" class="input-add border-2 border-black rounded-lg py-2 px-3 placeholder:text-black" placeholder="password" id="">
        <button type="submit" class="bg-green-400 rounded-lg w-full py-2 text-center border-2 border-black">Buat</button>
      </form>
    </div>
  </div>
  <div class="font-extrabold update-wall opacity-0 -z-30 fixed bg-white/50 backdrop-blur-sm duration-500 top-0 left-0 h-screen w-full grid place-items-center">
    <div class="p-4 max-w-xs bg-sky-300 w-full rounded-md flex flex-col items-center justify-center gap-2 border-2 border-black">
      <div class="w-full flex justify-end update-pop"><ion-icon name="close"></ion-icon></div>
      <h1 class="text-2xl text-center">Edit Data Penjaga</h1>
      <form class="update-data w-full flex flex-col gap-2" action="../system/update-penjaga.php" method="post">
        <div class="w-full update-box"></div>
        <input type="text" name="edit-nama" class="start border-2 border-black input-update rounded-lg py-2 px-3 placeholder:text-black" placeholder="nama penjaga" id="">
        <input type="hidden" name="id" class="start border-2 border-black input-update rounded-lg py-2 px-3 placeholder:text-black" placeholder="password penjaga" id="">
        <input type="text" name="edit-password" class="border-2 border-black rounded-lg py-2 px-3 placeholder:text-black" placeholder="password" id="">
        <button type="submit" class="bg-green-400 rounded-lg w-full py-2 text-center border-2 border-black">Buat</button>
      </form>
    </div>
  </div>
  <script>
    $(document).ready(function () {
      $(".button-pop").click(function (e) { 
        e.preventDefault();
        $(".add-wall").toggleClass("-z-30 z-30 opacity-0");
      });
      getData();
      $(".add-data").submit(function (e) { 
        e.preventDefault();
        $.ajax({
          type: $(this).attr('method'),
          url: $(this).attr('action'),
          data: $(".add-data").serialize(),
          success: function (response) {
            if(response != "berhasil menambahkan") {
              $('.alert-box').html(`<div class="border-2 border-black rounded-lg py-2 px-3 bg-red-500">${response}</div>`)
            }else{
              $('.alert-box').html(`<div class="border-2 border-black rounded-lg py-2 px-3 bg-green-400">${response}</div>`)
              resetForm()
              
            }
            console.log(response)
            getData()
          }
        });
        $(".edit-button").click(function (e) { 
          e.preventDefault();
          $(".update-card").toggleClass("-z-30 z-30 opacity-0");
          $(".update-box").html(``);
        });
      });
    });
    function getData() {
      $.get("../system/penjaga.php", function(data) {
        $(".content").html(data);
        
        $(".delete").click(function (e) { 
          e.preventDefault();
          $.ajax({
            type: "get",
            url: $(this).attr('href'),
            data: $(this).serialize(),
            success: function (response) {
              getData()
            }
          });
        });
        $(".update-pop").click(function (e) { 
          e.preventDefault();
          $(".update-wall").toggleClass("-z-30 z-30 opacity-0");
          $("[name=edit-nama]").val($(this).attr("nama"));
          $("[name=edit-password]").val($(this).attr("pass"));
          $("[name=id]").val($(this).attr("id"));
        });
        $(".update-data").submit(function (e) { 
          e.preventDefault();
          $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (response) {
              console.log(response);
              if(response != "berhasil mengubah") {
                $('.update-box').html(`<div class="border-2 border-black rounded-lg py-2 px-3 bg-red-500">${response}</div>`)
              }else{
                $('.update-box').html(`<div class="border-2 border-black rounded-lg py-2 px-3 bg-green-400">${response}</div>`)
                resetForm();
              }
            }
          });
        });
        $(".search").keyup(function (e) { 
          $.ajax({
            type: "POST",
            url: "../system/search-penjaga.php",
            data: $(".search"),
            success: function (response) {
              console.log(response);
              $(".content").html(response);
            }
          });
        });
        $(".search").blur(function (e) { 
          e.preventDefault();
          getData();
        });
      })
    }
    function resetForm() {
      $('.input-add').val('');
      $('.start').focus();
    }
  </script>
</body>