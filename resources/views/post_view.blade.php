@include('top')

@if (session('status'))
<section class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-success"> {{ session('status') }}</div>
            </div>
        </div>
    </div>
</section>
@endif

<section class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-xl-8 offset-md-2 offset-lg-2 offset-xl-2">

                @if($post->type == "photo")
                    <div class="post-img" style="background-image: url('/images/post_photo.png');">
                        <div class="post-backdrop-img"></div>
                    </div>
                @endif

                @if ($post->user->role == "admin")
                    <div class="light-blue p-4 clearfix" style="border-radius: 8px">  
                @elseif ($post->user->role == "instructor")
                    <div class="light-red p-4 clearfix" style="border-radius: 8px">
                @elseif ($post->user->role == "student")
                    <div class="light-green p-4 clearfix" style="border-radius: 8px">
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

                      <div class="mt-3 clearfix">
                          <form method="POST" action="/add/comment" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <textarea class="form-control" name="comment" rows="2" placeholder="Comment as {{ Auth::user()->email }}"></textarea>
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            @error('text')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn btn-success rounded float-end mt-1">Post Comment</button>
                          </form>
                      </div>

                      <div class="mt-3 bg-white p-2" style="--bs-bg-opacity: .38; border-radius: 8px;">
                        @if(count($post->comment))
                          @foreach ($post->comment as $comment)
                              <div class="mt-3 bg-white p-2" style="border-radius: 8px;">
                                <b>{{$comment->user->firstname}} {{$comment->user->lastname}}</b>
                                <p>&nbsp; &nbsp;{{$comment->comment}}</p>
                              </div>
                          @endforeach
                        @else 
                          <p>Be the first to comment!</p>
                        @endif
                      </div>
            </div>


        </div>
    </div>
</section>

@include('scripts')
@include('bottom')