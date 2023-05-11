@include('layouts/top')

@include('layouts/dashboardnav')

<section id="dashboard-posts" class="mt-5">
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
         <button type="submit" class="upvote-btn flex items-center" data-post-id="{{ $post->id }}"><i class="bi bi-caret-up"></i></button>
         <div class="vote-count font-semibold" data-post-id="{{$post->id}}">{{$post->votes->sum('vote');}}</div>
         <button class="downvote-btn flex items-center" data-post-id="{{ $post->id }}"><i class="bi bi-caret-down"></i></button>  
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
          <div class="save">
            <button type="submit" class="save-post-btn hover:cursor-pointer" data-post-id="{{$post->id}}">
              @if(Auth::user()->saves()->where('post_id', $post->id)->exists())
                <i class="save-icon bi bi-bookmark-fill mr-1"></i>
              @else 
                <i class="save-icon bi bi-bookmark mr-1"></i>
              @endif
              <span>Save</span>
            </button>
          </div>
          <div class="time"><i class="bi bi-clock mr-1"></i> {{ $post->created_at->diffForHumans() }}</div>
          <div class="categories"><i class="bi bi-tags mr-1"></i> Categories</div>
        </div>

      </div>
    </div>
  @empty
    <div class="flex flex-col h-screen">
        <div class="bg-yellow-100 p-4"><p>Sorry, there's nothing to see here. Looks like you haven't made a post yet.</p></div>
    </div>
  @endforelse

    

  </div>
</section>

@include('layouts/bottom')