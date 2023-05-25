$(document).ready(function() {
    // Toggle the active link and hide/show inactive links on click
    $(".nav-sm").click(function(e) {
      e.preventDefault();
  
        $('.collapsible-nav-sm').toggleClass('hidden');

    });
  });
  