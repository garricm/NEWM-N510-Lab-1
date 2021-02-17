(function ($) {
  $(document).ready(() => {
    $('#description').characterCounter();
    $('#street_address').characterCounter();
  });

  $('#isAnonymous').change((e) => {
    if ($(e.target).prop("checked") == true) {
      $("#user-info").hide();
    } else {
      $("#user-info").show();
    }
  });

  $(document).ready(function () {
    $('select').formSelect();
  });
})(jQuery);
