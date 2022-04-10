@include('top')
    <section>
        <div class="profile-banner container-fluid"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="profile-header d-flex">
                        <div class="profile-image me-3" style="background-image: url('{{asset('storage/images/'. {{$user->photo)}}');"></div>
                        <div class="profile-name d-flex flex-column align-self-end pb-3 me-auto">
                          <p class="name">{{$user->firstname}} {{$user->lastname}}</p> 
                          <span class="yr-course">
                            @if($user->role == "student")
                              {{$user->course}}
                            @else
                              {{$user->role}}
                            @endif
                          </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <div class="container">
            <form method="POST" action="/profile/update" enctype="multipart/form-data">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label fw-bold">Username</label>
                    <div class="col-sm-10">
                      <input type="text" name="username" class="form-control-plaintext" value="{{$user->username}}">
                    </div>
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label fw-bold">First name</label>
                    <div class="col-sm-10">
                      <input type="text" name="firstname" class="form-control-plaintext" value="{{$user->firstname}}">
                    </div>
                    @error('firstname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label fw-bold">Last name</label>
                    <div class="col-sm-10">
                      <input type="text" name="lastname" class="form-control-plaintext" value="{{$user->lastname}}">
                    </div>
                    @error('lastname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label fw-bold">Email</label>
                    <div class="col-sm-10">
                      <input type="text" disabled name="email" class="form-control-plaintext" id="staticLastname" value="{{$user->email}}">
                    </div>
                </div>

                <br><div class="divider mt-3 mb-3 d-block"></div><br>
                
                <div class="mb-3 row">
                    <label for="staticCityTown" class="col-sm-2 col-form-label fw-bold">City / Town</label>
                    <div class="col-sm-10">
                      <input type="text" name="city" class="form-control-plaintext" id="staticCityTown" value="{{$user->city}}">
                    </div>
                    @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="staticCountry" class="col-sm-2 col-form-label fw-bold">Country</label>
                    <div class="col-sm-10">
                      <input type="text" name="country" class="form-control-plaintext" id="staticCountry" value="{{$user->country}}">
                    </div>
                    @error('country')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- <div class="mb-3 row">
                    <label for="staticInterests" class="col-sm-2 col-form-label fw-bold">Interests</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticInterests" value="Interests goes here">
                    </div>
                </div> -->
                <div class="mb-3 row">
                    <label for="staticProfilePhoto" class="col-sm-2 col-form-label fw-bold">Profile Photo</label>
                    <div class="col-sm-10">
                      <input type="file" name="photo" class="form-control-plaintext" id="staticProfilePhoto">
                    </div>
                    @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                  <div class="col-12">
                    <input type="submit" name="Update" class="btn btn-success">
                  </div>
                </div>
            </form>
        </div>
    </section>
@include('bottom')