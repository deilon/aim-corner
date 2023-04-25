@include('layouts/top')

<div class="profile-body py-10">

  <!-- Profile pic, name -->
  <div class="container mx-auto px-6">
    <d class="flex items-center">
      <img src="{{asset('images/user_photo.png')}}" width="163" alt="user photo">
      <div class="flex flex-col space-y-2 profile-details ms-5">
        <h1 class="text-2xl font-medium">FirstName LastName</h1>
        <span class="user-role-title font-medium">Administrator</span>
        <a href="#" id="change-pass" class="text-red-500 font-medium hover:underline">Change password <i class="bi bi-pencil-square"></i></a>
        <a href="#" id="edit-profile" class="text-green-500 font-medium hover:underline hidden">Update profile <i class="bi bi-pencil-square"></i></a>
      </div>
    </d>
  </div>

  <!-- Basci info -->
  <div class="container mx-auto mt-10 px-6 profile-edit">
    <div class="w-7/12">
      <form action="">
        <div class="flex flex-col">
          <!-- User info -->
          <div class="input-and-label mb-10">
            <label for="firstname" class="font-medium">First name</label> <br>
            <input type="text" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="firstname" id="firstname">
          </div>
          <div class="input-and-label mb-10">
            <label for="lastname" class="font-medium">Last name</label> <br>
            <input type="text" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="lastname" id="lastname">
          </div>
          <div class="input-and-label mb-10">
            <label for="middlename" class="font-medium">Middle name</label> <br>
            <input type="text" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="middlename" id="middlename">
          </div>
          <div class="input-and-label mb-10">
            <label for="email" class="font-medium">Email</label> <br>
            <input type="text" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="email" id="email">
          </div>
          <div class="input-and-label mb-10">
            <label for="username" class="font-medium">Username</label> <br>
            <input type="text" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="username" id="username">
          </div> <br> <br>

          <!-- Location -->
          <div class="input-and-label mb-10">
            <label for="city" class="font-medium">City / Town</label> <br>
            <input type="text" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="city" id="city">
          </div>
          <div class="input-and-label mb-10">
            <label for="country" class="font-medium">Country</label> <br>
            <input type="text" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="country" id="country">
          </div>
          <button type="submit" class="bg-green-700 py-2 font-bold text-white rounded">Update Profile</button>
        </div>
      </form>
    </div>
  </div>


  <!-- Change password -->
  <div class="container mx-auto mt-10 px-6 hidden change-pass-edit">
    <div class="w-7/12">
      <form action="">
        <div class="flex flex-col">
          <!-- User info -->
          <div class="input-and-label mb-10">
            <label for="currentpassword" class="font-medium">Current password</label> <br>
            <input type="text" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="currentpassword" id="currentpassword">
          </div>
          <div class="input-and-label mb-10">
            <label for="newpassword" class="font-medium">New password</label> <br>
            <input type="text" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="newpassword" id="newpassword">
          </div>
          <div class="input-and-label mb-10">
            <label for="confirmpassword" class="font-medium">Confirm new password</label> <br>
            <input type="text" class="h-9 mt-2 border-1 border-slate-200 shadow-lg w-full" name="confirmpassword" id="confirmpassword">
          </div>
          <button type="submit" class="bg-red-700 py-2 font-bold text-white rounded">Change Password</button>
        </div>
      </form>
    </div>
  </div>



</div>

@include('layouts/bottom')