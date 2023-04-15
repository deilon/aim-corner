<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> 
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
<body class="font-raleway">
    
<nav class="bg-white font-regular">
  <div class="relative container mx-auto px-6 py-5">

    <div class="flex justify-between items-center">
      <div class="flex space-x-5 items-center">
        <a href="#" class="mr-5"><img src="http://localhost:8000/images/logo-dark.svg" alt="logo" width="60"></a>
        <a href="http://" class="border-b-2 border-black py-2">Home</a>
        <a href="http://">Profile</a>
        <a href="http://">Dashboard</a>
        <a href="http://">Control panel</a>
      </div>

      <div class="flex items-center">
        <button class="mr-5"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16"><path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/></svg></button>
        <div class="flex items-center p-2 hover:bg-gray-200 hover:cursor-pointer">
          <div class="flex items-center" style="width: 200px !important">
            <img src="{{ asset('images/user_photo.png') }}" width="33" height="33" class="mr-3" alt="default photo">
            <div class="text-ellipsis overflow-hidden">student777</div>  
          </div>
            <i class="bi bi-caret-down"></i>
        </div>    
      </div>
    </div>


  </div>
</nav>