@include('layouts/top')

@if (session('success'))
    <div class="p-4 bg-lime-200 rounded-md border-slate-300">
        {{ session('success') }}
    </div>
@endif

@include('layouts/dashboardnav')

<section class="pt-[20px] md:pt-[140px] md:ml-20">
  <div class="container mx-auto px-6">
  
    <!-- item -->
    @forelse($posts as $post)
    
      <div class="flex flex-col w-full md:w-9/12 lg:w-8/12 md:mx-auto mb-5 bg-white border border-slate-300 divide-y divide-slate-200 rounded-md">

        <!-- post source -->
        <div class="post-source flex items-center">
          <div class="dashboard-icon-space p-7">
            <i class="bi bi-pencil-fill"></i>
          </div>
          <div class="post-source-main-title pe-5 py-5">
            <a href="{{ route('view/post', $post->id) }}" class="font-medium text-base hover:underline">{{ $post->title }}</a>
            <span class="block font-bold text-sm text-slate-500 mt-2">Posted by <a href="{{ route('view.profile', $post->user) }}">{{ ucfirst($post->user->firstname) }} {{ ucfirst($post->user->lastname) }}</a></span>
          </div>
        </div>

        <!-- post comments list -->
        @foreach($post->comments as $comment)
          <div class="post-comment flex items-center">
            <div class="dashboard-icon-space p-7">
              <i class="bi bi-chat-square-dots"></i>
            </div>
            <div class="post-comment-title pe-5 py-5">

              <!-- Comment source name -->
              <span class="comment-username block text-base font-semibold mb-3">{{ ucfirst($comment->user->firstname) }} {{ ucfirst($comment->user->lastname) }}</span>
              <!-- Comment text -->
              <span class="comment block text-base">{{ $comment->comment }}</span>
              <!-- Action button -->
              <div class="action relative" data-action-id="{{ $comment->id }}">
                <i class="bi bi-three-dots"></i>
                <div class="absolute hidden flex flex-col shadow-2xl bg-white border border-slate-300 py-5 rounded w-[200px] z-40">
                  <form action="{{ route('comment.delete', $comment) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-start p-3 bg-gray-100 hover:bg-gray-200 hover:cursor-pointer w-full">Delete</button>
                  </form>
                </div>

              </div>
            </div>
          </div>
        @endforeach

    
    </div>
    @empty
      <div class="flex flex-col h-screen">
          <div class="bg-yellow-100 p-4"><p>Sorry, there's nothing to see here. Looks like you haven't made a comment to a post yet.</p></div>
      </div>
    @endforelse

  </div>
</section>

<!-- For comment dropdown aswell -->
<script src="{{ asset('js/userPostActions.js')}}"></script>

<script src="{{ asset('js/navSmallToggle.js')}}"></script>

@include('layouts/bottom')