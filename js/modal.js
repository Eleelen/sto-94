jQuery(function($) {

  $(document).ready(function() {
    
    $('button').click(function() {
      $('body').find('.modal').each(function() {
         $(this).fadeIn(300);
      });
    })
    
    $('.modal-show-hide').on('click', function() {
      $(this).closest('.modal').fadeOut(300);  
    });
    
    // Center modal window 
    centerBlock($('.modal-centered'));

    // Center background-image in the image container 
    centerBackgroundImage($('.modal-img-container'));
    
  });
  
  function centerBackgroundImage($element) {
    if ( $element.length) {
      var $img_container =  $element;

       $element.find('img').css({
        'margin-top': -($img_container.find('img').height() / 2)
      });
    }
  }
  
  function centerBlock($element) {
    if( $element.length ) {
      $element.css({
        'margin-top': -($element.height() / 2),
        'margin-left': -($element.width() / 2)
      });
    } else 
       console.log('Element does not exist.');
  }
  
  
});