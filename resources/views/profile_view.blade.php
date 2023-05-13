@include('layouts/top')

@if (session('success'))
    <div class="p-4 bg-lime-200 rounded-md border-slate-300">
        {{ session('success') }}
    </div>
@endif

<div class="profile-body py-10">

  <!-- Profile pic, name -->
  <div class="container mx-auto px-6">
    <div class="flex">
      <div class="user-photo-wrap relative bg-cover bg-no-repeat" style="background-image: url({{asset('storage/profile_pic/' . $user->photo)}});">
          @if(!empty($user->photo))
            <img src="{{asset('storage/profile_pic/'. $user->photo)}}" class="peer user-photo" width="163" height="163" alt="user photo">
          @else
            <img src="{{asset('storage/profile_pic/default.jpg')}}" class="peer user-photo" width="163" height="163" alt="user photo">
          @endif
      </div>
      <div class="flex flex-col space-y-2 profile-details ms-5">
        <div class="flex space-x-4 items-center">
          <h1 class="text-2xl font-medium inline">{{ ucwords($user->firstname .' '. $user->lastname) }}</h1>
          @if($user->id != Auth::user()->id)
            @if(Auth::user()->following->contains($user->id))
                <form action="{{ route('unfollow', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-slate-300 text-slate-800 py-2 px-5 rounded-sm text-white text-sm font-semibold">Following</button>
                </form>
            @else
                <form action="{{ route('follow', $user->id) }}" method="post">
                    @csrf
                    <button type="submit" class="bg-sky-500 text-slate-200 py-2 px-5 rounded-sm text-white text-sm font-semibold">Follow</button>
                </form>
            @endif
          @endif
        </div>
        <span class="user-role-title font-medium">{{ ucwords($user->role) }}</span>
      </div>
    </div>

    @forelse($user->posts as $post)
    <div class="relative flex w-8/12 mx-auto mb-5 bg-white border border-slate-300">
      
      @if ($post->user->role == "student")
      <span class="absolute -top-2 right-5 user-role-post-label user-role-green"></span>
      @elseif ($post->user->role == "instructor")
      <span class="absolute -top-2 right-5 user-role-post-label user-role-red"></span>
      @elseif ($post->user->role == "admin")
      <span class="absolute -top-2 right-5 user-role-post-label user-role-blue"></span>
      @endif

      <div class="vote-controls flex flex-col items-center py-10 px-5">
        <!-- Upvote button -->
        @if(Auth::user()->votes()->where('post_id', $post->id)->where('vote', 1)->exists())
          <button class="upvote-btn flex items-center text-slate-600 upvoted" data-post-id="{{ $post->id }}" data-route-url="{{ route('posts.vote') }}"><i class="bi bi-caret-up-fill"></i></button>
        @else
          <button class="upvote-btn flex items-center text-slate-600" data-post-id="{{ $post->id }}" data-route-url="{{ route('posts.vote') }}"><i class="bi bi-caret-up"></i></button>
        @endif

        <!-- Vote counts -->
         <div class="vote-count font-semibold" data-post-id="{{ $post->id }}">{{ $post->votes->sum('vote') }}</div>
        
        <!-- Downvote button -->
        @if(Auth::user()->votes()->where('post_id', $post->id)->where('vote', -1)->exists())
          <button class="downvote-btn flex items-center text-slate-600 downvoted" data-post-id="{{ $post->id }}" data-route-url="{{ route('posts.vote') }}"><i class="bi bi-caret-down-fill"></i></button>
        @else
          <button class="downvote-btn flex items-center text-slate-600" data-post-id="{{ $post->id }}" data-route-url="{{ route('posts.vote') }}"><i class="bi bi-caret-down"></i></button>
        @endif  
      </div>
      <div class="post-details py-7 pe-7">
        <!-- Post user name -->
        <div class="post-user text-sm mb-4">Posted by <a href="{{ route('view.profile', $post->user) }}" class="font-semibold hover:underline">{{ ucfirst($post->user->firstname) }} {{ ucfirst($post->user->lastname) }}</a></div>
        
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
            <button type="submit" class="save-post-btn hover:cursor-pointer" data-post-id="{{$post->id}}" data-route-url="{{ route('posts.save') }}">
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
          @if($post->user_id == auth()->user()->id)
            <div class="action relative" data-action-id="{{ $post->id }}">
              <i class="bi bi-three-dots"></i>
              <div class="absolute hidden flex flex-col shadow-2xl bg-white border border-slate-300 py-5 rounded w-[200px] z-40">
                <form action="{{ route('post.delete', $post) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-start p-3 bg-gray-100 hover:bg-gray-200 hover:cursor-pointer w-full">Delete</button>
                </form>
              </div>
            </div>
          @endif
        </div>

      </div>
    </div>
  @empty
    <div class="flex flex-col h-screen mt-3">
        <div class="bg-yellow-100 p-4"><p>Sorry, there's nothing to see here. Looks like the user haven't made a post yet.</p></div>
    </div>
  @endforelse


  </div>

</div>

<script src="{{ asset('js/postActions.js')}}"></script>
<script src="{{ asset('js/userPostActions.js')}}"></script>

@include('layouts/bottom')