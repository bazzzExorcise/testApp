<?php include "include/header.php" ?>
<?php include "system/conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['login'])) {
  echo `<script>blockWall()</script>`;
}
$account = $_SESSION['login'];
$row     = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM account WHERE username = '$account'"));
if($row['status'] == "admin") {
  header("location: admin/index.php");
}
?>
<body style="font-family: comic neue;" class="font-extrabold justify-center flex">
  <div class="relative w-full flex flex-col items-center max-w-sm max-h-screen overflow-auto">
    <div class="w-full px-4 flex flex-col pt-2 gap-4">
      <div>
        <h1 class="-mb-2 font-extrabold text-3xl">Ujian Hari ini</h1>
        <p class="text-sm">19 januari 2023</p>
      </div>
      <div class="content flex flex-col gap-2">
        <div class="w-full text-white p-4 group rounded-lg border-b-4 border-2 border-black bg-orange-500">
          <h1 class="font-extrabold text-3xl">Biologi</h1>
          <p class="text-sm flex gap-1 items-center group">masuk ruangan ujian <ion-icon class="duration-300 group-hover:translate-x-2" name="arrow-round-forward"></ion-icon></p>
        </div>
        <div class="w-full p-4 group rounded-lg border-b-4 border-2 border-black bg-sky-400">
          <h1 class="font-extrabold text-3xl">Matematika</h1>
          <p class="text-sm flex gap-1 items-center group">10:00 WIB</p>
        </div>
      </div>
      <div>
        <h1 class="mt-4 -mb-2 font-extrabold text-3xl">Ujian Besok</h1>
        <p class="text-sm">20 januari 2023</p>
      </div>
      <div class="content flex flex-col gap-2">
        <div class="w-full text-white p-4 group rounded-lg border-b-4 border-2 border-black bg-orange-500">
          <h1 class="font-extrabold text-3xl">Kimia</h1>
          <p class="text-sm flex gap-1 items-center group">20 januari 2023 - 07.30 WIB</p>
        </div>
        <div class="w-full p-4 group rounded-lg border-b-4 border-2 border-black bg-sky-400">
          <h1 class="font-extrabold text-3xl">Alquran Hadist</h1>
          <p class="text-sm flex gap-1 items-center group">20 januari 2023 - 10:00 WIB</p>
        </div>
        <div class="w-full flex justify-end">
          <a href="system/logout.php" class="font-extrabold rounded-lg border-b-4 border-2 border-black bg-red-500 px-4 py-2">log out</a>
        </div>
      </div>
    </div>
  </div>
  <div class="font-extrabold block-wall opacity-0 -z-30 fixed bg-white/50 backdrop-blur-sm duration-500 top-0 left-0 h-screen w-full grid place-items-center">
    <div class="p-4 max-w-xs bg-sky-300 w-full rounded-md flex flex-col items-center justify-center gap-2 border-2 border-black">
      <h1 class="text-2xl text-center">Mohon Maaf</h1>
      <p class="text-sm text-center">anda belum melakukan login dalam situs ini seilahkan login dan lanjutkan</p>
      <a href="login.php" class="text-white bg-black rounded-lg w-full py-2 text-center">Login</a>
    </div>
  </div>
  <script>
    function blockWall() {
      $(".block-wall").removeClass("-z-30", "opacity-0");
      $(".block-wall").addClass("z-30", "opacity-100");
    }
  </script>
</body>
</html>