<?php include "include/header.php" ?>
<body style="font-family: comic neue;" class="font-extrabold justify-center flex">
  <form class="relative w-full flex login-form flex-col gap-4 items-center max-w-sm justify-center min-h-screen overflow-auto">
    <div class="w-full flex flex-col items-center">
      <h1 class="text-3xl">Login</h1>
      <p class="text-sm">silahkan masuk dengan akun yang terdaftar</p>
    </div>
    <div class="gap-2 w-full max-w-xs flex flex-col items-center px-4">
      <div class="relative flex items-center w-full px-2 bg-cyan-300 overflow-hidden rounded-md border-2 border-black">
        <ion-icon name="person" class="text-3xl"></ion-icon>
        <input type="text" class="focus:outline-none py-2 bg-transparent placeholder:text-black placeholder:font-extrabold px-2 max-w-xs w-full" placeholder="Username">
      </div>
      <div class="relative flex items-center w-full px-2 bg-yellow-400 overflow-hidden rounded-md border-2 border-black">
        <ion-icon name="lock" class="text-3xl"></ion-icon>
        <input type="password" class="focus:outline-none py-2 bg-transparent placeholder:text-black placeholder:font-extrabold px-2 max-w-xs w-full" placeholder="Password">
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
        console.log("sudah di tekan");
      });
    });
  </script>
</body>
</html>