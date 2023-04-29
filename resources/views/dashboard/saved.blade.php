@include('layouts/top')

@include('layouts/dashboardnav')

<section id="dashboard-saved" class="mt-5">
  <div class="container mx-auto px-6">
    
    <!-- <div class="flex flex-col h-screen">
        <div class="bg-yellow-100 p-4"><p>Sorry, there's nothing to see here. Looks like you haven't saved a post yet.</p></div>
    </div> -->

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
    

  </div>
</section>

@include('layouts/bottom')