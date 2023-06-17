<?php

include "conn.php";

$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$nomor = $_POST['nomor'];
$notest = $_POST['no-test'];

if( empty($nama) ) {
  echo "masukan nama tolong";
}else{
  if( empty($kelas) || empty($jurusan) || empty($nomor) ) {
    echo "tolong masukan kelas";
  }else{
    if( empty($notest) ) {
      echo "tolong masukan nomor test";
    }else{
      mysqli_query($conn, "INSERT INTO account (`username`, `kelas`, `jurusan`, `nomor`, `status`)
                          VALUES ('$nama', '$kelas', '$jurusan', '$notest', 'peserta')");
      echo "berhasil menambahkan";
    }
  }
}