<?php
session_start();
unset($_SESSION['login']);
header("location: ../login.php");
include "../include/header.php";  
?>
<body >
  <div class="font-extrabold block-wall fixed bg-white/50 backdrop-blur-sm duration-500 top-0 left-0 h-screen w-full grid place-items-center">
    <div class="p-4 max-w-xs bg-yellow-400 w-full rounded-md flex flex-col items-center justify-center gap-2 border-2 border-black">
      <div class="w-40 p-4 aspect-square">
      <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none" class="hds-flight-icon--animation-loading animate-spin"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g fill="#000000" fill-rule="evenodd" clip-rule="evenodd"> <path d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8z" opacity=".2"></path> <path d="M7.25.75A.75.75 0 018 0a8 8 0 018 8 .75.75 0 01-1.5 0A6.5 6.5 0 008 1.5a.75.75 0 01-.75-.75z"></path> </g> </g></svg>
      </div>
      <h1 class="text-2xl text-center">Tunggu Sebentar</h1>
      <p class="text-sm text-center">tunggu sebentar, kami sedang mengeluarkan akun anda</p>
    </div>
  </div>
</body>
