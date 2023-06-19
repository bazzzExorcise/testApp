<?php include "include/header.php" ?>
<body style="font-family: comic neue;" class="font-extrabold justify-center flex">
  <form method="post" action="system/login.php" class="relative w-full flex login-form flex-col gap-4 items-center max-w-sm justify-center min-h-screen overflow-auto">
    <div class="w-full flex flex-col items-center">
      <h1 class="text-3xl">Login</h1>
      <p class="text-sm">silahkan masuk dengan akun yang terdaftar</p>
    </div>
    <div class="gap-2 w-full max-w-xs flex flex-col items-center px-4">
      <div id="container" class="w-full"></div>
      <div class="relative flex items-center w-full px-2 bg-cyan-300 overflow-hidden rounded-md border-2 border-black">
        <ion-icon name="person" class="text-3xl"></ion-icon>
        <input name="username" type="text" class="focus:outline-none py-2 bg-transparent placeholder:text-black placeholder:font-extrabold px-2 max-w-xs w-full" placeholder="Username">
      </div>
      <div class="relative flex items-center w-full px-2 bg-yellow-400 overflow-hidden rounded-md border-2 border-black">
        <ion-icon name="lock" class="text-3xl"></ion-icon>
        <input name="password" type="password" class="focus:outline-none py-2 bg-transparent placeholder:text-black placeholder:font-extrabold px-2 max-w-xs w-full" placeholder="Password">
      </div>
    </div>
    <div class="gap-2 w-full max-w-xs flex flex-col items-center px-4">
      <button class="w-full max-w-xs bg-black text-white justify-center group rounded-lg py-2 flex gap-2 items-center">
        Login <ion-icon name="arrow-round-forward" class="group-hover:translate-x-2 duration-300"></ion-icon>
      </button>
    </div>
  </form>
  <script>
    $(document).ready(function () {
      $(".login-form").submit(function (e) { 
        e.preventDefault();
        $.ajax({
          type: $(this).attr("method"),
          url: $(this).attr("action"),
          data: $(".login-form").serialize(),
          success: function (response) {
            if(response == "peserta-success") {
              $("#container").html(`<div class="relative flex items-center w-full px-2 py-2 justify-center bg-lime-400 overflow-hidden rounded-md border-2 border-black">login berhasil silahkan tunggu sejenak</div>`);
              location.href = "index.php"
            }else if(response == "admin-success") {
              $("#container").html(`<div class="relative flex items-center w-full px-2 py-2 justify-center bg-lime-400 overflow-hidden rounded-md border-2 border-black">login berhasil silahkan tunggu sejenak</div>`);
              location.href = "admin/index.php"
            }else if(response == "keeper-success") {
              $("#container").html(`<div class="relative flex items-center w-full px-2 py-2 justify-center bg-lime-400 overflow-hidden rounded-md border-2 border-black">login berhasil silahkan tunggu sejenak</div>`);
              location.href = "keeper-section/index.php"
            }else{
              console.log(response);
              $("#container").html(`<div class="relative flex items-center w-full px-2 py-2 justify-center bg-red-500 overflow-hidden rounded-md border-2 border-black">${response}</div>`);
            }
          }
        });
      });
    });
  </script>
</body>
</html>