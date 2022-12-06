jQuery(function ($) {

  $('.js-accordion-title').on('click', function () {
    /*クリックでコンテンツを開閉*/
    $('accordion-content').slideToggle();
    /*矢印の向きを変更*/
    $(this).toggleClass('active');
  })

});
