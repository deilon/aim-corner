@include('Layouts.top')

@if (session('welcome_message'))
    <div class="p-4 bg-lime-200 rounded-md border-slate-300">
        {{ session('welcome_message') }}
    </div>
@endif
@if (session('success'))
    <div class="p-4 bg-lime-200 rounded-md border-slate-300">
        {{ session('success') }}
    </div>
@endif


<section id="feed-nav" class="mt-5 font-medium">
  <div class="container mx-auto px-6">
    <div class="flex items-center space-x-10 bg-white border border-slate-300 rounded-md px-6">
      <a href="#" class="py-5 pe-2 border-b-2 border-black"><i class="bi bi-house-fill mr-2"></i> For you</a>
      <a href="#" class="py-5 pe-2"><i class="bi bi-asterisk mr-2"></i> Show all</a>
      <a href="#" class="py-5 pe-2"><i class="bi bi-people-fill mr-2"></i> Following</a>
      <a href="#" class="py-5 pe-2"><i class="bi bi-mortarboard-fill mr-2"></i> Students</a>
      <a href="#" class="py-5 pe-2"><i class="bi bi-person-fill mr-2"></i> Instructors</a>
      <a href="#" class="py-5 pe-2"><i class="bi bi-person-badge-fill mr-2"></i> Administrators</a>
    </div>
  </div>
</section>

<section id="feed-posts" class="mt-5">
  <div class="container mx-auto px-6">
    
  @forelse($posts as $post)
    <div class="relative flex w-8/12 mx-auto mb-5 bg-white border border-slate-300">
      
      @if ($post->user->role == "student")
      <span class="absolute -top-2 right-5 user-role-post-label user-role-green"></span>
      @elseif ($post->user->role == "instructor")
      <span class="absolute -top-2 right-5 user-role-post-label user-role-red"></span>
      @elseif ($post->user->role == "admin")
      <span class="absolute -top-2 right-5 user-role-post-label user-role-blue"></span>
      @endif

      <div class="vote-controls flex flex-col items-center py-10 px-5">
        <button class="flex items-center"><i class="bi bi-caret-up"></i></button>
        <div class="vote-count font-semibold">1004</div>
        <button class="flex items-center"><i class="bi bi-caret-down"></i></button>
      </div>
      <div class="post-details py-7 pe-7">
        <!-- Post user name -->
        <div class="post-user text-sm mb-4">Posted by <a href="#" class="font-semibold hover:underline">{{$post->user->firstname .' '. $post->user->lastname}}</a></div>
        
        <!-- Post title -->
        <div class="post-title font-semibold text-xl"><a href="{{url('view/'.$post->id.'/post')}}" class="hover:cursor-pointer">{{$post->title}}</a></div>

        @if ($post->type == "title")
          @if (isset($post->text))
          <!-- Post description text -->
          <div class="post-description font-medium mt-3"><a href="{{url('view/'.$post->id.'/post')}}" class="hover:cursor-pointer">{{$post->text}}</a></div>
          @endif
        @elseif ($post->type == "photo")
          @if (isset($post->text))
            <!-- Post description text -->
            <div class="post-description font-medium mt-3"><a href="{{url('view/'.$post->id.'/post')}}" class="hover:cursor-pointer">{{$post->text}}</a></div>
          @endif
          <!-- Post photo -->
          <div class="post-photo mt-3"><a href="{{url('view/'.$post->id.'/post')}}" class="hover:cursor-pointer"><img src="{{ asset('storage/post_images/' . $post->image) }}" alt="post photo"></a></div>
        @elseif ($post->type == "link")
          <!-- Link post -->
          <div class="post-link flex space-x-2 font-medium mt-3">
            <span><i class="bi bi-link-45deg text-base"></i></span>
            <a href="{{$post->link}}" class="hover:underline">{{$post->link}}</a>
          </div>
        @endif
        
        <!-- Post metrics -->
        <div class="post-metrics flex flex-row space-x-5 items-center mt-10 py-5 px-3 font-semibold border-t-2 border-slate-300">
          <div class="comments"><a href="{{url('view/'. $post->id . '/post')}}"><i class="bi bi-chat-square-dots mr-1"></i> {{ $post->comments->count() }} Comments</a></div>
          <div class="save"><i class="bi bi-bookmark mr-1"></i> Save</div>
          <div class="time"><i class="bi bi-clock mr-1"></i> {{ $post->created_at->diffForHumans() }}</div>
          <div class="categories"><i class="bi bi-tags mr-1"></i> Categories</div>
        </div>

      </div>
    </div>
  @empty
      <div>No posts found.</div>
  @endforelse

  </div>
</section>

@include('Layouts.bottom')