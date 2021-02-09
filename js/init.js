(function ($) {
  $(function () {

    $('.sidenav').sidenav();

  }); // end of document ready

  $(document).ready(function () {
    $('input#input_text, textarea#textarea2').characterCounter();
  });
})(jQuery); // end of jQuery name space
