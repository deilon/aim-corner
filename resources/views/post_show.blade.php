@include('layouts/top')

<section class="pt-[130px] md:pt-[140px]">
  <div class="container mx-auto px-6">
    

  <div class="flex">
  <div class="relative flex w-full md:w-9/12 lg:w-8/12 md:mx-auto mb-5 bg-white border border-slate-300">
      <span class="absolute -top-2 right-5 user-role-post-label user-role-red"></span>
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

        <!-- Post comment box -->
        <div class="post-comment-box mt-5">
            <form action="{{url('add/comment/'.$post->id)}}" method="POST">
                @csrf
                <p class="font-semibold text-sm">Write your comment</p>
                <textarea cols="30" class="w-full mt-2 font-semibold text-sm border border-slate-300 rounded-t-md" name="comment" value="{{old('comment')}}" style="resize: vertical; min-height: 60px; vertical-align: top;" placeholder="Comment as {{Auth::user()->username}}"></textarea>
                <div class="submit-comment-box flex flex-col bg-gray-300 m-0 p-2 rounded-b-md">
                    <button type="submit" class="rounded-full bg-slate-200 px-4 py-2 text-sm self-end font-semibold">Comment</button>
                </div>
            </form>
        </div>

        @error('comment')
            <div class="p-3 bg-red-500 text-white mt-3">{{$message}}</div>
        @enderror

        <!-- message -->
        @if (session('success'))
            <div class="p-4 bg-lime-200 border-slate-300 mt-3">
                {{ session('success') }}
            </div>
        @endif

        <!-- Post comments list -->
        <div class="post-comment-list mt-10">
            <!-- <div class="post-comment-item mb-3 flex flex-col">
                <img src="{{ asset('images/user_photo.png') }}" width="33" height="33" alt="user photo" class="user-comment-photo">
            </div> -->
            @if($post->comments->count() > 0)
                @foreach($post->comments as $comment)
                    <div class="flex items-start space-x-4 mb-10">
                        @if(!empty($comment->user->photo))
                          <img src="{{ asset('storage/profile_pic/' . $comment->user->photo) }}" width="33" height="33" alt="Profile picture">
                        @else
                          <img src="{{ asset('storage/profile_pic/default.jpg') }}" width="33" height="33" alt="Profile picture">
                        @endif
                          <div class="flex flex-col">
                            <div class="font-bold">{{$comment->user->firstname.' '.$comment->user->lastname}} <span class="ml-3 text-gray-600">{{'@'.$comment->user->username}} • {{ $comment->created_at->diffForHumans() }}</span></div>
                            <div class="mt-2 text-gray-800 font-medium">{{$comment->comment}}</div>
                        </div>
                    </div>
                @endforeach
            @else 
                <div>Be the first one to comment on this post!</div>
            @endif

        </div>

      </div>
    </div>
  </div>

    

  </div>
</section>

<script src="{{ asset('js/postActions.js')}}"></script>
<script src="{{ asset('js/userPostActions.js')}}"></script>

@include('layouts/bottom')