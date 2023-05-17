<section id="feed-nav" class="mt-5 font-medium">
  <div class="container mx-auto px-6">
    <div class="flex items-center space-x-10 bg-white border border-slate-300 rounded-md px-6">
      <a href="{{ url('dashboard/posts') }}" class="py-5 {{ request()->routeIs('d/posts') ? 'border-b-2 border-black' : '' }}">Posts</a>
      <a href="{{ url('dashboard/comments') }}" class="py-5 {{ request()->routeIs('d/comments') ? 'border-b-2 border-black' : '' }}">Comments</a>
      <a href="{{ url('dashboard/saved') }}" class="py-5 {{ request()->routeIs('d/saved') ? 'border-b-2 border-black' : '' }}">Saved</a>
      <a href="{{ url('dashboard/upvoted') }}" class="py-5 {{ request()->routeIs('d/upvoted') ? 'border-b-2 border-black' : '' }}">Upvoted</a>
      <a href="{{ url('dashboard/downvoted') }}" class="py-5 {{ request()->routeIs('d/downvoted') ? 'border-b-2 border-black' : '' }}">Downvoted</a>
    </div>
  </div>
</section>