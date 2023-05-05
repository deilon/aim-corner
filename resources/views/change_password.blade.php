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
      </div>
    </d>
  </div>

  <!-- Change password -->
  <div class="container mx-auto mt-10 px-6 change-pass-edit">
    <div class="w-7/12">
      <form action="{{url('change/password')}}" method="POST">
        @csrf
        <div class="flex flex-col">
          <!-- User info -->
          <div class="input-and-label mb-10">
            <label for="currentpassword" class="font-medium">Current password</label> <br>
            <input type="password" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="current_password" id="current_password">
            @error('current_password')<div class="text-red-600 pt-3">{{ $message }}</div>@enderror
          </div>
          <div class="input-and-label mb-10">
            <label for="newpassword" class="font-medium">New password</label> <br>
            <input type="password" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="password" id="password">
            @error('password')<div class="text-red-600 pt-3">{{ $message }}</div>@enderror
          </div>
          <div class="input-and-label mb-10">
            <label for="password_confirmation" class="font-medium">Confirm new password</label> <br>
            <input type="password" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="password_confirmation" id="password_confirmation">
            @error('password_confirm')<div class="text-red-600 pt-3">{{ $message }}</div>@enderror
          </div>
          <button type="submit" class="bg-red-700 py-2 font-bold text-white rounded">Change Password</button>
        </div>
      </form>
    </div>
  </div>



</div>

@include('layouts/bottom')