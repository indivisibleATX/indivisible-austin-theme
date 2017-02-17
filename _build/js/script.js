(function($){

  $('input.search-submit').addClass('btn btn-default');
  // $carousel = $('.carousel');

  // if($carousel) {
  //   $carousel.flickity({
  //     wrapAround: true,
  //     autoPlay: true,
  //     pageDots: false,
  //   });

  //  console.log('there is flickity', $carousel);
  //  }

  // Removes inline width from Image Captions
  // * jQuery hack solution - should fix in the theme at some point

  $("figure").removeAttr("style");


  $("article#post-187 h2:first").before("<ul id='scriptLinks'></ul>");

  $("article#post-187 h2").each(function (index) {

    $("#scriptLinks").append("<li><a href='#script" + index + "'>" + $(this).text()  +"</a></li>" );

    $(this).wrapInner(function() {
      return "<div id='script" + index + "'></div>";
    });

  });

// Validation

  // Enable for testing
  // jQuery.validator.setDefaults({
  //   debug: true,
  //   success: "valid"
  // });

  $( "#mc4wp-form-1" ).validate({
    rules: {
      EMAIL: {
        required: true,
        email: true
      },
      MMERGE3: {
        phoneUS: true
      }
    }
  });

  var re = /\(?([0-9]{3})\)?-?\s?([0-9]{3})-([0-9]{4})/g;

  $("p").each(function () {
      $(this).html( $(this).html().replace(re,"<a href=\"tel:1$1$2$3\">($1) $2-$3</a>") );
  });

})(jQuery);
