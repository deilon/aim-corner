<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> 
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- jQuery code to update vote count using AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
<body class="font-raleway">
    
<header class="fixed w-full border-b border-slate-300 bg-white font-regular z-20">
  <div class="relative px-6 py-5">

    <div class="flex justify-between items-center">
      <div class="flex space-x-5 items-center">
        <a href="{{ url('feed/all') }}" class="mr-5"><img src="http://localhost:8000/images/logo-dark.svg" alt="logo" width="60"></a>
      </div>

      <div class="flex items-center space-x-2">
        <!-- <button class="mr-5 hover:cursor-not-allowed hover:text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16"><path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/></svg></button> -->
        <a href="{{ url('add/post') }}" class="py-1 px-2 rounded-sm bg-slate-200 hover:bg-slate-300"><i class="bi bi-plus-lg"></i></a>
        <div class="relative">
          <button id="acct-btn" class="flex items-center p-2 hover:bg-gray-200 hover:cursor-pointer">
            <span class="flex items-center md:w-[200px]">
              @if(!empty(Auth::user()->photo))
                <img src="{{ asset('storage/profile_pic/' . Auth::user()->photo) }}" width="33" height="33" class="mr-3" alt="default photo">
              @else 
                <img src="{{ asset('storage/profile_pic/default.jpg') }}" width="33" height="33" class="mr-3" alt="default photo">
              @endif
                <span class="text-ellipsis overflow-hidden">{{ Auth::user()->username }}</span>  
            </span>
              <i class="bi bi-caret-down"></i>
          </button>
          <div class="absolute hidden flex flex-col shadow-2xl bg-white border border-slate-300 py-5 rounded w-full acct-dropdown-content z-40">
            <a href="{{ url('profile') }}" class="block p-3 bg-gray-100 hover:bg-gray-200 hover:cursor-pointer">Profile</a>
            <a href="{{ url('dashboard/posts') }}" class="block p-3 bg-gray-100 hover:bg-gray-200 hover:cursor-pointer">Dashboard</a>
            <a href="#" class="disabled-link block p-3 bg-gray-100 hover:cursor-not-allowed hover:text-gray-500">Control panel</a>
            <a href="/logout" class="block p-3 bg-gray-100 hover:bg-gray-200 hover:cursor-pointer">Sign out</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>