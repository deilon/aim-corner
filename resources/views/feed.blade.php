@include('layouts/top')

      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <div class="collapse navbar-collapse" id="navbarSubNav">
            <ul class="navbar-nav interests-nav d-flex flex-row flex-wrap justify-content-evenly">
              <li class="">
                <a class="nav-link" aria-current="page" href="#">For You</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active-interests-nav" href="#">All</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Mathematics</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Technology</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Social</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Literature</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Science</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Psychology</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <div class="collapse navbar-collapse" id="navbarSubNav2">
            <ul class="navbar-nav d-flex flex-row flex-wrap justify-content-evenly">
              <li class="nav-item">
                <a class="nav-link active" id="gridView" aria-current="page" style="cursor: pointer"><i class="bi bi-grid-fill"></i> Grid View</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" id="listView" aria-current="page" style="cursor: pointer"><i class="bi bi-justify"></i> List View</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('feed/admin/posts') }}"><i class="bi bi-square-fill" style="color: #E6E4FF"></i> College Coordinator</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('feed/instructor/posts') }}"><i class="bi bi-square-fill" style="color: #FFE9E9"></i> College Instructors</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('feed/student/posts') }}"><i class="bi bi-square-fill" style="color: #CDF6BC"></i> Students</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


    <section class="mt-4">
        <div class="container">
            <div class="row"> <!-- add data-masonry='{"percentPosition": true }' for masonry effect but bug will occur in list view -->

              @foreach ($posts as $post)

                <div class="post-card col-md-6 col-lg-6 mb-4">

                  @if($post->type == "photo")
                    <div class="post-img" style="background-image: url('/images/post_photo.png');">
                        <div class="post-backdrop-img"></div>
                    </div>
                  @endif

                  @if ($post->user->role == "admin")
                    <div class="light-blue p-4 clearfix" style="border-radius: 8px" onclick="location.href='/view/post/{{$post->id}}'">  
                  @elseif ($post->user->role == "instructor")
                    <div class="light-red p-4 clearfix" style="border-radius: 8px" onclick="location.href='/view/post/{{$post->id}}'">
                  @elseif ($post->user->role == "student")
                    <div class="light-green p-4 clearfix" style="border-radius: 8px" onclick="location.href='/view/post/{{$post->id}}'">
                  @endif
                  

                      <div class="d-flex" style="color: #828080; font-family: 'Raleway', sans-serif; font-size: 500;">
                          <p>Posted by <span class="text-decoration-underline">{{$post->user->firstname}} {{$post->user->lastname}} ( {{$post->user->role}} )</span></p>
                          <span class="ms-auto" style="color: #828080; font-family: 'Segoe UI', sans-serif;">13h ago</span>
                      </div>

                      <!-- post content -->
                      <div class="post-content bg-white p-3" style="--bs-bg-opacity: .38; border-radius: 8px; height: 180px;">
                          
                          <!-- Vote button -->
                          <div class="d-flex flex-column float-start me-4">
                              <button style="background: transparent; border: none;">
                                  <i class="bi bi-caret-up" style="font-size: 2rem; color: #707070;"></i>
                              </button>
                              <p class="vote-count text-center">445</p>
                              <button style="background: transparent; border: none;">
                                  <i class="bi bi-caret-down" style="font-size: 2rem; color: #707070;"></i>
                              </button>              
                          </div>

                          <!-- post text/img/link -->
                          <div>
                            @if ($post->type == "title")
                              <p style="font-size: 39px;">
                                {{$post->title}}
                              </p>
                              {{$post->text}}  
                            @elseif ($post->type == "photo")
                              <p class="mt-2" style="font-size: 17px;">
                                {{$post->title}}
                              </p>
                            @elseif ($post->type == "link")
                              <p class="mt-2" style="font-size: 17px;">
                                {{$post->title}}
                              </p>
                              <a href="{{$post->link}}">{{$post->link}}</a>
                            @endif
                          </div>

                      </div>

                      <div class="d-flex mt-4">
                          <button class="post-metrics-btn me-2"><i class="bi bi-chat-left-dots" style="font-size: 1rem"></i> {{count($post->comment)}} Comments</button>
                          <button class="post-metrics-btn"><i class="bi bi-bookmark" style="font-size: 1rem"></i> Save</button>
                      </div>

                  </div>
                </div>
              @endforeach

            </div>
        </div>
        </div>
    </section> 
    
@include('scripts')
<script>
      $( "#listView" ).click(function() {
        $('.post-card').addClass('offset-lg-3 offset-md-3');
      });      
      $( "#gridView" ).click(function() {
        $('.post-card').removeClass("offset-lg-3 offset-md-3");
      });
</script>

@include('layouts/bottom')