jQuery(document).ready(function() {
  jQuery('#ajax_call').click(function() {
    jQuery.ajax({
      url: cookinfamily_js.ajax_url,
      type: 'POST',
      data: {
        action: 'request_recettes'
      },
      success: function(response) {
        console.log(response);

        jQuery.each(response.posts, function( key, value ) {
          jQuery('#ajax_return').append('<div class="col-12 mb-5">' + value.post_title + '</div>');
        });
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
  });
});