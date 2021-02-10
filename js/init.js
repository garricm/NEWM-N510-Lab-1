(function ($) {
  $(document).ready(() => {
    $('#description').characterCounter();
  });

  $('#isAnonymous').change((e) => {
    if ($(e.target).prop("checked") == true) {
      $("#user-info").hide();
    } else {
      $("#user-info").show();
    }
  });
})(jQuery);
