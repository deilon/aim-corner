@include('layouts/top')

@if (session('success'))
    <div class="p-4 bg-lime-200 rounded-md border-slate-300">
        {{ session('success') }}
    </div>
@endif

<div class="profile-body py-10">

  <!-- Profile pic, name -->
  <div class="container mx-auto px-6">
    <d class="flex items-center">
      <img src="{{asset('images/user_photo.png')}}" width="163" alt="user photo">
      <div class="flex flex-col space-y-2 profile-details ms-5">
        <h1 class="text-2xl font-medium">{{ ucwords($user->firstname .' '. $user->lastname) }}</h1>
        <span class="user-role-title font-medium">{{ ucwords($user->role) }}</span>
        <a href="{{url('change/password')}}" class="text-red-500 font-medium hover:underline">Change password <i class="bi bi-pencil-square"></i></a>
      </div>
    </d>
  </div>

  <!-- Basci info -->
  <div class="container mx-auto mt-10 px-6 profile-edit">
    <div class="w-7/12">
      <form action="{{ url('profile/update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="flex flex-col">
          <!-- User info -->
          <div class="input-and-label mb-10">
            <label for="firstname" class="font-medium">First name</label> <br>
            <input type="text" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="firstname" id="firstname" value="{{ old('firstname', ucwords($user->firstname)) }}">
            @error('firstname')<div class="text-red-600 pt-3">{{ $message }}</div>@enderror
          </div>
          <div class="input-and-label mb-10">
            <label for="lastname" class="font-medium">Last name</label> <br>
            <input type="text" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="lastname" id="lastname" value="{{ old('lastname', ucwords($user->lastname)) }}">
            @error('lastname')<div class="text-red-600 pt-3">{{ $message }}</div>@enderror
          </div>
          <div class="input-and-label mb-10">
            <label for="middlename" class="font-medium">Middle name</label> <br>
            <input type="text" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="middlename" id="middlename" value="{{ old('middlename', ucwords($user->middlename)) }}">
            @error('middlename')<div class="text-red-600 pt-3">{{ $message }}</div>@enderror
          </div>
          <div class="input-and-label mb-10">
            <label for="email" class="font-medium">Email</label> <br>
            <input type="text" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="email" id="email" value="{{ old('email', $user->email) }}">
            @error('email')<div class="text-red-600 pt-3">{{ $message }}</div>@enderror
          </div>
          <div class="input-and-label mb-10">
            <label for="username" class="font-medium">Username</label> <br>
            <input type="text" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="username" id="username" value="{{ old('username', $user->username) }}">
            @error('username')<div class="text-red-600 pt-3">{{ $message }}</div>@enderror
          </div>
          <button type="submit" class="bg-green-700 py-2 font-bold text-white rounded">Update Profile</button>
        </div>
      </form>
    </div>
  </div>



</div>

@include('layouts/bottom')