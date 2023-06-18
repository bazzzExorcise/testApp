<?php 
include "conn.php";

$type = $_POST['search'];
if($type == "") {
  $sql = mysqli_query($conn, "SELECT * FROM account WHERE status = 'penjaga'");
}else{
  $sql = mysqli_query($conn, "SELECT * FROM account WHERE (status = 'penjaga' AND username LIKE '%$type%')");
}
while( $rows = mysqli_fetch_assoc($sql)) {
  echo 
  "<div class='flex w-full gap-2 justify-between'>
    <div>
      <h1 class='text-lg font-extrabold'>" . $rows['username'] . "</h1>
    </div>
    <div class='flex items-center font-extrabold whitespace-nowrap gap-1'>
      <a class='update-pop rounded-lg border-2 border-black bg-green-400 px-3 py-1 text-sm' href='../system/edit.php?id=" . $rows['id'] . "' nama='".$rows['username']."' id='" . $rows['id'] . "'>Edit</a>
      <a href='../system/delete.php?id=".$rows['id']."' class='delete rounded-lg border-2 border-black bg-red-500 px-3 py-1 text-sm'>Delete</a>
    </div>
  </div>";
}