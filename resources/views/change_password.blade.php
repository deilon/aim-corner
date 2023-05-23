@include('layouts/top')

<div class="profile-body py-10 pt-[130px] md:pt-[140px]">

  <!-- Profile pic, name -->
  <div class="container mx-auto px-6">

  @if (session('success'))
    <div class="p-4 w-full bg-lime-200 mb-10 rounded-md border-slate-300">
        {{ session('success') }}
    </div>
  @endif

    <d class="flex items-center">
      @if(!empty($user->photo))
        <img src="{{asset('storage/profile_pic/'. $user->photo)}}" class="peer user-photo" width="163" height="163" alt="user photo">
      @else
        <img src="{{asset('storage/profile_pic/default.jpg')}}" class="peer user-photo" width="163" height="163" alt="user photo">
      @endif
      <div class="flex flex-col space-y-2 profile-details ms-5">
        <h1 class="text-2xl font-medium">{{ ucwords($user->firstname .' '. $user->lastname) }}</h1>
        <span class="user-role-title font-medium">{{ ucwords($user->role) }}</span>
      </div>
    </d>
  </div>

  <!-- Change password -->
  <div class="container mx-auto mt-10 px-6 change-pass-edit">
    <div class="w-full md:w-7/12">
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