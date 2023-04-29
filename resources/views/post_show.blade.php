@include('layouts/top')

<section class="mt-5">
  <div class="container mx-auto px-6">
    

  <div class="flex">
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
        <div class="post-description font-medium mt-3">This is the description text of the post and this can get longer. this is the description text of the post and this can get longer. This is the description text of the post and this can get longer. This is the description text of the post and this can get longer. This is the description text of the post and this can get longer. This is the description text of the post and this can get longer. asdadsasdfasdfasd</div>

        <!-- Post metrics -->
        <div class="post-metrics flex flex-row space-x-5 items-center mt-10 py-5 px-3 font-semibold border-t-2 border-slate-300">
          <div class="comments"><a href="#"><i class="bi bi-chat-square-dots mr-1"></i> 19 Comments</a></div>
          <div class="save"><i class="bi bi-bookmark mr-1"></i> Save</div>
          <div class="time"><i class="bi bi-clock mr-1"></i> 21h ago</div>
          <div class="categories"><i class="bi bi-tags mr-1"></i> Categories</div>
        </div>

        <!-- Post comment box -->
        <div class="post-comment-box mt-5">
            <form action="">
                <p class="font-semibold text-sm">Write your comment</p>
                <textarea cols="30" class="w-full mt-2 font-semibold text-sm border border-slate-300 rounded-t-md" style="resize: vertical; min-height: 60px; vertical-align: top;" placeholder="Comment as student777"></textarea>
                <div class="submit-comment-box flex flex-col bg-gray-300 m-0 p-2 rounded-b-md">
                    <button type="submit" class="rounded-full bg-slate-200 px-4 py-2 text-sm self-end font-semibold">Comment</button>
                </div>
            </form>
        </div>

        <!-- Post comments list -->
        <div class="post-comment-list mt-10">
            <!-- <div class="post-comment-item mb-3 flex flex-col">
                <img src="{{ asset('images/user_photo.png') }}" width="33" height="33" alt="user photo" class="user-comment-photo">
            </div> -->
            <div class="flex items-start space-x-4 mb-10">
                <img src="{{ asset('images/user_photo.png') }}" width="33" height="33" alt="Profile picture">
                <div class="flex flex-col">
                    <div class="font-bold">Deilon Cutamora <span class="ml-3 text-gray-600">@johndoe • 2 hours ago</span></div>
                    <div class="mt-2 text-gray-800 font-medium">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur bibendum orci, vel ultricies enim dictum a. Nam vel leo semper, auctor ante eget, commodo justo. Praesent volutpat arcu sit amet bibendum auctor. Donec congue, lorem non suscipit aliquet, purus velit commodo odio, vitae sagittis odio ex a felis.</div>
                </div>
            </div>
            <div class="flex items-start space-x-4 mb-10">
                <img src="{{ asset('images/user_photo.png') }}" width="33" height="33" alt="Profile picture">
                <div class="flex flex-col">
                    <div class="font-bold">Deilon Cutamora <span class="ml-3 text-gray-600">@johndoe • 2 hours ago</span></div>
                    <div class="mt-2 text-gray-800 font-medium">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur bibendum orci, vel ultricies enim dictum a. Nam vel leo semper, auctor ante eget, commodo justo. Praesent volutpat arcu sit amet bibendum auctor. Donec congue, lorem non suscipit aliquet, purus velit commodo odio, vitae sagittis odio ex a felis.</div>
                </div>
            </div>

        </div>

      </div>
    </div>
    <div class="close-post-view">
        <a href="javascript:history.back()" class="rounded-full bg-white text-black p-3 border border-slate-300"><i class="bi bi-x-lg text-lg"></i></a>
    </div>
  </div>

    

  </div>
</section>

@include('layouts/bottom')