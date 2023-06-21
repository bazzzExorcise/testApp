<?php include "../include/header.php"; ?>
<?php include "../system/conn.php"; ?>
<?php 
session_start();
if(!isset($_SESSION['login'])) {
  header("location:../login.php");
}
$id = $_GET['id'];
$room = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM room  WHERE id = $id"));
?>
<body style="font-family: comic neue;" class="font-extrabold justify-center flex">
  <div class="relative w-full flex flex-col items-center max-w-sm max-h-screen overflow-auto">
    <div class="w-full flex px-4 bg-cyan-400 py-5  gap-2 border-b-2 sm:border-2 border-black flex-col">
      <div class="w-full flex justify-between">
        <h1 class="text-2xl capitalize"><?= $room['name'] ?></h1>
        <a class="out font-extrabold py-1 px-3 bg-red-500 border-2 border-black rounded-lg duration-500" href="../system/out-room.php?id= <?= $id ?>">keluar ruangan</a>
      </div>
      <div class="relative flex items-center w-full px-2 bg-yellow-400 overflow-hidden rounded-md border-2 border-black">
        <ion-icon name="person" class="text-3xl"></ion-icon>
        <input type="text" class="focus:outline-none py-2 bg-transparent placeholder:text-black placeholder:font-extrabold placeholder:text-sm px-2 max-w-xs w-full" placeholder="Cari siswa">
      </div>
    </div>
    <div class="grid w-full" id="content">
      
    </div>
  </div>
  <script>
    $(document).ready(function () {
      var queryParams = {};
      window.location.search.substring(1).split('&').forEach(function(pair) {
        var parts = pair.split('=');
        queryParams[parts[0]] = decodeURIComponent(parts[1] || '');
      });
      console.log(queryParams);
      setInterval(() => {
        getData();
      }, 200);
      function getData() {
        $.get(`../system/get-room.php?id=${queryParams.id}`, function(data) {
          $("#content").html(data);
          $(".update-permission").click(function (e) { 
            e.preventDefault();
            $.ajax({
              type: "POST",
              url: $(this).attr('href'),
              data: $(this).serialize(),
              success: function (response) {
                console.log(response);
              }
            });
          });
        })
      }
      $(".out").click(function (e) { 
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: $(this).attr("href"),
          data: $(this).serialize(),
          success: function (response) {
            console.log(response);
            location.href = response
          }
        });
      });
    })
    
  </script>
</body>
</html>