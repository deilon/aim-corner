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
      <div class="user-photo-wrap relative bg-cover bg-no-repeat" style="background-image: url({{asset('storage/profile_pic/' . $user->photo)}});">
          @if(!empty($user->photo))
            <img src="{{asset('storage/profile_pic/'. $user->photo)}}" class="peer user-photo" width="163" height="163" alt="user photo">
          @else
            <img src="{{asset('storage/profile_pic/default.jpg')}}" class="peer user-photo" width="163" height="163" alt="user photo">
          @endif
          <div class="hidden absolute peer-hover:flex hover:flex w-full flex-col bg-white drop-shadow-lg">
            <button class="px-5 py-3 hover:bg-gray-200 upload-button">Upload a photo</button>
        </div>
      </div>
      <div class="flex flex-col space-y-2 profile-details ms-5">
        <h1 class="text-2xl font-medium">{{ ucwords($user->firstname .' '. $user->lastname) }}</h1>
        <span class="user-role-title font-medium">{{ ucwords($user->role) }}</span>
        <a href="{{ url('change/password') }}" class="text-red-500 font-medium hover:underline">Change password <i class="bi bi-pencil-square"></i></a>
      </div>
    </d>
  </div>

  <!-- Basic info -->
  <div class="container mx-auto mt-10 px-6 profile-edit">
    <div class="w-full md:w-7/12">
      <form action="{{ url('profile/update') }}" method="POST" enctype="multipart/form-data">
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
          <div class="input-and-label mb-10 hidden">
            <label for="photo" class="font-medium">Upload profile photo</label> <br>
            <input type="file" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full photo-upload" name="photo" id="photo" value="{{ old('photo', $user->photo) }}">
            @error('photo')<div class="text-red-600 pt-3">{{ $message }}</div>@enderror
          </div>
          <button type="submit" class="bg-green-700 py-2 font-bold text-white rounded">Update Profile</button>
        </div>
      </form>
    </div>
  </div>



</div>

<script>
  $(document).ready(function() {
    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.user-photo').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".photo-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
      $(".photo-upload").click();
    });
  });
</script>

@include('layouts/bottom')