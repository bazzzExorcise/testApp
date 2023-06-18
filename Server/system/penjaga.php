<?php 
include "conn.php";
$sql = mysqli_query($conn, "SELECT * FROM account WHERE status = 'penjaga'");
while( $rows = mysqli_fetch_assoc($sql)) {
  echo 
  "<div class='flex w-full gap-2 justify-between'>
    <div>
      <h1 class='text-lg font-extrabold'>" . $rows['username'] . "</h1>
      <p class='text-sm -mt-1'>password : " . $rows['password'] . "</p>
    </div>
    <div class='flex items-center font-extrabold whitespace-nowrap gap-1'>
      <a class='update-pop rounded-lg border-2 border-black bg-green-400 px-3 py-1 text-sm' href='../system/edit.php?id=" . $rows['id'] . "' nama='".$rows['username']."' id='" . $rows['id'] . "' pass='" . $rows['password'] . "' >Edit</a>
      <a href='../system/delete.php?id=".$rows['id']."' class='delete rounded-lg border-2 border-black bg-red-500 px-3 py-1 text-sm'>Delete</a>
    </div>
  </div>";
}