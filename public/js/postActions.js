$(function() {

    // Upvote 
      $('.upvote-btn, .downvote-btn').click(function(e) {
          e.preventDefault();

          var routeUrl = $(this).data('route-url');
          var postId = $(this).data('post-id');
          var voteType = $(this).hasClass('upvote-btn') ? 'upvote' : 'downvote';
          
          $.ajax({
              url: routeUrl,
              type: 'POST',
              data: {
                  user_id: '{{Auth::user()->id}}',
                  post_id: postId,
                  vote_type: voteType
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(response) {
                if(voteType === 'upvote') {
                  // check if downvoted
                  if($('.downvote-btn[data-post-id="' + postId + '"]').hasClass('downvoted')) {
                    $('.downvote-btn[data-post-id="' + postId + '"]').toggleClass('downvoted');
                    $('.downvote-btn[data-post-id="' + postId + '"] i').toggleClass('bi-caret-down bi-caret-down-fill');

                    $('.upvote-btn[data-post-id="' + postId + '"]').removeClass('upvoted');
                    $('.upvote-btn[data-post-id="' + postId + '"] i').removeClass('bi-caret-up-fill'); 
                    $('.upvote-btn[data-post-id="' + postId + '"] i').addClass('bi-caret-up'); 
                  } else {
                    // proceed to toggle
                    $('.upvote-btn[data-post-id="' + postId + '"]').toggleClass('upvoted');
                    $('.upvote-btn[data-post-id="' + postId + '"] i').toggleClass('bi-caret-up bi-caret-up-fill');   
                  }
                } else {
                  // check if upvoted
                  if($('.upvote-btn[data-post-id="' + postId + '"]').hasClass('upvoted')) {
                    $('.upvote-btn[data-post-id="' + postId + '"]').toggleClass('upvoted');
                    $('.upvote-btn[data-post-id="' + postId + '"] i').toggleClass('bi-caret-up bi-caret-up-fill');

                    $('.downvote-btn[data-post-id="' + postId + '"]').removeClass('downvoted');
                    $('.downvote-btn[data-post-id="' + postId + '"] i').removeClass('bi-caret-down-fill');  
                    $('.downvote-btn[data-post-id="' + postId + '"] i').addClass('bi-caret-down');  
                  } else {
                    $('.downvote-btn[data-post-id="' + postId + '"]').toggleClass('downvoted');
                    $('.downvote-btn[data-post-id="' + postId + '"] i').toggleClass('bi-caret-down bi-caret-down-fill');
                  }
                                   
                }
                $('.vote-count[data-post-id="' + postId + '"]').text(response.vote_count);
              }
          });
      });

    // Save
    $('.save-post-btn').click(function(e) {
          e.preventDefault();

          var routeUrl = $(this).data('route-url');
          var postId = $(this).data('post-id');
          
          $.ajax({
              url: routeUrl,
              type: 'POST',
              data: {
                post_id: postId
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(response) {
                if(response.save) {
                  $('.save-post-btn[data-post-id="' + postId + '"] i')
                    .removeClass("bi bi-bookmark")
                    .addClass("bi bi-bookmark-fill");

                    $('.save-post-btn[data-post-id="' + postId + '"] span').text("Saved");
                    alert("Post has been saved.");
                } else {
                  $('.save-post-btn[data-post-id="' + postId + '"] i')
                    .removeClass("bi bi-bookmark-fill")
                    .addClass("bi bi-bookmark");

                    $('.save-post-btn[data-post-id="' + postId + '"] span').text("Save");
                    alert("Post unsaved.");
                }
              }
          });
      });

  });