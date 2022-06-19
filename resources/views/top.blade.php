<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">   
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <div class="container">
          <a class="navbar-brand fw-bold" href="/feed">AIM Corner</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav, #navbarSubNav, #navbarSubNav2" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/feed/all/posts">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/profile">Profile</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="/dashboard">Dashboard</a>
              </li> -->
              <li class="nav-item"  style="color: black !important">
                <span class="nav-link text-decoration-none" style="color: black !important">
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf

                      <x-responsive-nav-link :href="route('logout')"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                          {{ __('Log Out') }}
                      </x-responsive-nav-link>
                  </form>
                </span>
              </li>
            </ul>
            <a href="/add/post" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add Post"><i class="bi bi-plus-lg"></i></a>
          </div>
        </div>
    </nav>