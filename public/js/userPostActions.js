$(document).ready(function() {

    // Delete action
    $('.action').click(function(e) {
      e.stopPropagation();
      var postId = $(this).data('action-id');
      $('.action[data-action-id="' + postId + '"] div').toggle();
    });

    $(document).on('click', function(e) {
      if (!$('.action div').is(e.target) && $('.action div').has(e.target).length === 0) {
        $('.action div').hide();
      }
    });

});