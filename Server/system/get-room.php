<?php

include "conn.php";
$room = $_GET['id'];
$room = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM room WHERE id = '$room'")); 
$roomid = $room['name'];
$data = mysqli_query($conn, "SELECT * FROM account WHERE ruangan = '$roomid'"); 

foreach($data as $rows) {
  $user = $rows['username'];
  $sql = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM permission WHERE username = '$user'"));
  echo "<div class='w-full px-4 border-b-2 border-black justify-between gap-2 py-4 flex items-stretch'>
          <div class='h-20 aspect-square bg-gray-200 border-2 border-black rounded-md'></div>
          <div class='flex flex-col w-full justify-between'>
            <div>
              <p class='text-xs'>" . $rows['kelas']. " " . $rows['jurusan']. " - " . $rows['nomor'] . "</p>
              <h1 class='text-lg -my-1'>" . $rows['username'] . "</h1>
              <p class='text-xs'>" . $sql['permission']. "</p>
            </div>
            <div class='flex text-xs gap-2'>
              <a href='../system/update-permission.php?id=". $rows['id'] ."' class='update-permission bg-lime-300 rounded-md border-2 border-black px-2 py-1'>buka soal</a>
            </div>
          </div>
        </div>";
}