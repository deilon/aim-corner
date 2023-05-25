<!-- Nav medium screens -->
<section class="fixed h-screen bg-white p-10 pt-[150px] font-medium hidden md:block">
  <!-- <a href="{{ url('feed/all') }}" class="py-5 pe-2 border-b-2 border-black"><i class="bi bi-house-fill mr-2"></i> For you</a> -->
  <a href="{{ url('dashboard/posts') }}" class="block py-5 pe-2 {{ request()->routeIs('d/posts') ? 'text-red-600' : '' }}">Posts</a>
  <a href="{{ url('dashboard/comments') }}" class="block py-5 pe-2 {{ request()->routeIs('d/comments') ? 'text-red-600' : '' }}">Comments</a>
  <a href="{{ url('dashboard/saved') }}" class="block py-5 pe-2 {{ request()->routeIs('d/saved') ? 'text-red-600' : '' }}">Saved</a>
  <a href="{{ url('dashboard/upvoted') }}" class="block py-5 pe-2 {{ request()->routeIs('d/upvoted') ? 'text-red-600' : '' }}">Upvoted</a>
  <a href="{{ url('dashboard/downvoted') }}" class="block py-5 pe-2 {{ request()->routeIs('d/downvoted') ? 'text-red-600' : '' }}">Downvoted</a>
</section>

<!-- Nav small screens -->
<section class="sticky top-0 bg-white border-b border-slate-300 w-full px-5 py-2 pt-[130px] font-medium z-10 md:hidden">
  <button class="nav-sm py-5 pe-2 w-full text-start {{ request()->routeIs('d/posts') ? 'text-red-600 block' : 'hidden' }}">Posts</button>
  <button class="nav-sm py-5 pe-2 w-full text-start {{ request()->routeIs('d/comments') ? 'text-red-600 block' : 'hidden' }}">Comments</button>
  <button class="nav-sm py-5 pe-2 w-full text-start {{ request()->routeIs('d/saved') ? 'text-red-600 block' : 'hidden' }}">Saved</button>
  <button class="nav-sm py-5 pe-2 w-full text-start {{ request()->routeIs('d/upvoted') ? 'text-red-600 block' : 'hidden' }}">Upvoted</button>
  <button class="nav-sm py-5 pe-2 w-full text-start {{ request()->routeIs('d/downvoted') ? 'text-red-600 block' : 'hidden' }}">Downvoted</button>
    <div class="collapsible-nav-sm hidden">
      <a href="{{ url('dashboard/posts') }}" class="py-5 pe-2 {{ request()->routeIs('d/posts') ? 'hidden' : 'block' }}">Posts</a>
      <a href="{{ url('dashboard/comments') }}" class="py-5 pe-2 {{ request()->routeIs('d/comments') ? 'hidden' : 'block' }}">Comments</a>
      <a href="{{ url('dashboard/saved') }}" class="py-5 pe-2 {{ request()->routeIs('d/saved') ? 'hidden' : 'block' }}">Saved</a>
      <a href="{{ url('dashboard/upvoted') }}" class="py-5 pe-2 {{ request()->routeIs('d/upvoted') ? 'hidden' : 'block' }}">Upvoted</a>
      <a href="{{ url('dashboard/downvoted')}}" class="py-5 pe-2 {{ request()->routeIs('d/downvoted') ? 'hidden' : 'block' }}">Downvoted</a>  
    </div>
</section>