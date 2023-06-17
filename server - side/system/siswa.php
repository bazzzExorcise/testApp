<?php 
include "conn.php";
$sql = mysqli_query($conn, "SELECT * FROM account WHERE status = 'peserta'");
while( $rows = mysqli_fetch_assoc($sql)) {
  $jurusan = explode(" ", $rows['jurusan']);
  echo 
  "<div class='flex w-full gap-2 justify-between'>
    <div>
      <h1 class='text-lg font-extrabold'>" . $rows['username'] . "</h1>
      <p class='text-sm'>" . $rows['kelas']. " " . $rows['jurusan']. " - " . $rows['nomor'] . " </p>
    </div>
    <div class='flex items-center font-extrabold whitespace-nowrap gap-1'>
      <!--<a class='button-pop rounded-lg border-2 border-black bg-green-400 px-3 py-1 text-sm' href='../system/edit.php?id=" . $rows['id'] . "' nama='".$rows['username']."' kelas='".$rows['kelas']."' jurusan='". $jurusan[0] ."' no-jurusan='' nomor='".$rows['nomor']."'>Edit</a>-->
      <a href='../system/delete.php?id=".$rows['id']."' class='delete rounded-lg border-2 border-black bg-red-500 px-3 py-1 text-sm'>Delete</a>
    </div>
  </div>";
}