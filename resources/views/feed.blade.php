@include('Layouts.top')

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
    
    <div class="relative flex w-8/12 mx-auto mb-5 bg-white border border-slate-300">
      <span class="absolute -top-2 right-5 user-role-post-label user-role-green"></span>
      <div class="vote-controls flex flex-col items-center py-10 px-5">
        <button class="flex items-center"><i class="bi bi-caret-up"></i></button>
        <div class="vote-count font-semibold">1004</div>
        <button class="flex items-center"><i class="bi bi-caret-down"></i></button>
      </div>
      <div class="post-details py-7 pe-7">
        <!-- Post user name -->
        <div class="post-user text-sm mb-4">Posted by <a href="#" class="font-semibold hover:underline">Deilon Cutamora</a></div>
        
        <!-- Post title -->
        <div class="post-title font-semibold text-xl">This is the title of this post. A post without text and this is quite long and im not sure where to end it. This is the title of this post. A post wit ... See more</div>
        
        <!-- Post metrics -->
        <div class="post-metrics flex flex-row space-x-5 items-center mt-10 py-5 px-3 font-semibold border-t-2 border-slate-300">
          <div class="comments"><a href="#"><i class="bi bi-chat-square-dots mr-1"></i> 19 Comments</a></div>
          <div class="save"><i class="bi bi-bookmark mr-1"></i> Save</div>
          <div class="time"><i class="bi bi-clock mr-1"></i> 21h ago</div>
          <div class="categories"><i class="bi bi-tags mr-1"></i> Categories</div>
        </div>

      </div>
    </div>

    <div class="relative flex w-8/12 mx-auto mb-5 bg-white border border-slate-300">
      <span class="absolute -top-2 right-5 user-role-post-label user-role-red"></span>
      <div class="vote-controls flex flex-col items-center py-10 px-5">
        <button class="flex items-center"><i class="bi bi-caret-up"></i></button>
        <div class="vote-count font-semibold">1004</div>
        <button class="flex items-center"><i class="bi bi-caret-down"></i></button>
      </div>
      <div class="post-details py-7 pe-7">
        <!-- Post user name -->
        <div class="post-user text-sm mb-4">Posted by <a href="#" class="font-semibold hover:underline">Deilon Cutamora</a></div>
        
        <!-- Post title -->
        <div class="post-title font-semibold text-xl">This is the title of this post. A post without text and this is quite long and im not sure where to end it. This is the title of this post. A post wit ... See more</div>
        
        <!-- Post description text -->
        <div class="post-description font-medium mt-3">This is the description text of the post and this can get longer. this is the description text of the post and this can get longer. This is the description text of the post and this can get longer. This is the description text of the post and this can get longer. This is the description text of the post and this can get longer. This is the description text of the post and this can get longer. asdadsasdfasdfasd ... <span class="font-semibold">See more</span></div>

        <!-- Post metrics -->
        <div class="post-metrics flex flex-row space-x-5 items-center mt-10 py-5 px-3 font-semibold border-t-2 border-slate-300">
          <div class="comments"><a href="#"><i class="bi bi-chat-square-dots mr-1"></i> 19 Comments</a></div>
          <div class="save"><i class="bi bi-bookmark mr-1"></i> Save</div>
          <div class="time"><i class="bi bi-clock mr-1"></i> 21h ago</div>
          <div class="categories"><i class="bi bi-tags mr-1"></i> Categories</div>
        </div>

      </div>
    </div>
    
    <div class="relative flex w-8/12 mx-auto mb-5 bg-white border border-slate-300">
      <span class="absolute -top-2 right-5 user-role-post-label user-role-blue"></span>
      <div class="vote-controls flex flex-col items-center py-10 px-5">
        <button class="flex items-center"><i class="bi bi-caret-up"></i></button>
        <div class="vote-count font-semibold">1004</div>
        <button class="flex items-center"><i class="bi bi-caret-down"></i></button>
      </div>
      <div class="post-details py-7 pe-7">
        <!-- Post user name -->
        <div class="post-user text-sm mb-4">Posted by <a href="#" class="font-semibold hover:underline">Deilon Cutamora</a></div>
        
        <!-- Post title -->
        <div class="post-title font-semibold text-xl">This is the title of this post. A post without text and this is quite long and im not sure where to end it. This is the title of this post. A post wit ... See more</div>
        
        <!-- Post description text -->
        <div class="post-description font-medium mt-3">This is the description text of the post and this can get longer. this is the description text of the post and this can get longer. This is the description text of the post and this can get longer. This is the description text of the post and this can get longer. This is the description text of the post and this can get longer. This is the description text of the post and this can get longer. asdadsasdfasdfasd ... <span class="font-semibold">See more</span></div>

        <!-- Post photo -->
        <div class="post-photo mt-3"><img src="{{ asset('images/sample-post-image.jpg') }}" alt="post photo"></div>

        <!-- Post metrics -->
        <div class="post-metrics flex flex-row space-x-5 items-center mt-10 py-5 px-3 font-semibold border-t-2 border-slate-300">
          <div class="comments"><a href="#"><i class="bi bi-chat-square-dots mr-1"></i> 19 Comments</a></div>
          <div class="save"><i class="bi bi-bookmark mr-1"></i> Save</div>
          <div class="time"><i class="bi bi-clock mr-1"></i> 21h ago</div>
          <div class="categories"><i class="bi bi-tags mr-1"></i> Categories</div>
        </div>

      </div>
    </div>

    <div class="relative flex w-8/12 mx-auto mb-5 bg-white border border-slate-300">
      <span class="absolute -top-2 right-5 user-role-post-label user-role-blue"></span>
      <div class="vote-controls flex flex-col items-center py-10 px-5">
        <button class="flex items-center"><i class="bi bi-caret-up"></i></button>
        <div class="vote-count font-semibold">1004</div>
        <button class="flex items-center"><i class="bi bi-caret-down"></i></button>
      </div>
      <div class="post-details py-7 pe-7">
        <!-- Post user name -->
        <div class="post-user text-sm mb-4">Posted by <a href="#" class="font-semibold hover:underline">Deilon Cutamora</a></div>
        
        <!-- Post title -->
        <div class="post-title font-semibold text-xl">This is the title of this post. A post with title, without text, but with image. this is quite long and im not sure where to end it.</div>

        <!-- Post photo -->
        <div class="post-photo mt-3"><img src="{{ asset('images/sample-post-image-2.jpg') }}" alt="post photo"></div>

        <!-- Post metrics -->
        <div class="post-metrics flex flex-row space-x-5 items-center mt-10 py-5 px-3 font-semibold border-t-2 border-slate-300">
          <div class="comments"><a href="#"><i class="bi bi-chat-square-dots mr-1"></i> 19 Comments</a></div>
          <div class="save"><i class="bi bi-bookmark mr-1"></i> Save</div>
          <div class="time"><i class="bi bi-clock mr-1"></i> 21h ago</div>
          <div class="categories"><i class="bi bi-tags mr-1"></i> Categories</div>
        </div>

      </div>
    </div>

    <div class="relative flex w-8/12 mx-auto mb-5 bg-white border border-slate-300">
      <span class="absolute -top-2 right-5 user-role-post-label user-role-blue"></span>
      <div class="vote-controls flex flex-col items-center py-10 px-5">
        <button class="flex items-center"><i class="bi bi-caret-up"></i></button>
        <div class="vote-count font-semibold">1004</div>
        <button class="flex items-center"><i class="bi bi-caret-down"></i></button>
      </div>
      <div class="post-details py-7 pe-7">
        <!-- Post user name -->
        <div class="post-user text-sm mb-4">Posted by <a href="#" class="font-semibold hover:underline">Deilon Cutamora</a></div>
        
        <!-- Post title -->
        <div class="post-title font-semibold text-xl">This is the title of this post. A post that is type of Link with title. this is quite long and im not sure where to end it.</div>

        <!-- Link post -->
        <div class="post-link flex space-x-2 font-medium mt-3">
          <span><i class="bi bi-link-45deg text-base"></i></span>
          <a href="#" class="hover:underline">This is the link and the link might be very long or short but the important is that it has blue color and underlined when hover</a>
        </div>

        <!-- Post metrics -->
        <div class="post-metrics flex flex-row space-x-5 items-center mt-10 py-5 px-3 font-semibold border-t-2 border-slate-300">
          <div class="comments"><a href="#"><i class="bi bi-chat-square-dots mr-1"></i> 19 Comments</a></div>
          <div class="save"><i class="bi bi-bookmark mr-1"></i> Save</div>
          <div class="time"><i class="bi bi-clock mr-1"></i> 21h ago</div>
          <div class="categories"><i class="bi bi-tags mr-1"></i> Categories</div>
        </div>

      </div>
    </div>

  </div>
</section>
    
@include('scripts')
@include('Layouts.bottom')