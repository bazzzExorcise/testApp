<?php include "../system/conn.php" ?>
<?php include "../include/header.php" ?>
<?php
session_start();
if(!isset($_SESSION['login'])) {
  echo `<script>blockWall()</script>`;
}
$row = mysqli_query($conn, "SELECT * FROM account WHERE status = 'peserta'");
?>
<body class="flex justify-center">
<div class="relative w-full flex flex-col items-center max-w-sm max-h-screen overflow-auto">
  <div class="w-full p-4">
    <h1 class="text-xl font-extrabold">Daftar Siswa</h1>
    <p>daftar siswa peserta siswa ujian</p>
    <form action="" class="relative mt-2 w-full overflow-hidden rounded-lg border-2 border-black bg-yellow-400">
      <input type="text" class="font-extrabold lowercase focus:outline-none w-full bg-transparent px-3 py-2 placeholder:font-extrabold placeholder:text-black" placeholder="cari peserta" />
    </form>
    <button class="w-full rounded-lg border-2 border-black bg-green-400 px-3 py-2 font-extrabold">Tambah Peserta</button>
    <div class="mt-2 flex w-full flex-col  gap-2">
      <?php foreach($row as $rows) : ?>
      <div class="flex w-full gap-2 justify-between">
        <div>
          <h1 class="text-lg font-extrabold"><?= $rows['username'] ?></h1>
          <p class="text-sm"><?= $rows['kelas'] ?> <?= $rows['jurusan'] ?> - <?= $rows['nomor'] ?></p>
        </div>
        <div class="flex items-center font-extrabold whitespace-nowrap gap-1">
          <button class="rounded-lg border-2 border-black bg-green-400 px-3 py-1 text-sm">Edit</button>
          <button class="rounded-lg border-2 border-black bg-red-500 px-3 py-1 text-sm">Delete</button>
        </div>
      </div>
      <?php endforeach; ?>
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