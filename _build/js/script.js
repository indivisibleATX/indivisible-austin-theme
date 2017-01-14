// var test = document.getElementsByClassName('sub-menu');
//
// (function($){
//
//   var kids = document.querySelectorAll('#primary-menu > .menu-item-has-children > .sub-menu');
//   var kidsArray = Array.prototype.slice.call(kids);
//   kidsArray.forEach(function(item) {
//     console.log(item.offsetHeight, item);
//     item.setAttribute('data-height', item.offsetHeight + 'px');
//     //item.classList.add('slide');
//   });
//
//   if (window.matchMedia("(min-width: 768px)").matches) {
//
//     $('#primary-menu > .menu-item-has-children').on('mouseenter', function(e) {
//       const _this = $(this);
//         // console.log('we have focus', $(e.delegateTarget).first('.sub-menu')[0].id);
//         TweenLite.fromTo(_this.children('.sub-menu'), 0.15, {
//           height: 0,
//         },
//         {
//           height: _this.children('.sub-menu').attr('data-height'),
//           onComplete: function() {
//             //console.log('tween finished');
//             _this.addClass('slide');
//           },
//         });
//     });
//
//     $('#primary-menu > .menu-item-has-children').on('focusin', function(e) {
//       const _this = $(this);
//         // console.log('we have focus', $(e.delegateTarget).first('.sub-menu')[0].id);
//         TweenLite.fromTo(_this.children('.sub-menu'), 0.15, {
//           height: _this.children('.sub-menu').attr('data-height'),
//         },
//         {
//           height: _this.children('.sub-menu').attr('data-height'),
//           onComplete: function() {
//             //console.log('tween finished');
//             _this.removeClass('slide');
//           },
//         });
//     });
//
//     $('#primary-menu > .menu-item-has-children').on('focusout', function(e) {
//       const _this = $(this);
//         // console.log('we have focus', $(e.delegateTarget).first('.sub-menu')[0].id);
//         TweenLite.fromTo(_this.children('.sub-menu'), 0.15, {
//           height: _this.children('.sub-menu').attr('data-height'),
//         },
//         {
//           height: _this.children('.sub-menu').attr('data-height'),
//           onComplete: function() {
//             //console.log('tween finished');
//             _this.removeClass('slide');
//           },
//         });
//     });
//
//     $('#primary-menu > .menu-item-has-children').on('mouseleave', function(e) {
//       const _this = $(this);
//         // console.log('we have focus', $(e.delegateTarget).first('.sub-menu')[0].id);
//         TweenLite.fromTo(_this.children('.sub-menu'), 0.15, {
//           height: _this.children('.sub-menu').attr('data-height'),
//         },
//         {
//           height: 0,
//           onComplete: function() {
//             //console.log('tween finished');
//             _this.removeClass('slide');
//           },
//         });
//     });
//
//   } // end match media

(function($){

  $('input.search-submit').addClass('btn btn-default');
  $carousel = $('.carousel');

  if($carousel) {
    $carousel.flickity({
      wrapAround: true,
      autoPlay: true,
      pageDots: false,
    });

    console.log('there is flickity', $carousel);
  }

  // this isn't necessary at this point
  // we are just forcing all images to 100% width
  // $(".carousel img").each(function() {
  //     // Calculate aspect ratio and store it in HTML data- attribute
  //     var aspectRatio = $(this).width()/$(this).height();
  //     $(this).data("aspect-ratio", aspectRatio);

  //     // Conditional statement
  //     if(aspectRatio >= 1) {
  //         // Image is landscape
  //         $(this).css({
  //             width: "100%",
  //             height: "auto"
  //         });
  //     } else if (aspectRatio < 1) {
  //         // Image is portrait
  //         $(this).css({
  //             height: "100%",
  //             width: "auto",
  //         });
  //     }
  // });

})(jQuery);



// jQuery('.menu-item-has-children').css({
//   outline: '1px solid red',
// });






//  jQuery('#primary-menu > .menu-item-has-children').on('focus', function(e) {
//    console.log('some focus event', jQuery(e.delegateTarget).first('.sub-menu')[0].id);
//   //  TweenLite.to(jQuery(this).children('.sub-menu'), 0.25, {
//   //     height: 0,
//   //     onComplete: function() {
//   //       //console.log('tween finished');
//   //     }
//   //   });
//  });
