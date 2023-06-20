<?php include "include/header.php" ?>
<?php include "system/conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['login'])) {
  header("location: login.php");
}
$account = $_SESSION['login'];
$row     = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM account WHERE username = '$account'"));
$room    = $row['ruangan'];
if($row['status'] == "admin") {
  header("location: admin/index.php");
}
?>
<body style="font-family: comic neue;" class="font-extrabold justify-center flex">
  <div class="relative w-full flex flex-col items-center max-w-sm max-h-screen overflow-auto">
    <div class="w-full px-4 flex flex-col pt-2 gap-4">
      <div>
        <h1 class="-mb-2 font-extrabold text-3xl">Masuk ruangan ujian</h1>
        <p class="text-sm date-format"></p>
      </div>
      <div class="content flex flex-col gap-2">
        <a href="exam.php?room-name=<?= $room ?>" class="w-full text-white p-4 group rounded-lg border-b-4 border-2 border-black bg-orange-500">
          <h1 class="font-extrabold text-3xl">Biologi</h1>
          <p class="text-sm flex gap-1 items-center group">masuk ruangan ujian <ion-icon class="duration-300 group-hover:translate-x-2" name="arrow-round-forward"></ion-icon></p>
        </a>
      </div>
      <a href="system/logout.php">log out</a>
    </div>
  </div>
  <div class="font-extrabold room-wall opacity-0 -z-30 fixed bg-white/50 backdrop-blur-sm duration-500 top-0 left-0 h-screen w-full grid place-items-center">
    <div class="p-4 max-w-xs bg-sky-300 w-full rounded-md flex flex-col items-center justify-center gap-2 border-2 border-black">
      <h1 class="text-2xl text-center">masuk ruangan</h1>
      <p class="text-sm text-center">silahkan pilih ruangan yang ingin anda jaga</p>
      <select name="" id="select">
        <option value=""></option>
      </select>
      <a href="login.php" class="text-white bg-black rounded-lg w-full py-2 text-center">Login</a>
    </div>
  </div>
  <script>
    $(document).ready(function () {
      var date = new Date();

      var monthNames = [
        "januari", "februari", "maart", "april", "mei", "juni",
        "juli", "augustus", "september", "oktober", "november", "december"
      ];

      var day = date.getDate();
      var month = date.getMonth();
      var year = date.getFullYear();

      var formattedDate = day + " " + monthNames[month] + " " + year;
      $(".date-format").html(formattedDate);

      function getRoom() {
        $.get("../system/ruangan-select.php", function(data) {
          $("#select").html(data);
        })
      }
    });
  </script>
</body>
</html>