<?php

include "conn.php";

$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$nomor = $_POST['nomor'];
$password = $_POST['password'];
$notest = $_POST['no-test'];
$ruangan = $_POST['ruangan'];

if( empty($nama) ) {
  echo "masukan nama tolong";
}else{
  if( empty($kelas) || empty($jurusan) || empty($nomor) ) {
    echo "tolong masukan kelas";
  }else{
    $jurusan = $jurusan . " " . $nomor;
    if( empty($notest) ) {
      echo "tolong masukan nomor test";
    }else{
      mysqli_query($conn, "INSERT INTO account (`username`, `password` , `kelas`, `jurusan`, `nomor`, `status`, `ruangan`)
                          VALUES ('$nama', '$password', '$kelas', '$jurusan', '$notest', 'peserta', '$ruangan')");
      mysqli_query($conn, "INSERT INTO permission (`username`, `ruangan`, `permission`)
                          VALUES ('$nama', '$ruangan', 'not active')");
      echo "berhasil menambahkan";
    }
  }
}