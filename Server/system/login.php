<?php
include "conn.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if(empty($username)) {
  echo "tolong masukan username anda";
}else{
  if(empty($password)) {
    echo "tolong masukan password anda";
  }else{
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM account WHERE username = '$username'"));
    if($row == NULL){
      echo "username anda tidak ditemukan";
    }else{
      if($password != $row['password']) {
        echo "password anda salah";
      }else{
        $_SESSION['login'] = $username;
        if($row['status'] == "admin") {
          echo "admin-success";
        }else {
          if($row['status'] == "peserta") {
            echo "peserta-success";
          }else{
            if($row['status'] == "penjaga") {
              echo "keeper-success";
            }
          }
        }
      }
    }
  }
}