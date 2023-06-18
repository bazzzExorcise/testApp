<?php 
include "conn.php";

$type = $_POST['search'];
if($type == "") {
  $sql = mysqli_query($conn, "SELECT * FROM account WHERE status = 'peserta' ORDER BY nomor DESC ");
}else{
  $sql = mysqli_query($conn, "SELECT * FROM account WHERE (status = 'peserta' AND username LIKE '%$type%') OR (kelas LIKE '%$type%') OR (jurusan LIKE '%$type%') ORDER BY nomor DESC ");
}
while( $rows = mysqli_fetch_assoc($sql)) {
  echo 
  "<div class='flex w-full gap-2 justify-between'>
    <div>
      <h1 class='text-lg font-extrabold'>" . $rows['username'] . "</h1>
      <p class='text-sm'>" . $rows['kelas']. " " . $rows['jurusan']. " - " . $rows['nomor'] . " </p>
    </div>
    <div class='flex items-center font-extrabold whitespace-nowrap gap-1'>
      <a class='update-pop rounded-lg border-2 border-black bg-green-400 px-3 py-1 text-sm' href='../system/edit.php?id=" . $rows['id'] . "' nama='".$rows['username']."' id='" . $rows['id'] . "' kelas='".$rows['kelas']."' jurusan='". $rows['jurusan'] ."' nomor='".$rows['nomor']."'>Edit</a>
      <a href='../system/delete.php?id=".$rows['id']."' class='delete rounded-lg border-2 border-black bg-red-500 px-3 py-1 text-sm'>Delete</a>
    </div>
  </div>";
}