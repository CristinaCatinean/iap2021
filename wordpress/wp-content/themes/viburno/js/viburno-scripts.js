(function($){

  var viburno_scroll_position = 0;
  $(document).scroll(function(){
    viburno_scroll_position = $(this).scrollTop();
    if(viburno_scroll_position > 50){
      $("body").addClass('is-scrolled');
    } else {
        $("body").removeClass('is-scrolled');
    }
  });

}(jQuery));
