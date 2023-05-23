@include('layouts/top')
@if (session('success'))
    <div class="p-4 bg-lime-200 rounded-md border-slate-300">
        {{ session('success') }}
    </div>
@endif

@include('layouts/dashboardnav')

<section class="pt-[20px] md:pt-[140px] md:ml-20">
  <div class="container mx-auto md:px-6">
    
  @if (session('welcome_message'))
    <div class="p-4 bg-lime-200 rounded-md border-slate-300 w-full md:w-8/12 md:mx-auto mb-5">
        {{ session('welcome_message') }}
    </div>
  @endif
  @if (session('success'))
      <div class="p-4 bg-lime-200 rounded-md border-slate-300 w-full md:w-8/12 md:mx-auto mb-5">
          {{ session('success') }}
      </div>
  @endif

  @forelse($posts as $post)
    <div class="relative flex w-full md:w-9/12 lg:w-8/12 md:mx-auto mb-5 bg-white border border-slate-300">
      
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
      <div class="post-details w-full py-7 pe-7">
        <!-- Post user name -->
        <div class="post-user text-sm mb-4 w-full">Posted by <a href="{{ route('view.profile', $post->user) }}" class="font-semibold hover:underline">{{ ucfirst($post->user->firstname) }} {{ ucfirst($post->user->lastname) }}</a></div>
        
        <!-- Post title -->
        <div class="post-title font-semibold text-xl"><a href="{{url('view/'.$post->id.'/post')}}" class="hover:cursor-pointer">{{$post->title}}</a></div>

        @if (isset($post->text))
          <!-- Post description text -->
          <div class="post-description font-medium mt-3"><a href="{{url('view/'.$post->id.'/post')}}" class="hover:cursor-pointer">{{$post->text}}</a></div>
        @endif

        @if (isset($post->image))
          <!-- Post photo -->
          <div class="post-photo mt-3"><a href="{{url('view/'.$post->id.'/post')}}" class="hover:cursor-pointer"><img src="{{ asset('storage/post_images/' . $post->image) }}" alt="post photo"></a></div>
        @endif

        @if (isset($post->link))
          <!-- Link post -->
          <div class="post-link text-sm md:text-base md:font-medium mt-3">
            <a href="{{$post->link}}" class="hover:underline"><i class="bi bi-link-45deg text-base"></i> {{$post->link}}</a>
          </div>
        @endif
        
        <!-- Post metrics | medium screens -->
        <div class="post-metric hidden mt-10 py-5 px-3 font-semibold border-t-2 border-slate-300 flex-row space-x-5 items-center md:flex">
          <div class="comments text-sm md:text-base"><a href="{{url('view/'. $post->id . '/post')}}"><i class="bi bi-chat-square-dots mr-1"></i> {{ $post->comments->count() }} Comments</a></div>
          <div class="save text-sm md:text-base">
            <button type="submit" class="save-post-btn hover:cursor-pointer" data-post-id="{{$post->id}}" data-route-url="{{ route('posts.save') }}">
              @if(Auth::user()->saves()->where('post_id', $post->id)->exists())
                <i class="save-icon bi bi-bookmark-fill mr-1"></i> <span>Saved</span>
              @else 
                <i class="save-icon bi bi-bookmark mr-1"></i> <span>Save</span>
              @endif
              
            </button>
          </div>
          <div class="time text-sm lg:text-base"><i class="bi bi-clock mr-1"></i> {{ $post->created_at->diffForHumans() }}</div>
          <div class="categories text-sm md:text-base"><i class="bi bi-tags mr-1"></i> Categories</div>
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

        <!-- Post metrics | smaller screens -->
        <div class="post-metric flex flex-row space-x-5 items-center mt-10 py-5 px-3 font-semibold border-t-2 border-slate-300 md:hidden">
          <div class="comments text-sm md:text-base"><a href="{{url('view/'. $post->id . '/post')}}"><i class="bi bi-chat-square-dots mr-1"></i> {{ $post->comments->count() }} Comments</a></div>
          <div class="time text-sm lg:text-base"><i class="bi bi-clock mr-1"></i> {{ $post->created_at->diffForHumans() }}</div>

          @if($post->user_id == auth()->user()->id)
            <div class="action relative" data-action-id="{{ $post->id }}">
              <i class="bi bi-three-dots"></i>
              <div class="absolute right-0 hidden flex flex-col shadow-2xl bg-white border border-slate-300 py-5 rounded w-[200px] z-40">
                <button type="submit" class="save-post-btn text-start p-3 hover:bg-gray-100 hover:cursor-pointer w-full" data-post-id="{{$post->id}}" data-route-url="{{ route('posts.save') }}">
                  @if(Auth::user()->saves()->where('post_id', $post->id)->exists())
                    <i class="save-icon bi bi-bookmark-fill mr-1"></i> <span>Saved</span>
                  @else 
                    <i class="save-icon bi bi-bookmark mr-1"></i> <span>Save</span>
                  @endif
                  
                </button>
                <button class="text-start p-3 hover:bg-gray-100 hover:cursor-pointer w-full"><i class="bi bi-tags mr-1"></i> Categories</button>
                <form action="{{ route('post.delete', $post) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-start p-3 hover:bg-gray-100 hover:cursor-pointer w-full">Delete</button>
                </form>
              </div>
            </div>
          @endif
        </div>
      
      
      
      
      
      </div>
    </div>
  @empty
    <div class="w-8/12 mx-auto h-screen mt-3">
        <div class="bg-yellow-100 p-4"><p>Sorry, there's nothing to see here. Looks like you haven't made a post yet.</p></div>
    </div>
  @endforelse

  </div>
</section>

<script src="{{ asset('js/PostActions.js')}}"></script>
<script src="{{ asset('js/userPostActions.js')}}"></script>
<script src="{{ asset('js/navSmallToggle.js')}}"></script>

@include('layouts/bottom')