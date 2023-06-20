<?php

include "conn.php";

$id = $_POST['id'];
$nama = $_POST['edit-nama'];
$kelas = $_POST['edit-kelas'];
$jurusan = $_POST['edit-jurusan'];
$notest = $_POST['edit-no-test'];
$password = $_POST['edit-password'];
$ruangan = $_POST['edit-ruangan'];

if( empty($nama) ) {
  echo "masukan nama tolong";
}else{
  if( empty($kelas) || empty($jurusan) ) {
    echo "tolong masukan kelas";
  }else{
    if( empty($notest) ) {
      echo "tolong masukan nomor test";
    }else{
      mysqli_query($conn, "UPDATE account
                          SET ruangan = '$ruangan', username = '$nama', password = '$password', kelas = '$kelas', jurusan = '$jurusan', nomor = '$notest' 
                          WHERE id = $id;
                          ");
      mysqli_query($conn, "UPDATE permission
                          SET ruangan = '$ruangan', username = '$nama';");
      echo "berhasil mengubah";
    }
  }
}