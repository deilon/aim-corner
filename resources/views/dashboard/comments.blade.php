@include('layouts/top')

@include('layouts/dashboardnav')

<section id="dashboard-comments" class="mt-5">
  <div class="container mx-auto px-6">
  
    <!-- item -->
    @forelse($posts as $post)
    
      <div class="flex flex-col w-full mb-5 bg-white border border-slate-300 divide-y divide-slate-200 rounded-md">

        <!-- post source -->
        <div class="post-source flex items-center">
          <div class="dashboard-icon-space p-7">
            <i class="bi bi-pencil-fill"></i>
          </div>
          <div class="post-source-main-title pe-5 py-5">
            <a href="#" class="font-medium text-base hover:underline">{{ $post->title }}</a>
            <span class="block font-bold text-sm text-slate-500 mt-2">Posted by {{ $post->user->firstname }} {{ $post->user->lastname }}</span>
          </div>
        </div>

        <!-- post comments list -->
        @foreach($post->comments as $comment)
          <div class="post-comment flex items-center">
            <div class="dashboard-icon-space p-7">
              <i class="bi bi-chat-square-dots"></i>
            </div>
            <div class="post-comment-title pe-5 py-5">
              <span class="comment-username block text-base font-semibold mb-3">{{ $comment->user->firstname }} {{ $comment->user->lastname }}</span>
              <a href="#" class="comment block text-base hover:underline">{{ $comment->comment }}</a>
              <div class="relative">
                <button class="comment-action-btn mt-2"><i class="bi bi-three-dots text-lg"></i></button>
                <div class="absolute hidden bg-white border border-slate-300 rounded py-2">
                  <a href="#" class="block py-2 px-4 hover:bg-gray-200 hover:cursor-pointer">Delete comment</a>
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

@include('layouts/bottom')