<?php 
include "conn.php";
$sql = mysqli_query($conn, "SELECT * FROM room");
while( $rows = mysqli_fetch_assoc($sql)) {
  $room = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM account WHERE ruangan = '{$rows['name']}'"));
  echo 
  "<div class='flex w-full gap-2 justify-between'>
    <div>
      <h1 class='text-lg font-extrabold'>" . $rows['name'] . "</h1>
      <p class='-mt-1 text-sm'>peserta : $room</p>
    </div>
    <div class='flex items-center font-extrabold whitespace-nowrap gap-1'>
      <a class='update-pop rounded-lg border-2 border-black bg-green-400 px-3 py-1 text-sm' id='".$rows['id']."' nama='".$rows['name']."' >Edit</a>
      <a href='../system/delete-ruangan.php?id=".$rows['id']."' class='delete rounded-lg border-2 border-black bg-red-500 px-3 py-1 text-sm'>Delete</a>
    </div>
  </div>";
}